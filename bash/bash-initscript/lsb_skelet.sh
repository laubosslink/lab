#!/bin/bash
### BEGIN INIT INFO
# Provides:          SKELET-daemon
# Required-Start:    $local_fs $remote_fs $network $syslog $named
# Required-Stop:     $local_fs $remote_fs $network $syslog $named
# Default-Start:     2 3 4 5
# Default-Stop:      0 1 6
# Short-Description: Start/stop SKELET daemon
### END INIT INFO

# Import lsb functions (log_warning_msg, log_progress_msg, log_end_msg)
. /lib/lsb/init-functions

NAME=lsb_skelet.sh
SCRIPTNAME=/etc/init.d/$NAME
PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin

function app_is_running()
{
	app=$1
	
	result=$(ps aux | grep -e '.*'$app'$' -c)
	
	if [ $result == 0 ]
	then
		false
	else
		true
	fi
}

case $1 in
	start)
		log_daemon_msg "Starting" "SKELET"
		
		#cmd...
 
		# check cmd has no problem
		if [ $? == 0 ]
		then
			log_end_msg 0
		else
			log_end_msg 1
		fi
	;;
	stop)
		if app_is_running "SKELET"
		then
			log_daemon_msg "Shutting down" "SKELET"
			
			killall -r "^.*SKELET$"
			
			#cmd...
	 
			# check cmd has no problem
			if [ $? == 0 ]
			then
				log_end_msg 0
			else
				log_end_msg 1
			fi
		else
			log_daemon_msg "Doesn't run" "SKELET"
		fi
	;;
	status)
		if app_is_running "SKELET"
		then
			log_daemon_msg "Currently running" "SKELET"
			log_end_msg 0
		else
			log_daemon_msg "Doesn't run" "SKELET"
			log_end_msg 1
		fi
	;;
	*)
		echo "Usage: $SCRIPTNAME {start|stop|status}" >&2
		exit 2
	;;
esac
