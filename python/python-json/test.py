#!/usr/bin/python
# -*- coding: utf-8 -*-

import json

json_data=open('test.json')

data = json.load(json_data)

def read_json(data):
  for key, value in data.iteritems():
    print("key:" + str(key))

    if isinstance(value, dict):
      read_json(value)
    else:
      print("value:" + str(value))

read_json(data)
