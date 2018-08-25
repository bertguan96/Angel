<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/22
 * Time: 0:14
 */

require_once '../../../../framework/libraries/api-baidu/AipSpeech.php';
class Api_speech
{
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
        return new AipSpeech($this->APP_ID, $this->API_KEY, $this->SECRET_KEY);
    }

}