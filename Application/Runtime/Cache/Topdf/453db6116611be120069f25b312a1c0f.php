<?php if (!defined('THINK_PATH')) exit();?><html>
<SCRIPT src="/Public/js/jquery-1.4.2.min.js"></SCRIPT>
<body>
	<div class="print">
		<input type="button" value="下载报告"  id="down" class="print_btn">
	</div> 
<!--startprint-->
	<form id="formdata">
		<input type="text" name="t1" value="标题" style="margin-left:200px;">
		<input type="text" name="t2" value="正文">
		<br>
		<input type="text" name="t3" value="内容">
		<input type="text" name="t4" value="签名">
	</form>
<!--endprint-->
	<form action="topdf" method="post" name="hld_res" id="hideform">
      <input type="hidden" id="hide_content" name="html"/>
    </form>  
<script>
    $(function () {
      //获取需要传递的Html代码 通过<!--startprint--><!--endprint-->截取
      bdhtml=window.document.body.innerHTML; 
      sprnstr="<!--startprint-->"; 
      eprnstr="<!--endprint-->"; 
      prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17); 
      prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr)); 
      //将获取的html代码添加到隐藏域中传给php文件处理
      $("#hide_content").val(""+prnhtml+"");
    } );   

    $("#down").click(function(){
      $("#hideform").submit();
    }); 

</script>	
</body>
</html>