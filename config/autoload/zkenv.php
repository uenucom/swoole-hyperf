<?php

declare(strict_types = 1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
$systemConfig = array();
if (env('ZOOKEEPER_ENABLE', false) == true && !empty(env('ZOOKEEPER_ADDRESS')) && !empty(env('ZOOKEEPER_PATH'))) {
    try {
        $zookeeper = new Zookeeper(env('ZOOKEEPER_ADDRESS'), null, 300);
        $zk_path = env('ZOOKEEPER_PATH');
        $nodes = $zookeeper->getchildren($zk_path);
        foreach ($nodes as $path_key) {
            $sub_key = strtoupper(str_replace('.', '_', $path_key));
            $sub_path = $zk_path . DIRECTORY_SEPARATOR . $path_key;
            $sub_val = $zookeeper->get($sub_path);
            $systemConfig[$sub_key] = $sub_val;
        }
        if (empty($systemConfig)) {
            exit("zkconfig is empty");
        }
        ksort($systemConfig);
        foreach ($systemConfig as $key => $val) {
            putenv("{$key}={$val}");
        }
    } catch (\Exception $ex) {
        $error_info = sprintf("zk error:%s", $ex->getMessage());
        exit($error_info);
    }
}

return $systemConfig;
