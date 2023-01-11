<?php
declare(strict_types=1);

/**
 * @param string $input
 * @return bool
 * @throws Exception for empty input
 */

// получаем противоположную скобку для последнего элемента массива
function getPairOfParenthesis(string $char): string
{
	$array = [')' => '(', ']' => '[', '>' => '<'];

	return $array[$char];
}

function isParenthesisValid(string $input = ''): bool
{
	if (empty($input))
	{
		throw new Exception();
	}

	$parenthesisArray = [];
	foreach (str_split($input) as $char)
	{
		if ($char === '(' || $char === '[' || $char === '<')
		{
			$parenthesisArray[] = $char;
			continue;
		}

		if ($char === ')' || $char === ']' || $char === '>')
		{
			if (
				!empty($parenthesisArray)
				&& $parenthesisArray[count($parenthesisArray) - 1] === getPairOfParenthesis($char)
			)
			{
				array_pop($parenthesisArray);

				continue;
			}

			return false;
		}

	}
	if (!empty($parenthesisArray))
	{
		return false;
	}

	return true;
}