<?php

namespace Metamorphoze\System\Traits;

use Metamorphoze\System\Traits\Headers;

trait Output {

	use Headers;

	private $buffer = '';
	
	public function send()
	{
		echo $this->buffer;
	}

	public function set( $content )
	{
		$this->buffer = $content;
	}
	
	public function append( $content )
	{
		$this->buffer .= $content;
	}

}
