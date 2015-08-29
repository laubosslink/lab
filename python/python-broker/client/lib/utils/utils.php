<?php

/**
* @author PARMENTIER Laurent <lparmentier@quatral.com>
* @date 26-06-2015
*/

namespace Highshare\Conversion\Utils;

class Utils {
  const KEY_CLIENT_CONFIGURATION='client';
  const KEY_STATUS_CONFIGURATION='status';

  /**
   * @param $config_file could be specified only the first time (due to option constructor of singleton)
   */
  public static function getClientConfiguration($config_file='') {
    // TODO catch throws ?
    if(empty($config_file) && !file_exists($config_file)) {
      $config_file = SETUP_DIRECTORY . '/../config/client.sample.json';
    }

    return Configurations::getInstance()->getConfiguration(self::KEY_CLIENT_CONFIGURATION, $config_file);
  }

  /**
   * @param $config_file could be specified only the first time (due to option constructor of singleton)
   */
  public static function getStatusCodesConfiguration($config_file='') {
    if(empty($config_file) && !file_exists($config_file)) {
      $config_file = SETUP_DIRECTORY . '/../config/status.sample.json';
    }

    return Configurations::getInstance()->getConfiguration(self::KEY_STATUS_CONFIGURATION, $config_file);
  }

  /**
   * @return bool
   */
  public static function isJsonFile(\SplFileInfo $file) {
    return ($file->getExtension() == 'json');
  }

  /**
   * @return bool
   */
  public static function isYamlFile(\SplFileInfo $file) {
    $extension = $file->getExtension();

    return $extension == 'yml' || $extension == 'yaml';
  }

  /**
   * @return bool
   */
  public static function isLibYamlInstalled() {
    return function_exists('yaml_parse_file');
  }

  /**
   * @return bool
   */
  public static function isLibJsonInstalled() {
    return function_exists('json_decode');
  }

  public function getDataDirectory() {
    $directory = @self::getClientConfiguration()->getValue('client')['data_directory'];
    if($directory) {
      return $directory;
    }

    return false;
  }
}
