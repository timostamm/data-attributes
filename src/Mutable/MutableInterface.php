<?php

namespace TS\Data\Attributes\Mutable;


use TS\Data\Attributes\AttributesInterface;


/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
interface MutableInterface extends AttributesInterface
{

	/**
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return mixed replaced value
	 */
	function set($key, $value);

	/**
	 *
	 * @param string $key
	 * @return mixed removed value
	 * @throws \OutOfBoundsException
	 */
	function remove($key);

	/**
	 *
	 * @return AttributesInterface
	 */
	function toReadOnly();

	/**
	 *
	 * @param array|AttributesInterface $items
	 */
	function merge($items);

}

