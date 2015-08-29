#!/usr/bin/env python

import parameter

class Parameters:
	parameters=None

	def __init__(self):
		self.parameters = {}

	def addParameter(self, key, value):
		self.parameters[key] = parameter.Parameter(key, value)

	def getValue(self, key):
		try:
			parameter = self.parameters[key]
		except KeyError:
			return None

		return parameter.getValue()

	def getParameters(self):
		return self.parameters
