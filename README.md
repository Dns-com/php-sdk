# DNS SDK for PHP
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![@dns on weibo](http://img.shields.io/badge/weibo-%4051dnscom-blue.svg)](http://weibo.com/51dnscom)

## 使用方法

### 上传
```php
use DNS\Auth;
use DNS\Module\Domain;

    $auth = new Auth($accessKey, $secretKey);
    $d = new Domain($auth);
    list($ret, $error)  = $d->addDomain(['domain'=> 'dns.com']

```

## 联系我们

- 如果需要帮助，请提交工单（或者直接向 kf@dns.com 发送邮件，转程序猿）
- 如果发现了bug， 欢迎提交 [issue](https://github.com/dns-com/php-sdk/issues)
- 如果有功能需求，欢迎提交 [issue](https://github.com/dns-com/php-sdk/issues)
- 如果要提交代码，欢迎提交 pull request

## 代码许可

The MIT License (MIT).详情见 [License文件](https://github.com/dns-com/php-sdk/blob/master/LICENSE).

[packagist]: http://packagist.org
[install-packagist]: https://packagist.org/packages/dns-com/php-sdk``