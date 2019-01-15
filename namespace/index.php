<?php

use Codecourse\Repositories\UserRepository as UserRepository;
use Codecourse\AuthFilter as AuthFilter;

require_once 'app/start.php';

$user = new UserRepository();
$authfilter = new AuthFilter();

 ?>