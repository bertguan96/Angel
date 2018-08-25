<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/22
 * Time: 0:35
 */
require_once '../../../../framework/libraries/api-baidu/AipOcr.php';

class Api_ocr{
    private $APP_ID;

    private $API_KEY;

    private $SECRET_KEY;

    function __construct($APP_ID,$API_KEY,$SECRET_KEY)
    {
        $this->APP_ID = $APP_ID;
        $this->API_KEY = $API_KEY;
        $this->SECRET_KEY = $SECRET_KEY;
    }

    function startApiSpeech(){
        return new AipOcr($this->APP_ID, $this->API_KEY, $this->SECRET_KEY);
    }
}