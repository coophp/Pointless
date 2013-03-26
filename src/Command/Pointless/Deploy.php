<?php
/**
 * Pointless Deploy Command
 * 
 * @package		Pointless
 * @author		ScarWu
 * @copyright	Copyright (c) 2012-2013, ScarWu (http://scar.simcz.tw/)
 * @link		http://github.com/scarwu/Pointless
 */

namespace Pointless;

use NanoCLI\Command;
use NanoCLI\IO;

class Deploy extends Command {
	public function __construct() {
		parent::__construct();
	}
	
	public function run() {
		chdir(PUBLIC_FOLDER);

		if(file_exists('.git')) {
			system('git add . && git add -u');
			system(sprintf('git commit -m "%s"', date(DATE_COOKIE)));
			system('git push');
		}
		else
			system('git init');
	}
}