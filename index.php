<?php

date_default_timezone_set('UTC');

include_once 'alicloud-php-updaterecord/V20150109/AlicloudUpdateRecord.php';

use Roura\Alicloud\V20150109\AlicloudUpdateRecord;

$AccessKeyId     = getenv('ACCESS_KEY_ID');
$AccessKeySecret = getenv('ACCESS_KEY_SECRET');
$updater         = new AlicloudUpdateRecord($AccessKeyId, $AccessKeySecret);
$domainname      = getenv('DOMAIN_NAME');
$record          = getenv('RECORD_NAME');

$newIp = $_SERVER['REMOTE_ADDR']; // New IP

$updater->setDomainName($domainname);
$updater->setRecordType('A');
$updater->setRR($record);
$updater->setValue($newIp);

print_r($updater->sendRequest());
