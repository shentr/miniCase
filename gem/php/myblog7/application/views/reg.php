<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <title>申请账号 - 个人博客</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="assets/css/oschina2011.css" type="text/css" media="screen">
    <link rel="stylesheet" href="assets/css/thickbox.css" type="text/css" media="screen">
    <link rel="stylesheet" href="assets/css/osc-popup.css" type="text/css" media="screen">
    <style type="text/css">
        body, table, input, textarea, select {
            font-family: Verdana, Simsun, sans-serif;
        }
    </style>
</head>
<body>
<div id="OSC_Screen">
    <div id="OSC_Content" class="CenterDiv">
        <style>
            #OSC_Footer {
                border: 0;
            }

            .MainForm tr.hl th {
                border: 1px solid #C00;
                border-right: 0;
                background: #FEE;
            }

            .MainForm tr.hl td {
                border: 1px solid #C00;
                border-left: 0;
                background: #FEE;
            }

            .MainForm td .nodisp {
                display: none;
                padding-left: 20px;
            }

            .MainForm tr.hl td .nodisp {
                display: inline;
                color: #C00;
                font-size: 11pt;
            }

            #OSChinaLoginTip {
                font-size: 10.5pt;
                padding: 0 0 20px 10px;
                color: #060;
            }

            #OSChinaLoginTip ul {
                margin: 10px 0 0 0;
            }

            #OSChinaLoginTip ul li {
                float: left;
                width: 90px;
                margin-right: 30px;
            }

            #OSChinaLoginTip ul li#openid_gmail img {
                margin-top: 8px;
            }

            #OSChinaLoginTip ul li#openid_yahoo img {
                margin-top: 15px;
            }

            #OSChinaLoginTip ul li#openid_msn img {
            }

            #OSChinaLoginTip ul li a {
                display: block;
                height: 40px;
            }

            #OSChinaLoginTip ul li a {
                border: 1px solid #fff;
                padding: 2px;
            }

            #OSChinaLoginTip ul li a:hover {
                border: 1px solid #40AA53;
                background: #cfc;
            }
        </style>

        <div class="MainForm" id="reg_page">
            <form id="frm_reg" action="welcome/do_reg" method="POST" style="float:left; width:620px;">
                <h2>申请<span style="color: #006600;"> MyBlog</span> 账号，已经申请的请点击<a href="login.htm">这里</a>登录</h2>

                <div id="error_msg" class="error_msg" style="display:none"></div>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr id="tr_email">
                        <th nowrap="nowrap">电子邮箱：</th>
                        <td>
                            <input name="email" id="email" class="TEXT" style="width: 200px;" type="text">
                            <span id="email_tip"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>姓名：</th>
                        <td><input name="username" id="username" maxlength="20" class="TEXT" style="width: 150px;"
                                   type="text">
                            <span id="name_msg">不能超过10个字</span>
                        </td>
                    </tr>
                    <tr>
                        <th>登录密码：</th>
                        <td><input name="password" id="password" class="TEXT" style="width: 150px;" type="password">
                            <span id="password_msg"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>密码确认：</th>
                        <td>
                            <input name="password2" id="password2" class="TEXT" style="width: 150px;" type="password">
                            <span id="password2_msg"></span>
                        </td>
                    </tr>
                    <tr id="tr_gender">
                        <th>性别：</th>
                        <td>
                            <input name="gender" value="1" id="gender_1" type="radio"><label for="gender_1">男</label>&nbsp;&nbsp;&nbsp;
                            <input name="gender" value="2" id="gender_2" type="radio"><label for="gender_2">女</label>
                            <span id="gender_msg"></span>
                        </td>
                    </tr>
                    <tr id="tr_area">
                        <th>居住地区：</th>
                        <td>
                            <select name="province" id="province">
                                <option value="-1">请选择省份</option>
                            </select>
                            <select name="city" id="city">
                                <option value="-1">请选择城市</option>
                            </select>
                            <span id="area_msg"></span>
                        </td>
                    </tr>
                    <tr class="buttons">
                        <th>&nbsp;</th>
                        <td style="padding: 20px 0pt;">
                            <input value=" 注册新用户 " class="BUTTON SUBMIT" type="submit" id="submit">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <div id="reg_tip" class="tipbox" style="float:right;width:300px;">
                <h3>为什么要注册？</h3>
                <ol>
                    <li>发布博客</li>
                    <li>参与博客的讨论和评论</li>
                    <li>认识更多朋友</li>
                </ol>
                <h3 style="margin-top:20px;">为什么总提示验证码错误？</h3>
                <ol>
                    <li>首先请确定浏览器已经启用Cookie</li>
                    <li>实在不行，邮件给我们 admin@sysit.org</li>
                </ol>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="OSC_Footer">© 唯创网讯</div>
</div>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/city.js"></script>
<script>
    $(function(){
        //初始化省市二级联动
        ganged.init({
            provinceSelector: '#province',
            citySelector: '#city'
        });

        var opts = {
            bSubmit: true
        };//标识可以提交

        $('#username').on('blur', function(e, param){
            //四个参数：url, data, callback, dataType
            $.get('welcome/check_name', {
                uname: this.value
            }, function(data){
                if(data == 'success'){
                    $('#name_msg').html('勾');
                }else{
                    $('#name_msg').html('叉');
                    param && (param.bSubmit = false);
                }
            }, 'text');

        });
        $('#email').on('blur', function(e, param){
            if(this.value.indexOf('@') == -1){
                $('#email_tip').html('请输入有效的email!');
                param && (param.bSubmit = false);
            }else{
                $('#email_tip').html('');
            }
        });
        $('#password').on('keyup', function(){
            if(this.value.length < 4){
                $('#password_msg').html('至少四位!');
            }else{
                $('#password_msg').html('');
            }
        });
        $('#password2').on('blur', function(){
            if(this.value != $('#password').val()){
                $('#password2_msg').html('两次密码不一致!');
            }else{
                $('#password2_msg').html('');
            }
        });
        $('#frm_reg').on('submit', function(){

            $('#email').trigger('blur', opts);
            $('#username').trigger('blur', opts);

            if($('[name=gender]:checked').length == 0){
                $('#gender_msg').html('请选择性别!');
                opts.bSubmit = false;
            }

            return opts.bSubmit;
        });
    });
</script>
</body>
</html>