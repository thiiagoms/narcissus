<?php

declare(strict_types=1);

if (php_sapi_name() != 'cli') {
    die("<h1>Only in CLI mode </h1>");
}

require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use Narcissus\Repositories\GitHubRepository;
use Narcissus\Services\GitHubService;
use Narcissus\Commands\GitHubCommand;
use Narcissus\Helpers\{ContainerDI, Env};

Env::loadEnv();

$container = new ContainerDI();

$container->add('Client',fn(): object => new Client());
$container->add('GitHubRepository', fn(object $container): object => new GitHubRepository(
    $container->get('Client')
));
$container->add('GitHubService', fn(object $container): object => new GitHubService(
    $container->get('GitHubRepository')
));
$container->add('GitHubCommand', fn(object $container): object => new GitHubCommand(
    $container->get('GitHubService')
));

$app = $container->get('GitHubCommand');
