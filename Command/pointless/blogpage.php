<?php

class pointless_blogpage extends NanoCLI {
	public function __construct() {
		parent::__construct();
	}
	
	public function Run() {
		$list = new pointless_blogpage_list();
		$list->Run();
	}
}