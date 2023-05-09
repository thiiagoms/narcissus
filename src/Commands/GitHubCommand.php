<?php

declare(strict_types=1);

namespace Narcissus\Commands;

use GuzzleHttp\Exception\GuzzleException;
use Narcissus\Services\GitHubService;

/**
 * GiHub entrypoint command
 *
 * @package Narcissus\Commands
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.0
 */
final class GitHubCommand
{
    /**
     * GitHub Service dependency
     *
     * @var GitHubService
     */
    private GitHubService $gitHubService;

    /**
     * @param GitHubService $gitHubService
     */
    public function __construct(GitHubService $gitHubService)
    {
        $this->gitHubService = $gitHubService;
    }

    /**
     * Unfollow a user on GitHub
     *
     * @param string $username
     * @return void
     * @throws GuzzleException
     */
    public function unfollow(string $username): void
    {
        $this->gitHubService->unfollow($username);
    }
}
