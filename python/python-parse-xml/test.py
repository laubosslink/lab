#!/bin/python
# -*- coding: utf-8 -*-

from xml.etree.ElementTree import ElementTree

tree = ElementTree()

tree.parse('test.xml')

print(tree.find('personne/nom').text)
print(tree.find('personne/prenom').text)

print(tree.find('personne/hello').get('m'))
print(tree.find('personne/hello').text)

print("")
print("Iterator :")
print("")

for item in tree.getiterator('personne'):
    print("Nom : " + str(item.find('nom')) + " -> " + item.find('nom').text)
    
    for ville in item.find('adresse'):
        print(ville.text  + "(" + ville.get("postal") + ")")
        ville.set("postal", "00000")
        
    print("")
    
tree.write('test-postal.xml', method='html')