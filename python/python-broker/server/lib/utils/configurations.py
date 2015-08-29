#!/usr/bin/env python

from configuration import Configuration

class Configurations:
	__instance = None

	def __new__(myClass):
		if myClass.__instance is None:
			myClass.__instance = object.__new__(myClass)

		return myClass.__instance

	__configurations = None

	def __init__(self):
		self.__configurations = {}

	def getConfiguration(self, configuration_name, configuration_filename):
		if not self.__configurations.has_key(configuration_name):
			self.__configurations[configuration_name] = Configuration(configuration_filename)

		return self.__configurations[configuration_name]
