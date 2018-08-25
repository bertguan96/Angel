<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/22
 * Time: 0:04
 */

interface baidu_speech{
    public function api_Baidu_Speech_Recognition($filePath, $format, $rate,$dev_pid);
}