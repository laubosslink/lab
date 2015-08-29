#!/usr/bin/env python

from abc import ABCMeta, abstractmethod

import logging

import base64

"""
Third class, based on Chain of Responsability Pattern.

See: http://www.oodesign.com/chain-of-responsibility-pattern.html
"""
class Command:
	__metaclass__ = ABCMeta

	BEGIN_RAW='BEGIN_RAW_VALUE'
	END_RAW='END_RAW_VALUE'
	RAW_ANNOUNCMENT='RAW_VALUE_ANNOUNCMENT'

	__nextCommand = None

	client = None

	def __init__(self, client):
		self.client = client

	def __getCommand(self, raw_socket_data):
		command = raw_socket_data

		if ' ' in command:
			command = command.split(' ')[0]

		return command

	def _getKey(self, raw_socket_data):
		key = raw_socket_data.split(' ')[1]

		if key:
			return key

		return None

	def _getValue(self, raw_socket_data):
		value = raw_socket_data.split(' ', 2)[2].split('\n')[0]

		if value and value != self.RAW_ANNOUNCMENT:
			return value

		if value == self.RAW_ANNOUNCMENT:
			lines = raw_socket_data.split('\n')[1:]

			if lines[0] != self.BEGIN_RAW or lines[-1] != self.END_RAW:
				raise Exception('Problem on protocol, use of RAW_VALUE is not respected')

			return base64.b64decode(''.join(lines[1:-1])) # TODO sad

		return None

	"""
	Method to know if it is the interpreter

	:type protocol_command: string
	"""
	@abstractmethod
	def isCommand(self, protocol_command):
		pass

	"""
	Method to implement when the command is execute

	:raises Exception: If you think alorithm need to be stopped (security reason)
	"""
	@abstractmethod
	def execute(self, raw_socket_data):
		pass

	def _getNextCommand(self):
		return self.__nextCommand

	def _setNextCommand(self, command):
		self.__nextCommand = command

	"""
	:type next_command: Command
	"""
	def addNextCommand(self, next_command):
		if self.__nextCommand == None:
			self.__nextCommand = next_command
			return

		tmpNextCommand = self.__nextCommand

		while tmpNextCommand._getNextCommand() != None:
			tmpNextCommand = tmpNextCommand._getNextCommand()

		tmpNextCommand._setNextCommand(next_command)

	"""
	:raises Exception: If something goes wrong
	"""
	def interpret(self, raw_socket_data, protocol_command=None):
		if protocol_command == None: # UX: optimization (avoid to retrieve command each time during recursivity)
			protocol_command = self.__getCommand(raw_socket_data)

		if(self.isCommand(protocol_command)):
			logging.debug('Socket command will be executed (' + raw_socket_data + ')')
			try:
				return self.execute(raw_socket_data)
			except Exception as e:
				raise e

		if self.__nextCommand == None:
			return None;

		return self.__nextCommand.interpret(raw_socket_data, protocol_command)
