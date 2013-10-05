# -*- coding: utf-8 -*-
"""
Created on Wed Jul 25 00:22:32 2012

@author: laubosslink
"""

import os
import mimetypes
import subprocess
import magic

#print(__name__)
#print(__import__)
#print(__package__)

mydir = raw_input("List directory : ")

# Méthode D, car je ne comprend pas magic (obsolete avec la version python installé)
mime = subprocess.Popen("/usr/bin/file -i "+mydir, shell=True, stdout=subprocess.PIPE).communicate()[0] 
# return : /etc/passwd: text/plain; charset=us-ascii

mime = str(mime).split(':')[1].split(';')[0]

#if str(mime).find("text/plain"):
if "text/plain" in mime:
    print("text file !")
exit()

def mime_ok(filename):
    if not os.path.exists(filename) or os.path.isdir(filename):
        return False
        
#    themime = magic.Magic()
#    themime.file(filename)
#    print(magic.Magic(mime=True).file(filename))

print(mime_ok(mydir))

if os.path.isdir(mydir):
    print("Yes it's dir")
    #print(os.listdir(mydir))
    for filename in os.listdir(mydir):
        print("File : " + filename)
elif os.path.exists(mydir):
    if os.path.isfile(mydir):
        print(open(mydir, 'r').read())
        
