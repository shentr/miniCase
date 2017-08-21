<?php
$loginedUser = $this->session->userdata('loginedUser');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <title>博客文章管理</title>
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
    <?php include 'admin_header.php'; ?>

    <div id="OSC_Content">
        <div id="AdminScreen">
            <div id="AdminPath">
                <a href="index_logined.htm">返回我的首页</a>&nbsp;»
                <span id="AdminTitle">博客文章管理</span>
            </div>
            <?php include 'admin_menu.php'; ?>
            <div id="AdminContent">
                <div class="MainForm BlogArticleManage">
                    <h3 class="title">共有 3 篇博客，每页显示 40 个，共 1 页</h3>

                    <div id="BlogOpts">
                        <a href="javascript:;">全选</a>&nbsp;|
                        <a href="javascript:;">取消</a>&nbsp;|
                        <a href="javascript:;">反向选择</a>&nbsp;|
                        <a href="javascript:;" id="btnDel">删除选中</a>
                    </div>
                    <ul>
                        <?php
                            foreach($articles as $article) {
                        ?>
                        <li class="row_1">
                            <input name="article_id" value="<?php echo $article->article_id;?>" type="checkbox">
                            <a href="admin/get_blog_by_id?id=<?php echo $article->article_id;?>" target="_blank"><?php echo $article->title;?></a>
                            <small><?php echo $article->post_date;?></small>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>

            </div>
            <div class="clear"></div>
        </div>

    </div>
    <div class="clear"></div>
    <div id="OSC_Footer">© 唯创网讯</div>
</div>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<script>
    $(function(){
        $('#btnDel').on('click', function(){
            if( confirm('是否删除指定文章，不可恢复!') ){
                var str = "";
                $(':checked').each(function(){
                    str += this.value + ',';//1,2,3,
                });
                str = str.slice(0, -1);//1,2,3
                //url, data, callback, dataType
                $.get('admin/delete_articles', {
                    'ids': str
                }, function(data){
                    if(data == 'success'){
                        $(':checked').parent().fadeOut(1000, function(){
                            $(this).remove();
                        });
                    }else{
                        alert('删除失败!');
                    }
                }, 'text');
                //http://localhost/myblog/admin/delete_articles?ids=2,3
            }
        });
    });
</script>
</body>
</html>