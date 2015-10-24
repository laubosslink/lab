#!/usr/bin/env python

library="testclass"

l = None

try:
    lib = __import__('libraries.' + library, fromlist=[library.title()])
    l = eval('lib.' + library.title() + '()')
except ImportError as e:
    print("Problem import " + str(e))
except NameError as e:
    print("Problem name " + str(e))
except Exception as e:
    print("Exception problem " + str(e))

if l:
    print(l.testFunc())
