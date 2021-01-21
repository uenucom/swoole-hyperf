# Introduction

The customized swoole-Hyperf framework integrates the zookeeper configuration center (the configuration is only loaded once at startup and takes effect globally), and supports flexible management of multiple environment configurations.

This is a skeleton application using the Hyperf framework. This application is meant to be used as a starting place for those looking to get their feet wet with Hyperf Framework.

# Requirements

Hyperf has some requirements for the system environment, it can only run under Linux and Mac environment, but due to the development of Docker virtualization technology, Docker for Windows can also be used as the running environment under Windows.

The various versions of Dockerfile have been prepared for you in the [hyperf\hyperf-docker](https://github.com/hyperf/hyperf-docker) project, or directly based on the already built [hyperf\hyperf](https://hub.docker.com/r/hyperf/hyperf) Image to run.

When you don't want to use Docker as the basis for your running environment, you need to make sure that your operating environment meets the following requirements:  

 - PHP >= 7.2
 - Swoole PHP extension >= 4.4，and Disabled `Short Name`
 - OpenSSL PHP extension
 - JSON PHP extension
 - PDO PHP extension （If you need to use MySQL Client）
 - Redis PHP extension （If you need to use Redis Client）
 - Protobuf PHP extension （If you need to use gRPC Server of Client）

# Installation 
```
git clone https://github.com/uenucom/swoole-hyperf.git

```
```
Modify the following files according to the actual situation

 env_dev
 env_development
 env_hotfix
 env_production
 env_stress

Set environment variables and start

export APP_ENV=development && php artsion start
export APP_ENV=dev && php artsion start
export APP_ENV=hofitx && php artsion start
export APP_ENV=stress && php artsion start
export APP_ENV=production && php artsion start


shutdown
1、ctrl+C
2、ps -ef |grep swoole |grep -v "grep"| awk '{print $2}'|xargs kill -9
3、kill -9 `cat runtime/hyperf.pid`
```
#定制化的swoole-Hyperf 框架，整合zookeeper 配置中心（仅启动时加载一次配置，全局生效）， 支持多种环境配置的灵活管理。