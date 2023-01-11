<?php

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
	public function testFunctionExceptionCorrectlyWorks(): void
	{
		$this->expectException(Exception::class);
		isParenthesisValid();
	}

	/**
	 * @dataProvider parenthesesProvider
	 * @return void
	 */

	public function testFunctionParenthesesCorrectlyWorks(bool $expected, string $assertion): void
	{
		$this->assertEquals($expected, isParenthesisValid($assertion));
	}

	public function parenthesesProvider(): array
	{
		return [
			[true, 'Hello (there)'],
			[true, 'Hello there'],
			[true, 'Hello (th[e]re)'],
			[true, '<Hello (th[e]re)>'],
			[false, 'Hello (there'],
			[false, 'Hello )there('],
			[false, 'Hello (th[ere)'],
			[false, 'Hello (th[e)re]'],
			[false, 'Hello (th[ere)>'],
			[false, 'Hello (th[e<)re]>'],
		];
	}
}
