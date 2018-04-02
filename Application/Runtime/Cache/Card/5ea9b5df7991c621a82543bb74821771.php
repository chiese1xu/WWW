<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js">
</script>
<script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js">
</script>
<style>
.bordered{
	//border:1px solid grey;
	width:50px;
	height:25px;	
}
#nav{
	position:fixed;
	_position:absolute;
	_top:expression(documentElement.scrollTop + "px");
	z-index:9999;
	background-color:#FFF;
}
#main{
	margin-top:160px;
}
.grid{
	height:40px;
}
</style>
<div class="container col-lg-8 col-lg-offset-1" id="nav">
	<form action="/index.php/Card/Index/clan" method="post" role="form">
		<div>
			<label>卡牌名称：</label>
			<label class="checkbox-inline bordered">
				<input type="text" name="title">
			</label>
		</div>
		<div style="float:right">
			<input id="viewbytext" type="button" value="ViewByText"  onclick="ViewByText()" >
			<input id="viewbyimage" type="button" value="ViewByImage" onclick="ViewByImage()">
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
				<input type="checkbox" name="clan[]" value="Crab" <?php if(in_array(($Crab), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>>蟹
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Crane" <?php if(in_array(($Crane), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>>鹤
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Lion" <?php if(in_array(($Lion), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>>狮
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Dragon" <?php if(in_array(($Dragon), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>>龙
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Phoenix" <?php if(in_array(($Phoenix), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>>凤
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Scorpion" <?php if(in_array(($Scorpion), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>>蝎
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Unicorn" <?php if(in_array(($Unicorn), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>>马
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="clan[]" value="Neutral" <?php if(in_array(($Neutral), is_array($clan)?$clan:explode(',',$clan))): ?>checked="true"<?php endif; ?>>中立
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
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="cardtype[]" value="Stronghold" <?php if(in_array(($Stronghold), is_array($cardtype)?$cardtype:explode(',',$cardtype))): ?>checked="true"<?php endif; ?>>要塞
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="cardtype[]" value="Province" <?php if(in_array(($Province), is_array($cardtype)?$cardtype:explode(',',$cardtype))): ?>checked="true"<?php endif; ?>>行省
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="cardtype[]" value="Holding" <?php if(in_array(($Holding), is_array($cardtype)?$cardtype:explode(',',$cardtype))): ?>checked="true"<?php endif; ?>>建筑
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="cardtype[]" value="Character" <?php if(in_array(($Character), is_array($cardtype)?$cardtype:explode(',',$cardtype))): ?>checked="true"<?php endif; ?>>角色
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="cardtype[]" value="Attachment" <?php if(in_array(($Attachment), is_array($cardtype)?$cardtype:explode(',',$cardtype))): ?>checked="true"<?php endif; ?>>附属
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="cardtype[]" value="Event" <?php if(in_array(($Event), is_array($cardtype)?$cardtype:explode(',',$cardtype))): ?>checked="true"<?php endif; ?>>事件
			</label>
		</div>
		<div>
			<label>牌库：</label>
			<?php $Dynasty = 'Dynasty'; ?>
			<?php $Conflict = 'Conflict'; ?>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="decktype[]" value="Dynasty" <?php if(in_array(($Dynasty), is_array($decktype)?$decktype:explode(',',$decktype))): ?>checked="true"<?php endif; ?>>朝廷
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" name="decktype[]" value="Conflict" <?php if(in_array(($Conflict), is_array($decktype)?$decktype:explode(',',$decktype))): ?>checked="true"<?php endif; ?>>冲突
			</label>
		</div>	
		<div>
			<input type="submit" value="查找">
		</div>
	</form>
</div>
<div id="main" class="col-lg-10 col-lg-offset-1">
	<?php if(is_array($cardlist)): $i = 0; $__LIST__ = $cardlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$card): $mod = ($i % 2 );++$i;?><div style="float:left;" class="col-lg-4">
		<!--
			<table class="table table-bordered" >
				<tr class="grid"><td class="col-lg-1">费用：<?php echo ($card["cost"]); ?></td><td colspan="2" class="col-lg-4"></td><td rowspan="8" class="col-lg-4"><img width="100%" src="/Public/img/<?php echo ($card["imgurl"]); ?>.png"/></td></tr>
				<tr class="grid"><td>类型：<?php echo ($card["cardtype"]); ?></td><td colspan="2"></td></tr>
				<tr class="grid"><td><?php echo ($card["bonusmilitaryskill"]); ?></td><td colspan="2"></td></tr>
				<tr class="grid"><td><?php echo ($card["bonuspoliticalskill"]); ?></td><td colspan="2"><?php echo ($card["traits"]); ?></td></tr>
				<tr class="grid"><td rowspan="3"><?php echo ($card["title"]); ?></td><td colspan="2" rowspan="3"><?php echo ($card["ability"]); ?></td></tr>
				<tr class="grid"></tr>
				<tr class="grid"></tr>
				<tr class="grid"><td><?php echo ($card["clansymbol"]); ?></td><td colspan="2"><?php echo ($card["decktype"]); ?></td></tr>
			</table>
			-->
			<table class="table table-bordered" >
				<tr><td>名称：</td><td style="font-size:20px;"><?php echo ($card["title"]); ?></td><td rowspan="8" colspan="2"><img width="100%" src="/Public/img/<?php echo ($card["imgurl"]); ?>.png"/></td></tr>
				<!--<tr><td>费用：</td><td style="background:url(/Public/Icon/fate.png) no-repeat;background-size:contain;filter:alpha(opacity:20);opacity:0.2"><?php echo ($card["cost"]); ?></td></tr>-->
				<tr><td>费用：</td><td style="color:brown;font-size:26px;"><?php echo ($card["cost"]); ?></td> 
				<tr><td>类型：</td><td><?php echo ($card["cardtype"]); ?></td></tr>
				<tr><td>+军事：</td><td style="color:red;font-size:26px;"><?php echo ($card["bonusmilitaryskill"]); ?></td></tr>
				<tr><td>+政治：</td><td style="color:blue;font-size:26px;"><?php echo ($card["bonuspoliticalskill"]); ?></td></tr>
				<tr><td>特性：</td><td><?php echo ($card["traits"]); ?></td></tr>				
				<tr><td>氏族：</td><td><?php echo ($card["clansymbol"]); ?></td></tr>
				<tr><td>分类：</td><td><?php echo ($card["decktype"]); ?></td></tr>
				<tr><td>能力：</td><td colspan="3"><?php echo ($card["ability"]); ?></td></tr>
			</table>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<!--
<div class="container col-lg-8 col-lg-offset-1" id="main">	
	<table class="table table-striped table-bordered">		
	<tr>
		<td>
			<div>
				
			</div>
		</td>
		<td class="col-lg-1">
			<img height="50%" src="/Public/img/<?php echo ($card["imgurl"]); ?>.png"/>
		</td>
	</tr>
	<tr>
		<td class="col-lg-1"><?php echo ($card["id"]); ?></td>
		<td class="col-lg-1"><?php echo ($card["title"]); ?></td>
		<td class="col-lg-1"><?php echo ($card["cost"]); ?></td>
		<td class="col-lg-1"><?php echo ($card["cardtype"]); ?></td>
		<td class="col-lg-1"><?php echo ($card["clansymbol"]); ?></td>
		<td class="col-lg-1"><?php echo ($card["traits"]); ?></td>
		<td class="col-lg-3"><?php echo ($card["ability"]); ?></td>
		<td class="col-lg-1"><?php echo ($card["decktype"]); ?></td>
		<td class="col-lg-1"><img height="50%" src="/Public/img/<?php echo ($card["imgurl"]); ?>.png"/></td>
	</tr>
	</table>
</div>	
	-->	
<script>
function ViewByText(){
	$("#viewbytext").css("background-color","silver");
	$("#viewbyimage").css("background-color","white");
	var url = "/index.php/Card/Index/clan";
	var data = {""}
	$.post("/index.php/Card/Index/clan",data,function(){
	},json);
}
function ViewByImage(){
	$("#viewbytext").css("background-color","white");
	$("#viewbyimage").css("background-color","silver");
}
</script>
</html>