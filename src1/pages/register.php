<?php

// 0 解决中文乱码
include "./base.php";
//获取前段POST传递的数据
$uname = $_POST['username'];
$pword = $_POST['password'];

//把用户信息存储在数据库里面
    //连接数据库
    $conn = mysqli_connect('localhost','root','root','music');
    //执行sql语句
    $sql = "INSERT INTO `login` VALUES (null,'$uname','$pword')";
    $res = mysqli_query($conn,$sql);
    // 不需要解析数据
    // 断开连接
    mysqli_close($conn);

    if($res){
        //如果$res为true,说明插入成功
        //跳转登录页面
        header('Location: http://localhost/src1/pages/login.html');
    }else{
        //如果$res为false,说明$sql有语法错误
    echo "服务器错误";
    }
?>