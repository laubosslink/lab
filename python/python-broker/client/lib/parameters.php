<?php

/**
* @author PARMENTIER Laurent <lparmentier@quatral.com>
* @date 29-06-2015
*/

namespace Highshare\Conversion;

class Parameters extends \SplQueue {
	public function addParameter($key, $value, $is_raw_value=false) {
		$parameter = new Parameter($key, $value, $is_raw_value);

		parent::enqueue($parameter);
	}
}
