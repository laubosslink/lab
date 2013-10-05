# -*- coding: utf-8 -*-
"""
Created on Sat Jul 28 04:35:01 2012

@author: laubosslink
"""

import alsaaudio, wave, numpy, time
#print(alsaaudio.cards()); exit()

inp = alsaaudio.PCM(alsaaudio.PCM_CAPTURE,mode=alsaaudio.PCM_NORMAL,card='hw:CARD=U0x46d0x825')
inp.setchannels(1)
inp.setrate(16000) # original : 44100
inp.setformat(alsaaudio.PCM_FORMAT_S16_LE)
inp.setperiodsize(1024)

w = wave.open('alsa.wav', 'w')
w.setnchannels(1)
w.setsampwidth(2)
w.setframerate(16000) # original : 44100

while True:
    l, data = inp.read()
    a = numpy.fromstring(data, dtype='int16')
    print numpy.abs(a).mean()
    w.writeframes(data)