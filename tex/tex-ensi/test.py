#!/usr/bin/python
from Crypto.Cipher import DES3
from Crypto import Random
key = b'une cle 16 octet'
iv = Random.new().read(DES3.block_size)
des3c = DES3.new(key, DES3.MODE_ECB, iv)
msge = des3c.encrypt("hello wo") # mot longueur multiple 8
print msge
