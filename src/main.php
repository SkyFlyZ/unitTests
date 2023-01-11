<?php
declare(strict_types=1);

/**
 * @param string $input
 * @return bool
 * @throws Exception for empty input
 */

function getPairOfParenthesis(string $char): string
{
	$array = [')'=> '(', ']'=> '[', '>'=> '<'];

	return $array[$char];
}

function isParenthesisValid(string $input = ''): bool
{
	if (empty($input))
	{
		throw new Exception();
	}

	$ParenthesisArray = [];
	foreach (str_split($input) as $char)
	{
		if ($char === '(' || $char === '[' || $char === '<')
		{
			$ParenthesisArray[] = $char;
			continue;
		}

		if ($char === ')' || $char === ']' || $char === '>')
		{
			if (!empty($ParenthesisArray) && $ParenthesisArray[count($ParenthesisArray) - 1] === getPairOfParenthesis($char))
			{
				array_pop($ParenthesisArray);

				continue;
			}

			return false;
		}

	}
	if (!empty($ParenthesisArray))
	{
		return false;
	}

	return true;
}