<?php

declare(strict_types=1);

namespace Narcissus\Enums;

/**
 * The Colors enum provides a set of predefined console colors.
 *
 * @package Narcissus\Enums
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.0
 */
abstract class Colors
{
    public const RED = "\e[31m";

    public const YELLOW = "\e[33m";

    public const GREEN = "\e[32m";
}
