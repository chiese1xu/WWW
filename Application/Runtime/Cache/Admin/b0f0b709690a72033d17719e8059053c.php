<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<script src="/Public/js/jquery-1.4.2.min.js"></script>
	<script src="/Public/bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/bootstrap.css" />
	<style>

	</style>
</head>
<body>
	<div>
		<!--文章编辑功能区：添加、删除、全选、撤销-->
		<input type="button" value="添加" onclick="/index.php/Admin/Index/add">
		<input type="button" value="删除" onclick="/index.php/Admin/Index/del">
	</div>
	<div>
		<!--文章列表区，显示该类别的文章列表-->
		<table class="table striped">
			<tr>
				<td class="col-xs-1">全选</td>
				<td class="col-xs-1">序号</td>
				<td class="col-xs-5">标题</td>
				<td class="col-xs-2">创建日期</td>
				<td class="col-xs-1">类别</td>
				<td class="col-xs-1">编辑</td>
				<td class="col-xs-1">显示/隐藏</td>
			</tr>
		<?php if(is_array($articleList)): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><tr>
				<td><input type="checkbox"></td>
				<td><?php echo ($article["id"]); ?></td>
				<td><a href="/index.php/Admin/Index/edit?articleId=<?php echo ($article["id"]); ?>" target="main"><?php echo ($article["title"]); ?></a></td>
				<td><?php echo ($article["createdate"]); ?></td>
				<td><?php echo ($article["category"]); ?></td>
				<td><a href="/index.php/Admin/Index/edit?articleId=<?php echo ($article["id"]); ?>" target="main">编辑</a></td>
				<td><a id="show<?php echo ($article["id"]); ?>" href="javascript:show(<?php echo ($article["id"]); ?>)">显示</a><a id="hide<?php echo ($article["id"]); ?>" class="hide" href="javascript:hide(<?php echo ($article["id"]); ?>)">隐藏</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
	</div>
</body>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/Public/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
		window.UEDITOR_HOME_URL ='/Public/upload/';
    </script>

	<!--相应按钮功能-->
	<script>
		function add(){
			alert('add');
		}
	</script>
	<script>
		$(".hide").hide();
		function show(id){
			$("#show"+id).hide();
			$("#hide"+id).show();
		}
		function hide(id){
			$("#hide"+id).hide();
			$("#show"+id).show();
		}
	</script>
</html>