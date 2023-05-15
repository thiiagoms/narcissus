<?php

declare(strict_types=1);

namespace Narcissus\Services;

use GuzzleHttp\Exception\GuzzleException;
use Narcissus\Enums\Response;
use Narcissus\Helpers\Printer;
use Narcissus\Repositories\GitHubRepository;

class GitHubService
{
    /* @var GitHubRepository The repository responsible for interfacing with the GitHub API. */
    private GitHubRepository $gitHubRepository;

    /**
     * Dependency injection with ContainerDI
     *
     * @param GitHubRepository $gitHubRepository The repository responsible for interfacing with the GitHub API.
     */
    public function __construct(GitHubRepository $gitHubRepository)
    {
        $this->gitHubRepository = $gitHubRepository;
    }

    /**
     * Determines if a user is following another user on GitHub.
     *
     * @param string $username The username of the current user.
     * @param string $token The user's access token for GitHub.
     * @param string $usernameToUnfollow The username of the user to unfollow.
     * @return bool True if the user is following the user to unfollow, false otherwise.
     * @throws GuzzleException If an error occurs while making the API call.
     */
    private function isFollowingUser(string $username, string $token, string $usernameToUnfollow): bool
    {
        $response = $this->gitHubRepository->isFollowingUser($username, $token, $usernameToUnfollow);
        return $response->getStatusCode() === Response::HTTP_NO_CONTENT;
    }

    /**
     * Unfollows a user on GitHub.
     *
     * @param string $token The user's access token for GitHub.
     * @param string $unfollowUsername The username of the user to unfollow.
     * @return bool True if the unfollow operation was successful, false otherwise.
     * @throws GuzzleException If an error occurs while making the API call.
     */
    private function unfollowUser(string $token, string $unfollowUsername): bool
    {
        $response = $this->gitHubRepository->unfollowUser($token, $unfollowUsername);
        return $response->getStatusCode() === Response::HTTP_NO_CONTENT;
    }

    /**
     * Unfollows all users who are following a specified username on GitHub.
     *
     * @param string $username The username of the user to unfollow.
     * @return void
     * @throws GuzzleException If an error occurs while making the API call.
     */
    public function unfollow(string $username): void
    {
        $token = $_SERVER['GITHUB_TOKEN'];

        $response = $this->gitHubRepository->getUserFollowing($token);
        $followers = json_decode((string) $response->getBody(), true);

        foreach ($followers as $key => $follower) {
            $user = $follower['login'];

            $followingUser = $this->isFollowingUser($username, $token, $user);

            $followingUser && $this->unfollowUser($token, $user)
                ? Printer::success("=> Unfollow user: {$user}")
                : Printer::error("[*] Error to unfollowing {$user}");
        }
    }
}
