#!/usr/bin/python
# -*- coding: utf-8 -*-

import yaml

file = open('test.yml')

yaml_data = yaml.load_all(file)

def read_yaml(datas):
        for key, value in datas.items():
            print("key:" + str(key))
            
            if isinstance(value, dict):
                read_yaml(value)
            else:
                print("value:" + str(value))        

print(yaml_data)
read_yaml(yaml_data)
