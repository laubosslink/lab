#!/usr/bin/env python
import sys
import signal

import logging
import threading
import socket

import utils
import client

class Server:
	host = 'localhost'
	port = 8888

	socket = None

	running = False

	clients = None

	def __init__(self):
		signal.signal(signal.SIGTERM, self.close_connections)
		signal.signal(signal.SIGINT, self.close_connections)

		host = utils.Utils.getServerConfiguration().getValue('server')['host']

		if host:
			self.host = host

		port = utils.Utils.getServerConfiguration().getValue('server')['port']

		if port:
			self.port = port

		self.clients = {}

	def close_connections(self, signum, frame):
		if self.clients:
			for client in self.clients.items():
				client[1].close_socket()

		self.running = False
		self.socket.shutdown(socket.SHUT_RDWR)

	def detach_thread(self, thread_id):
		del self.clients[thread_id]

	def start(self):
		logging.info('Starting server.')

		self.running = True

		try:
			self.socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
			self.socket.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
			self.socket.bind((self.host, self.port))
			self.socket.listen(5)
		except Exception as e:
			logging.error('Problem when initiate socket: ' + str(e))
			raise e

		thread_id = 0

		while self.running:
			conn, addr = self.socket.accept()

			current_client = client.Client(self, thread_id, conn, addr)
			self.clients[thread_id] = current_client

			current_client.start()

			thread_id += 1 # FIXME will break if is more than 9223372036854775807 (sys.maxint)

			logging.debug('There is a total of ' + str(len(self.clients)) + ' connections')

		self.socket.close()
