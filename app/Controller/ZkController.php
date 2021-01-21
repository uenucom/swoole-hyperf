<?php

declare(strict_types = 1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use Hyperf\Redis\RedisFactory;
use Hyperf\Utils\ApplicationContext;

class ZkController extends AbstractController {

    public function index() {

        $app_name = env('APP_NAME', 'skeleton');
        $app_env = env('APP_ENV', 'env');

        $redis = $container->get(RedisFactory::class)->get('default');
        $redis_val = $redis->get('foo');

        return "[app_name:{$app_name}] [app_env:{$app_env}] [redis:{$redis_val}]";

    }


}
