#!/bin/python

import imaplib

mail = imaplib.IMAP4_SSL('imap.gmail.com')
mail.login('laubosslink@society-lbl.com', ' hcvshxiktupaxjsd')

print(mail.list())

print(mail.select('INBOX'))

result, data = mail.search(None, "ALL")

ids = data[0] # data is a list.
id_list = ids.split() # ids is a space separated string
latest_email_id = id_list[-1] # get the latest

result, data = mail.fetch(latest_email_id, "(RFC822)") # fetch the email body (RFC822) for the given ID

raw_email = data[0][1] # here's the body, which is raw text of the whole email
# including headers and alternate payloads

#print(raw_email)

import email
email_message = email.message_from_string(raw_email)

print email_message['To']

print email.utils.parseaddr(email_message['From']) # for parsing "Yuji Tomita" <yuji@grovemade.com>

#		print email_message.items() # print all headers

# note that if you want to get text content (body) and the email contains
# multiple payloads (plaintext/ html), you must parse each message separately.
# use something like the following: (taken from a stackoverflow post)
def get_first_text_block(self, email_message_instance):
    maintype = email_message_instance.get_content_maintype()
    if maintype == 'multipart':
        for part in email_message_instance.get_payload():
            if part.get_content_maintype() == 'text':
                return part.get_payload()
    elif maintype == 'text':
        return email_message_instance.get_payload()


print("WHAT I WANT...")

var = (email.utils.parseaddr(email_message['From']))

print("var[0] : " + var[0])

for v in var:
	print("-" + v)
	if "iTunes" in v:
		print "YES YES"

if "iTunes" in var:
	print("YES")


