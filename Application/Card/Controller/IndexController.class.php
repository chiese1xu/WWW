<?php
namespace Card\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$card = M('Card');
		$cardlist = $card->select();
		$this->assign("cardlist",$cardlist);
		//print_r($cardlist);
		$this->display();
    }

	public function clan(){
		$card = M('Card');
		$clan = $_POST['clan'];
		if($clan==null ||$clan==""){
			//如果什么都不选，就等于都选
			$cl="'Crab','Crane','Dragon','Lion','Phoenix','Scorpion','Unicorn','Neutral'";
		}
		for($i=0;$i<count($clan);$i++){
			if($i==(count($clan)-1)){
				$cl=$cl."'".$clan[$i]."'";
			}else{
				$cl=$cl."'".$clan[$i]."',";
			}			
		}
		$condition_clan="ClanSymbol in(".$cl.")";
		
		$cardtype = $_POST['cardtype'];
		if($cardtype==null ||$cardtype==""){
			//如果什么都不选，就等于都选
			$ct="'Stronghold','Province','Holding','Character','Attachment','Event'";
		}
		for($i=0;$i<count($cardtype);$i++){
			if($i==(count($cardtype)-1)){
				$ct=$ct."'".$cardtype[$i]."'";
			}else{
				$ct=$ct."'".$cardtype[$i]."',";
			}			
		}
		$condition_cardtype="CardType in(".$ct.")";
		
		$decktype = $_POST['decktype'];
		if($decktype==null ||$decktype==""){
			//如果什么都不选，就等于都选
			$dt="'Dynasty','Conflict'";
		}
		for($i=0;$i<count($decktype);$i++){
			if($i==(count($decktype)-1)){
				$dt=$dt."'".$decktype[$i]."'";
			}else{
				$dt=$dt."'".$decktype[$i]."',";
			}			
		}
		$condition_decktype="DeckType in(".$dt.")";
		
		$title = $_POST['title'];
		if($title==null ||$title==""){
			$condition_title['Title']=array('like','%');
		}else{
			$condition_title['Title']=array('like','%'.$title.'%');
		}
		$cardlist = $card->where($condition_title)->where($condition_clan." AND ".$condition_cardtype." AND ".$condition_decktype)->order("Cost")->select();
		
		$this->assign("clan",$clan);
		$this->assign("cardtype",$cardtype);
		$this->assign("decktype",$decktype);
		$number=array('1','2');
		$this->assign("number",$number);
		
		$this->assign("cardlist",$cardlist);
		$this->display("index");
		
	}
}