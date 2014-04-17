<?php

class Event_model extends CI_Model {

    function __construct() {
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
    
	public function createevent($channel,$userid,$title,$description, $date, $hour, $duration) {
		$this->load->model('Pseudocrypt_model');
		
		$startdate=date("Y-m-d H:i:s",strtotime('+ 0 hours', strtotime($date.' '.$hour)));
		$enddate=date("Y-m-d H:i:s",strtotime('+'.$duration.' hours', strtotime($date.' '.$hour)));
		
		$this->db->insert('events',array('active'=>1,'userid'=>$userid,'title'=>$title,'description'=>$description,'enddate'=>$enddate,'startdate'=>$startdate));
		
		if ($this->db->affected_rows())
		{
			$eventid = $this->db->insert_id();

			$this->db->where(array('eventid'=>$eventid));
			$eventidhash=$this->Pseudocrypt_model->udihash($eventid);
			$this->db->update('events',array('eventidhash'=>$eventidhash));
//			return $eventidhash;
		}
	}
	
	public function get_last_event($userid)
	{
		$this->load->helper('url');
		
		$this->db->select('eventid, eventidhash, title, description, paid, startdate, enddate, TIMESTAMPDIFF(MINUTE,CURRENT_TIMESTAMP(),startdate) as timebeforebegin, TIMESTAMPDIFF(MINUTE,CURRENT_TIMESTAMP(),enddate) as timebeforeend,TIMESTAMPDIFF(HOUR,CURRENT_TIMESTAMP(),startdate) as timebeforebegin_hours,TIMESTAMPDIFF(DAY,CURRENT_TIMESTAMP(),startdate) as timebeforebegin_days, TIMESTAMPDIFF(MINUTE, startdate, enddate) as duration',false);
		$this->db->order_by('creationdate', 'desc'); 
		$this->db->limit(1); 
		$this->db->where(array('userid' => $userid,'active'=>1));
	 	$query = $this->db->get('events');
	 	
	 	if($query->num_rows() == 1) {
		 	$result=$query->result_array();
	
			if ($this->remotefileexists(base_url('assets/posters/'.$result[0]['eventidhash'].'.png')))
				$result[0]['poster']=base_url('assets/posters/'.$result[0]['eventidhash'].'.png?'.rand());
			else if ($this->remotefileexists(base_url('assets/posters/'.$result[0]['eventidhash'].'.jpg')))
				$result[0]['poster']=base_url('assets/posters/'.$result[0]['eventidhash'].'.jpg?'.rand());
			else if ($this->remotefileexists(base_url('assets/posters/'.$result[0]['eventidhash'].'.gif')))
				$result[0]['poster']=base_url('assets/posters/'.$result[0]['eventidhash'].'.gif?'.rand());
			else
				$result[0]['poster']=base_url('assets/posters/noposter.jpg');
	
		 	return $result[0];
		}
	}

	public function get_event($eventidhash)
	{
		$this->load->helper('url');
		
		$this->db->select('userid, eventid, eventidhash, title, description, paid, startdate, enddate, TIMESTAMPDIFF(MINUTE,CURRENT_TIMESTAMP(),startdate) as timebeforebegin, TIMESTAMPDIFF(MINUTE,CURRENT_TIMESTAMP(),enddate) as timebeforeend,TIMESTAMPDIFF(HOUR,CURRENT_TIMESTAMP(),startdate) as timebeforebegin_hours,TIMESTAMPDIFF(DAY,CURRENT_TIMESTAMP(),startdate) as timebeforebegin_days, TIMESTAMPDIFF(MINUTE, startdate, enddate) as duration',false);
		$this->db->where(array('eventidhash' => $eventidhash,'active'=>1));
	 	$query = $this->db->get('events');
	 	
	 	if($query->num_rows() == 1) {
		 	$result=$query->result_array();
	
			if ($this->remotefileexists(base_url('assets/posters/'.$result[0]['eventidhash'].'.png')))
				$result[0]['poster']=base_url('assets/posters/'.$result[0]['eventidhash'].'.png?'.rand());
			else if ($this->remotefileexists(base_url('assets/posters/'.$result[0]['eventidhash'].'.jpg')))
				$result[0]['poster']=base_url('assets/posters/'.$result[0]['eventidhash'].'.jpg?'.rand());
			else if ($this->remotefileexists(base_url('assets/posters/'.$result[0]['eventidhash'].'.gif')))
				$result[0]['poster']=base_url('assets/posters/'.$result[0]['eventidhash'].'.gif?'.rand());
			else
				$result[0]['poster']=base_url('assets/posters/noposter.jpg');
	
		 	return $result[0];
		}
	}

	public function get_event_fromid($eventid)
	{
		$this->load->helper('url');
		
		$this->db->select('userid, eventid, eventidhash, title, description, paid, startdate, enddate, TIMESTAMPDIFF(MINUTE,CURRENT_TIMESTAMP(),startdate) as timebeforebegin, TIMESTAMPDIFF(MINUTE,CURRENT_TIMESTAMP(),enddate) as timebeforeend,TIMESTAMPDIFF(HOUR,CURRENT_TIMESTAMP(),startdate) as timebeforebegin_hours,TIMESTAMPDIFF(DAY,CURRENT_TIMESTAMP(),startdate) as timebeforebegin_days, TIMESTAMPDIFF(MINUTE, startdate, enddate) as duration',false);
		$this->db->where(array('eventid' => $eventid,'active'=>1));
	 	$query = $this->db->get('events');
	 	
	 	if($query->num_rows() == 1) {
		 	$result=$query->result_array();
	
			if ($this->remotefileexists(base_url('assets/posters/'.$result[0]['eventidhash'].'.png')))
				$result[0]['poster']=base_url('assets/posters/'.$result[0]['eventidhash'].'.png?'.rand());
			else if ($this->remotefileexists(base_url('assets/posters/'.$result[0]['eventidhash'].'.jpg')))
				$result[0]['poster']=base_url('assets/posters/'.$result[0]['eventidhash'].'.jpg?'.rand());
			else if ($this->remotefileexists(base_url('assets/posters/'.$result[0]['eventidhash'].'.gif')))
				$result[0]['poster']=base_url('assets/posters/'.$result[0]['eventidhash'].'.gif?'.rand());
			else
				$result[0]['poster']=base_url('assets/posters/noposter.jpg');
	
		 	return $result[0];
		}
	}
	
	public function updateevent($eventidhash,$column,$data) {
		if ($column=='title' || $column=='description') {
			$this->db->where(array('eventidhash'=>$eventidhash));
			$this->db->update('events',array($column=>$data));
		} else if ($column=='duration') {
			$this->db->where(array('eventidhash'=>$eventidhash));
			$this->db->set('enddate', 'startdate + INTERVAL '.$data.' HOUR',FALSE);
			$this->db->update('events');
		} else if ($column=='date') {
			//get duration
			$this->db->select('TIMESTAMPDIFF(MINUTE, startdate, enddate) as duration, EXTRACT(HOUR from startdate) as hour, EXTRACT(MINUTE from startdate) as minute, EXTRACT(SECOND from startdate) as second',false);
			$this->db->where(array('eventidhash' => $eventidhash));
		 	$query = $this->db->get('events');
		 	$row=$query->row();
		 	$duration=$row->duration;
		 	if ($duration==NULL) $duration=0;
			//get hour
			//update startdate with current hour
			//vérifier date avec constructeur car foireux!!
			$startdate = DateTime::createFromFormat('d-m-Y', $data);
			$now = new DateTime();
			if (!checkdate($startdate->format('m'),$startdate->format('d'),$startdate->format('Y')))
				return FALSE;
			$startdate->setTime($row->hour, $row->minute, $row->second);
			$enddate = clone $startdate;
			$enddate->add(new DateInterval('PT' . $duration . 'M'));
			
			if ($startdate<=$now) return 1;
			
			$this->db->where(array('eventidhash' => $eventidhash));
			$this->db->update('events',array('startdate'=>$startdate->format('Y-m-d H:i:s'),'enddate'=>$enddate->format('Y-m-d H:i:s')));
			//done
		} else if ($column=='time') {
			//get duration
			$this->db->select('TIMESTAMPDIFF(MINUTE, startdate, enddate) as duration, EXTRACT(DAY from startdate) as day, EXTRACT(MONTH from startdate) as month, EXTRACT(YEAR from startdate) as year',false);
			$this->db->where(array('eventidhash' => $eventidhash));
		 	$query = $this->db->get('events');
		 	$row=$query->row();
		 	$duration=$row->duration;
		 	if ($duration==NULL) $duration=0;
		 	
		 	if ($row->year=='0000') 
		 		return 2;
		 		
			//get hour
			//update startdate with current hour
			$startdate = DateTime::createFromFormat('d-m-Y H:i',$row->day.'-'.$row->month.'-'.$row->year.' '.$data);
			$now = new DateTime();
			$enddate = clone $startdate;
			$enddate->add(new DateInterval('PT' . $duration . 'M'));

			if ($startdate<=$now) return 1;

			$this->db->where(array('eventidhash' => $eventidhash));
			$this->db->update('events',array('startdate'=>$startdate->format('Y-m-d H:i:s'),'enddate'=>$enddate->format('Y-m-d H:i:s')));
			//done
		}
		return 0;
	}
		
	public function deleteevent($eventidhash) {
		$this->db->where(array('eventidhash'=>$eventidhash));
		$this->db->update('events',array('active'=>0));
	}

	public function deleteeventid($eventid) {
		$this->db->where(array('eventid'=>$eventid));
		$this->db->update('events',array('active'=>0));
	}

	public function startevent($eventidhash) {
		$this->db->where(array('eventidhash'=>$eventidhash));
		$this->db->set('startdate', 'NOW()', FALSE);  
		$this->db->update('events',array());
	}
	
	public function stopevent($eventidhash) {
		$this->db->where(array('eventidhash'=>$eventidhash));
		$this->db->set('enddate', 'NOW()', FALSE);  
		$this->db->update('events',array());	}
	
	public function unlockevent($eventidhash) {
		$this->db->where(array('eventidhash'=>$eventidhash));
		$this->db->update('events',array('paid'=>1));
	}

}