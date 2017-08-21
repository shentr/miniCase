<?php
$loginedUser = $this->session->userdata('loginedUser');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>Johnny的博客 - SYSIT个人博客</title>
	<base href="<?php echo site_url(); ?>">
      <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">

  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
  </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {padding: 3px 10px 3px 10px;}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {padding: 3px 10px 4px 10px;}</style>
<![endif]-->
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
	<?php include 'admin_header.php'; ?>

	<div id="OSC_Content">
<div id="AdminScreen">
    <div id="AdminPath">
        <a href="index_logined.htm">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle">管理首页</span>
    </div>
	<?php include 'admin_menu.php'; ?>
    <div id="AdminContent">
<div class="MainForm BlogCommentManage">
  <h3>共有 3 篇博客评论，每页显示 20 个，共 1 页</h3>
  <ul>
	  <?php foreach ($list as $result){?>
		<li id="cmt_24027_154693_261665734" class="row_1">
			<span class="portrait"><a href="#" target="_blank"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></span>
			<span class="comment">
				<div class="user"><b><?php echo $result->username?></b> 评论了 <a href="viewPost_comment.htm" target="_blank"><?php echo $result->title?></a></div>
				<div class="content"><p><?php echo $result->content?></p></div>
				<div class="opts">
					<span style="float:right;">
					<a href="admin/delete_comment?comment_id=<?php echo $result->comm_id?>">删除</a> |
					<a href="admin/delete_comment_by_commUser?commUser=<?php echo $result->user_id?>">删除此人所有评论</a>
					</span>
					<?php echo $result->post_date?>
				</div>
			</span>
			<div class="clear"></div>
	</li>
	  <?php }?>
	  </ul>
	<?php echo $page?>

</div>
</div>
	<div class="clear"></div>
</div>

</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 唯创</div>
</div>
</body></html>