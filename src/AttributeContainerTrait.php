<?php

namespace TS\Data\Attributes;


use TS\Data\Attributes\Mutable\MutableInterface;
use InvalidArgumentException;


/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
trait AttributeContainerTrait {

	use ContainerAccessTrait;
	
	private $attributes;

	private function initAttributes($attrs)
	{
		if ($attrs instanceof MutableInterface) {
			$this->attributes = $attrs->toReadOnly();
		} else if ($attrs instanceof AttributesInterface) {
			$this->attributes = $attrs;
		} else if (is_array($attrs)) {
			$this->attributes = Attributes::fromArray($attrs);
		} else {
			throw new InvalidArgumentException();
		}
	}

	/**
	 *
	 * @return AttributesInterface
	 */
	public function getAttributes()
	{
		return $this->attributes;
	}

}

