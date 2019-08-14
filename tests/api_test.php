<?php
use PHPUnit\Framework\TestCase;
class sampleTest extends TestCase
{
    public function testWebAPI_GET()
    {
        $client = new GuzzleHttp\Client();
        //get
        $res = $client->get('http://localhost/PHP_API/src/index.php',[
            'query'=>[
                'name'=>'GET',
                'email'=>'get@poo.com',
            ],
        ]);
        //取得 第2引数にtrueつけると連想配列
        $obj = json_decode($res->getBody());

        //取得
        $status = $obj->status;
        $message = $obj->message;
        $rows = $obj->data;

        //loop（参考）
        foreach ($rows as $row) {
            //echo $row->name;
        }
        //評価
        $this->assertEquals("OK",$status);
        $this->assertEquals("Hello GET.",$message);
        $this->assertRegExp('/^Hello.+\.$/',$message);
        $this->assertCount(2,$rows);
    }

    public function testWebAPI_POST()
    {
        $client = new GuzzleHttp\Client();
        //get
        $res = $client->post('http://localhost/PHP_API/src/index.php',[
            'query'=>[
                'name'=>'POST',
                'email'=>'poo@poo.com',
            ],
        ]);
        //取得 第2引数にtrueつけると連想配列
        $obj = json_decode($res->getBody());

        //取得
        $status = $obj->status;
        $message = $obj->message;
        $rows = $obj->data;

        //loop（参考）
        foreach ($rows as $row) {
            //echo $row->name;
        }
        //評価
        $this->assertEquals("OK",$status);
        $this->assertEquals("Hello POST.",$message);
        $this->assertRegExp('/^Hello.+\.$/',$message);
        $this->assertCount(2,$rows);
    }
    
}