<?php

namespace TS\Data\Attributes\Test;


use PHPUnit\Framework\TestCase;
use TS\Data\Attributes\Attributes;
use TS\Data\Attributes\AttributesInterface;


/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
class AttributesTest extends TestCase
{

	public function testfromArray()
	{
		$a = Attributes::fromArray([
			'a' => 'b'
		]);
		$this->assertInstanceOf(AttributesInterface::class, $a);
		$this->assertCount(1, $a);
	}

	public function testGet()
	{
		$a = new Attributes([
			'a' => 'b'
		]);
		$this->assertEquals('b', $a->get('a'));
	}

	public function testGetOutOfBounds()
	{
		$a = new Attributes([
			'a' => 'b'
		]);
		$this->expectException(\OutOfBoundsException::class);
		$a->get('x');
	}

	public function testHas()
	{
		$a = new Attributes([
			'a' => 'b'
		]);
		$this->assertTrue($a->has('a'));
		$this->assertFalse($a->has('x'));
	}

	public function testToArray()
	{
		$a = new Attributes([
			'a' => 'b'
		]);
		$arr = $a->toArray();
		$this->assertCount(1, $arr);
		$this->assertSame('b', $arr['a']);
	}

	public function testTraversable()
	{
		$k = null;
		$v = null;
		foreach (new Attributes([
			'a' => 'b'
		]) as $k => $v) {}
		$this->assertSame('a', $k);
		$this->assertSame('b', $v);
	}

}