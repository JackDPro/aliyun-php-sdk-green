<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 2018/9/20
 * Time: 下午1:15
 */


use Dongkaipo\Aliyun\Green;
use Green\Request\V20180509\TextScanRequest;
use PHPUnit\Framework\TestCase;

class GreenTest extends TestCase
{

    public function testHello()
    {
        $region = 'cn-beijing';
        $accessId = getenv('ALIYUN_ACCESS_KEY_ID');
        $accessKey = getenv('ALIYUN_ACCESS_KEY_SECRET');
        $green = new Green($accessId, $accessKey, $region);
        $client = $green->getClient();

        # build request
        $request = new TextScanRequest();
        $request->setMethod("POST");
        $request->setAcceptFormat("JSON");
        $task1 = array('dataId' => uniqid(),
            'content' => '你真棒'
        );
        $request->setContent(json_encode(array("tasks" => array($task1), "scenes" => array("antispam"))));

        # run request
        $response = $client->getAcsResponse($request);
        $this->assertEquals(200, $response->code);
    }


}