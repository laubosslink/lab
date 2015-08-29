#!/usr/bin/env python

import os

class Configuration:
	__configuration = None

	def __init__(self, config_filename):
		try:
			self.__configuration = self.__loadConfig(config_filename)
		except Exception as e:
			raise e

	def __loadConfig(self, filename):
		ext = os.path.splitext(filename)[1]

		if ext != '.yml' and ext != '.json' and ext != '.yaml':
			raise Exception('Please specify json or yaml config file and not "' + ext + '"')

		try:
			file = open(filename, 'r')
		except Exception as e:
			raise Exception('Problem to open config file: ' + str(e))

		config = []

		if ext == '.yaml' or ext == '.yml':
			lib = __import__('yaml')
		elif ext == '.json':
			lib = __import__('json')

		config = lib.load(file)

		return config

	def getValue(self, key):
		return self.__configuration[key]
