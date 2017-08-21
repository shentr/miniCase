<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
<!--    <base href="--><?php //echo site_url(); ?><!--">-->
</head>
<body>
    <img src="img/logo.png" alt="">
    <form action="user/regist" method="post">
        用户名: <input type="text" name="username"><br>
        密码: <input type="password" name="password"><br>
        <input type="submit" value="登录" name="btn_type">
        <input type="submit" value="注册" name="btn_type">
    </form>
</body>
</html>