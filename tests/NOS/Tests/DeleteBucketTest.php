<?php
namespace NOS\Tests;

use NOS\NosClient;
use NOS\Core\NosException;


class DeleteBucketTest extends \PHPUnit_Framework_TestCase
{
    private static $configs;
    private static $nosClient;
    private static $sleepTime;

    public  static function setUpBeforeClass()
    {
        self::$nosClient = new NosClient("7cf30204fe49413f8d1c7eface4682e9", "06d51b42585a48a582bc5ff174ced03c", "10.120.146.201:8090");
        self::$sleepTime = self::$configs['sleepTime'];
    }

    public function testDeleteBucketNotExist()
    {
        //$this->markTestSkipped('just skip');
        try {
            $bucketNotExist = 'php-sdk-test-bucket-not-exist';
            self::$nosClient->deleteBucket($bucketNotExist);
            $this->fail('no expected error!');
        } catch (NosException $e1) {
            echo 'HTTP Status: '.$e1->getHTTPStatus()."\n";
            echo 'ErrorCode: '.$e1->getErrorCode()."\n";
            echo 'Error Message: '.$e1->getErrorMessage()."\n";
            echo 'RequestId: '.$e1->getRequestId()."\n";
            $this->assertEquals(404, $e1->getHTTPStatus());
            $this->assertEquals("NoSuchBucket", $e1->getErrorCode());
        } catch (\Exception $e2) {
            $this->fail($e2);
        }
    }

    public function testDeleteBucketOwnByOthers()
    {
        //$this->markTestSkipped('just skip');
        try {
            $bucketNotExist = 'sdktest-private-other';
            self::$nosClient->deleteBucket($bucketNotExist);
            $this->fail('no expected error!');
        } catch (NosException $e1) {
            echo 'HTTP Status: '.$e1->getHTTPStatus()."\n";
            echo 'ErrorCode: '.$e1->getErrorCode()."\n";
            echo 'Error Message: '.$e1->getErrorMessage()."\n";
            echo "RequestId: ".$e1->getRequestId()."\n";
            $this->assertEquals(403, $e1->getHTTPStatus());
            $this->assertEquals("AccessDenied", $e1->getErrorCode());
        } catch (\Exception $e2) {
            $this->fail($e2);
        }
    }
}
