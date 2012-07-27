# -*- coding: utf-8 -*-
"""
Created on Tue Jul 24 22:52:31 2012

@author: laubosslink
"""

from subprocess import STDOUT, check_call
#import subprocess
import os

if not os.getuid() == 0:
    exit("NEED TO BE ROOT")
else:
    cmd = ['sudo', 'apt-get', 'install', '-y', 'htop']
    check_call(cmd, stdout=open(os.devnull,'wb'), stderr=STDOUT)

#proc = subprocess.Popen(cmd, shell=True, stdin=subprocess.PIPE, stdout=subprocess.PIPE, stderr=subprocess.PIPE)
