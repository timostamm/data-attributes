<?php

namespace TS\Data\Attributes\MutableNamespaced;


use TS\Data\Attributes\Attributes as Base;
use TS\Data\Attributes\Mutable\MutableInterface;
use TS\Data\Attributes\Namespaced\NamespacedInterface;
use TS\Data\Attributes\Namespaced\NamespacedTrait;
use TS\Data\Attributes\Mutable\MutableTrait;


class Attributes extends Base implements MutableInterface, NamespacedInterface
{
	
	use MutableTrait;
	use NamespacedTrait;

	public static function fromArray(array $attrs, $addNamespace=null)
	{
		if ($addNamespace) {
			$a = [];
			foreach ($attrs as $k => $v) {
				$a[ $addNamespace . self::NS_SEPARATOR . $k ] = $v;
			}
			return new self($a);
		} else {
			return new self($attrs);
		}
	}
	
}

