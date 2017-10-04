<?php

namespace TS\Data\Attributes\Mutable;


use TS\Data\Attributes\AttributeContainerInterface;


/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
interface MutableContainerInterface extends AttributeContainerInterface
{

	/**
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return mixed replaced value
	 */
	function setAttribute($key, $value);

	/**
	 *
	 * @param string $key
	 * @return mixed removed value
	 * @throws \OutOfBoundsException
	 */
	function removeAttribute($key);

	/**
	 *
	 * @return MutableInterface
	 */
	function getAttributes();

}

