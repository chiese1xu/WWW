<?php
namespace Simplecard\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$card = M('Simplecard');
		$cardlist = $card->select();
		$this->assign("cardlist",$cardlist);
		//print_r($cardlist);
		$this->display();
    }

	public function find(){
		$card = M('Simplecard');
		$clan = $_POST['clan'];
		if($clan==""||$clan==null){
			$condition['Clan'] =array('like','%');
		}else{
			$condition['Clan'] =array('in',$clan);
		}
		
		$type = $_POST['type'];
		if($type==null ||$type==""){
			//如果什么都不选，就等于都选
			$condition['Type'] =array('like','%');
		}else{
			$condition['Type'] =array('in',$type);
		}
		
		$deck = $_POST['deck'];
		$other = $_POST['other'];
		
		$otherDeck = array('Air','Earth','Fire','Void','Water','Role','Stronghold');

		if($deck==null&&$other==null){
			$condition['Deck'] = array('like','%');
		}else{
			if($deck!=null&&$other!=null){
				$condition['Deck'] = array('in',array_merge($deck,$otherDeck));
			}
			if($other==null){
				$condition['Deck'] = array('in',$deck);
			}
			if($deck==null){
				$condition['Deck'] = array('in',$otherDeck);
			}
		}
		
		$title = $_POST['title'];
		if($title==null ||$title==""){
			$condition['Name']=array('like','%');
		}else{
			$condition['Name']=array('like','%'.$title.'%');
		}
		
		$cardlist = $card->where($condition)->order("Name")->select();
		$count = count($cardlist);
		
		$this->assign("clan",$clan);
		$this->assign("type",$type);
		$this->assign("deck",$deck);
		$this->assign("other",$other);
		$this->assign("count",$count);
		$this->assign("cardlist",$cardlist);
		$this->display("index");			
	}

}