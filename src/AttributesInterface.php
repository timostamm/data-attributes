<?php

namespace TS\Data\Attributes;


/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
interface AttributesInterface extends \IteratorAggregate, \Countable
{

	/**
	 *
	 * @param string $key
	 * @return mixed
	 * @throws \OutOfBoundsException
	 */
	function get($key);

	/**
	 *
	 * @param string $key
	 * @return bool
	 */
	function has($key);

	/**
	 *
	 * @return array
	 */
	function toArray();

}

