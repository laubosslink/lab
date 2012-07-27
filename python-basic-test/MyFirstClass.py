# -*- coding: utf-8 -*-
"""
Created on Wed Jul 25 21:02:30 2012

@author: laubosslink
"""


class MyFirstClass:
    _hello="default value"
    
    def __init__(self):
        self._hello = "default value from init"
    
    @property
    def hello(self):
        return "from property : " + self._hello

    @hello.setter
    def hello(self, value):
        self._hello = " (used setter) " + value
    
    @hello.getter
    def hello(self):
        return "Getter " + self._hello
        
usefs = MyFirstClass()
usefs2 = usefs
usefs3 = MyFirstClass()

#print(MyFirstClass())
#print(usefs)
#print(usefs2)

usefs3.hello="hello modify"
#print(usefs3)
print(usefs3.hello)

print(usefs.hello)
#Sans instancier, python appel tout de même __init__
print(MyFirstClass().hello)


class MySecondClass:
    number=10
    
        
    def setNumber(self, number):
        self.number = number
        
    def getNumber(self):
        return self.number
        
    number2 = property(getNumber, setNumber)

myNumber = MySecondClass()
myNumber.setNumber(6)
print(myNumber.number)

myNumber.number = 2
print(myNumber.getNumber())
print(myNumber.number)
        
#print(MySecondClass().number)

class Trying:
    number=5
print(Trying().number)