<?php

declare(strict_types=1);

namespace Narcissus\Helpers;

use Dotenv\Dotenv;

/**
 * Env file helper
 *
 * @package Narcissus\Helpers
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.0
 */
final class Env
{
    /**
     * The path to the directory containing the .env file.
     *
     * @var string
     */
    private const ENVPATH = __DIR__ . '/../../';

    /**
     * Load env values
     *
     * @return void
     */
    public static function loadEnv(): void
    {
        (Dotenv::createImmutable(self::ENVPATH))->load();
    }
}
