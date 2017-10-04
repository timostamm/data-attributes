<?php

namespace TS\Data\Attributes\Tests\Fixtures;


use TS\Data\Attributes\Namespaced\NamespacedContainerInterface;
use TS\Data\Attributes\Namespaced\NamespacedContainerTrait;
use TS\Data\Attributes\Namespaced\Attributes;


class NamespacedContainer implements NamespacedContainerInterface
{
	
	use NamespacedContainerTrait;

	private $attributes;

	public function __construct(array $attr)
	{
		$this->attributes = new Attributes($attr);
	}

	public function getAttributes()
	{
		return $this->attributes;
	
	}

}

