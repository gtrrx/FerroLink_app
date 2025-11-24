<?php
if (!file_exists('.env')) return;

$env = parse_ini_file('.env');

foreach ($env as $key => $value) {
    putenv("$key=$value");
}