<?php

declare(strict_types=1);

namespace Narcissus\Helpers;

use Narcissus\Enums\Colors;

/**
 * The Printer class provides methods to display messages in various colors.
 *
 * @package Narciso\Helpers
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.0
 */
abstract class Printer
{
    /**
     * Outputs a string to the console.
     *
     * @param string $message The message to output.
     */
    private static function out(string $message): void
    {
        echo $message;
    }

    /**
     * Add console newline
     *
     * @return void
     */
    private static function newLine(): void
    {
        self::out(PHP_EOL);
    }

    /**
     * Main display.
     *
     * @param string $message The message to display.
     * @return void
     */
    private static function display(string $message): void
    {
        self::newLine();
        self::out($message);
        self::newLine();
    }

    /**
     * Displays an informational message in the console.
     *
     * @param string $message The message to display.
     * @return void
     */
    final public static function info(string $message): void
    {
        self::display($message);
    }

    /**
     * Displays a success message.
     *
     * @param string $message The message to display.
     * @return void
     */
    final public static function success(string $message): void
    {
        self::display(Colors::GREEN . $message . "\e[0m");
    }

    /**
     * Displays a warning message.
     *
     * @param string $message The message to display.
     * @return void
     */
    final public static function warning(string $message): void
    {
        self::display(Colors::YELLOW . $message . "\e[0m");
    }

    /**
     * Displays a error message.
     *
     * @param string $message The message to display.
     * @return void
     */
    final public static function error(string $message): void
    {
        self::display(Colors::RED . $message . "\e[0m");
    }
}
