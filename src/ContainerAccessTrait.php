<?php

namespace TS\Data\Attributes;


/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
trait ContainerAccessTrait {

	abstract public function getAttributes();

	/**
	 *
	 * @param string $key
	 * @return mixed
	 * @throws \OutOfBoundsException
	 */
	public function getAttribute($key)
	{
		return $this->getAttributes()->get($key);
	}

	/**
	 *
	 * @param string $key
	 * @return bool
	 */
	public function hasAttribute($key)
	{
		return $this->getAttributes()->has($key);
	}

}

