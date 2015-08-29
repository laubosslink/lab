#!/usr/bin/env python

from abc import ABCMeta, abstractmethod

"""
Third class, based on Strategy Pattern.

See: https://en.wikipedia.org/wiki/Strategy_pattern
"""
class Library:
	__metaclass__ = ABCMeta

	"""
	Method to be specified by each library.

	:type parameters: Parameters

	:rtype: Status
	"""
	@abstractmethod
	def run(self, parameters):
		pass
