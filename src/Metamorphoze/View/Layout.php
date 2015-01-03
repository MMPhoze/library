<?php

namespace Metamorphoze\View;

class Layout {

	private $layout;
	private $site_url;
	private $title;
	private $content;

	public function __construct()
	{
		$this->load_layout();
	}

	public function load_layout( $layout = 'main' )
	{
		$this->layout = file_get_contents( 'system/layout/' . $layout . '.php' );
	}

	public function set_site_url( $title )
	{
		$this->site_url = $title;
	}

	public function set_tittle( $title )
	{
		$this->title = $title;
	}

	public function set_content( $title )
	{
		$this->content = $content;
	}

	public function prepare()
	{
		
	}

}
