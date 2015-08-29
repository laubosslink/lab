<?php

/**
* @author PARMENTIER Laurent <lparmentier@quatral.com>
* @date 02-07-2015
*/

namespace Highshare\Conversion\Utils;

class Configurations {

  /**
   * Singleton implementation
   */
  private static $_instance = NULL;

  final private function __construct() {
    $this->_configurations = array();
  }

  final public static function getInstance() {
    if(static::$_instance === NULL) {
      static::$_instance = new static();
    }

    return static::$_instance;
  }

  final private function __clone() {}

  final private function __wakeup() {}
  /**
   * End of singleton implementation
   */

  private $_configurations = NULL;

  public function getConfiguration($configuration_name, $filename='') {
    $configurations = array_keys($this->_configurations);

    if(!in_array($configuration_name, $configurations)) {
      $this->_configurations[$configuration_name] = new Configuration($filename);
    }

    return $this->_configurations[$configuration_name];
  }
}
