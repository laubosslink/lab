<?php

// Require php compile with ZTS and PECL pthreads

class Test extends Thread {
	public function run() {
		while(true) {
			echo $this->getCurrentThreadId();
			sleep(1);
		}
	}
}

$t = new Test();
$t->run();
