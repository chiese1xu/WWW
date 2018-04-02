<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class ArticleViewModel extends ViewModel  {
	public $viewFields = array(
	 'Article'=>array('id','title','contentid','category'),
	 'Content'=>array('content', '_on'=>'Article.contentid = Content.id'),
	);

}