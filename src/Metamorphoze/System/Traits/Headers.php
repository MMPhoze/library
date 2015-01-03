<?php

namespace Metamorphoze\System\Traits;

use Metamorphoze\System\Traits\Mime;

trait Headers {

	/**
	 * Массив заголовков ответа.
	 * @var array
	 */
	private $headers = array(
		'Content-type' => 'text/html'
	);

	public function set_header( $header, $replace = TRUE )
	{
		$this->headers[] = array( $header, $replace );
		return $this;
	}

}
