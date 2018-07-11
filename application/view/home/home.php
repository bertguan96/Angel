<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/10
 * Time: 21:52
 */
require "../../models/home/home.php";

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Angel的博客</title>
    <script language="javascript">
        function isConfirm() {
            return confirm("删除该条记录？");
        }
    </script>
    <style type="text/css">

    </style>
</head>
<body>
<div class="headerClass">
    <div></div>
</div>
<table width="800" border="1" cellpadding="0" cellspacing="1">
    <tr bgcolor="#CCCCCC">
        <th scope="col">编&nbsp;&nbsp;&nbsp;&nbsp;号</th>
        <th scope="col">类型</th>
        <th scope="col">名称</th>
        <th scope="col">数量</th>
        <th scope="col">价格</th>
        <th scope="col">日期</th>
        <th scope="col">状态</th>
        <th scope="col">操&nbsp;&nbsp;&nbsp;&nbsp;作</th>
    </tr>
    <?php
    if ($total) {
        //分页查询的SQL语句
        $sql_page = 'select * from commodity limit ' . ($page - 1) * $page_size . ',' . $page_size;
        $result = mysqli_query($conn, $sql_page) OR die("<br/>ERROR: <b>" . mysqli_error($conn) . "</b><br/>产生问题的SQL：" . $sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
            <tr align="center">
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['Category']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Num']; ?></td>
                <td><?php echo $row['Price']; ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo '<a href=updateUser.php?id=' . $row['Id'] . '>修改</a>'; ?>&nbsp;
                    <?php echo '<a href=deleteUser.php?id=' . $row['Id'] . ' onclick="return isConfirm()">删除</a>'; ?>
                </td>
            </tr>
            <?php
        }
    }
    mysqli_free_result($result); //释放查询结果集占用的内存资源

    ?>
</table>
<?php
if ($total) {
    //如果总数据量小于$page_size，则只有一页
    if ($total < $page_size)
        $page_count = 1;
    //如果有余数，则总页数等于总记录数除以页数的结果取整再加1
    if ($total % $page_size)
        $page_count = (int)($total / $page_size) + 1;
    else  //如果没有余数，则页数等于总记录数除以页数的结果
        $page_count = $total / $page_size;
} else {
    $page_count = 0;
}
//创建翻页链接
$turn_page = '';
if ($page == 1) {
    $turn_page .= '首页  |  上一页  |';
} else {
    $turn_page .= '<a href=demo2.php?page=1>首页</a>  |  <a href=demo2.php?page=' . ($page - 1) . '>上一页</a>  |';
}
if ($page == $page_count || $page_count == 0) {
    $turn_page .= '  下一页  |  尾页';
} else {
    $turn_page .= '<a href=demo2.php?page=' . ($page + 1) . '>  下一页</a>  |  <a href=demo2.php?page=' . $page_count . '>尾页</a>  |';
}
echo $turn_page; //输出分页字符
mysqli_close($conn);
?>
</body>
</html>