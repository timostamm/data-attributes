<?php

namespace TS\Data\Attributes;


/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
class Attributes implements AttributesInterface
{

	protected $items;

	public static function fromArray(array $attrs)
	{
		return new self($attrs);
	}

	public function __construct(array $attrs)
	{
		$this->items = $attrs;
	}

	/**
	 * (non-PHPdoc)
	 * 
	 * @see AttributesInterface::get()
	 */
	public function get($key)
	{
		if (! $this->has($key)) {
			throw new \OutOfBoundsException('Unknown attribute: ' . $key);
		}
		return $this->items[$key];
	}

	/**
	 * (non-PHPdoc)
	 * 
	 * @see AttributesInterface::has()
	 */
	public function has($key)
	{
		return array_key_exists($key, $this->items);
	}

	/**
	 * (non-PHPdoc)
	 * 
	 * @see AttributesInterface::toArray()
	 */
	public function toArray()
	{
		return $this->items;
	}

	/**
	 * (non-PHPdoc)
	 * 
	 * @see \Countable::count()
	 */
	public function count()
	{
		return count($this->items);
	}

	/**
	 * (non-PHPdoc)
	 * 
	 * @see \IteratorAggregate::getIterator()
	 */
	public function getIterator()
	{
		return new \ArrayIterator($this->items);
	}

}

