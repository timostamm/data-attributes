<?php

namespace TS\Data\Attributes\Namespaced;


use TS\Data\Attributes\Attributes as Base;


class Attributes extends Base implements NamespacedInterface
{
	
	use NamespacedTrait;

	public static function fromArray(array $attrs, $addNamespace = null)
	{
		if ($addNamespace) {
			$a = [];
			foreach ($attrs as $k => $v) {
				$a[$addNamespace . self::NS_SEPARATOR . $k] = $v;
			}
			return new self($a);
		} else {
			return new self($attrs);
		}
	}

}

