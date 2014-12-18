<?php

namespace Metamorphoze\Core\Traits;

use Metamorphoze\Helpers\Core;

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
		switch ( gettype( $class ) ) {

			case 'string' :

				return $this->load_class( $class, $alias );

				break;

			case 'object' :

				return $this->load_object( $class, $alias );

				break;

			case 'array' :

				foreach ( $class as $key => $value ) {

					if ( is_class_name( $key ) ) {
						$this->load( $value , $key);
					}
					else {
						$this->load( $value );
					}
				}

				break;
		}
	}

	//=========================================================================
	// Методы загрузки классов :
	//=========================================================================

	private function &load_class( $class, $alias )
	{
		if ( $alias === NULL ) {
			$name = prepare_namespace( $class );
		}
		else {
			$name = prepare_namespace( $alias );
		}
		
		return $this->{$name} = new $class();
		
	}

	private function &load_object( &$class, $alias )
	{
		if ( $alias === NULL ) {
			$name = prepare_namespace( get_class( $class ) );
		}
		else {
			$name = prepare_namespace( $alias );
		}
		
		return $this->{$name} = $class;
	}

}
