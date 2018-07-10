<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/10
 * Time: 15:12
 */
/**
 * 解析前台过来的url，
 */
if (!empty($_REQUEST['action'])) {
    try {
        $action = explode('/', $_REQUEST['action']);
        $class_name = $action[0];
        $method_name = $action[1];
        require $class_name . '.php';
        $class = new ReflectionClass($class_name);
        if (class_exists($class_name)) {
            if ($class->hasMethod($method_name)) {
                $func = $class->getmethod($method_name);
                $instance = $class->newInstance();
                $func->invokeArgs($instance, array($_REQUEST));
                $result = $instance->getResult();
                echo $result;
            }
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}