#!/usr/bin/env python

import os

import setup

import parameters

class Runner:
	library = None

	params = None

	def __init__(self, library):
		try:
			self.setLibrary(library)
		except Exception as e:
			raise e

		self.params = parameters.Parameters()

	def getParameters(self):
		return self.params

	@staticmethod
	def listAvailableLibraries():
		return os.listdir(setup.Setup.LIBRARIES_DIRECTORY)

	def __isLibrary(self, library):
		return library in self.listAvailableLibraries()

	def setLibrary(self, library):
		if not self.__isLibrary(library):
			raise Exception('The library selected does not exist')

		if self.library:
			del self.library

		lib = __import__('libraries.' + library, fromlist=[library.title()])
		self.library = eval('lib.' + library.title() + '()')

	def run(self):
		return self.library.run(self.params)
