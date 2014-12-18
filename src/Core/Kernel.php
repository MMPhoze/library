<?php

namespace Metamorphoze\Core;

use Metamorphoze\Core\Traits\Loader;
use Metamorphoze\Core\Traits\Request;

class Kernel {
	
	use Loader;
	use Request;
	
	public function __constuct() {
		$this->parse_request();
	}
	

	
}