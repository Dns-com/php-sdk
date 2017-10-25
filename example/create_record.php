<?php

require __DIR__ . '/../autoload.php';

use DNS\Auth;
use DNS\Module\Record;

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

$r = new Record($auth);

callback($r->addRecord([
    "domainID"=>64418650,
    "value"=>"10.10.10.10",

    "type"=>"A",
    "viewID"=>"0",
    "host"=>"@",
    "TTL"=>"600",
    "mx"=>"",
    "remark"=>"添加解析",
]));