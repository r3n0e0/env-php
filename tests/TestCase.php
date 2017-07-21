<?php

abstract class TestCase extends PHPUnit\Framework\TestCase
{
    private $env_backup;

    protected function setUp()
    {
        $this->env_backup = $_SERVER;
        $_SERVER = array(
            'GITHUB_USER' => 'xxx',
            'GITHUB_TOKEN' => 'yyy',
            'API_TOKEN' => 'zzz'
        );
    }

    protected function tearDown()
    {
        $_SERVER = $this->env_backup;
    }
}
