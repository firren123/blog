<?php
//use tencentyun-api\qcloudapi-sdk-php\src\QcloudApi;
//use Tencentyun-api\qcloudapi-sdk-php\src\QcloudApi;
/**
 * Class TyunAction 腾讯云
 */
class TyunAction extends CommonAction
{
    public $SecretId = "AKID42oNm9OzjGbjfUuyhIimhU8bu11XmEbu";
    public $SecretKey = "KTTHzXuMAnT3Sf0Rnx8A0jV6MPhtupZ7";

    /**
     * xxxxxx
     */
    public function test()
    {
        $config = array('SecretId' => $this->SecretId,
            'SecretKey' => $this->SecretKey,
            'RequestMethod' => 'POST'
        );

        $service = QcloudApi::load(QcloudApi::MODULE_YUNSOU, $config);
        // 重新设置region
        $region = 'sh';
        $service->setConfigDefaultRegion($region);
        // 请求参数，请参考产品文档对应接口的说明

        $package = [
            'contents.4.id'=>8,
            'contents.4.title'=>"title3",
            'contents.4.content'=>"content3",
            'contents.4.summary'=>"summary3",
            'contents.3.id'=>9,
            'contents.3.title'=>"title4",
            'contents.3.content'=>"content4",
            'contents.3.summary'=>"summary4",
        ];
        $package['op_type'] = 'add';
        $package['appId'] = '64650002';

        $service->DataManipulation($package);

        // 生成请求的URL，不发起请求
//        $a = $service->generateUrl('DataManipulation', $package);
        $respStr = $service->getLastResponse();
//        $resp = json_decode($respStr);
//        var_dump($resp);exit;
        if ($respStr === false) {
            // 请求失败，解析错误信息
            $error = $service->getError();
            echo "Error code:" . $error->getCode() . ' message:' . $error->getMessage();

            // 对于异步任务接口，可以通过下面的方法获取对应任务执行的信息
            $detail = $error->getExt();
        } else {
            // 请求成功
            echo $respStr;exit;
        }
    }


    function index()
    {
        $contents = [
            ['id' => 123, 'title' => 'title123', 'content' => 'content123'],
            ['id' => 223, 'title' => 'title223', 'content' => 'content223'],
            ['id' => 323, 'title' => 'title323', 'content' => 'content4321']
        ];
        $arr = $this->pubstr();
//        echo json_encode($arr);exit;
        $arr['contents'] = $contents;
        ksort($arr);
        $str = $this->arrToStr($arr);
        $str = rtrim($str, "&");

        $url = $this->url . "/v2/index.php?" . $str;
        $Signature = $this->sign("GET" . $url);
        $str2 = $this->arrToStr($arr, "");
        $str2 = rtrim($str2, "&");

        $str2 .= "&Signature=" . urlencode($Signature);
        $dataurl = "https://" . $this->url . "/v2/index.php?" . $str2;
        echo $dataurl;// = urlencode($dataurl);
        exit;
        $data = file_get_contents($dataurl);
        echo $data;


    }

    public function arrToStr($arr, $path = "", $urlencode = false)
    {
        $str = "";
        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                $str .= self::arrToStr($value, "contents." . $key . ".", $urlencode);
            } else {
                if ($urlencode) {
                    $str .= $path . $key . "=" . urlencode($value) . "&";

                } else {
                    $str .= $path . $key . "=" . $value . "&";

                }
            }
        }
        return $str;

    }

//yunsou.api.qcloud.com
//https://domain/v2/index.php?Action=DataManipulation
//&op_type=add
//&appId=1
//&contents.0.NA=1000
//&contents.0.TA=test1
//&contents.0.TB=testtitle1
//&contents.0.TC=testcontent1
//&contents.1.NA=2000
//&contents.1.TA=test2
//&contents.1.TB=testtitle2
//&contents.1.TC=testcontent2
    public function pubstr()
    {
        return $arr = [
            'Timestamp' => time(),
            'Action' => 'DataManipulation',
            'Nonce' => rand(10000, 99999),
            'SecretId' => $this->SecretId,
            'op_type' => 'add',
            "appId" => "1255659740"

        ];

    }

    public function sign($srcStr)
    {
        $secretKey = $this->SecretKey;
        $signStr = base64_encode(hash_hmac('sha256', $srcStr, $secretKey, true));
        return $signStr;
    }
}