<?php
    //ת��pdf
	$html=$_POST['html'];
	//Turn on output buffering
	ob_start();
	$html='
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/myCenter.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.$html;
	//��������������ɵ�Html����ʽ��  ·�������Ǿ���·��Ҳ���������·����Ҳ���԰���ʽ���ļ����Ƶ���ʱhtml�ļ���Ŀ¼�� �������demo�ļ�Ŀ¼�£�Ĭ�ϣ� Ҳ����ֱ�Ӱ���ʽд��htmlҳ����ֱ�Ӵ��ݹ���
	//$html = ob_get_contents();
	//$html=$html1.$html;
	$filename = "hld";

	//save the html page in tmp folder  �����html��ʱ�ļ�λ�� ���������·��Ҳ�ǿ����Ǿ���·�� ���������·��
	file_put_contents("{$filename}.html", $html);

	//Clean the output buffer and turn off output buffering
	ob_end_clean();

	//convert HTML to PDF
	shell_exec("wkhtmltopdf -q {$filename}.html {$filename}.pdf");
	if(file_exists("{$filename}.pdf")){
		header("Content-type:application/pdf");
		header("Content-Disposition:attachment;filename={$filename}.pdf");
		echo file_get_contents("{$filename}.pdf");
		//echo "{$filename}.pdf";
	}else{
		exit;
	}
 ?>