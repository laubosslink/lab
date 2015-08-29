#!/usr/bin/env python

from commands import Command

from utils import Utils

import runner

class Set_Param(Command):
	def isCommand(self, command):
		return command == 'SET_PARAM'

	def execute(self, raw_socket_data):
		key = self._getKey(raw_socket_data)
		value = self._getValue(raw_socket_data)

		try:
			 self.client.getRunner().getParameters().addParameter(key, value)
		except Exception as e:
			raise e

		return 'Parameter has been set'
