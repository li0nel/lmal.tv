<?php

class User_model extends CI_Model {

    function __construct()
    {
    	//parent::__construct();
    	$this->load->database();
    }

    private function remotefileexists($url)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_exec($ch);
		$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		// $retcode > 400 -> not found, $retcode = 200, found.
		curl_close($ch);
		return $retcode<400 && $retcode!=0;
	}

	public function login_user($email,$password)
	{
		$this->db->where('active', '1');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->select('userid,channel');
		$query=$this->db->get('users');

		if($query->num_rows() == 1)
			return $query->result();
		else
			return false;
	}

	//To display adequate message on login error
	public function does_user_exist($email)
	{
		$this->db->select('userid');
		$this->db->where('email', $email);
		$query=$this->db->get('users');
		if($query->num_rows() == 1)
			return true;
		else
			return false;
	}

	public function create_user($email,$password,$channel,$active='0')
	{
		$token = '';
		$streamkey = '';
		$length = 32;
		$validchars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		
		while($length--) {
			$token .= $validchars[mt_rand(0, strlen($validchars)-1)];
		}
		
		$length = 12;
		while($length--) {
			$streamkey .= $validchars[mt_rand(0, strlen($validchars)-1)];
		}

		$this->db->set('datetime', 'now()', FALSE);
		$this->db->insert('users', array('email'=>$email,'password'=>$password,'active'=>$active,'activation_token'=>$token,'channel'=>$channel,'streamkey'=>$streamkey));

		if ($this->db->affected_rows())
		{
/*			$this->load->library('email');
			$config['mailtype']='html';
			$this->email->initialize($config);
			
			$data['channel']=$channel;
			$data['token']=$token;

			$this->email->from('noreply@lmal.tv', 'LMAL.TV');
			$this->email->to($email); 
			$this->email->bcc('lionel@lmal.tv'); 
			$this->email->subject('Bienvenue sur LMAL.TV');//'Thanks for joining LMAL.TV');
			$this->email->message($this->load->view('emails/activate',$data,TRUE));
			// 'Welcome! Please validate your registration by clicking this link: '.base_url().$channel.'/activate/'.$token);
			$this->email->send();*/
			return $this->db->insert_id();
		}
		else
			return 0;
	}
	
	public function get_channel($channel)
	{
		$this->load->helper('url');
		
		$this->db->select('userid, email, active, name, description, website, twitter, facebook, streamkey, nextevent_title, nextevent_description, nextevent_startdate, price');
		$this->db->select('TIMESTAMPDIFF(MINUTE,CURRENT_TIMESTAMP(),nextevent_startdate) as timebeforebegin, TIMESTAMPDIFF(HOUR,CURRENT_TIMESTAMP(),nextevent_startdate) as timebeforebegin_hours,TIMESTAMPDIFF(DAY,CURRENT_TIMESTAMP(),nextevent_startdate) as timebeforebegin_days',FALSE);
		$this->db->select('DATE_FORMAT(nextevent_startdate, "%Y-%m-%d") nextevent_date,DATE_FORMAT(nextevent_startdate, "%H:%i") nextevent_time',FALSE);
		$this->db->where('channel', $channel);
		$query=$this->db->get('users');
		
		if($query->num_rows() == 1)
		{
			$result=$query->result_array();
			$this->db->where(array('userid'=>$result[0]['userid'],'active'=>1));
			$this->db->from('events');
			$result[0]['nbevents']=$this->db->count_all_results();
			
			if ($this->remotefileexists(base_url('assets/pictures/'.$channel.'.png')))
				$result[0]['picture']=base_url('assets/pictures/'.$channel.'.png?'.rand());
			else if ($this->remotefileexists(base_url('assets/pictures/'.$channel.'.jpg')))
				$result[0]['picture']=base_url('assets/pictures/'.$channel.'.jpg?'.rand());
			else if ($this->remotefileexists(base_url('assets/pictures/'.$channel.'.gif')))
				$result[0]['picture']=base_url('assets/pictures/'.$channel.'.gif?'.rand());
			else
				$result[0]['picture']=base_url('assets/pictures/nopict.png');

			return $result[0];
		}
	}

	public function get_channel_archives($channel)
	{
		$this->load->helper('url');
		$this->load->model('Stats_model');
		
		$this->db->select('userid');
		$this->db->where('channel', $channel);
		$query=$this->db->get('users');
		
		if($query->num_rows() == 1)
		{
			$result=$query->result_array();
			$this->db->select('eventid, eventidhash,title, archive, startdate as originalstartdate, enddate');
			$this->db->select('CONVERT_TZ(startdate,"GMT","Europe/Paris") as startdate',false);
			$this->db->select('TIMESTAMPDIFF(MINUTE, startdate, enddate) as duration',false);
			$this->db->where(array('userid'=>$result[0]['userid'],'active'=>1,'enddate !='=>'0000-00-00 00:00:00'));
			$query=$this->db->get('events');
			$result=$query->result_array();
			
			foreach ($result as &$row) {
				$row['nbviewers']=$this->Stats_model->get_max_viewers($channel,$row['originalstartdate'],$row['enddate']);
			}
			
			return $result;
		}
	}


	public function get_user($userid)
	{
		$this->load->helper('url');
		
		$this->db->select('channel, userid, email, active, name, description, website, twitter, facebook, streamkey');
		$this->db->where('userid', $userid);
		$query=$this->db->get('users');
		
		if($query->num_rows() == 1)
		{
			$result=$query->result_array();
			$this->db->where(array('userid'=>$userid,'active'=>1));
			$this->db->from('events');
			$result[0]['nbevents']=$this->db->count_all_results();
			
			if ($this->remotefileexists(base_url('assets/pictures/'.$result[0]['channel'].'.png')))
				$result[0]['picture']=base_url('assets/pictures/'.$result[0]['channel'].'.png?'.rand());
			else if ($this->remotefileexists(base_url('assets/pictures/'.$result[0]['channel'].'.jpg')))
				$result[0]['picture']=base_url('assets/pictures/'.$result[0]['channel'].'.jpg?'.rand());
			else if ($this->remotefileexists(base_url('assets/pictures/'.$result[0]['channel'].'.gif')))
				$result[0]['picture']=base_url('assets/pictures/'.$result[0]['channel'].'.gif?'.rand());
			else
				$result[0]['picture']=base_url('assets/pictures/nopict.png');

			return $result[0];
		}
	}

	public function set_email($channel,$email)
	{
		$this->db->where('active', '0');
		$this->db->where('channel', $channel);
		$this->db->update('users', array('email'=>$email));		

		if ($this->db->affected_rows())
		{
			$this->db->select('activation_token');
			$this->db->where('channel', $channel);
			$query=$this->db->get('users');
			if($query->num_rows() == 1) {
				$row=$query->result();
				$data['token']=$row[0]->activation_token;
			} else
				return false;

			$this->load->library('email');
			$config['mailtype']='html';
			$this->email->initialize($config);
			
			$data['channel']=$channel;

			$this->email->from('noreply@lmal.tv', 'LMAL.TV');
			$this->email->to($email); 
			$this->email->bcc('lionel@lmal.tv'); 
			$this->email->subject('Bienvenue sur LMAL.TV');//'Thanks for joining LMAL.TV');
			$this->email->message($this->load->view('emails/activate',$data,TRUE));
			$this->email->send();
			return $this->db->insert_id();
		}
		else
			return 0;
	}
	
	public function activate_channel($channel,$token,$password)
	{
		$this->db->select('email');
		$this->db->where('channel', $channel);
		$query=$this->db->get('users');
		if($query->num_rows() > 0) {
			$row=$query->result();
			$email=$row[0]->email;
		}
		else return false;

		$this->db->where('email', $email);
		$this->db->where('activation_token', $token);
		$this->db->update('users', array('active'=>'1','password'=>$password));	

		if ($this->db->affected_rows())
			return true;
		else
			return false;
	}
	
	public function forgotpwd($email)
	{
		$token = '';
		$length = 32;
		$validchars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		
		while($length--) {
			$token .= $validchars[mt_rand(0, strlen($validchars)-1)];
		}

		$this->db->where('email', $email);
		$this->db->update('users', array('activation_token'=>$token));	

		if ($this->db->affected_rows())
		{
			$this->db->select('channel');
			$this->db->where('email', $email);
			$query=$this->db->get('users');
			if($query->num_rows() == 1) {
				$row=$query->result();
				$data['channel']=$row[0]->channel;
			} else
				return false;

			$this->load->library('email');
			$config['mailtype']='html';
			$this->email->initialize($config);
			
			$data['token']=$token;

			$this->email->from('noreply@lmal.tv', 'LMAL.TV');
			$this->email->to($email); 
			$this->email->bcc('lionel@lmal.tv'); 
			$this->email->subject('Réinitialisez votre mot de passe LMAL.TV');//'Reset your LMAL.TV password');
			$this->email->message($this->load->view('emails/forgotpwd',$data,TRUE));
			$this->email->send();

			return true;
		}
		else
			return false;
	}
	
	public function updateprofile($userid, $column, $data)
	{
		if ($column=='name' || $column=='description' || $column=='nextevent_title' || $column=='nextevent_description') {
			$this->db->where('userid', $userid);
			$this->db->update('users', array($column=>$data));

			return $this->db->affected_rows();
		} else return false;
	}


	public function set_fbaccess($userid, $fbuserid, $token)
	{
		if(isset($userid) && isset($fbuserid) && isset($token)) {
			$this->db->where('userid', $userid);
			$this->db->update('users', array('fb_userid'=>$fbuserid, 'fb_accesstoken'=>$token));
			return $this->db->affected_rows();
		} else return false;
	}
	
	public function get_fbaccess($userid)
	{
		$this->db->select('fb_userid, fb_accesstoken, fb_pageaccesstoken');
		$this->db->where('userid', $userid);
		$query=$this->db->get('users');
		
		if($query->num_rows() == 1) {
			$result=$query->result_array();
			return $result[0];
		} else return 0;
	}
	
	public function set_fbpage($userid,$pageid) 
	{
		$this->db->where('userid', $userid);
		$this->db->update('users', array('fbpageid'=>$pageid));
	}
	
	public function get_channel_from_fbpageid($pageid) {
		$this->db->select('channel, userid');
		$this->db->where('fbpageid', $pageid);
		$query=$this->db->get('users');
		
		if($query->num_rows() == 1) {
			$result=$query->result_array();
			return $result[0];
		} else return false;
	}
	
	public function setnextevent($channel,$data) {
		if ($data['date']=='' || $data['time']=='') {
			$this->db->where(array('channel'=>$channel));
			$this->db->update('users',array('nextevent_title'=>$data['title'],'nextevent_startdate'=>null));
		} else {
			$startdate = DateTime::createFromFormat('Y-m-d G:i', $data['date'].' '.$data['time']);
			$this->db->where(array('channel'=>$channel));
			$this->db->update('users',array('nextevent_title'=>$data['title'],'nextevent_startdate'=>$startdate->format('Y-m-d H:i:s')));
		}
	}
}