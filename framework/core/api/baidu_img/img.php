<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/22
 * Time: 0:37
 */

require "Api_ocr.php";

class img implements baidu_img
{
    private $client;

    function __construct($APP_ID,$API_KEY,$SECRET_KEY)
    {
        $conn = new Api_ocr($APP_ID,$API_KEY,$SECRET_KEY);
        $this->client = $conn->startApiSpeech();
    }

    /**
     * @param 需要识别的文字路径 $filePath
     * @param null|选择识别模式 $type
     * @param null|设置参数，只有在type不为空的时候才可以setParams $setParams
     * @return mixed|void
     */
    public function word_Recognition($filePath,$type = null,$setParams =null)
    {
        $image = file_get_contents($filePath);

        // 调用通用文字识别, 图片参数为本地图片
        $this->client->basicGeneral($image);

        // 如果有可选参数
        $options = array();
        $options["language_type"] = "CHN_ENG";
        $options["detect_direction"] = "true";
        $options["detect_language"] = "true";
        $options["probability"] = "true";

        // 带参数调用通用文字识别, 图片参数为本地图片
        $this->client->basicGeneral($image, $options);
        $url = "https//www.x.com/sample.jpg";

        // 调用通用文字识别, 图片参数为远程url图片
        $this->client->basicGeneralUrl($url);

        // 如果有可选参数
        $options = array();
        $options["language_type"] = "CHN_ENG";
        $options["detect_direction"] = "true";
        $options["detect_language"] = "true";
        $options["probability"] = "true";

        // 带参数调用通用文字识别, 图片参数为远程url图片
        $this->client->basicGeneralUrl($url, $options);
    }
}