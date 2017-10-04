<?php

namespace TS\Data\Attributes\Mutable;


use TS\Data\Attributes\Attributes as Base;


class Attributes extends Base implements MutableInterface
{
	
	use MutableTrait;

	public static function fromArray(array $attrs)
	{
		return new self($attrs);
	}

}

