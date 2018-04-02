<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="theme.css" />
	<style>
	#editor{
		margin:0 auto;
		width:100%;
		height:425px;
	}
	#submit{
		text-align:left;
	}
	input[type=submit]{
		width:8%;
	}
	</style>
</head>
<body>
	<div>
		<!--文章编辑功能区：添加、删除、全选、撤销-->
		<input type="button" value="添加" onclick="/index.php/Admin/Index/add">
		<input type="button" value="返回" onclick="window.history.go(-1)">
	</div>
	<form action="/index.php/Admin/Index/update" method="post">
		<input type="hidden" name="id" value="<?php echo ($article["id"]); ?>">
		<div id="editor">
			标题: <input type="text" name="title" value="<?php echo ($article["title"]); ?>">
			<script id="container" name="content" type="text/plain"><?php echo ($article["content"]); ?></script>
			<div id="submit">
				<input type="submit" value="保存">
			<div>
		</div>		
	</form>
</body>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/Public/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container', {
			initialFrameWidth: null,//设置为null即可
			initialFrameHeight: 600,
			});
		//window.UEDITOR_HOME_URL ='/Public/upload/';
    </script>

	<!--相应按钮功能-->
	<script>
		function add(){
			alert('add');
		}
	</script>
</html>