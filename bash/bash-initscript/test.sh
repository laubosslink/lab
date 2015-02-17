#!/bin/bash

function app_is_running()
{
	app=$1
	
	result=$(ps aux | grep -e '.*'$app'$' -c)
	
	if [ $result == 0 ]
	then
		echo 1
	else
		echo 0
	fi
}
