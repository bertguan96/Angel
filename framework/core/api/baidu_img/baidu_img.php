<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/22
 * Time: 0:32
 */

interface baidu_img {
    /**
     * 图片文字识别
     * @param $filePath 需要识别的文字路径
     * @param $type 选择识别模式
     * @param $setParams 设置参数，只有在type不为空的时候才可以setParams
     * @return mixed json结果
     */
    public function word_Recognition($filePath,$type = null,$setParams  = null);
}