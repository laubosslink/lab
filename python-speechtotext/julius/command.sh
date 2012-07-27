
#echo "Talk you have 5 seconds : "
espeak "I hear you" 2>/dev/null
arecord -d 5 --device hw:CARD=U0x46d0x825 -f S16_LE >hello.wav 2>/dev/null
#sudo julius -input rawfile -filelist wavelist -smpFreq 48000 -C julian.jconf | grep \<s\> | grep sentence | cut -d: -f2 | cut -d\> -f2 | cut -d\< -f1 | espeak 
sudo julius -input rawfile -filelist wavelist -smpFreq 48000 -C julian.jconf | grep \<s\> | grep sentence | cut -d: -f2 | cut -d\> -f2 | cut -d\< -f1 

