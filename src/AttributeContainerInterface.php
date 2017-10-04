<?php

namespace TS\Data\Attributes;



/**
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
interface AttributeContainerInterface {

	
	/**
	 * @param string $key
	 * @return mixed
	 * @throws \OutOfBoundsException
	 */
	function getAttribute( $key );
	
	
	/**
	 * @param string $key
	 * @return bool
	 */
	function hasAttribute( $key );
	
	
	/**
	 * @return AttributesInterface
	 */
	function getAttributes();
	
}

