<?php

namespace TS\Data\Attributes\MutableNamespaced;


use TS\Data\Attributes\AttributesInterface;
use TS\Data\Attributes\ContainerAccessTrait;
use TS\Data\Attributes\Mutable\MutableNamespacedInterface;
use InvalidArgumentException;
use LogicException;


/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
trait MutableNamespacedContainerTrait {
	
	use ContainerAccessTrait;
	
	private $attributes;
	
	private function initAttributes($attrs)
	{
		if ($attrs instanceof MutableNamespacedInterface) {
			$this->attributes = $attrs;
		} else if ($attrs instanceof AttributesInterface) {
			$this->attributes = Attributes::fromArray($attrs->toArray());
		} else if (is_array($attrs)) {
			$this->attributes = Attributes::fromArray($attrs);
		} else {
			throw new InvalidArgumentException();
		}
	}
	
	/**
	 *
	 * @throws LogicException
	 * @return AttributesInterface
	 */
	public function getAttributes()
	{
		if (is_null($this->attributes)) {
			throw new LogicException('Attributes not initialized.');
		}
		return $this->attributes;
	}
	
	/**
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return mixed replaced value
	 */
	public function setAttribute($key, $value)
	{
		return $this->getAttributes()->set($key, $value);
	}

	/**
	 *
	 * @param string $key
	 * @return mixed removed value
	 * @throws \OutOfBoundsException
	 */
	public function removeAttribute($key)
	{
		return $this->getAttributes()->remove($key);
	}

	/**
	 * List all used namespaces.
	 *
	 * @return array
	 */
	public function attributeNamespaces()
	{
		return $this->getAttributes()->namespaces();
	}

}

