#!/usr/bin/env python

try:
	import json
	import yaml
except ImportError as ie:
	print('Impossible to import: ' + str(ie))

import os

import setup

import configurations

class Utils:
	KEY_CLIENT_CONFIGURATION='server'
	KEY_STATUS_CONFIGURATION='status'

	@staticmethod
	def getServerConfiguration(config_filename=''):
		if not config_filename or not os.path.exists(config_filename):
			config_filename = setup.Setup.SETUP_DIRECTORY + '/../config/server.yml'

			if not os.path.exists(config_filename):
				config_filename = setup.Setup.SETUP_DIRECTORY + '/../config/server.sample.yml'


		return configurations.Configurations().getConfiguration(Utils.KEY_CLIENT_CONFIGURATION, config_filename)


	@staticmethod
	def getStatusCodeConfiguration(config_filename=''):
		if not config_filename or not os.path.exists(config_filename):
			config_filename = setup.Setup.SETUP_DIRECTORY + '/../config/status.yml'

			if not os.path.exists(config_filename):
				config_filename = setup.Setup.SETUP_DIRECTORY + '/../config/status.sample.yml'

		return configurations.Configurations().getConfiguration(Utils.KEY_STATUS_CONFIGURATION, config_filename)

	@staticmethod
	def getDataDirectory():
		data_directory = Utils.getServerConfiguration().getValue('server')['data_directory']

		if not data_directory:
			return setup.Setup.SETUP_DIRECTORY + '/..'

		return data_directory

	@staticmethod
	def isSecurePath(path):
		if path == None:
			return True

		if '"' in path:
			return False

		if '..' in path:
			return False

		return True

	@staticmethod
	def getEnvironment():
		return Utils.getServerConfiguration().getValue('server')['environment']
