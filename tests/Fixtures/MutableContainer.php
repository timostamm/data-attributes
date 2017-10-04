<?php

namespace TS\Data\Attributes\Tests\Fixtures;


use TS\Data\Attributes\Mutable\MutableContainerInterface;
use TS\Data\Attributes\Mutable\MutableContainerTrait;


class MutableContainer implements MutableContainerInterface
{
	
	use MutableContainerTrait;

	public function __construct(array $attr)
	{
		$this->initAttributes($attr);
	}

}

