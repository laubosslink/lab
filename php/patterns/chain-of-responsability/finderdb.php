<?php

class FinderDB extends Finder {
	private $simulateDB = array('laurent', 'julien', 'alexandre');

	public function searchUser($user) {
		if(in_array($user, $this->simulateDB)) {
			echo('User ' . $user . ' present in DB. ');
		}

		//parent::search($user);
	}
}
