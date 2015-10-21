#
#  Lazy Pirate client
#  Use zmq_poll to do a safe request-reply
#  To run, start lpserver and then randomly kill/restart it
#
#   Author: Daniel Lundin <dln(at)eintr(dot)org>
#

from stringt import StringT

import sys
import zmq

REQUEST_TIMEOUT = 2500
REQUEST_RETRIES = 10
SERVER_ENDPOINT = "tcp://localhost:5555"

context = zmq.Context(1)

print "I: Connecting to server..."
client = context.socket(zmq.REQ)
client.connect(SERVER_ENDPOINT)

poll = zmq.Poller()
poll.register(client, zmq.POLLIN)

sequence = 0
retries_left = REQUEST_RETRIES

s = StringT("hello world")

while retries_left:
    sequence += 1
    request = s
    print "I: Sending (%s)" % s.getString()
    client.send_pyobj(request)

    expect_reply = True
    while expect_reply:
        socks = dict(poll.poll(REQUEST_TIMEOUT))
        if socks.get(client) == zmq.POLLIN:
            reply = client.recv_pyobj()
            if not reply:
                break
            if reply.getString() == request.getString():
                print "I: Server replied OK (%s)" % reply.getString()
                retries_left = REQUEST_RETRIES
                expect_reply = False
            else:
                print "E: Malformed reply from server: %s" % reply

        else:
            print "W: No response from server, retrying..."
            # Socket is confused. Close and remove it.
            client.setsockopt(zmq.LINGER, 0)
            client.close()
            poll.unregister(client)
            retries_left -= 1
            if retries_left == 0:
                print "E: Server seems to be offline, abandoning"
                break
            print "I: Reconnecting and resending (%s)" % request.getString()
            # Create new connection
            client = context.socket(zmq.REQ)
            client.connect(SERVER_ENDPOINT)
            poll.register(client, zmq.POLLIN)
            client.send_pyobj(request)

context.term()
