<?php
// @codingStandardsIgnoreFile
require_once __DIR__.'/../autoload.php';

use DNS\Auth;

$api_key = getenv("DNS_API_KEY");
$api_secret = getenv("DNS_API_SECRET");
$testAuth = new Auth($api_key, $api_secret);