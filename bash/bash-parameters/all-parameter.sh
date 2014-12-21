#!/bin/bash

#example input: hello world

test=$*
echo ${test[0]}

test=$@
echo ${test[0]}

# remove specific element
x(){ echo "Parameter count before: $#"; set -- "${@:1:2}" "${@:4:8}"; echo "$@"; }

# remove first element
shift
echo $*

exit 0
