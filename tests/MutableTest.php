<?php

namespace TS\Data\Attributes\Test;


use PHPUnit\Framework\TestCase;
use TS\Data\Attributes\Mutable\Attributes;
use TS\Data\Attributes\Mutable\MutableInterface;
use TS\Data\Attributes\AttributesInterface;
use ReflectionClass;


/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
class MutableTest extends TestCase
{

	public function testfromArray()
	{
		$a = Attributes::fromArray([
			'a' => 'b'
		]);
		$this->assertInstanceOf(MutableInterface::class, $a);
		$this->assertInstanceOf(AttributesInterface::class, $a);
		$this->assertCount(1, $a);
	}

	public function testToReadOnly()
	{
		$a = Attributes::fromArray([
			'a' => 'FOO-a',
			'b' => 'FOO-b'
		]);
		$r = $a->toReadOnly();
		$ref = new ReflectionClass($r);
		$this->assertFalse($ref->hasMethod('set'));
	}

	public function testSetOverride()
	{
		$a = Attributes::fromArray([
			'a' => 'FOO-a',
			'b' => 'FOO-b'
		]);
		$prev = $a->set('a', 'bar');
		$this->assertSame('bar', $a->get('a'));
		$this->assertSame('FOO-a', $prev);
	}

	public function testSetNew()
	{
		$a = Attributes::fromArray([
			'a' => 'FOO-a',
			'b' => 'FOO-b'
		]);
		$a->set('c', 'bar');
		$this->assertSame('bar', $a->get('c'));
	}

	public function testRemove()
	{
		$a = Attributes::fromArray([
			'a' => 'FOO-a',
			'b' => 'FOO-b'
		]);
		$prev = $a->remove('a');
		$this->assertSame('FOO-a', $prev);
		$this->assertFalse($a->has('a'));
		$this->assertCount(1, $a);
	}

	public function testMergeAttributes()
	{
		$a = Attributes::fromArray([
			'foo' => 'a-foo',
			'bar' => 'a-bar'
		]);
		$b = Attributes::fromArray([
			'foo' => 'b-foo',
			'baz' => 'b-baz'
		]);
		$a->merge($b);
		$this->assertCount(3, $a);
		$this->assertSame('b-foo', $a->get('foo'));
	}

	public function testMergeArray()
	{
		$a = Attributes::fromArray([
			'foo' => 'a-foo',
			'bar' => 'a-bar'
		]);
		$b = [
			'foo' => 'b-foo',
			'baz' => 'b-baz'
		];
		$a->merge($b);
		$this->assertCount(3, $a);
		$this->assertSame('b-foo', $a->get('foo'));
	}

}