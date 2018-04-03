<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {	
    public function index(){
		$this->display();
	}

	public function home(){
		$title = C('title');
		$this->assign('title',$title);
		$this->display();		
	}
	
	public function form(){
		$this->display();
	}
	
	public function save(){
		//通过form上传的file，通过$_FILES接收，收到的对象是一个二维数组
		$file=$_FILES;
		//第一个参数是表单的 input name，第二个下标可以是 "name", "type", "size", "tmp_name" 或 "error"。就像这样：
		//$_FILES["file"]["name"] - 被上传文件的名称
		// $_FILES["file"]["type"] - 被上传文件的类型
		// $_FILES["file"]["size"] - 被上传文件的大小，以字节计
		// $_FILES["file"]["tmp_name"] - 存储在服务器的文件的临时副本的名称
		// $_FILES["file"]["error"] - 由文件上传导致的错误代码
		if (($_FILES["file"]["type"] != "image/gif")
			&& ($_FILES["file"]["type"] != "image/jpeg")
			&& ($_FILES["file"]["type"] != "image/pjpeg")){
			echo "文件类型不合法，只能上传gif，jpeg，pjpeg文件";
		}else if(($_FILES["file"]["size"] > 1000000)){
			echo "文件不能超过1M";
		}else{
			if ($_FILES["file"]["error"] > 0){
				echo "Error: " . $_FILES["file"]["error"] . "<br />";
			}
			 else{
				$data['fname'] = $_FILES["file"]["name"];
				$suffix = substr(strrchr($data['fname'], '.'), 1);
				$data['type'] = $_FILES["file"]["type"];
				$data['time'] = date(His);
				$data['date'] = date(Ymd);
				var_dump($_FILES["file"]["tmp_name"]);
				//var_dump($data['date']);
				$data['tel']  = $_POST['tel'];
				//var_dump($data['tel']);
				$data['pname']= $_POST['name'];
				//var_dump($data['pname']);
				$filename = '/upload/'.$data['date']."/".$data['pname']."_".$data['time'].".".$suffix;
				var_dump($filename);
				move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
				echo("success");
			}
		}
	}
}