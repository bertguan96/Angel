<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/10
 * Time: 21:57
 */
/**
 * 导入数据库配置
 * 导入基础查询方法baseFunction
 */
require "../../../framework/database/dbConfig.php";
require "../../../framework/core/select.php";

class home{

    private $baseFunction;

    function __construct()
    {
        $this -> baseFunction = new select();
    }

    /**
     * 获取导航栏，从数据库中，返回存为一个Map
     * key   -> 字段
     * value -> 参数
     */
    function getHeaderBars() {
        $tableName = "angel_navbar";
        $this->baseFunction ->getNarBar($tableName);
    }
    /**
     * 获取最新文章
     * @param $num 获取单次条数（获取最近发布的文章并展示到页面上去）
     */
    function getArticles($num) {

    }

    /**
     * 获取联系方式
     */
    function getContact() {

    }

    /**
     * 根据文章ID获取文章详情
     * @param $id 文章ID
     */
    function getArticleContent($id){

    }
}