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
	
	public function detail(){
		$id = I('get.id');
		$simplecard = M('Simplecard');
		$card = $simplecard->where('id='.$id)->find();
		$this->assign('card',$card);
		$this->display();
	}
	
	public function builder(){
		$simplecard = M('simplecard');
		$cardList = $simplecard->select();
		$this->assign("cardList",$cardList);
		//var_dump($cardList);
		$this->display();
	}
	
	public function filter(){
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
		$data = json_encode($cardlist);
		//$count = count($cardlist);
		
		echo($data);	
	}
	
	public function editDeck(){
		$id = $_POST['id'];
		$number = $_POST['number'];
		$simplecard = M('simplecard');
		$card = $simplecard->where("id=".$id)->find();
		echo(json_encode($card));		
	}
	
	public function test(){
		$data['name'] = "Great Deck";
		$data['dynasty'] = array( array('id'=>2,'num'=>1) ,array('id'=>4,'num'=>2),array('id'=>6,'num'=>3) );
		$data['conflict'] = array(array('id'=>12,'num'=>3) ,array('id'=>14,'num'=>2),array('id'=>16,'num'=>1) );
		array_push($data['conflict'],array('id'=>118,'num'=>3));
		print_r("<pre>");
		print_r($data);
	}

}