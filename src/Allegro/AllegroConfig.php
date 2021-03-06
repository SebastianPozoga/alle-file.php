<?php

namespace Allegro;

use Allegro\AllegroApiException;

class AllegroConfig {

	public $password = null;
	public $hashPassword = null;
	public $login = null;
	public $apikey = null;
	public $countryCode = null;


	function __construct(array $config) {
		$this->password = isset($config['password'])? $config['password'] : null;
		$this->hashPassword = isset($config['hashPassword'])? $config['hashPassword'] : null;
		$this->login = $config['login'];
		$this->apikey = $config['apikey'];
		$this->countryCode = $config['countryCode'];
	}

}
