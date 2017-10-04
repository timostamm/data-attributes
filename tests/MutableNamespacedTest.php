<?php

namespace TS\Data\Attributes\Test;


use PHPUnit\Framework\TestCase;
use TS\Data\Attributes\MutableNamespaced\Attributes;
use TS\Data\Attributes\AttributesInterface;
use TS\Data\Attributes\Namespaced\NamespacedInterface;
use TS\Data\Attributes\Mutable\MutableInterface;
use ReflectionClass;

/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
class MutableNamespacedTest extends TestCase
{
	
	public function testfromArray()
	{
		$a = Attributes::fromArray([
			'a::foo' => 'b'
		]);
		$this->assertInstanceOf(NamespacedInterface::class, $a);
		$this->assertInstanceOf(MutableInterface::class, $a);
		$this->assertInstanceOf(AttributesInterface::class, $a);
		$this->assertCount(1, $a);
	}
	
	public function testNamespaces()
	{
		$a = Attributes::fromArray([
			'a::foo' => 'FOO-a',
			'b::foo' => 'FOO-b'
		]);
		$this->assertCount(2, $a);
		$n = $a->namespaces();
		$this->assertCount(2, $n);
		$n = $a->extract('b');
		$this->assertCount(1, $n);
		$this->assertEquals('FOO-b', $n->get('foo'));
	}
	
	
	public function testMutable()
	{
		$a = Attributes::fromArray([
			'a' => 'FOO-a',
			'b' => 'FOO-b'
		]);
		$r = $a->toReadOnly();
		$ref = new ReflectionClass($r);
		$this->assertFalse($ref->hasMethod('set'));
		$prev = $a->set('a', 'bar');
		$this->assertSame('bar', $a->get('a'));
		$this->assertSame('FOO-a', $prev);
	}
	

}