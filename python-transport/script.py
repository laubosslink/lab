#!/bin/python

import paramiko
paramiko.util.log_to_file('/tmp/paramiko.log')

# Open a transport

host = "test.s-lbl.com"
port = 22
transport = paramiko.Transport((host, port))

# Auth

#password = "root"
transport.connect(username="root", password="mypassword")

# Go!

sftp = paramiko.SFTPClient.from_transport(transport)

# Download

filepath = '/etc/passwd'
localpath = './passwd'
sftp.get(filepath, localpath)

# Upload

#filepath = '/home/foo.jpg'
#localpath = '/home/pony.jpg'
#sftp.put(filepath, localpath)

# Close

sftp.close()
transport.close()
