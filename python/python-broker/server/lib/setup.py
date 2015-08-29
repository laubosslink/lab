#!/usr/bin/env python

import os
import sys

from optparse import OptionParser

import logging

import server
import utils

class Setup:
	SETUP_DIRECTORY = os.path.dirname(os.path.abspath(__file__))
	LIBRARIES_DIRECTORY = 'lib/libraries/'

if __name__ == "__main__":
	parser = OptionParser()

	parser.add_option('-c', '--config', type='string', help='Configuration file', default=None)
	parser.add_option('-d', '--debug', type='string', help='Available levels are CRITICAL (3), ERROR (2), WARNING (1), INFO (0), DEBUG (-1)', default='ERROR')

	options, args = parser.parse_args()

	# Interpret configuration
	if options.config:
		if not os.path.exists(options.config):
			logging.critical('Configuration file does not exist')
			sys.exit(1)


		utils.Utils.getServerConfiguration(options.config)

	# Interpret logging
	logging.basicConfig(level=getattr(logging, options.debug))

	s = server.Server()
	s.start()
	sys.exit(0)
