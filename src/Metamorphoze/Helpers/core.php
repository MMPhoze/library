<?php

namespace Metamorphoze\Helpers\Core;

/**
 * Подготавливает пространство имен для возможности использования
 * в качестве имени переменной.
 * 
 * @param type $namespace
 * @return type
 */
function prepare_namespace( $namespace )
{
	$from = array( 'metamorphoze\\', '\\' );
	$to = array( '', '_' );
	return str_replace( $from, $to, strtolower( $namespace ) );
}
