<?php

/**
* @author PARMENTIER Laurent <lparmentier@quatral.com>
* @date 29-06-2015
*/

namespace Highshare\Conversion;

use Highshare\Conversion\Utils\Utils;

class Socket {
	const READ_BYTES = 2048;

	private $client_socket = NULL;
	private $server_host = 'localhost';
	private $server_port = 8888;
	private $server_timeout = 250;

	/**
	 * @throws \Exception if smth goes wrong
	 */
	function __construct() {
		// TODO avoid @ we catch nothing is there is a problem !
		$host = @Utils::getClientConfiguration()->getValue('client')['server']['host'];

		if($host) {
			$this->server_host = $host;
		}

		$port = @Utils::getClientConfiguration()->getValue('client')['server']['port'];

		if($port) {
			$this->server_port = $port;
		}

		$timeout = @Utils::getClientConfiguration()->getValue('client')['server']['timeout'];

		if($timeout) {
			$this->server_timeout = $timeout;
		}
	}

	private function isValidResponse($response) {
		if(!preg_match('/^[0-9]{3}(.+)?/', $response)){
			return false;
		}

		return true;
	}

	private function isGoodStatusCode($code) {
		return $code == 200;
	}

	public function isOpenSocket() {
		return $this->client_socket != NULL && $this->client_socket != false;
	}

	/**
	 * @throws \Exception
	 */
	public function openSocket() {
		if(self::isOpenSocket()) {
			return;
		}

		$this->client_socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

		if(!$this->client_socket) {
			throw new \Exception('Socket has not been created.');
		}

		if(!socket_connect($this->client_socket , $this->server_host, $this->server_port)) {
			throw new \Exception('Socket has not been connected (server listen ?).');
		}

		if($this->server_timeout > ini_get('max_execution_time') && ini_get('max_execution_time') > 0) {
			throw new \Exception('You could not have a timeout socket(' . $this->server_timeout .  ') greater than max_execution_time(' . ini_get("max_execution_time") . ').');
		}

		if(!socket_set_option($this->client_socket, SOL_SOCKET, SO_RCVTIMEO, array('sec' => $this->server_timeout, 'usec' => 0))) {
			throw new \Exception('Socket has not been correctly configured (socket_set_option)');
		}
	}

	public function closeSocket() {
		if(!self::isOpenSocket()) {
			return;
		}

		socket_close($this->client_socket);

		$this->client_socket = NULL;
	}

	/**
	 * @throws \Exception
	 */
	public function send($raw_input) {
		if(!self::isOpenSocket()) {
			throw new \Exception('Could not sendRequest, socket seems to be closed.');
		}

		$raw_input .= "\r\n"; // resolve issue #1

		if(socket_write($this->client_socket, $raw_input, strlen($raw_input)) === false) {
			$errno = socket_last_error($this->client_socket);
			throw new \Exception('Problem during writing with socket ('.$errno.'): ' . socket_strerror($errno));
		}
	}

	/**
	 * @param $raw_input need to be string without endline
	 * @return str empty if no response
	 *
	 * @throws \Exception if smthg goes wrong
	 */
	public function request($raw_input) {
		try {
			$this->send($raw_input);
			return $this->receive();
		} catch(\Exception $e) {
			throw $e;
		}
	}

	public function getStatusCode($response) {
		if(!self::isValidResponse($response)){
			return 999;
		}

		$code = substr($response, 0, 3);
		return $code;
	}

	/**
	 *
	 * @return str empty if nothing to read
	 *
	 * @throws \Exception if smthg goes wrong
	 */
	public function receive() {
		if(!self::isOpenSocket()) {
			throw new \Exception('Could not use ' . __FUNCTION__ . ', socket seems to be closed.');
		}

		/**
		 * Retrieve first block
		 * UX: this allow to do action/condition only one time for the first treatment,
		 * and avoid to do something which is only need on the first block.
		 */
		$block = socket_read($this->client_socket, self::READ_BYTES);

		if($block == false) {
			$errno = socket_last_error($this->client_socket);
			throw new \Exception('Problem during reading first block with socket ('.$errno.'): ' . socket_strerror($errno));
		}

		if(!self::isValidResponse($block)) {
			throw new \Exception('Please respect the protocol, the response is not valid, see "' . $block . '"');
		}

		/**
		 * Check status code of response
		 */
		$codes = Utils::getStatusCodesConfiguration()->getValue('codes');

		$status_code = self::getStatusCode($block);

		if(!self::isGoodStatusCode($status_code))
			throw new \Exception('Bad response from server: ' . $status_code . "\n" . 'Status Message: ' . $codes[$status_code] . "\n" . 'Server Message: ' . $block);

		$output = $block;

		if(substr($block, -1) != "\n") { // If it's not the end of the command
			while($block = socket_read($this->client_socket, self::READ_BYTES)) {
				$output .= $block;

				if(substr($block, -1) == "\n")
					break;
			}

			if($block == false) {
				$errno = socket_last_error($this->client_socket);
				throw new \Exception('Problem during reading blocks with socket ('.$errno.'): ' . socket_strerror($errno));
			}
		}

		return rtrim($output, "\n");
	}


}
