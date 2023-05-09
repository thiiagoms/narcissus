<?php

declare(strict_types=1);

namespace Narcissus\Commands;

use Narcissus\Helpers\Printer;

/**
 * Banner command
 *
 * @package Narcissus\Commands
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.0
 */
final class BannerCommand
{
    /**
     * Starter banner
     *
     * @return void
     */
    public static function init(): void
    {
        Printer::info(
            '
                ███╗   ██╗ █████╗ ██████╗  ██████╗██╗███████╗███████╗██╗   ██╗███████╗
                ████╗  ██║██╔══██╗██╔══██╗██╔════╝██║██╔════╝██╔════╝██║   ██║██╔════╝
                ██╔██╗ ██║███████║██████╔╝██║     ██║███████╗███████╗██║   ██║███████╗
                ██║╚██╗██║██╔══██║██╔══██╗██║     ██║╚════██║╚════██║██║   ██║╚════██║
                ██║ ╚████║██║  ██║██║  ██║╚██████╗██║███████║███████║╚██████╔╝███████║
                ╚═╝  ╚═══╝╚═╝  ╚═╝╚═╝  ╚═╝ ╚═════╝╚═╝╚══════╝╚══════╝ ╚═════╝ ╚══════╝
                
                => Tool to unfollow users that doesn\'t follow you on GitHub
                
                [*] Author: Thiago AKA thiiagoms
                [*] Repository: https://github.com/thiiagoms/narcissus
            '
        );
    }
}
