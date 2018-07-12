<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/12
 * Time: 10:35
 */
require "mySqlConfig.php";
require "../helpers/tools/XMLUtils.php";
require "../helpers/configs/config.php";

class DBHelper{

    /**
     * @var  连接池大小
     */
    private $poolSize;

    /**
     * @var 文件路径
     */
    private $filePath;
    /**
     * @var array 连接池
     */
    private $dbPool;

    function __construct()
    {
        $this -> filePath = "../../application/config/DataBase.XML";
        if(!file_exists($this -> filePath)){
            throw new RuntimeException ( "<mark>配置文件文件丢失，无法进行配置文件的初始化操作！</mark><br />" );
        } else {
            $this -> filePath = $this -> filePath;
        }
        $dbConfig = new XMLUtils( $this -> filePath);
        $config = $dbConfig -> XMLAnalysis();
        $dbType = strtolower($config ->DB_type);
        global $conn;
        if($dbType == 'mysql'){
            // 准备好数据库连接池“伪队列”
            $this->poolSize = $config->DB_max_con;
            $this->dbPool = array ();
            for($index = 1; $index <= $this->poolSize; $index ++) {
                $conn = getMysqlConnection($config);
                array_push ( $this->dbPool, $conn );
            }
        }else{
            // TODO sqlserver数据库连接方式
        }
    }


    /**
     * 从数据库连接池中获取一个数据库链接资源
     *
     * @throws ErrorException
     * @return mixed
     */
    public function getConn() {
        if (count ( $this->dbPool ) <= 0) {
            throw new ErrorException ( "<mark>数据库连接池中已无链接资源，请稍后重试!</mark>" );
        } else {
            return array_pop ( $this->dbPool );
        }
    }

    /**
     * 将用完的数据库链接资源放回到数据库连接池
     *
     * @param unknown $conn
     * @throws ErrorException
     */
    public function release($conn) {
        if (count ( $this->dbPool ) >= $this->poolSize) {
            throw new ErrorException ( "<mark>数据库连接池已满</mark><br />" );
        } else {
            array_push ( $this->dbPool, $conn );
        }
    }
}