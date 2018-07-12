<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/12
 * Time: 10:10
 */

/**
 * Class XMLUtils
 * XML解析工具
 */
class XMLUtils {

    /**
     * @var 文件路径
     */
    private $filePath;

    /**
     * XMLUtils constructor.
     * @param $filePath 文件路径
     */
    function __construct($filePath)
    {
        $this -> filePath = $filePath;
    }

    function XMLAnalysis(){
        $con = file_get_contents($this -> filePath);
        /**
         * XML文件标签
         */
        $xmlTag = array(
            "DB_url",
            "DB_username",
            "DB_password",
            "DB_name",
            "DB_max_con",
            "DB_release_time",
            "DB_type"
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
        define('DB_url', $data[0][$xmlTag[0]]);
        define('DB_username', $data[0][$xmlTag[1]]);
        define('DB_password', $data[0][$xmlTag[2]]);
        define('DB_name', $data[0][$xmlTag[3]]);
        define('DB_max_con', $data[0][$xmlTag[4]]);
        define('DB_release_time', $data[0][$xmlTag[5]]);
        define('DB_type',$data[0][$xmlTag[6]]);

        $config = new config(DB_url,DB_username,DB_password,DB_max_con,DB_release_time,DB_name,DB_type);

        return $config;
    }
}