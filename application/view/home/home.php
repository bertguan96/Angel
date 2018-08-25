<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/21
 * Time: 22:59
 */

?>
<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="UTF-8">
    <title>home</title>
    <script src="../resource/javascript/jquery-3.2.1.js" type="javascript"></script>
    <script src="../resource/javascript/bootstrap.js" type="javascript"></script>
    <script src="../resource/angularJs/angular.js" type="javascript"></script>
    <script src="../resource/angularJs/angular-route.js" type="javascript"></script>
    <script src="../resource/angularJs/myroute.js" type="javascript"></script>
    <script src="../resource/tools/tools.js" type="javascript"></script>
    <script src="../resource/javascript/home.js" type="javascript"></script>
</head>
<body ng-init="checkLogin()">
<div  style="float: left;width: 88%;height: 100%;">
    <div ng-view>

    </div>
    <div style="clear: both"></div>
</div>
</body>
</html>
