<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/Public/layui/css/layui.css">
	<script src="/Public/layui/layui.js"></script>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		#menu{
			width:100%;
			text-align:center;
			margin:10px;
		}
		#left{
			width:50%;
			float:left;
			border:1px solid red;
		}
		#right{
			width:50%;
			float:left;
			border:1px solid blue;
		}
		#strongholdImage{
			width:250px;
		}
		#stronghold{
			font-size:20px;
		}
		#buildList{
			margin-top:20px;
		}
		.buildListTitle{
			font-size:18px;
		}
		.buildListSubtitle{
			font-size:14px;
		}
		.CrabColor{
			color: rgb(0, 21, 138);
		}
		.CraneColor{
			color: rgb(0, 127, 218);
		}
		.DragonColor{
			color: rgb(0, 155, 103);
		}
		.LionColor{
			color: rgb(197, 147, 0);
		}
		.PhoenixColor{
			color: rgb(186, 89, 0);
		}
		.ScorpionColor{
			color: rgb(157, 16, 0);
		}
		.UnicornColor{
			color: rgb(109, 0, 142);
		}
		.NeutralColor{
			color: rgb(89, 89, 89);
		}
		#dynastyDeck tr td{
			height:30px;
		}		
		#conflictDeck tr td{
			height:30px;
		}
		.bigIcon{
			font-size: 14px;
			text-shadow: black 3px 2px 2px;
		}
		.filter{
			height:25px;
		}
		#deck,#type {
			font-size:18px;
		}
		#cardListTable{
			margin-top:10px;
		}
		#cardListTable tr td{
			height:30px;
		}
		#cardListTableTitle{			
			font-size:14px;
			font-weight:bold;
		}
		#cardList label{
			width:20px;
			height:20px;
			float:left;
			margin-left:0px;
		}
		#cardList label input{			
			width: 15px;
			height: 21px;
			opacity: 0;
		}
		.spot0{
			width:15px;
			height:21px;
			background:url("/Public/icon/0.jpg") no-repeat;
			background-size:14px;
			position: absolute;
			top:.2rem;
			float:left;
			z-index:5;
			border:1px solid grey;
			margin-left:-16px;
		}
		.spot1{
			width:15px;
			height:21px;
			background:url("/Public/icon/1.jpg") no-repeat;
			background-size:14px;
			position: absolute;
			top:.2rem;
			float:left;
			z-index:5;
			border:1px solid grey;
			margin-left:-16px;
		}
		.spot2{
			width:15px;
			height:21px;
			background:url("/Public/icon/2.jpg") no-repeat;
			background-size:14px;
			position: absolute;
			top:.2rem;
			float:left;
			z-index:5;
			border:1px solid grey;
			margin-left:-16px;
		}
		.spot3{
			width:15px;
			height:21px;
			background:url("/Public/icon/3.jpg") no-repeat;
			background-size:14px;
			position: absolute;
			top:.2rem;
			float:left;
			z-index:5;
			border:1px solid grey;
			margin-left:-16px;
		}
		input:checked + .spot0{
			background:url("/Public/icon/0x.jpg") no-repeat;
			background-size:14px;
		}
		input:checked + .spot1{
			background:url("/Public/icon/1x.jpg") no-repeat;
			background-size:14px;
		}
		input:checked + .spot2{
			background:url("/Public/icon/2x.jpg") no-repeat;
			background-size:14px;
		}
		input:checked + .spot3{
			background:url("/Public/icon/3x.jpg") no-repeat;
			background-size:14px;
		}

	</style>
</head>
<body>
	<!--顶部--->
	<div id="menu">
		<span><a href="#">Cards</a></span>
		<span><a href="#">Decks</a></span>
		<span><a href="#">Builder</a></span>
	</div>
	
	<!--左部--->
	<div id="left" class="col-xs-6">
		<div id="myDeck">
			<!--Deckname行-->
			<div id="deckName">
				<div class="col-xs-6 col-xs-offset-3"><h1>DECKNAME</h1></div>
				<div id="version" class="col-xs-1 col-xs-offset-1">version</div>
			</div>
			<!--Hint行-->
			<div id="hint" class="col-xs-10 col-xs-offset-4">
				<div>your deck needs more cards .................</div>
			</div>
			<!--大图和要塞行省行-->
			<div class="col-xs-4 col-xs-offset-3">
				<img id="strongholdImage" src="/Public/img/shiba-tsukune.jpg"/>
			</div>
			<div class="col-xs-4 col-xs-offset-1">
				<div id="stronghold"><a href="#">stronghold</a></div>
				<div id="role"><a href="#">Seeker of Fire</a></div>
				<div>
					<table id="provinces">
						<tr><td><a href="#">First Province</a></td><td>air</td></tr>
						<tr><td><a href="#">Second Province</a></td><td>fire</td></tr>
						<tr><td><a href="#">Third Province</a></td><td>earth</td></tr>
						<tr><td><a href="#">Fourth Province</a></td><td>wind</td></tr>
						<tr><td><a href="#">Fifth Province</a></td><td>void</td></tr>
					</table>
				</div>
			</div>
			<!--DynastyDeck和ConflictDeck-->
			<div id="buildList" class="col-xs-12 col-xs-offset-3">
				<!--DynastyDeck-->
				<div class="col-xs-4">
					<table id="dynastyDeck">
						<tr><td class="buildListTitle">DynastyDeck(数量)</td></tr>
						<tr><td class="buildListSubtitle"><span class="glyphicon glyphicon-user col-xs-offset-1"></span>角色(数量)</td></tr>
						<tr><td>
						<table id="dynastyDeckCharacter">
							<!--
							<tr><td id="num1">1</td><td>x <span class="glyphicon glyphicon-user crabColor"></span><a href="#" onclick="javascript:show(1)"> 测试卡牌Apple的名字</a></td></tr>
							<tr><td id="num2">2</td><td>x <span class="glyphicon glyphicon-user craneColor"></span><a href="#"> 测试卡牌Be的名字</a></td></tr>
							-->
						</table></td></tr>
						<tr><td class="buildListSubtitle"><span class="glyphicon glyphicon-home col-xs-offset-1"></span>地区(数量)</td></tr>
						<tr><td>
						<table id="dynastyDeckHolding">
							<!--
							<tr><td id="num3">3</td><td>x <span class="glyphicon glyphicon-home dragonColor"></span><a href="#"> 测试卡牌House的名字</a></td></tr>
							<tr><td id="num4">1</td><td>x <span class="glyphicon glyphicon-home lionColor"></span><a href="#"> 测试卡牌me的名字</a></td></tr>
							-->
						</table></td></tr>
						
					</table>
				</div>
				<!--ConflictDeck-->
				<div class="col-xs-4  col-xs-offset-1">
					<table id="conflictDeck">
						<tr><td class="buildListTitle">ConflictDeck(数量)</td></tr>
						<tr><td class="buildListSubtitle"><span class="glyphicon glyphicon-user col-xs-offset-1"></span>角色(数量)</td></tr>
						<tr><td>
						<table id="conflictDeckCharacter">
							<!--
							<tr><td id="num5">1</td><td>x <span class="glyphicon glyphicon-user phoenixColor"></span><a href="#"> 测试卡牌Apple的名字</a></td></tr>
							<tr><td id="num6">2</td><td>x <span class="glyphicon glyphicon-user scorpionColor"></span><a href="#"> 测试卡牌Be的名字</a></td></tr>
							-->
						</table></td></tr>
						<tr><td class="buildListSubtitle"><span class="glyphicon glyphicon-paperclip col-xs-offset-1"></span>附属(数量)</td></tr>
						<tr><td>
						<table id="conflictDeckAttachment">
							<!--
							<tr><td id="num7">1</td><td>x <span class="glyphicon glyphicon-paperclip unicornColor"></span><a href="#"> 测试卡牌Apple的名字</a></td></tr>
							<tr><td id="num8">2</td><td>x <span class="glyphicon glyphicon-paperclip neutralColor"></span><a href="#"> 测试卡牌Be的名字</a></td></tr>
							-->
						</table></td></tr>
						<tr><td class="buildListSubtitle"><span class="glyphicon glyphicon-flash col-xs-offset-1"></span>事件(数量)</td></tr>
						<tr><td>
						<table id="conflictDeckEvent">
							<!--
							<tr><td id="num9">1</td><td>x <span class="glyphicon glyphicon-flash eventColor"></span><a href="#"> 测试卡牌Apple的名字</a></td></tr>
							<tr><td id="num10">2</td><td>x <span class="glyphicon glyphicon-flash eventColor"></span><a href="#"> 测试卡牌Be的名字</a></td></tr>
							-->
						</table></td></tr>
					</table>
				</div>
			</div>
			
			<!--保存，复制，分享链接-->
			<div class="col-xs-10 col-xs-offset-3">

				<button type="button" class="btn btn-primary btn-sm bigIcon">
					<span class="glyphicon glyphicon-floppy-disk"></span>保存
				</button>
				<button type="button" class="btn btn-primary btn-sm bigIcon">
					<span class="glyphicon glyphicon-share"></span>复制
				</button>
			</div>	
		</div>
		<!--费用图，未完成-->
		<div id="costChart">
		</div>
	</div>
	
	<!--右部--->	
	<div id="right">
		<form name="filterForm" id="filterForm" method="post">
		<!--氏族筛选条件-->
		<div id="clan" class="col-xs-12">
			<label class="checkbox-inline bordered">
				<input type="checkbox" id="crabFilter" class="filter" name="clan[]" value="crab"><img class="icon" src="/Public/Icon/crab.png"/>
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" id="craneFilter" class="filter" name="clan[]" value="crane"><img class="icon" src="/Public/Icon/crane.png"/>
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" id="dragonFilter" class="filter" name="clan[]" value="dragon"><img class="icon" src="/Public/Icon/dragon.png"/>
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" id="lionFilter" class="filter" name="clan[]" value="lion"><img class="icon" src="/Public/Icon/lion.png"/>
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" id="phoenixFilter" class="filter" name="clan[]" value="phoenix"><img class="icon" src="/Public/Icon/phoenix.png"/>
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" id="scorpionFilter" class="filter" name="clan[]" value="scorpion"><img class="icon" src="/Public/Icon/scorpion.png"/>
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" id="unicornFilter" class="filter" name="clan[]" value="unicorn"><img class="icon" src="/Public/Icon/unicorn.png"/>
			</label>
			<label class="checkbox-inline bordered">
				<input type="checkbox" id="neutralFilter" class="filter" name="clan[]" value="neutral"><img class="icon" src="/Public/Icon/neutral.png"/>
			</label>
		</div>
		<!--牌库筛选条件-->
		<div id="deck" class="col-xs-12">
			<label class="checkbox-inline bordered col-xs-2">
				<input type="checkbox" id="dynastyFilter" class="filter" name="deck[]" value="dynasty">王朝
			</label>
			<label class="checkbox-inline bordered col-xs-2">
				<input type="checkbox" id="conflictFilter" class="filter" name="deck[]" value="conflict">冲突
			</label>
			<label class="checkbox-inline bordered col-xs-2">
				<input type="checkbox" id="otherFilter" class="filter" name="other" value="other">其他
			</label>
		</div>
		<!--类型筛选条件-->
		<div id="type" class="col-xs-12">
			<label class="checkbox-inline bordered col-xs-1">
				<input type="checkbox" id="characterFilter" class="filter" name="type[]" value="character">角色
			</label>
			<label class="checkbox-inline bordered col-xs-1">
				<input type="checkbox" id="holdingFilter" class="filter" name="type[]" value="holding">地区
			</label>
			<label class="checkbox-inline bordered col-xs-1">
				<input type="checkbox" id="attachmentFilter" class="filter" name="type[]" value="attachment">附属
			</label>
			<label class="checkbox-inline bordered col-xs-1">
				<input type="checkbox" id="eventFilter" class="filter" name="type[]" value="event">事件
			</label>
			<label class="checkbox-inline bordered col-xs-1">
				<input type="checkbox" id="provinceFilter" class="filter" name="type[]" value="province">行省
			</label>
			<label class="checkbox-inline bordered col-xs-1">
				<input type="checkbox" id="strongholdFilter" class="filter" name="type[]" value="stronghold">要塞
			</label>
			<label class="checkbox-inline bordered col-xs-1">
				<input type="checkbox" id="roleFilter" class="filter" name="type[]" value="role">身份
			</label>
		</div>
		</form>
		<!--卡牌列表-->
		<div id="cardList" class="col-xs-10">
			<table id="cardListTable" class="table table-striped table-bordered">
				<tr id="cardListTableTitle">
					<td class="col-xs-2">数量</td>
					<td class="col-xs-5">卡牌名称</td>
					<td class="col-xs-4">属性</td>
					<td class="col-xs-2">影响力</td>
				</tr>
				<?php if(is_array($cardList)): $i = 0; $__LIST__ = $cardList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$card): $mod = ($i % 2 );++$i;?><tr>
					<!--数量格-->
					<td>
						<label class="radio-inline">
							<input type="radio" class="quantity0" name="setNum<?php echo ($card["id"]); ?>" value="<?php echo ($card["id"]); ?>" checked="checked"><i class="spot0"></i>
						</label>
						<label class="radio-inline">
							<input type="radio" class="quantity1" name="setNum<?php echo ($card["id"]); ?>" value="<?php echo ($card["id"]); ?>"><i class="spot1"></i>
						</label>
						<label class="radio-inline">
							<input type="radio" class="quantity2" name="setNum<?php echo ($card["id"]); ?>" value="<?php echo ($card["id"]); ?>"><i class="spot2"></i>
						</label>
						<label class="radio-inline">
							<input type="radio" class="quantity3" name="setNum<?php echo ($card["id"]); ?>" value="<?php echo ($card["id"]); ?>"><i class="spot3"></i>
						</label>
						<!--
						<div class="quantity" onclick="javascript:removeFromDeck(<?php echo ($card["id"]); ?>)">0</div>
						<div class="quantity">1</div>
						<div class="quantity" onclick="javascript:setCardNum(<?php echo ($card["id"]); ?>,2,'<?php echo ($card["name"]); ?>','<?php echo ($card["deck"]); ?>','<?php echo ($card["type"]); ?>')">2</div>
						<div class="quantity" onclick="javascript:setCardNum(<?php echo ($card["id"]); ?>,3,'<?php echo ($card["name"]); ?>','<?php echo ($card["deck"]); ?>','<?php echo ($card["type"]); ?>')">3</div>
						-->
					</td>
					<!--名称格-->
					<td>
						<a href="javascript:show(<?php echo ($card["id"]); ?>)"><?php echo ($card["name"]); ?></a>
					</td>
					<!--属性格-->
					<td>
						<?php echo ($card["traits"]); ?>
					</td>
					<!--影响力格-->
					<td>
						
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
		</div>
	</div>
</body>
<script>
//设置数量为0
$(".quantity0").click(function(){
	if(this.value!=null){
		var id = this.value;
		//如果该id在页面中存在，则将该id的记录删除
		if($("#num"+id).length>0){
			$("#num"+id).parent().remove();
			//如果是要塞，现在还不能删除，需要增加一个判断 ------------------------------
		}else{
		//如果该id在页面中不存在，则返回
			return;
		}
	}
});
//设置数量为1
$(".quantity1").click(function(){
	if(this.value!=null){
		var id = this.value;
		var number = 1;
		//选牌时，根据选的0123，获得卡牌id和数量	
		setNum(id,number);				
	}
});
//设置数量为2
$(".quantity2").click(function(){
	if(this.value!=null){
		var id = this.value;
		var number = 2;
		//选牌时，根据选的0123，获得卡牌id和数量	
		setNum(id,number);				
	}
});
//设置数量为3
$(".quantity3").click(function(){
	if(this.value!=null){
		var id = this.value;
		var number = 3;
		//选牌时，根据选的0123，获得卡牌id和数量	
		setNum(id,number);				
	}
});
//根据卡牌id，找到应该放的位置，并修改数量
function setNum(id,number){
	//取得这张卡牌
	var card = editDeck(id);
		//如果是Dynasty或Conflict，判断是否在本页面存在
		switch(card.deck){
			case "Dynasty":
			case "Conflict":
				if($("#num"+id).length>0){
				//如果存在，则直接修改数值
					$("#num"+id).html(number); //这个1是数值1
				}else{
				//如果不存在，在Dynasty或Conflict的位置插入卡牌	
					insertCard(card,number);
				}
				break;
			case "Stronghold":
			case "Role":
			//如果是Stronghold或Role，判断是否在本页面存在
				//如果存在，则提示必须先取消，才能在设置					
				if($("#stronghold").length>0){
					alert("只能有1个要塞，请先删除当前要塞");
					return;
				//如果不存在，在Stronghold或Role的位置插入卡牌
				}else{
					insertCard(card,number);
				}
				break;
			default:
				//剩下的是行省，判断Air,Earth,Fire,Water,Void,在Province的位置插入卡牌
				insertCard(card,number);
				break;
		}
}

//根据id查找这张牌,并将这张牌的数量记录在牌库中。
function editDeck(id,number){	
	var url ="/index.php/Simplecard/Index/editDeck";
	var data={'id':id,'number':number};
	var res =$.ajax({ 
				type:'post',  
				url:url, 
				cache: false,
				async:false, 
				data:data,  
				dataType:'json', 
				success:function(card){
					return card;
				},
				error:function(){ 
					alert("未查到该卡牌");
				}
			});
	var card = $.parseJSON(res['responseText']) 
	return card;
}
	
function insertCard(card,number){	
	//card是查到的卡牌，判断Dynasty，Conflict，Stronghold，Role还是其他
	switch(card.deck){
		case "Dynasty":
			//继续判断是否是Character还是Holding
			if(card.type=="Character"){
				var newTr = dynastyDeckCharacter.insertRow();
				newTr.innerHTML ='<td id="num'+card.id+'">'+number+'</td><td>x <span class="glyphicon glyphicon-user '+card.clan+'Color"></span><a href="#" class="'+card.clan+'Color" onclick="javascript:show('+card.id+')"> '+card.name+'</a></td>';
				return;
			}
			if(card.type=="Holding"){
				var newTr = dynastyDeckHolding.insertRow();
				newTr.innerHTML ='<td id="num'+card.id+'">'+number+'</td><td>x <span class="glyphicon glyphicon-home '+card.clan+'Color"></span><a href="#" class="'+card.clan+'Color" onclick="javascript:show('+card.id+')"> '+card.name+'</a></td>';
				return;
			}
			break;
		case "Conflict":
			//继续判断是否是Character,Attachment还是Event
			if(card.type=="Character"){
				var newTr = conflictDeckCharacter.insertRow();
				newTr.innerHTML ='<td id="num'+card.id+'">'+number+'</td><td>x <span class="glyphicon glyphicon-user '+card.clan+'Color"></span><a href="#" class="'+card.clan+'Color" onclick="javascript:show('+card.id+')"> '+card.name+'</a></td>';
				return;
			}
			if(card.type=="Attachment"){
				var newTr = conflictDeckAttachment.insertRow();
				newTr.innerHTML ='<td id="num'+card.id+'">'+number+'</td><td>x <span class="glyphicon glyphicon-paperclip '+card.clan+'Color"></span><a href="#" class="'+card.clan+'Color" onclick="javascript:show('+card.id+')"> '+card.name+'</a></td>';
				return;
			}
			if(card.type=="Event"){
				var newTr = conflictDeckEvent.insertRow();				
				newTr.innerHTML ='<td id="num'+card.id+'">'+number+'</td><td>x <span class="glyphicon glyphicon-flash '+card.clan+'Color"></span><a href="#" class="'+card.clan+'Color" onclick="javascript:show('+card.id+')"> '+card.name+'</a></td>';
				return;
			}
			break;
		case "Stronghold":
			//更换要塞牌，文字，图片和超链接
			$("#strongholdImage").attr("src","/Public/img/"+card.imgurl);
			$("#stronghold").html("<a href='javascript:show("+card.id+")'>"+card.name+"</a>");
			break;
		case "Role":
			//更换身份牌
			break;
		default:
			//剩下的是行省，判断Air,Earth,Fire,Water,Void
			break;
	}		
}	

</script>
<script>
$(".filter").click(function(){
	var url = "/index.php/Simplecard/Index/filter";
	var formData = $("#filterForm").serialize();
	//alert(formData);
	$.ajax({ 
		type:'post',  
		url:url, 
		cache: false,
		data:formData,  
		dataType:'json', 
		success:function(data){
			$("#cardListTable tr:not(:first)").empty();
			data.forEach(function(card){ 
				//alert(e['name']);
				var newTr = cardListTable.insertRow();
				//在新行中，插入数量列
				var numTd = newTr.insertCell();
				//在新行中，插入卡牌名称列
				var nameTd = newTr.insertCell();				
				//在新行中，插入属性列
				var traitTd = newTr.insertCell();				
				//在新行中，插入影响力列
				var influenceTd = newTr.insertCell();
				
				numTd.innerHTML ='<div class="quantity" onclick="javascript:removeFromDeck('+card["id"]+')">0</div>'+
							'<div class="quantity" onclick="javascript:setCardNum('+card["id"]+',1,"'+card["name"]+'","'+card["deck"]+'","'+card["type"]+'")">1</div>'+
							'<div class="quantity" onclick="javascript:setCardNum('+card["id"]+',2,"'+card["name"]+'","'+card["deck"]+'","'+card["type"]+'")">2</div>'+
							'<div class="quantity" onclick="javascript:setCardNum('+card["id"]+',3,"'+card["name"]+'","'+card["deck"]+'","'+card["type"]+'")">3</div>';
				
				nameTd.innerHTML ='<a href="javascript:show('+card["id"]+')">'+card["name"]+'</a>';
				
				traitTd.innerHTML =card["traits"];
				
				influenceTd.innerHTML =card["id"];
				
				if(card["id"]==1){
					alert(numTd.innerHTML);
				}
				
			});
			//$("#cardListTable tbody").empty().append(data[0]['name']);
		},
		error:function(){ 
			alert("请求失败")
		}
	})
});
</script>
<script>
function setCardNum(id,num,chname,deck,type){
	//如果id存在，则修改数值，如果id不存在，则插入一条记录
	if($("#num"+id).length>0){
		$("#num"+id).html(num);
	}else{
		//1、判断是Stronghold,Role,Province,Dynasty还是Conflict
		if(deck=='Dynasty'){
			alert('Dynasty');			
		}else if(deck=='Conflict'){
			alert('Conflict');
		}else if(deck=='Role'){
			alert('Role');
		}else if(deck=='Stronghold'){
			alert('Stronghold');
		}else{
			//如果以上都不是，则为行省，显示的内容为Air,Earth,Fire,Water,Void
			alert(deck);
		}
		//2、如果是Dynasty或Conflict,继续判断卡牌type
		//3、向该表格中插入一条数据
		//插入一行
		var newTr = mydecktable.insertRow();
		//在新行中，插入数量列
		var numTd = newTr.insertCell();
		//在新行中，插入名称列
		var nameTd = newTr.insertCell();
		numTd.innerHTML ='<td><span id="num'+id+'">'+num+'</span></td>';
		//alert('<td id="num'+id+'">'+num+'</td>');
		nameTd.innerHTML ='<td>x <span class="glyphicon glyphicon-user iconcolor"></span><a href="#'+id+'"> '+chname+'</a></td>';
		//alert(nameTd.innerHTML);
	}
}
function removeFromDeck(id){
	$("#num"+id).parent().parent().remove();
}
</script>
<script>
	//加载layerui
	layui.config({
		base:'/Public/js/'
	}).use('mylayerui');
</script> 
</html>