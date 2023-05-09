<?php

declare(strict_types=1);

namespace Narcissus\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * GitHubRepository class is a repository class that interacts with the GitHub API.
 *
 * This class provides methods to get information about the users that a GitHub user follows,
 * check if a user is following another user, and unfollow a user.
 *
 * @package Narcissus\Commands
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.0
 */
final class GitHubRepository
{
    /**
     * The GuzzleHttp client instance used to make requests to the GitHub API.
     *
     * @var Client
     */
    private Client $client;

    /**
     * Dependency injection with ContainerDI
     *
     * @param Client $guzzle
     */
    public function __construct(Client $guzzle)
    {
        $this->client = $guzzle;
    }

    /**
     * Return all users that user follow
     *
     * @param string $token The access token to authenticate the request to the GitHub API.
     *
     * @return ResponseInterface response from the GitHub API containing the list of users
     * that the authenticated user follows.
     *
     * @throws GuzzleException When an error occurs while making the request to the GitHub API.
     */
    public function getUserFollowing(string $token): ResponseInterface
    {
        $headers = [
            'Authorization' => "Bearer {$token}",
            'Accept' => 'application/vnd.github+json',
            'X-GitHub-Api-Version' => '2022-11-28',
        ];

        return $this->client->request(
            'GET',
            'https://api.github.com/user/following',
            [
            'headers' => $headers,
            ]
        );
    }

    /**
     * Check if a user is following another user.
     *
     * @param string $username The username of the GitHub user to check.
     * @param string $token The access token to authenticate the request to the GitHub API.
     * @param string $usernameToUnfollow username of the GitHub user to check if the authenticated user is following.
     *
     * @return ResponseInterface response from the GitHub API indicating
     * if the authenticated user is following the specified user.
     *
     * @throws GuzzleException When an error occurs while making the request to the GitHub API.
     */
    public function isFollowingUser(string $username, string $token, string $usernameToUnfollow): ResponseInterface
    {
        $headers = [
            'Authorization' => "Bearer {$token}",
            'Accept' => 'application/vnd.github+json',
            'X-GitHub-Api-Version' => '2022-11-28',
        ];

        return $this->client->request(
            'GET',
            "https://api.github.com/users/{$username}/following/{$usernameToUnfollow}",
            [
                'headers' => $headers
            ]
        );
    }

    /**
     * Unfollow a user.
     *
     * @param string $token The access token to authenticate the request to the GitHub API.
     * @param string $userToUnfollow The username of the GitHub user to unfollow.
     *
     * @return ResponseInterface The response from the GitHub API indicating the success of the unfollow operation.
     *
     * @throws GuzzleException When an error occurs while making the request to the GitHub API.
     */
    public function unfollowUser(string $token, string $userToUnfollow): ResponseInterface
    {
        $headers = [
            'Authorization' => "Bearer {$token}",
            'Accept' => 'application/vnd.github+json',
            'X-GitHub-Api-Version' => '2022-11-28',
        ];

        return $this->client->delete("https://api.github.com/user/following/{$userToUnfollow}", [
            'headers' => $headers,
        ]);
    }
}
