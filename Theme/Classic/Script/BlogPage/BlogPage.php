<?php

class BlogPage {
	private $_list;
	
	public function __construct() {
		$this->_list = array();
	}
	
	public function add($article) {
		$this->_list[] = $article;
	}
	
	public function getList() {
		return $this->_list;
	}
	
	public function gen($slider) {
		foreach((array)$this->_list as $index => $output_data) {
			NanoIO::Writeln("Building " . $output_data['url']);
		
			$output_data['container'] = bind_data($output_data, THEME_TEMPLATE.'Container'.SEPARATOR.'BlogPage.php');
			$output_data['slider'] = $slider;

			$result = bind_data($output_data, THEME_TEMPLATE.'index.php');
			write_to($result, BLOG_PUBLIC.$output_data['url']);
		}
	}
}
