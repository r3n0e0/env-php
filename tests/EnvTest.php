<?php

use EnvPHP\Env;

class EnvTest extends TestCase
{
    public function testPrefix()
    {
        $env = Env::prefix('GITHUB_');
        $this->assertSame(array(
            'user' => 'xxx',
            'token' => 'yyy'
        ), $env);
    }

    public function testSuffix()
    {
        $env = Env::suffix('_TOKEN');
        $this->assertSame(array(
            'github' => 'yyy',
            'api' => 'zzz'
        ), $env);
    }
}
