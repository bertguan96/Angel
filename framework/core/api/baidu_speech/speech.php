<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/22
 * Time: 0:18
 */

require "Api_speech.php";

class speech implements baidu_speech
{
    private $client;

    function __construct($APP_ID,$API_KEY,$SECRET_KEY)
    {
        $conn = new Apispeech($APP_ID,$API_KEY,$SECRET_KEY);
        $this->client = $conn->startApiSpeech();
    }

    /**
     * @param $filePath 建立包含语音内容的Buffer对象, 语音文件的格式，pcm 或者 wav 或者 amr。不区分大小写
     * @param $format  语音文件的格式，pcm 或者 wav 或者 amr。不区分大小写。推荐pcm文件
     * @param $rate 采样率，16000，固定值
     * @param $dev_pid 	不填写lan参数生效，都不填写，默认1537（普通话 输入法模型），dev_pid参数见本节开头的表格
     * @li
     * dev_pid 参数列表
     *  dev_pid	      语言                        模型	  是否有标点	      备注
     *  1536	普通话(支持简单的英文识别)	     搜索模型	无标点	        支持自定义词库
     *  1537	普通话(纯中文识别)              输入法模型  有标点	       不支持自定义词库
     *  1737	英语		                                   有标点	       不支持自定义词库
     *  1637	粤语		                                   有标点	       不支持自定义词库
     *  1837	四川话		                               有标点	       不支持自定义词库
     *  1936	普通话远场                      远场模型	    有标点	             不支持
     * @return  array 返回json文件
     */
    public function api_Baidu_Speech_Recognition($filePath, $format,$rate,$dev_pid)
    {
        // 识别本地文件
        return $this->client->asr(file_get_contents($filePath), $format, $rate, array(
            'dev_pid' => $dev_pid,
        ));
    }

}