<?php

namespace TS\Data\Attributes\Tests\Fixtures;


use TS\Data\Attributes\MutableNamespaced\MutableNamespacedContainerInterface;
use TS\Data\Attributes\MutableNamespaced\MutableNamespacedContainerTrait;


class MutableNamespacedContainer implements MutableNamespacedContainerInterface
{
	
	use MutableNamespacedContainerTrait;
	
	public function __construct(array $attr)
	{
		$this->initAttributes($attr);
	}
	

}

