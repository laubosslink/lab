#!/usr/bin/python
# -*- coding: utf-8 -*-
"""
Created on Wed Jul 25 23:26:33 2012

@author: laubosslink
"""

# Need espeak program

import subprocess
import time

#phrase = raw_input("?")

#subprocess.call(["espeak", "-v", "en", phrase], stdout=None)
n=0
for n in range(1, 3):
    subprocess.call(["espeak", "-v", "en", "We hacking your system"], stderr=open('/dev/null', 'r'))
    time.sleep(2)
    n += 1
    
subprocess.call(["espeak", "-v", "en", "Hacking system finish"], stderr=open('/dev/null', 'r'))

import speechd
client = speechd.SSIPClient('test')

client.set_punctuation(speechd.PunctuationMode.SOME)

client.speak("Coucou : tout le monde.")
client.speak("Comment allez vous les amis ?")
