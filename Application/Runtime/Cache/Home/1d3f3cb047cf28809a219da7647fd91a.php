<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>jsPDF Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script> 
        <script src="/Public/js/jspdf.min.js"></script>
    </head>
    
    <body>
        <div id="ol_article_content">
            <h1>
              Hello World!XXH
            </h1>
        </div>
   </body>
        
    <script>
    var doc = new jsPDF();
	doc.text('Hello world!', 10, 10);
	doc.save('hello.pdf');
	alert('save');
    </script>

</html>