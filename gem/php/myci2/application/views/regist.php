<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <base href="<?php echo site_url();?>">
    <style>
        .error{
            color: #f00;
        }
    </style>
</head>
<body>
<form action="welcome/save" method="post">
    <p>
        用户名： <input type="text" name="username">
                <span class="error">
                    <?php echo isset($err_name)?$err_name:"";?>
                </span>
    </p>
    <p>
        密码：<input type="password" name="password">
        <span class="error">
                    <?php echo isset($err_pwd)?$err_pwd:"";?>
                </span>
    </p>
    <p>
        确认密码：<input type="password" name="repassword">
    </p>
    <p>
        <input type="submit" value="注册">
    </p>
</form>
</body>
</html>