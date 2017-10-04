<?php

namespace TS\Data\Attributes\Test;


use PHPUnit\Framework\TestCase;
use TS\Data\Attributes\Namespaced\Attributes;
use TS\Data\Attributes\Namespaced\NamespacedInterface;
use TS\Data\Attributes\AttributesInterface;


/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
class NamespacedTest extends TestCase
{
	
	public function testfromArray()
	{
		$a = Attributes::fromArray([
			'a' => 'b'
		]);
		$this->assertInstanceOf(NamespacedInterface::class, $a);
		$this->assertInstanceOf(AttributesInterface::class, $a);
		$this->assertCount(1, $a);
	}
	
	public function testfromArrayWithPrefix()
	{
		$a = Attributes::fromArray([
			'a' => 'b'
		], 'foo');
		$this->assertEquals(['foo'], $a->namespaces());
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
		$this->assertEquals(['a', 'b'], $n);
	}
	
	public function testExtractDrop()
	{
		$a = Attributes::fromArray([
			'a::foo' => 'FOO-a',
			'b::foo' => 'FOO-b'
		]);
		$n = $a->extract('b');
		$this->assertCount(1, $n);
		$this->assertEquals('FOO-b', $n->get('foo'));
	}
	
	public function testExtractKeep()
	{
		$a = Attributes::fromArray([
			'a::foo' => 'FOO-a',
			'b::foo' => 'FOO-b'
		]);
		$n = $a->extract('b', Attributes::KEEP_NAMESPACE);
		$this->assertCount(1, $n);
		$this->assertEquals('FOO-b', $n->get('b::foo'));
	}
	

}