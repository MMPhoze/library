<?php

namespace Metamorphoze\System\Traits;

trait Config {

	/**
	 * Хранилище конфигурации 
	 * @var array 
	 */
	private $config = array();

	/**
	 * Получает значение параметра конфигураци.
	 * @param	string	$key	Параметр конфигурации 
	 * @return	mixed			Возвращает значение параметра или NULL
	 */
	public function get_config( $key = NULL )
	{
		if ( $key === NULL )
		{
			return $this->config;
		}
		else
		{
			return (isset( $this->config[$key] )) ? $this->config[$key] : NULL;
		}
	}

	/**
	 * Устанавливает параметр и значение конфигурации.
	 * @param	string	$key	Параметр конфигурации.
	 * @param	mixed	$value	Значение параметра.
	 * @param	boolean $merge	Флаг слияния(merge) с предыдущей конфигурацей.
	 */
	public function set_config( $key, $value, $merge = FALSE )
	{
		if ( isset( $this->config[$key] ) && $merge )
		{
			if ( is_array( $this->config[$key] ) && is_array( $value ) )
			{
				array_merge( $this->config[$key], $value );
			}
			else
			{
				throw new Exception( 'Config merge type error' );
			}
		}
		else
		{
			$this->config[$key] = $value;
		}
	}

	/**
	 * Загружает массив конфигурации.
	 * @param	array	$config	Массив конфигурации.
	 * @param	boolean	$merge	Флаг слияния(merge) конфигурации.
	 * @throws Exception
	 */
	public function load_config( $config, $merge = FALSE )
	{
		if ( is_array( $config ) )
		{
			foreach ( $config as $key => $value )
			{
				if ( !is_numeric( $key ) )
				{
					$this->set_config( $key, $value, $merge );
				}
				else
				{
					throw new Exception( 'Recived invalid config type' );
				}
			}
		}
		else
		{
			throw new Exception( 'Recived invalid config type' );
		}
	}

}
