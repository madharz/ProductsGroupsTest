<?php

namespace config;

use RedBeanPHP\R;

class Database
{

    public function __construct()
    {
        R::setup(
            dsn: 'pgsql:host=localhost;dbname=my_test_db',
            username: 'madharz',
            password: 'madharz96',
        );
    }
    public function __destruct()
    {
        R::close();
    }
}