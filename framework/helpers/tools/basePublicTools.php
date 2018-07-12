<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/11
 * Time: 23:56
 */

/**
 * Class basePublicTools
 * 基础公共工具
 */
class basePublicTools{

    /**
     * xml解析工具（暂时不启用，缺少高效读取SQL方法）
     * @param $filePath
     */
    private function  SQLXMLUtil($filePath){
        $con = file_get_contents($filePath);
        /**
         * XML文件标签
         */
        $xmlTag = array(
            "SQL",
            "SQL_type",
            "SQL_method",
            "SQL_content"
        );
        $arr = array();
        /**
         * 遍历标签
         */
        foreach($xmlTag as $x){
            preg_match_all("/<".$x.">.*<\/".$x.">/", $con, $temp);
            $arr[] = $temp[0];
        }
        $data = array();
        foreach($arr as $key => $value) {
            foreach($value as $k => $v) {
                $a = explode($xmlTag[$key].'>', $v);
                $v = substr($a[1], 0, strlen($a[1])-2);
                $data[$k][$xmlTag[$key]] = $v;
            }
        }

    }
}