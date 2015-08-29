#!/usr/bin/env python

from commands import Command

from utils import Utils

import runner

class Run(Command):
	def isCommand(self, command):
		return command == 'RUN'

	def execute(self, raw_socket_data):
		try:
			 self.client.getRunner().run()
		except Exception as e:
			raise e

		return 'Run has been working'
