<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\Contract\StdoutLoggerInterface;
use Psr\Log\LogLevel;

$app_env = env('APP_ENV');
$env_arr = ['development', 'dev', 'hotfix', 'stress', 'production'];
if (!in_array($app_env, $env_arr)) {
    $show_error = array();
    $show_error[] = "Error:不存在对应环境 [{$app_env}] ";
    $show_error[] = "***********************";
    $show_error[] = "目前支持的运行环境如下";
    foreach ($env_arr as $info) {
        $show_error[] = "export APP_ENV={$info} ";
    }
    $show_error[] = '';
    $str = implode("\r\n", $show_error);
    exit($str);
}
return [
    'app_name' => env('APP_NAME', 'skeleton'),
    'app_env' => env('APP_ENV', 'dev'),
    'scan_cacheable' => env('SCAN_CACHEABLE', false),
    StdoutLoggerInterface::class => [
        'log_level' => [
            LogLevel::ALERT,
            LogLevel::CRITICAL,
            LogLevel::DEBUG,
            LogLevel::EMERGENCY,
            LogLevel::ERROR,
            LogLevel::INFO,
            LogLevel::NOTICE,
            LogLevel::WARNING,
        ],
    ],
];
