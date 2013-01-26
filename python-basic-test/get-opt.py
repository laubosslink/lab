# -*- coding: utf-8 -*-
"""
Created on Tue Jul 24 23:35:40 2012

@see: http://docs.python.org/library/optparse.html

@author: laubosslink

Liste des actions : 
    "store"
store this option’s argument (default)
"store_const"
store a constant value
"store_true"
store a true value
"store_false"
store a false value
"append"
append this option’s argument to a list
"append_const"
append a constant value to a list
"count"
increment a counter by one
"callback"
call a specified function
"help"
print a usage message including all options and the documentation for them

"""
from optparse import OptionParser, OptionGroup, Values, SUPPRESS_HELP

options = Values()

parser = OptionParser(usage="usage: %prog [options] arg1")

parser.add_option("--file", metavar="FILENAME", help="This help about file option")
parser.add_option("-n", type="int", dest="num", help="My number ! ", action="store")
parser.add_option("--secret", help=SUPPRESS_HELP)

debug = OptionGroup(parser, "Debug Options")
debug.add_option("--debug", help="DEBUG", action="store_true", dest="debug", default=False)
debug.add_option("-d", help="DEBUG", action="store_true", dest="debug", default=False)
	
parser.add_option_group(debug)

# A mettre apres les add_options
parser.parse_args()

(options, args) = parser.parse_args()

#if not options.num is None:
# Or simply :
if options.num:
    print("Your number : " + str(options.num))
else:
    print("No number specify !")
print("We debug ? " + str(options.debug))
