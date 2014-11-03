#!/usr/bin/python

def state():
  return (10, 5), "north", 10

if __name__ == "__main__":

  stack = [[ state() ]]

  print(stack.pop())
