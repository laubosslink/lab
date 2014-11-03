#!/usr/bin/python

def test():
  return ("this", "is", "world")

if __name__ == '__main__':
  test = test()[-1]
  print test
