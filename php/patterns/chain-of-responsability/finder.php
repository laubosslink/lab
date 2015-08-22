<?php

abstract class Finder {
	private $_next = null;

	private function setNext($next) {
		$this->_next = $next;
	}

	public function addNext($next) {
		if($this->_next == null) {
			$this->_next = $next;
			return;
		}

		$node = $this->_next;

		while($node->_next != null) {
			$node = $node->_next;
		}

		$node->setNext($next);
	}

	public function search($user) {
		$this->searchUser($user);

		if($this->_next != null) {
			$this->_next->search($user);
		}
	}

	abstract public function searchUser($user);
}
