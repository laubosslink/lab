#!/bin/bash

# si on entre en parametre 1 : n=6
echo ${1##*=} # retourne '6' on enlève tout ce qui se trouve avant le '='
