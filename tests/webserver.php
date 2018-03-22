<?php

/**
 *
 */
function runWebServer()
{
    $descriptors = [
        0 => ['pipe', 'r'],  // stdin - канал, из которого дочерний процесс будет читать
        1 => ['pipe', 'w'],  // stdout - канал, в который дочерний процесс будет записывать
        2 => ['pipe', 'w']   // stderr - файл для записи
    ];

    $path         = dirname(__DIR__) . '/api/web/index-test.php';
    $port         = rand(40000, 50000);
    $listen       = '0.0.0.0:' . $port;
    $command   = PHP_BINARY . ' -S ' . $listen . ' ' . $path;
    $_ENV['HOST'] = 'http://localhost:' . $port;
    $process      = proc_open($command, $descriptors, $pipes, dirname($path), $_ENV);

    sleep(2);

    if (!proc_get_status($process)) {
        throw new \RuntimeException('Failed to start PHP sub-process. PHP: {$runCommand}');
    }

    echo('Frontend available at ' . $_ENV['HOST'] . PHP_EOL);

    register_shutdown_function(function () use ($process) {
        proc_terminate($process);
        proc_close($process);
    });
}
