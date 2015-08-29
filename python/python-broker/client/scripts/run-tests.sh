#!/bin/bash

# TODO add xml file which run all files (bootloader ?) : https://phpunit.de/manual/current/en/organizing-tests.html

#	Permet un message a gauche avec un label a droite (vert)
#	@param $1 Le message
#	@param $2 (optionel) le label
function labelSuccessMsg() {
  local msg="$1"
  local label="$2"

  local color=$(tput setaf 2)
  local normal=$(tput sgr0)
  local supp=""
  local cold=0

  if [ -n "$msg" ]
  then
    let cold=-1
    supp="${color}|${normal}"
  fi

  if [ -z "$label" ]
  then
    label="ok"
  fi

  let cold=$(tput cols)-${#msg}+${#color}+${#normal}+${cold}

  printf "%s%${cold}s" "${supp}${msg}" "[${color} ${label} ${normal}]"
}

#	Permet un message a gauche avec un label a droite (rouge)
#	Remarque : arret du script
#	@param $1 Le message
#	@param $2 (optionel) le label
function labelErrorMsg() {
  local msg="$1"
  local label="$2"

  local color=$(tput setaf 1)
  local normal=$(tput sgr0)
  local supp=""
  local cold=0

  if [ -n "$msg" ]
  then
    let cold=-1
    supp="${color}|${normal}"
  fi

  if [ -z "$label" ]
  then
    label="fail"
  fi

  let cold=$(tput cols)-${#msg}+${#color}+${#normal}+${cold}

  printf "%s%${cold}s" "${supp}${msg}" "[${color} ${label} ${normal}]"

  exit 1
}

#	Permet un message a gauche avec un label a droite (orange)
#	@param $1 Le message
#	@param $2 (optionel) le label
function labelWarningMsg() {
  local msg="$1"
  local label="$2"

  local color=$(tput setaf 3)
  local normal=$(tput sgr0)
  local supp=""
  local cold=0

  if [ -n "$msg" ]
  then
    let cold=-1
    supp="${color}|${normal}"
  fi

  if [ -z "$label" ]
  then
    label="warn"
  fi

  let cold=$(tput cols)-${#msg}+${#color}+${#normal}+${cold}

  printf "%s%${cold}s" "${supp}${msg}" "[${color} ${label} ${normal}]"
}

for file in `ls tests/ | grep php`
do
  phpunit "tests/$file" >/dev/null

  if [ "$?" == "0" ]
  then
    labelSuccessMsg "`date` $file"
  else
    labelErrorMsg "`date` $file"
  fi
done
