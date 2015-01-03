<?php

namespace Metamorphoze\System;

use Metamorphoze\System\Traits\Loader;
use Metamorphoze\System\Traits\Config;

class Core {

	use Loader, Config;

	public function __construct( $config = NULL )
	{
		if ($config !== NULL) $this->load_config($config);
	}

}