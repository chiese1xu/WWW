layui.define(['layer','form'],function(exports){
	var layer =layui.layer,
	form = layui.form;
	//start here

	
	//end here
	exports('mylayerui',{});
});

function show(id){
	layer.open({
		type : 2,
		area: ['600px', '400px'],
		title:'预览图',
		content:'http://localhost/index.php/Simplecard/Index/detail?id='+id
	});
}