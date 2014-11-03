# -*- coding: utf-8 -*-
"""
Spyder Editor

This temporary script file is located here:
/home/laubosslink/.spyder2/.temp.py
"""

# Variables
myvar=5
myvar2=10

# Permutation
myvar, myvar2 = myvar2, myvar

# Affichage
print("hello world".capitalize()); print("myvar=" + str(myvar) + " / myvar2=" + str(myvar2))
print("Hello World"[6:].upper())

import math
print("racine de 25 : " + str(math.sqrt(25)))

fruits = {"pommes":21, "melons":3}

for fruit, nombre in fruits.items():
    print("Il y a {} {}".format(nombre, fruit))
    
    