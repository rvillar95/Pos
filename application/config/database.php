<?php

defined('BASEPATH') or exit('No direct script access allowed');

$active_group = 'local';
$query_builder = TRUE;


$db['local'] = array(
    'dsn'    => '',
    'hostname' => '186.106.219.248',
    'username' => 'pymesoft',
    'password' => '405719',
    'database' => 'ps_empresas',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => '3306',
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
/*
$db['original'] = array(
    'dsn'    => '',
    'hostname' => '186.106.219.248',
    'username' => 'pymesoft',
    'password' => '405719',
    'database' => 'ps_empresas',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => '3306',
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
*/