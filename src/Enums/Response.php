<?php

declare(strict_types=1);

namespace Narcissus\Enums;

/**
 * Response HTTP package
 *
 * @package Narcissus\Enums
 * @author  Thiago <thiiagoms@proton.me>
 * @version 1.0
 */
abstract class Response
{
    /** @var int */
    public const HTTP_OK = 200;

    /** @var int */
    public const HTTP_CREATED = 201;

    /** @var int */
    public const HTTP_NO_CONTENT = 204;

    /** @var int */
    public const HTTP_SERVER_ERROR = 500;
}
