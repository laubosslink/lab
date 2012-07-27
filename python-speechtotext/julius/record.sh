#espeak "I hear you" 2>/dev/null
arecord -d 3 --device hw:CARD=U0x46d0x825 -f S16_LE >record.wav 2>/dev/null

