#!/bin/bash

# to know devices use : arecord -L 
echo "We make hello.wav, please say hello and type CTRL+C"
arecord --device hw:CARD=U0x46d0x825 -f S16_LE hello.wav

