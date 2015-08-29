#!/usr/bin/env python

from commands import Command

import runner

class List_Libraries(Command):
	def isCommand(self, command):
		return command == 'LIST_LIBRARIES'

	def execute(self, raw_socket_data):
		return ','.join(runner.Runner.listAvailableLibraries())
