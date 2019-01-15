<?php

namespace Dongkaipo\Aliyun;

use Aliyun\Core\DefaultAcsClient;
use Aliyun\Core\Profile\DefaultProfile;

class Green
{
    private $accessKeyId = '';
    private $accessKeySecret = '';
    private $region;

    function __construct($accessKeyId, $accessKeySecret, $region = 'cn-beijing')
    {
        date_default_timezone_set("PRC");
        $this->accessKeyId = $accessKeyId;
        $this->accessKeySecret = $accessKeySecret;
        $this->region = $region;
    }

    public function getClient()
    {
        $iClientProfile = DefaultProfile::getProfile($this->region, $this->accessKeyId, $this->accessKeySecret);
        DefaultProfile::addEndpoint($this->region, $this->region, "Green", "green.$this->region.aliyuncs.com");
        $client = new DefaultAcsClient($iClientProfile);
        return $client;
    }


}
