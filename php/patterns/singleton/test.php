<?php

// Based on http://www.phptherightway.com/pages/Design-Patterns.html
// and comment on http://php.net/manual/fr/language.oop5.static.php

class Test {

  private static $_instance = null;

  final private function __construct() {
      $this->valueToSetup = 'hello :)';
  }

  final public static function getInstance() {
    if(static::$_instance === null) {
      static::$_instance = new static();
    }

    return static::$_instance;
  }

  final private function __clone() {}

  final private function __wakeup() {}


  private $valueToSetup = NULL;

  public function hello() {
    print('valueToSetup: ' . $this->valueToSetup . "\n");
  }
}

Test::getInstance()->hello();

Test::getInstance()->hello();
