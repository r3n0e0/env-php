env-php
=======

[![Build Status](https://travis-ci.org/r3n0e0/env-php.svg?branch=master)](https://travis-ci.org/r3n0e0/env-php)

This is a utility that provides several functions for accessing environment variables.

Inspired by the [env](https://github.com/kennethreitz/env) library for Python.

Example Usage
-------------

Environment variables:

```
GITHUB_USER=xxx
GITHUB_TOKEN=yyy
API_TOKEN=zzz
```

Easy to use as follows:

```
>>> require __DIR__ . '/vendor/autoload.php';
>>> use EnvPHP\Env;
>>> $env = Env::prefix('GITHUB_');
>>> var_dump($env);
array(2) {
  'user' =>
  string(3) "xxx"
  'token' =>
  string(3) "yyy"
}
>>> $env = Env::suffix('_TOKEN');
>>> var_dump($env);
array(2) {
  'github' =>
  string(3) "yyy"
  'api' =>
  string(3) "zzz"
}
```

Thanks
------

- Kenneth Reitz ([kennethreitz](https://github.com/kennethreitz))
