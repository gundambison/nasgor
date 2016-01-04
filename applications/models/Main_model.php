<?php 
class Main_model extends CI_Model {
private $params;
public $tableUser='mujur_user';
    public function __construct()
    {
		$config = $this->config->item('logConfig');
		//print_r($config);
		logCreateDir($config['path']);
        $this->load->database();
			
    }
	
	public function checkUser()
	{
		$username=$this->session->userdata('erp_username');
		$password=$this->session->userdata('erp_password');
		if($username==''){ 
			logCreate('no username','info');
			return false;
		}
		$time0=date("Y-m-d H:i:s", strtotime("now"));//+1 hours"));
		$time1=$this->session->userdata('erp_time');
		if($time0 > $time1){
			logCreate('time pass:'.$time1);
			return false; 
		}
		else{ 
			$time0=date("Y-m-d H:i:s", strtotime("+1 hours"));
		}
		
		$user=array(
			'username'=>$username,
			'password'=>$password
		);
		
		/*
		$sql="select count(user_id) c,user_id id from {$this->tableUser}
		where user_name='$username' and user_password='$password' and user_status=1";
		$data= $this->db->query($sql)->row_array();
		*/
		$valid=$this->userjomla->checkUser( $username, $password);
		if($valid==false){
			logCreate('user invalid pass:'.$password);
			return false;
		}
		
		$data=$this->member->getData($username,'user_name');
		//$user['raw'][]=$data[0];
		//print_r($data);
		$user['id']=$data[0]['id']; 
		
		$this->session->set_userdata('erp_userid',$user['id']);
		$this->session->set_userdata('erp_time',$time0);

		return $user;
		
	} 

	function showView($data,$base_view='base_view')
	{
		$this->params=$data;
		if(isset($params['contents'])){
		  foreach($params['contents'] as $content ){
			$folder=$params['folder'];
			$load_view= $folder.$content.'_view';
			logCreate("load:{$load_view}");
			$this->checkView($load_view,'body');
		  }
		}else{}
		
		if(isset($data['templateView']))$base_view=$data['templateView'];
	logCreate("base:{$base_view}");
		$this->load->view($base_view,$this->param);
		
	}

	function checkView($targets,$stat='view')
	{		
		//logCreate("target:".json_encode($targets));
//========CHECK DIRECTORY
		if(is_array($targets)){
			foreach($targets as $target){
				$this->checkView($target,$stat);
			}
		}
		else{ 
			$target=trim($targets);
//----------
			$ar=explode("/", $target);
			unset($ar[count($ar)-1]);
			if($stat=='view'||$stat=='body'){			
				$dir="views/".implode("/",$ar);
			}
			
			if($stat=='js'){
				$dir="assets/js/".implode("/",$ar);
			}
			
			if(!is_dir($dir)){
				logCreate('create dir:'.$dir,'info');
				mkdir($dir, 755, true);
			}
			
			if(!is_file("views/".$target.".php") && ($stat=='view'||$stat=='body') ){
				$txt="<?php 
	/****
		views	: $target
		created	: ".date("d-m-Y H:i:s")."
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/
	defined('BASEPATH') OR exit('No direct script access allowed');";
				if($stat=='view')
				  $txt.="\n?>\n
	<div class='container'><div class='row'>\n
	<!-- content Start-->\n\n<!-- content End-->\n
	</div></div>ERASE AFTER YOU CREATED THIS VIEW";
				file_put_contents ("views/".$target.".php", $txt,LOCK_EX );
				logCreate('create file:'."views/".$target.".php");
			}else{}
			
			if(!is_file("assets/js/".$target ) && $stat=='js'  ){
				$txt="/****
		Javascript	: $target
		created	: ".date("d-m-Y H:i:s")."
		By		: Gunawan Wibisono
		Using 	: CI3 Main Model
	****/";	
				file_put_contents ("assets/js/".$target , $txt,LOCK_EX );
				logCreate('create file:'."assets/js/".$target);
			}else{}
//------------		
		}

	}
	
/*
	Khusus untuk Nasgor Versi 2
*/		
	public function defaultParameter($theme='metro')
	{
		if($this->uri->segment(2,'')=='data'){
			logCreate('not Create defaultParameter','info');
			return array();
		}
		$params=array();
		$configTheme=$theme."NasgorConfig";
		$this->config->load($configTheme);
		 
		$params['title']=$this->config->item('nasgorTitle');
		$params['headerTitle']=$this->config->item('nasgorHeader');
		$params['today']=date('Y-m-d');		
		$params['baseFolder']=$this->config->item('nasgorBaseFolder'); 
		$params['footerJS']=$this->config->item('nasgorFooterJS');
		 
		$id=dbIdReport('id','activity',json_encode($_REQUEST)); 
		$name=$this->uri->segment(2,'');
		$params['dataUrl']=  $this->uri->segment(1). "_".$name;
		$params['myUrl']=  $this->uri->segment(1).ucfirst($name);
		
		$params['breadcrumbs']=array('unknown');
		
		$params['defaultMenu']='Core';
		$params['thisUrl']= $this->uri->segment(1).'/'.$this->uri->segment(2);
		$params['css']=$this->config->item('nasgorCss');
		$params['js']=$this->config->item('nasgorJS');
		$params['user']=$this->checkUser();
		if($this->config->item('templateView')!='')
			$params['templateView']=$this->config->item('templateView');
		return $params;
	}

	public function processData($load_view,$params)
	{
		$this->checkView($load_view,'body');		 
		$data=$this->load->view($load_view,$params,true); 
		$respon=json_decode($data,true);
		if(!is_array($respon)){
			logCreate('processData load:'.$load_view.'|not json','error');
			$respon=array('error'=>true,
				'value'=>$data, 
				'message'=>'Not valid'
			);
		}else{}
		
		if($_SERVER['HTTP_ACCEPT']=='application/json, text/javascript, */*; q=0.01'){
			return $respon;
		}else{ 
			logCreate('processData load:'.$load_view.'|show as html');
			echo isset($respon['body'])?$respon['body']:'' ;
			return false;
		}


		
	}
	
	public function processForm($load_view,$params)
	{
		$this->checkView($load_view );
		$data=$this->load->view($load_view,$params,true); 
		$respon=json_decode($data,true);
		if(!is_array($respon)){
			logCreate('processForm load:'.$load_view.'|not json','error');
			$respon=array('error'=>true,
				'value'=>$data, 
				'message'=>'Not valid'
			);
		}else{}
		
		return $respon;
	}
}