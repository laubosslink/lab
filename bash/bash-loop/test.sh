#!/bin/bash

n=5

#dont work
for i in {1..$n}
do
   echo "Welcome $i times"
done

echo

#work without var
for i in {1..5}
do
   echo "Welcome $i times"
done
