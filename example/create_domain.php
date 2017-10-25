<?php

require __DIR__ . '/../autoload.php';

use DNS\Auth;
use DNS\Module\Domain;

//需要先运行 source env.sh
$api_key = getenv("DNS_API_KEY");
$api_secret = getenv("DNS_API_SECRET");

function callback($func) {
    list($ret, $error) = $func;
    if($error != NULL) {
        echo "网络错误\n";
    } elseif($ret["code"] > 0) {
        var_dump($ret);
    } else {
        var_dump($ret);
    }
}

$auth = new Auth($api_key, $api_secret);

$d = new Domain($auth);

callback($d->getDomainList([]));

callback($d->getDomain(['domainID'=> 64418650]));

callback($d->addDomain(['domain'=> 'dns.com']));

callback($d->searchDomain(['query'=> 'ct']));
