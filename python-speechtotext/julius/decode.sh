sudo julius -input rawfile -filelist decodelist -smpFreq 48000 -C julian.jconf | grep \<s\> | grep sentence | cut -d: -f2 | cut -d\> -f2 | cut -d\< -f1 

