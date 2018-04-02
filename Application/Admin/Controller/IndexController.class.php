<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {	
    public function index(){
		//$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
		$this->display();
	}
	
	public function left(){
		$this->display();
	}

	public function main(){
		//如果没有指定category类别，那么就默认显示category=1的类别
		$category=$_GET['category']?$_GET['category']:1;
		$articleList = $this->findArticleByCate($category);
		
		$this->assign('articleList',$articleList);		
		$this->display();
	}
	
	public function findArticleByCate($category=1){
		$article=M('article');
		$articleList = $article->where("category =".$category)->select();
		return $articleList;
	}
	
	public function findContentByAId($articleId){
		$articleView = D('ArticleView');
		$res = $articleView->where('Article.id='.$articleId)->find();
		//var_dump($res);
		return $res;
	}
	
	public function edit(){
		$articleId = $_GET['articleId'];
		$res = $this->findContentByAId($articleId);	
		$this->assign('article',$res);
		$this->display();
	}
	
	public function update(){
		//将post的内容分别保存到article和content对象中
		$Article = M('Article');
		$articleId = $_POST['id'];		
		$article_Data['title'] = $_POST['title'];
		$Content = M('Content');		
		$content_Data['content'] = $_POST['content'];
		//根据article的id，获取content的id
		$result=$Article->where('id='.$articleId)->field('id')->find();
		$contentId=$result['id'];
		//var_dump($contentId);
		//保存更新的内容到article和content中
		$Article->where('id='.$articleId)->save($article_Data);
		$Content->where('id='.$contentId)->save($content_Data);	
		$this->redirect("Admin/Index/main","",2);
	}
	
	
	
	public function postnews(){
		$content = $_POST['content'];
		$this->assign('content',$content);
		//echo($content);
		$this->display();
	}
}