<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 2019/1/15
 * Time: 6:18 PM
 */

use Dongkaipo\Aliyun\Green;
use Green\Request\V20180509\TextScanRequest;

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
try {
    $response = $client->getAcsResponse($request);

    print_r($response);
//            if (200 == $response->code) {
//                $taskResults = $response->data;
//                foreach ($taskResults as $taskResult) {
//                    if (200 == $taskResult->code) {
//                        $sceneResults = $taskResult->results;
//                        foreach ($sceneResults as $sceneResult) {
//                            $scene = $sceneResult->scene;
//                            $suggestion = $sceneResult->suggestion;
//                            //根据scene和suggetion做相关处理
//                            //do something
//                            print_r($scene);
//                            print_r($suggestion);
//                        }
//                    } else {
//                        print_r("task process fail:" + $response->code);
//                    }
//                }
//            } else {
//                print_r("detect not success. code:" + $response->code);
//            }
} catch (Exception $e) {
    print_r($e);
}