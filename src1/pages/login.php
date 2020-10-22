<?php
mysqli_connect('localhost:3306','root','root','music');
/* 
    接收前端传递的数据
        ==>在php里面有一些预定的变量 
            ==>php本身自带的变量
        ==>预定义变量里面有什么
            ==>$_GET
            ==>$_POST
            ==>......
        ==>$_GET这个变量是一个关联型数组
            ==>存储的是前端以get方式传递的信息
            ==>例子:前端通过地址栏传递数据:?name=张三&password=123456&sex=男
                ==>后端通过$_GET可以获取:array('name'=>'张三','password'=>'123456','sex'=>'男')
            ==>如果想要获取前端传递来的数据,就从这个关联数组里面拿出来就可以了
                ==>从关联数组里面获取数据
                ==>数组名称['要获取的key']
*/


include "./base.php";
//1 测试前端参数
// print_r($_GET['name']);
// print_r($_GET['password']);
// print_r($_GET['sex']);

/* 
出现这个错误是因为:请求php页面的时候没有带参数
    Notice: Undefined index: name in F:\code\07login.php on line 22
    Notice: Undefined index: password in F:\code\07login.php on line 23
    Notice: Undefined index: sex in F:\code\07login.php on line 24
*/


//2 登陆功能

//第一步:获取前端传递的用户名和密码
$password = $_GET['password'];
$username = $_GET['username'];

//第二步:判断是否有这个用户名和密码===>在数据库查询是否用该条数据
    //连接数据库
    $conn = mysqli_connect('localhost','root','root','music');
    //执行sql语句
    $sql = "SELECT * FROM `login` WHERE `username`='$username' AND `password`='$password'";
    $res = mysqli_query($conn,$sql);
    //解析结果:不需要全部解析,结果要么是1条,要么是没有
    $row = mysqli_fetch_assoc($res);//mysqli_fetch_assoc方法是解析一条数据的

    
//第三步:把查询结果返回给前端
    if($row){
        //如果有解析成功的结果用户登陆成功以后,自动跳转到购物车页面
        header('Location: http://localhost/src1/pages/XM.html');
    }else{
        //如果解析不成功,告诉用户登录失败
        echo '用户名或者密码错误';
    }

?>