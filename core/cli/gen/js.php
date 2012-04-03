<?php

class pointless_gen_js extends CLI {
	public function __construct() {
		parent::__construct();
	}
	
	public function run() {
		require_once CORE_LIB . 'compress.php';
		
		if(file_exists(HTDOCS . 'main.js'))
			unlink(HTDOCS . 'main.js');
		
		$compress = new compress();
		$compress->js();
	}
}