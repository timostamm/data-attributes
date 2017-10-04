<?php

namespace TS\Data\Attributes\Mutable;


use TS\Data\Attributes\Attributes as ReadOnly;
use TS\Data\Attributes\AttributesInterface;
use InvalidArgumentException;


trait MutableTrait {

	abstract public function has($key);

	abstract public function get($key);

	/**
	 *
	 * {@inheritdoc}
	 * @see \TS\Data\Attributes\Mutable\MutableInterface::remove()
	 */
	public function remove($key)
	{
		if (! $this->has($key)) {
			throw new \OutOfBoundsException('Unknown attribute: ' . $key);
		}
		$removedValue = $this->get($key);
		unset($this->items[$key]);
		return $removedValue;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \TS\Data\Attributes\Mutable\MutableInterface::set()
	 */
	public function set($key, $value)
	{
		$replacedValue = $this->has($key) ? $this->get($key) : null;
		$this->items[$key] = $value;
		return $replacedValue;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \TS\Data\Attributes\Mutable\MutableInterface::toReadOnly()
	 */
	public function toReadOnly()
	{
		return new ReadOnly($this->items);
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \TS\Data\Attributes\Mutable\MutableInterface::merge()
	 */
	public function merge($items)
	{
		if (! $items instanceof AttributesInterface && ! is_array($items)) {
			throw new InvalidArgumentException();
		}
		$this->items = array_replace($this->items, is_array($items) ? $items : $items->toArray());
	}

}

