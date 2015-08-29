#!/usr/bin/env python

from commands import Command

from utils import Utils

import runner

class Load(Command):
	def isCommand(self, command):
		return command == 'LOAD'

	def execute(self, raw_socket_data):
		library = self._getKey(raw_socket_data)

		try:
			 self.client.setRunner(runner.Runner(library))
		except Exception as e:
			raise Exception('During loading -> ' + str(e))

		return 'Library has been loaded'
