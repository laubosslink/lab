#!/usr/bin/python
# -*- coding: utf-8 -*-

from xml.etree.ElementTree import ElementTree
import xml.etree
import xml.dom.minidom 

import json

class salt_xml:
    tree = ElementTree()    
    
    def __init__(self):
        json_data = open('insert.json')
        data = json.load(json_data)
        self.tree.parse('config-original.xml')
        self.read_json(data, "")
        self.tree.write('config.xml', method="xml", xml_declaration=False)
        
    def read_json(self, data, find):
        for key, value in data.iteritems():
            if isinstance(value, dict):
                if find is "None":
                    self.read_json(value, str(key))
                else:
                    self.read_json(value, str(find) + "/" + str(key) )
            else:
                self.tree.find(str(key)).text = str(value)
    
    def render(self):
        return xml.dom.minidom.parse('config.xml').toprettyxml()
        
def test():
    render = salt_xml()
    print(render.render())

test()