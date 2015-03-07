# need to execute command : julius -input rawfile -filelist decodelist -module -C julian.jconf 

def get_sentence(reco_out):
  words_scores = []
  words        = []
  scores       = []

  index_start = reco_out.find("<RECOGOUT>")
  index_end   = reco_out.find("</RECOGOUT>")+11

  reco_lines  = reco_out[index_start:index_end].splitlines()

  for i in range(3,len(reco_lines)-3):
    index_word  = reco_lines[i].find("WORD=")
    index_class = reco_lines[i].find("CLASSID=")
    index_cm    = reco_lines[i].find("CM=")

    word  = reco_lines[i][index_word+6:index_class-2]
    score = reco_lines[i][index_cm+4:index_cm+9]
    words.append(word)
    scores.append(score)

  for i in range(len(words)):
    s=[]
    s.append(words[i])
    s.append(scores[i])
    words_scores.append(s)

  return words_scores


###############################################################################
import socket
import sys
import select

host = "localhost"
#host = "192.168.0.12"
port = 5530
addr = (host,port)

client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM) 
client_socket.connect(addr)

flag = True
keep = False
reco_out = ""

msong = open('hello.wav', 'r')
datas = msong.read()

while flag:
  inputready, outputready, exceptrdy = select.select([client_socket], [],[])
  
  for i in inputready:
    if datas:
        client_socket.send(datas)
    if i == sys.stdin:
      data = sys.stdin.readline()
      if data:
        client_socket.send(data.upper())
    elif i == client_socket:
	data = client_socket.recv(80)
	if not data:
          print 'Shutting down.'
          flag = False
          break
        else:
          if "<RECOGOUT>" in data:                # found the start of a reco block
            reco_out = data                       # start a new reco_out block
	    keep = True                           # keep all the following data
          elif "</RECOGOUT>" in data:             # found the end of a reco block
	    reco_out = reco_out + data            #
	    print get_sentence(reco_out)          # get the words and scores from the reco block
            sys.stdout.flush()
	  elif keep:                              # not yet the end of the block, keep data and continue
	    reco_out = reco_out +data
	  else:                                   # no reco block found yet discard the data
	    keep = False
	    reco_out = ""

client_socket.close()
