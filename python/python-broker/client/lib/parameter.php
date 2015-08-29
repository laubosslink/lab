<?php

/**
* @author PARMENTIER Laurent <lparmentier@quatral.com>
* @date 29-06-2015
*/

namespace Highshare\Conversion;

class Parameter {
	private $key;

	private $isRawValue;
	private $value;

	public function __construct($key, $value, $is_raw_value=false) {
		$this->key = $key;

		$this->is_raw_value = $is_raw_value;
		$this->value = $value;
	}

	public function getKey() {
		return $this->key;
	}

	public function getValue() {
		return $this->value;
	}

	public function appendValue($value) {
		$this->value .= $value;
	}

	public function isRawValue() {
		return $this->is_raw_value;
	}
}
