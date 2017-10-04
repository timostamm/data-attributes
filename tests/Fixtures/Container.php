<?php

namespace TS\Data\Attributes\Tests\Fixtures;


use TS\Data\Attributes\AttributeContainerTrait;
use TS\Data\Attributes\AttributeContainerInterface;


class Container implements AttributeContainerInterface
{
	
	use AttributeContainerTrait;

	public function __construct(array $attr)
	{
		$this->initAttributes($attr);
	}

}

