# -*- coding: utf-8 -*-
"""
Created on Fri Jul 27 01:46:58 2012

@author: laubosslink
"""

import sys,os
import subprocess

def decodeSpeech(hmmd,lmdir,dictp,wavfile):
   """
    Decodes a speech file
    """

   try:
       import pocketsphinx as ps
       #import sphinxbase

   except:
       print """Pocket sphinx and sphinxbase is not installed
        in your system. Please install it with package manager.
        """
       exit()

   speechRec = ps.Decoder(hmm = hmmd, lm = lmdir, dict = dictp)
   wavFile = file(wavfile,'rb')
   wavFile.seek(44)
   speechRec.decode_raw(wavFile)
   result = speechRec.get_hyp()

   return result[0]

if __name__ == "__main__":
   hmdir = "/usr/share/pocketsphinx/model/hmm/wsj1" # acoustic model
   hmdir = "/home/laubosslink/Documents/lium_french_f0"
   lmd = "/usr/share/pocketsphinx/model/lm/wsj/wlist5o.3e-7.vp.tg.lm.DMP" # language model
   lmd = "/home/laubosslink/Documents/french3g62K.lm.dmp"
   dictd = "/usr/share/pocketsphinx/model/lm/wsj/wlist5o.dic"
   dictd = "/home/laubosslink/Documents/frenchWords62K.dic"
   #sys.argv[1] = "hello.wav"
   wavfile = "hello.wav"
   recognised = decodeSpeech(hmdir,lmd,dictd,wavfile)

   print "%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%"
   print recognised
   print "%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%"
  
myvar = recognised  

if "three" in myvar.lower():
    subprocess.call(["espeak", "-v", "en", "Hacking system finish"], stderr=open('/dev/null', 'r'))
