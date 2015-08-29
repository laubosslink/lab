#!/usr/bin/env python

class Parameter:
    key=None
    value=None

    is_raw_value=False

    def __init__(self, key, value, is_raw_value=False):
        self.key = key
        self.value = value

        self.is_raw_value = is_raw_value

    def getKey(self):
        return self.key

    def getValue(self):
        return self.value

    def getIsRawValue(self):
        return self.is_raw_value
