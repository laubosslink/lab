<?php

/**
* @author PARMENTIER Laurent <lparmentier@quatral.com>
* @date 02-07-2015
*/

namespace Highshare\Conversion\Utils;

class Configuration {

  private $_configuration = NULL;

  public function __construct($filename) {
    try {
      $this->_configuration = $this->loadConfig($filename);
    } catch(\Exception $e) {
      throw $e;
    }
  }

  /**
   * @throws \Exception if smth goes wrong
   */
  private function loadConfig($filename) {
    $file = new \SplFileInfo($filename);

    /**
     * Check everything is here to parse
     */
    if(!$file->isFile()) {
      throw new \Exception('Config file "'.$file.'" doesnt exist.');
    }

    if(!Utils::isYamlFile($file) && !Utils::isJsonFile($file)) {
      throw new \Exception('Please use .yml or .json file extension.');
    }

    if(Utils::isYamlFile($file) && !Utils::isLibYamlInstalled()) {
      throw new \Exception('YAML parser is not available (lib installed ?).');
    }

    if(Utils::isJsonFile($file) && !Utils::isLibJsonInstalled()) {
      throw new \Exception('JSON parser is not available (lib installed ?).');
    }

    /**
     * Which parser ?
     */
    if(Utils::isJsonFile($file)) {
      $configuration = \json_decode(file_get_contents($filename), true);
    } else if(Utils::isYamlFile($file)) {
      $configuration = \yaml_parse_file($file);
    }

    if(!$configuration) {
      if(Utils::isJsonFile($file)) {
        $msg = json_last_error_msg();
      }

      throw new \Exception('Config file "'.$filename.'" could not be parsed: ' . $msg);
    }

    return $configuration;
  }

  public function getValue($key) {
    return $this->_configuration[$key];
  }
}
