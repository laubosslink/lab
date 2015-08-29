<?php

/**
* @author PARMENTIER Laurent <lparmentier@quatral.com>
* @date 26-06-2015
*/

namespace Highshare\Conversion;

class Runner {
	const PROTOCOL_HEADER = 'BROKER';
	const PROTOCOL_VERSION = '1.0';

	const RAW_VALUE_ANNOUNCMENT="RAW_VALUE_ANNOUNCMENT";
	const BEGIN_RAW='BEGIN_RAW_VALUE';
	const END_RAW='END_RAW_VALUE';

	private $socket_client;

	/**
	 * @throws \Exception if smth goes wrong
	 */
	function __construct() {
		try {
			$this->socket_client = new Socket();
		} catch (\Exception $e) {
			throw $e;
		}
	}

	private function sendHeader() {
		try {
			return $this->socket_client->request(self::PROTOCOL_HEADER . '/' . self::PROTOCOL_VERSION);
		} catch(\Exception $e) {
			throw new \Exception('Problem during sending header -> ' . $e->getMessage());
		}
	}

	private function loadLibrary($lib) {
		try {
			return $this->socket_client->request('LOAD ' . $lib);
		} catch(\Exception $e) {
			throw $e;
		}
	}

	private function setParameter(Parameter $param) {
		$set_param_head = 'SET_PARAM ' . $param->getKey();

		try {
			if($param->isRawValue()) {
				$raw_value = self::BEGIN_RAW . "\n" . base64_encode($param->getValue()) . "\n" . self::END_RAW;
				return $this->socket_client->request($set_param_head . ' ' . self::RAW_VALUE_ANNOUNCMENT . "\n" . $raw_value);
			} else {
				return $this->socket_client->request($set_param_head . ' ' . $param->getValue());
			}
		}
			catch(\Exception $e) {
			throw $e;
		}
	}

	/**
	* @throws \Exception if smthg goes wrong
	*/
	public function listLibraries() {
		$response = "";

		try {
			$response = $this->socket_client->request('LIST_LIBRARIES');
		} catch(\Exception $e) {
			throw $e;
		}

		if(empty($response))
			return $response;

		$responses = explode(' ', $response);

		$libraries = explode(',', $responses[1]);

		return $libraries;
	}

	/**
	* @return mixed false if something goes wrong, response_run else.
	*
	* @throws \Exception if smthg goes wrong
	*/
	private function run() {
		try {
			return $this->socket_client->request('RUN');
		} catch(\Exception $e) {
			throw $e;
		}

		return false;
	}


	public function isAvailableLibrary($library) {
		try {
			return in_array($library, self::listLibraries());
		} catch(\Exception $e) {
			throw $e;
		}
	}

	/**
	 * @throws \Exception if something goes wrong
	 * @return str response of a command (with status code)
	 */
	public function convert($library, Parameters $parameters){
		if($this->socket_client->isOpenSocket()) {
			// TODO implement php multi-threading on Socket.
			// TODO if done, update protcol HSCONVERTER
			// See http://php.net/manual/fr/class.thread.php
			throw new \Exception('Could not convert two files in same time with the same socket (not implemeted yet).');
		}

		try {
			$this->socket_client->openSocket();
			$this->sendHeader();
			$is_available_library = $this->isAvailableLibrary($library);
		} catch(\Exception $e) {
			throw $e;
		}

		if(!$is_available_library) {
			throw new \Exception('The library "'.$library.'" is not available on server');
		}

		try {
			/**
			 * Select library to use and associated file
			 */
			self::loadLibrary($library);

			/**
			 * Send parameters
			 */
			foreach($parameters as $parameter) {
				self::setParameter($parameter);
			}

			$response = self::run();

			$this->socket_client->closeSocket();
		} catch(\Exception $e)
		{
			throw $e;
		}

		return $response;
	}

}
