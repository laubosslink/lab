<?php

class FinderXML extends Finder {
	private $simulateXML = array('laurent', 'alexandre');

	public function searchUser($user) {
		if(in_array($user, $this->simulateXML)) {
			print('User ' . $user . ' present in XML. ');
		}

		//parent::search($user);
	}
}
