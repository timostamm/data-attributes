<?php

namespace TS\Data\Attributes\Test;


use PHPUnit\Framework\TestCase;
use TS\Data\Attributes\Attributes;
use TS\Data\Attributes\Extra\TryGetTrait;


class N extends Attributes {
	use TryGetTrait;
}

/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
class TryGetTest extends TestCase
{
	
	public function testHas()
	{
		$a = new N([
			'a' => 'b'
		]);
		$has = $a->tryGet('a', $val);
		$this->assertTrue($has);
		$this->assertSame('b', $val);
	}
	
	public function testHasNot()
	{
		$a = new N([
			'a' => 'b'
		]);
		$has = $a->tryGet('c', $val);
		$this->assertFalse($has);
		$this->assertNull($val);
	}
	

}