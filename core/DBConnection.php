<?php

namespace app\core;

use mysqli;

class DBConnection
{
    public $mysql;

    public function __construct()
    {
        $this->mysql = new mysqli("localhost", "root","", "news") or die(mysqli_error($this->mysql));

    }

}