<?php
namespace Home\Model;
use Think\Model;

class ProjectClassModel extends Model{
	public $TagMap;
	public $TypeMap;
	public $ProcessMap;
	public function __construct(){
		$this->GetMap();
	}

	public function GetMap(){
    	$process = M('ProjectClass')->where('class=1')->select();
    	$type = M('ProjectClass')->where('class=2')->select();
    	$tag = M('ProjectClass')->where('class=3')->select();

    	$res['process'] = $this->ProcessMap = $this->MapFactory($process);
    	$res['type'] = $this->TypeMap = $this->MapFactory($type);
    	$res['tag'] = $this->TagMap = $this->MapFactory($tag);

    	return $res;
	}

	private function MapFactory($arr){
		$res = array();
		foreach ($arr as $value) {
			$res[$value['id']] = $value['name'];
		}
		return $res;
	}

	public function ClassFactory(&$arr){
		$arr['TagName'] = $this->TagMap[$arr['tag']];
		$arr['TypeName'] = $this->TypeMap[$arr['type']];
		$arr['ProcessName'] = $this->ProcessMap[$arr['process']];
	}

	public function ArrayClassFactory(&$arr){
		foreach ($arr as &$value) {
			$this->ClassFactory($value);
		}
	}


}

?>