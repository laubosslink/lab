#!/usr/bin/env python

# Example based on https://fr.wikipedia.org/wiki/Singleton_%28patron_de_conception%29#Impl.C3.A9mentation_simple

class Test:
	__instance = None

	def __new__(myClass):
		if myClass.__instance is None:
			myClass.__instance = object.__new__(myClass)

		return myClass.__instance

	def __init__(self):
		self.share_var = "Hello :)"

	def setShare(self, value):
		self.share_var = value

	def getShare(self):
		return self.share_var

t = Test()
t2 = Test()

t.setShare('hello1')
print('t.getShare(): ' + t.getShare())
t2.setShare('hello2')
print('t.getShare(): ' + t.getShare())
