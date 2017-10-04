<?php

namespace TS\Data\Attributes\Test;


use PHPUnit\Framework\TestCase;
use TS\Data\Attributes\AttributesInterface;
use TS\Data\Attributes\Mutable\MutableInterface;
use TS\Data\Attributes\Namespaced\NamespacedInterface;
use TS\Data\Attributes\Tests\Fixtures\Container;
use TS\Data\Attributes\Tests\Fixtures\MutableContainer;
use TS\Data\Attributes\Tests\Fixtures\MutableNamespacedContainer;
use TS\Data\Attributes\Tests\Fixtures\NamespacedContainer;


/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
class ContainerTest extends TestCase
{

	public function testContainer()
	{
		$c = new Container([
			'a' => 'b'
		]);
		$this->assertInstanceOf(AttributesInterface::class, $c->getAttributes());
		$this->assertSame('b', $c->getAttribute('a'));
		$this->assertTrue($c->hasAttribute('a'));
	}

	public function testMutableContainer()
	{
		$c = new MutableContainer([
			'a' => 'b'
		]);
		$this->assertInstanceOf(MutableInterface::class, $c->getAttributes());
		$this->assertSame('b', $c->getAttribute('a'));
		$this->assertTrue($c->hasAttribute('a'));
		$prev = $c->setAttribute('a', 'c');
		$this->assertSame('b', $prev);
		$this->assertSame('c', $c->getAttribute('a'));
		$old = $c->removeAttribute('a');
		$this->assertSame('c', $old);
	}

	public function testNamespacedContainer()
	{
		$c = new NamespacedContainer([
			'foo::a' => 'foooo'
		]);
		$this->assertInstanceOf(NamespacedInterface::class, $c->getAttributes());
		
		$n = $c->attributeNamespaces();
		$this->assertEquals([
			'foo'
		], $n);
	}

	public function testMutableNamespacedContainer()
	{
		$c = new MutableNamespacedContainer([
			'foo::a' => 'foooo'
		]);
		$this->assertInstanceOf(NamespacedInterface::class, $c->getAttributes());
		$this->assertInstanceOf(MutableInterface::class, $c->getAttributes());
		
		$n = $c->attributeNamespaces();
		$this->assertEquals([
			'foo'
		], $n);
		$old = $c->removeAttribute('foo::a');
		$this->assertSame('foooo', $old);
	}

}