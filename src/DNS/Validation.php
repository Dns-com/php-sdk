<?php 

namespace DNS;

class Validation
{
    public static function isExist($rule, $params)
    {
        foreach($rule as $v) {
            if(!isset($params[$v])) {
                throw new \Exception($v . " is required", 1);
            }
        }
    }
}