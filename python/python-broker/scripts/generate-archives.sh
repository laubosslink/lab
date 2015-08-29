#!/bin/bash

cp config/status.yml client/config/status.sample.yml
cp config/status.yml server/config/status.sample.yml

tar cvzf client.tar.gz client/
tar cvzf server.tar.gz server/
