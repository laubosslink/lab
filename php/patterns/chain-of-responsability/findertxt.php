<?php

class FinderTXT extends Finder {
	private $simulateTXT = array('julien', 'alexandre');

	public function searchUser($user) {
		if(in_array($user, $this->simulateTXT)) {
			print('User ' . $user . ' present in TXT. ');
		}

		//parent::search($user);
	}
}
