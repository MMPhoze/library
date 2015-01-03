<?php

namespace Metamorphoze\System\Traits;

trait Loader {

	//=========================================================================
	// Получение объекта :
	//=========================================================================

	/**
	 * Возвращает полную копию объекта.
	 * 
	 * @return object
	 */
	public function get_copy()
	{
		return $this;
	}

	/**
	 * Возвращает ссылку на объект.
	 * 
	 * @return object
	 */
	public function &get_instance()
	{
		return $this;
	}

	//=========================================================================
	// Загрузка классов :
	//=========================================================================

	/**
	 * Загружает инстансы объектов в зависимости от типа.
	 * 
	 * @param	mixed	$class	Имя класса для загрузки или сам объект.
	 * @param	string	$name	Переопределенное имя класса.
	 */
	public function &load( &$class, $alias = NULL )
	{
		switch ( gettype( $class ) )
		{
			case 'string' :
				return $this->load_class( $class, $alias );

			case 'object' :
				return $this->load_object( $class, $alias );

			case 'array' :
				foreach ( $class as $key => $value )
				{
					if ( is_class_name( $key ) )
					{
						$this->load( $value, $key );
					}
					else
					{
						$this->load( $value );
					}
				}
		}
	}

	//=========================================================================
	// Методы загрузки классов :
	//=========================================================================

	/**
	 * Создает экземпляр класса
	 * 
	 * @param	string	$class	Имя класса
	 * @param	string	$alias	Псевдоним класса
	 * @return	object
	 */
	private function &load_class( $class, $alias )
	{
		if ( $alias === NULL )
		{
			$name = $this->prepare_namespace( $class );
		}
		else
		{
			$name = $this->prepare_namespace( $alias );
		}

		return $this->{$name} = new $class();
	}

	/**
	 * Получает ссылку на объект класса.
	 * 
	 * @param	object	$class	Объект класса
	 * @param	string	$alias	Псевдоним класса
	 * @return	object
	 */
	private function &load_object( &$class, $alias )
	{
		if ( $alias === NULL )
		{
			$name = $this->prepare_namespace( get_class( $class ) );
		}
		else
		{
			$name = $this->prepare_namespace( $alias );
		}

		return $this->{$name} = $class;
	}

	/**
	 * Подготавливает пространство имен для возможности использования
	 * в качестве имени переменной.
	 * 
	 * @param	string	$namespace
	 * @return	string	
	 */
	private function prepare_namespace( $namespace )
	{
		$from = array( 'metamorphoze\\', '\\' );
		$to = array( '', '_' );
		return str_replace( $from, $to, strtolower( $namespace ) );
	}

}
