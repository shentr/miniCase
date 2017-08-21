<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户列表</title>
    <base href="<?php echo site_url(); ?>">
</head>
<body>
    <h1>用户列表</h1>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>用户名</td>
            <td>密码</td>
            <td>修改</td>
            <td>删除</td>
        </tr>
        <?php
            foreach ($userlist as $user){
                echo "<tr>";
                echo "<td>".$user->id."</td>";
                echo "<td>".$user->username."</td>";
                echo "<td>".$user->password."</td>";
                echo "<td><a href=''>修改</a></td>";
                echo "<td><a href='user/del_user?id=$user->id'>删除</a></td>";
                echo "</tr>";
            }
        ?>
    </table>




</body>
</html>