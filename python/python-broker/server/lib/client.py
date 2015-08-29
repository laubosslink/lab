#!/usr/bin/env python

import threading
import socket

import logging

import base64

import runner

from status import Status
from utils import Utils

# TODO auto import
from commands.list_libraries import List_Libraries

class Client(threading.Thread):
	PROTOCOL_HEADER="BROKER"
	PROTOCOL_VERSION="1.0"

	BEGIN_RAW='BEGIN_RAW_VALUE'
	END_RAW='END_RAW_VALUE'
	RAW_ANNOUNCMENT='RAW_VALUE_ANNOUNCMENT'

	__server = None
	__thread_id = None

	socket_bytes_read = 1024

	__socket_connection = None
	socket_addr = None

	# Chain of responsability (see commands/__init__.py)
	first_command_node = None

	runner = None

	running = False

	def __init__(self, server, thread_id, socket_connection, socket_addr):
		threading.Thread.__init__(self)

		self.__server = server
		self.__thread_id = thread_id

		self.__socket_connection = socket_connection
		self.socket_addr = socket_addr

		# TODO auto imports
		self.__addCommand(List_Libraries(self))

	def __addCommand(self, command):
		if self.first_command_node == None:
			self.first_command_node = command
			return

		self.first_command_node.addNextCommand(command)

	def __isValidProtocol(self, protocol):
		return protocol == self.PROTOCOL_HEADER + '/' + self.PROTOCOL_VERSION

	def __sendResponse(self, message, status=''): # TODO add status on protocol
		if status:
			self.__socket_connection.send(str(status) + ' ' +  message)

			if status == '500':
				logging.error('thread-id(' + str(self.__thread_id) + '), error (status 500) with client ' + str(self.socket_addr) + ' socket will be closed.')
				self.close_socket()

			return

		self.__socket_connection.send(message + '\n')

	def __readData(self):
		data = self.__socket_connection.recv(self.socket_bytes_read)

		if not data:
			logging.info('thread-id(' + str(self.__thread_id) + '): connection (' + str(self.socket_addr) + ') has been lost.')
			self.close_socket()
			return None

		while data[-2:] != '\r\n':
			data = data + self.__socket_connection.recv(self.socket_bytes_read)

		return data[:-2] # remove '\r\n' for telnet

	def __checkProtocolHeader(self, protocol):
		if not self.__isValidProtocol(protocol):
			msg = 'Invalid protocol receive(' + protocol + ') expected(' + self.PROTOCOL_HEADER + '/' + self.PROTOCOL_VERSION + ')'

			self.__sendResponse(msg, Status.INVALID_PROTOCOL)
			self.close_socket()

			raise Exception('Problem when client starting -> ' + msg)

		self.__sendResponse(str(Status.OK) + ' Your protocol is valid')

	def getRunner(self):
		return self.runner

	def setRunner(self, runner):
		self.runner = runner

	def run(self):
		logging.info('thread-id(' + str(self.__thread_id) + '): socket.open(' + str(self.socket_addr) + ')')

		try:
			self.__checkProtocolHeader(self.__readData())
		except Exception as e:
			self.close_socket()
			raise Exception('Bad protocol used -> ' + str(e))

		self.running = True

		while self.running:
			data = self.__readData()

			if not data:
				break

			try:
				response = self.first_command_node.interpret(data)
			except Exception as e:
				self.__sendResponse('Problem during interpretation (see log server).', '500')
				raise e

			if not response:
				response = 'TODO retrieve status'

			self.__sendResponse('200 ' + response) # TODO try/catch interpret

		self.close_socket()

	def close_socket(self, shutdown=True):
		if self.__socket_connection == None:
			return

		socket_connection = self.__socket_connection
		self.__socket_connection = None

		self.running = False

		if shutdown:
			socket_connection.shutdown(socket.SHUT_RDWR)

		socket_connection.close()

		if self.runner:
			del self.runner

		logging.info('thread-id(' + str(self.__thread_id) + '): socket.closed(' + str(self.socket_addr) + ')')

		self.__server.detach_thread(self.__thread_id)
