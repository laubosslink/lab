<?php

/**
* @author PARMENTIER Laurent <lparmentier@quatral.com>
* @date 30-06-2015
*/

include('lib/setup.php');

class TestSocket extends PHPUnit_Framework_TestCase {
  private $socket = NULL;

  public function setUp() {
    try {
      $this->socket = new \Highshare\Conversion\Socket();
      $this->socket->openSocket();
      $this->socket->request('BROKER/1.0');
    } catch(\Exception $e) {
      $this->fail('Problem when instanciate socket: ' . $e->getMessage());
    }
  }

  public function tearDown() {
    if($this->socket == NULL) {
      $this->fail('Cannot closeSocket, socket has never been opened.');
    }

    try {
      $this->socket->closeSocket();
    } catch(\Exception $e) {
      $this->fail('Problem on tearDown(): ' . $e->getMessage());
    }
  }

  public function testReceiveListLibraries() {
    $libs = NULL;

    try {
      $libs = $this->socket->request('LIST_LIBRARIES');
    } catch(\Exception $e) {
      $this->fail('Problem with testReceiveListLibraries: ' . $e->getMessage());
    }

    $this->assertNotEquals($libs, NULL);
  }

  public function testReceiveListLibrariesTenTimesSameSocket() {
    for($i=0; $i<9; $i++) {
      $libs = NULL;

      try {
        $libs = $this->socket->request('LIST_LIBRARIES');
      } catch(\Exception $e) {
        $this->fail('Problem with testReceiveListLibraries: ' . $e->getMessage());
      }

      $this->assertNotEquals($libs, NULL);
    }
  }
}
