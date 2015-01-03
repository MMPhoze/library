<?php

namespace Metamorphoze\System;

class Request {
	
	public function __construct(){
		$this->parse_request();
	}
	
	public function parse_request()
	{
		
		if ($_SERVER['REQUEST_URI'] == '/'){
			
		}
		else {
			$uri_segments = explode( '/', $_SERVER['REQUEST_URI'] );
		
			print_r($uri_segments);
		}
		
		
		
		
	}
	
}