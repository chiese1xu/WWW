<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
.bordered{
	//border:1px solid grey;
	//width:50px;
	//height:64px;	
}
#nav{
	position:fixed;
	_position:absolute;
	margin-top:-20px;
	padding-top:20px;
	z-index:9999;
	background-color:#FFF;
}
#list{	
	margin-top:160px;;
	display:none;
}
#image{
	margin-top:160px;
}
#viewbyimage{
	background-color:silver;
}
#viewbytext{
	background-color:white;
}
.hiddenimg{
	position: fixed;
	display: none;
}
.imagecell{
	width:100%;
	padding:10px;
}
.icon{
	//width:32px;
}
</style>
<div class="container col-lg-12" id="nav">
	<form action="/index.php/Simplecard/Index/find" method="post" role="form">
		<div>
			<label>卡牌名称：</label>
			<label class="checkbox-inline bordered">
				<input type="text" name="title">
			</label>		
		</div>
		<div style="float:right">
			<div>			
				<button id="orderbyname" onclick="OrderByName()">名称<label class="glyphicon glyphicon-arrow-up"></label></button>
				<button id="orderbycost" onclick="OrderByCost()">费用<label class="glyphicon glyphicon-arrow-up"></label></button>
			</div>	
			<div>
				<input id="viewbylist" type="button" value="ViewByList"  onclick="ViewByList()">
				<input id="viewbyimage" type="button" value="ViewByImage" onclick="ViewByImage()" checked="true">
			</div>
					
		</div>
		<div>
			<label>氏族：</label>
			<?php $Crab = 'Crab'; ?>
			<?php $Crane = 'Crane'; ?>
			<?php $Lion = 'Lion'; ?>
			<?php $Dragon = 'Dragon'; ?>
			<?php $Phoenix = 'Phoenix'; ?>
			<?php $Scorpion = 'Scorpion'; ?>
			<?php $Unicorn = 'Unicorn'; ?>
			<?php $Neutral = 'Neutral'; ?>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Crab" <?php if(in_array(($Crab), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>><img class="icon" src="/Public/Icon/crab.png"/>
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Crane" <?php if(in_array(($Crane), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>><img class="icon" src="/Public/Icon/crane.png"/>
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Lion" <?php if(in_array(($Lion), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>><img class="icon" src="/Public/Icon/lion.png"/>
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Dragon" <?php if(in_array(($Dragon), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>><img class="icon" src="/Public/Icon/dragon.png"/>
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Phoenix" <?php if(in_array(($Phoenix), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>><img class="icon" src="/Public/Icon/phoenix.png"/>
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Scorpion" <?php if(in_array(($Scorpion), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>><img class="icon" src="/Public/Icon/scorpion.png"/>
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Unicorn" <?php if(in_array(($Unicorn), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>><img class="icon" src="/Public/Icon/unicorn.png"/>
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Neutral" <?php if(in_array(($Neutral), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>><img class="icon" src="/Public/Icon/neutral.png"/>
			</label>
		</div>
		<div>
			<label>类型：</label>
			<?php $Stronghold = 'Stronghold'; ?>
			<?php $Province = 'Province'; ?>
			<?php $Holding = 'Holding'; ?>
			<?php $Character = 'Character'; ?>
			<?php $Attachment = 'Attachment'; ?>
			<?php $Event = 'Event'; ?>
			<?php $Role = 'Role'; ?>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="type[]" value="Stronghold" <?php if(in_array(($Stronghold), is_array($type)?$type:explode(',',$type))): ?>checked="true"<?php endif; ?>>要塞
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="type[]" value="Province" <?php if(in_array(($Province), is_array($type)?$type:explode(',',$type))): ?>checked="true"<?php endif; ?>>行省
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="type[]" value="Holding" <?php if(in_array(($Holding), is_array($type)?$type:explode(',',$type))): ?>checked="true"<?php endif; ?>>建筑
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="type[]" value="Character" <?php if(in_array(($Character), is_array($type)?$type:explode(',',$type))): ?>checked="true"<?php endif; ?>>角色
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="type[]" value="Attachment" <?php if(in_array(($Attachment), is_array($type)?$type:explode(',',$type))): ?>checked="true"<?php endif; ?>>附属
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="type[]" value="Event" <?php if(in_array(($Event), is_array($type)?$type:explode(',',$type))): ?>checked="true"<?php endif; ?>>事件
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="type[]" value="Role" <?php if(in_array(($Role), is_array($type)?$type:explode(',',$type))): ?>checked="true"<?php endif; ?>>身份
			</label>
		</div>
		<div>
			<label>牌库：</label>
			<?php $Dynasty = 'Dynasty'; ?>
			<?php $Conflict = 'Conflict'; ?>
			<?php $Other = 'Other'; ?>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="deck[]" value="Dynasty" <?php if(in_array(($Dynasty), is_array($deck)?$deck:explode(',',$deck))): ?>checked="true"<?php endif; ?>>朝廷
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="deck[]" value="Conflict" <?php if(in_array(($Conflict), is_array($deck)?$deck:explode(',',$deck))): ?>checked="true"<?php endif; ?>>冲突
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="other" value="Other" <?php if(in_array(($Other), is_array($other)?$other:explode(',',$other))): ?>checked="true"<?php endif; ?>>其他
			</label>
		</div>	
		<div>
			<input type="submit" value="查找">
			<input type="button" value="清空" onclick="del()">
			<label>一共有<span style="color:red"><?php echo ($count); ?></span>条记录</label>
		</div>
	</form>
</div>
<div id="list" class="col-lg-12">
	<table class="table table-bordered" >
		<tr>
			<td>名称：</td>
			<td>费用：</td>
			<td>类型：</td>
			<td>特性：</td>
			<td>氏族：</td>
			<td>分类：</td>
		</tr>
		<?php if(is_array($cardlist)): $i = 0; $__LIST__ = $cardlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$card): $mod = ($i % 2 );++$i;?><tr>
				<td style="font-size:18px;"><label onmouseover="show(<?php echo ($card["id"]); ?>);" onmouseout="dis(<?php echo ($card["id"]); ?>);"><?php echo ($card["name"]); ?></label></td>
				<div class="hiddenimg" id="hiddenimg<?php echo ($card["id"]); ?>"><img src="/Public/img/<?php echo ($card["imgurl"]); ?>"/></div>
				<td style="color:brown;font-size:20px;"><?php echo ($card["cost"]); ?></td> 
				<td><?php echo ($card["type"]); ?></td>
				<td><?php echo ($card["traits"]); ?></td>				
				<td><?php echo ($card["clan"]); ?></td>
				<td><?php echo ($card["deck"]); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
</div>
<div id="image" class="col-lg-12">
	<?php if(is_array($cardlist)): $i = 0; $__LIST__ = $cardlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$card): $mod = ($i % 2 );++$i;?><div class="col-lg-2">
			<img class="imagecell" src="/Public/img/<?php echo ($card["imgurl"]); ?>"/>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<script>
function show(id){
	document.getElementById("hiddenimg"+id).style.display="block";
}
function dis(id){
	document.getElementById("hiddenimg"+id).style.display="none";
}
</script>
<script>
function del(){
	$(':checkbox').removeAttr("checked");
}
</script>
<script>
function ViewByList(){
	$("#viewbylist").css("background-color","silver");
	$("#viewbyimage").css("background-color","white");
	document.getElementById("image").style.display="none";
	document.getElementById("list").style.display="block";

}
function ViewByImage(){
	$("#viewbylist").css("background-color","white");
	$("#viewbyimage").css("background-color","silver");
	document.getElementById("image").style.display="block";
	document.getElementById("list").style.display="none";
}
</script>
<script>
function OrderByCost(){
alert('cost');
	<?php echo ($card["cost"]); ?>.sort(function cost(a,b){
		return a-b;
	});
}
</script>
</html>