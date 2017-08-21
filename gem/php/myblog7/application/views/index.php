<?php
    $loginedUser = $this->session->userdata('loginedUser');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <title><?php echo $loginedUser -> username; ?> 的博客 - 个人博客</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
    <style type="text/css">
        body, table, input, textarea, select {
            font-family: Verdana, sans-serif, 宋体;
        }
    </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {
    padding: 3px 10px 3px 10px;
}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {
    padding: 3px 10px 4px 10px;
}</style>
<![endif]-->
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
    <div id="OSC_Banner">
        <div id="OSC_Slogon"><?php echo $loginedUser -> username;?>'s Blog</div>
        <div id="OSC_Channels">
            <ul>
                <li><a href="#" class="project"><?php echo $loginedUser -> mood;?></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <!-- #EndLibraryItem -->
    <div id="OSC_Topbar">
        <div id="VisitorInfo">
            当前访客身份：
            <?php
            if($loginedUser -> username){
                ?>
                <?php echo $loginedUser -> username;?> [<a href="welcome/logout">退出</a> ]
                <?php
            }else{
                ?>
                游客 [ <a href="welcome/login">登录</a> | <a href="welcome/reg">注册</a> ]
                <?php
            }
            ?>
				<span id="OSC_Notification">
			<a href="inbox.htm" class="msgbox" title="进入我的留言箱">你有<em>0</em>新留言</a>
																				</span>
        </div>
        <div id="SearchBar">
            <form action="#">
                <input name="user" value="154693" type="hidden">
                <input id="txt_q" name="q" class="SERACH" value="在此空间的博客中搜索"
                       onblur="(this.value=='')?this.value='在此空间的博客中搜索':this.value"
                       onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
                <input class="SUBMIT" value="搜索" type="submit">
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div id="OSC_Content">
        <div class="SpaceChannel">
            <div id="portrait"><a href="adminIndex.htm"><img src="images/portrait.gif" alt="Johnny" title="Johnny"
                                                             class="SmallPortrait" user="154693" align="absmiddle"></a>
            </div>
            <div id="lnks">
                <strong><?php echo $loginedUser -> username;?> 的博客</strong>

                <div><a href="index_logined.htm">TA的博客列表</a>&nbsp;|
                    <a href="sendMsg.htm">发送留言</a></div>
            </div>
                <div class="clear"></div>
        </div>
        <div class="BlogList">
            <ul>
                <?php
                    foreach($articles as $article){
                ?>
                <li class="Blog">
                    <h2><a href="viewPost_comment.htm"><?php echo $article -> title;?></a></h2>

                    <div class="outline">
                        <span class="time">发表于 <?php echo $article -> post_date;?></span>
                        <span class="catalog">分类: <a href="#"><?php echo $article -> type_name;?></a></span>
                        <span class="stat">统计: 1评/4阅</span>
                        <span class="blog_admin">( <a href="newBlog.htm">修改</a> | <a
                                href="javascript:delete_blog(24027)">删除</a> )</span>
                    </div>
                    <div class="TextContent" id="blog_content_24027">
                        <?php echo $article -> content;?>
                        <div class="fullcontent"><a href="viewPost_comment.htm">阅读全文...</a></div>
                    </div>
                </li>
                <?php }?>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="BlogMenu">
            <div class="admin SpaceModule">
                <strong>博客管理</strong>
                <ul class="LinkLine">
                    <li><a href="newBlog.htm">发表博客</a></li>
                    <li><a href="blogCatalogs.htm">博客分类管理</a></li>
                    <li><a href="blogs.htm">文章管理</a></li>
                    <li><a href="blogComments.htm">网友评论管理</a></li>
                </ul>
            </div>
            <div class="catalogs SpaceModule">
                <strong>博客分类</strong>
                <ul class="LinkLine">
                    <?php
                        foreach($types as $type) {
                    ?>
                        <li><a href="#"><?php echo $type -> type_name;?>(<?php echo $type -> num;?>)</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="comments SpaceModule">
                <strong>最新网友评论</strong>
                <ul>
                    <li>
                        <span class="u"><a href="#"><img src="images/portrait.gif" alt="Johnny" title="Johnny"
                                                         class="SmallPortrait" user="154693"
                                                         align="absmiddle"></a></span>
		<span class="c">hoho
			<span class="t">发布于 11分钟前 <a href="viewPost_comment.htm">查看»</a></span>
		</span>

                        <div class="clear"></div>
                    </li>
                    <li>
                        <span class="u"><a href="#"><img src="images/portrait.gif" alt="Johnny" title="Johnny"
                                                         class="SmallPortrait" user="154693"
                                                         align="absmiddle"></a></span>
		<span class="c">测试评论111
			<span class="t">发布于 34分钟前 <a href="viewPost_logined.htm">查看»</a></span>
		</span>

                        <div class="clear"></div>
                    </li>
                    <li>
                        <span class="u"><a href="#"><img src="images/portrait.gif" alt="Johnny" title="Johnny"
                                                         class="SmallPortrait" user="154693"
                                                         align="absmiddle"></a></span>
		<span class="c">测试评论
			<span class="t">发布于 34分钟前 <a href="viewPost_logined.htm">查看»</a></span>
		</span>

                        <div class="clear"></div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div id="OSC_Footer">© 唯创网讯</div>
</div>
</div>

</body>
</html>