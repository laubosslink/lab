#!/bin/bash

backups=("singular.society-lbl.com")

for b in ${backups}
do
  rsync -avz --log-file="/tmp/${b}.txt" -e "ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -o Port=24 -i /root/.ssh/${b}.key" --progress root@${b}:/etc/ /c/${b}/etc/

  if [ "$?" == "0" ]
  then
    title="success"
  else
    titel="failed"
  fi

  # futur @todo use -a attachmentfile.txt
  mail -s "[nas-lbl] rsync ${b} ${title}" laubosslink@society-lbl.com < "/tmp/${b}.txt"
done

exit 0
