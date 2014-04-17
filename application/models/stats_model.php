<?php

class Stats_model extends CI_Model {

    function __construct()
    {
    	//parent::__construct();
    }

	public function get_live_stats($channel)
	{
		//cache system
		//check in database if last row (eventidhash) is older than 30sec
		//if yes, call GoSquared and save epoch in database
		//if no, retrieve the last row stats value and output it.
		$this->db->select('nbviewers');
		$this->db->where(array('channel' => $channel,'TIMESTAMPDIFF(SECOND,date,CURRENT_TIMESTAMP())<'=>'30'));
		$this->db->order_by('date','desc');
		$this->db->limit(1);
	 	$query = $this->db->get('stats');
	 	//exit(var_dump($this->db->last_query()));
	 	
	 	if($query->num_rows() > 0)
	 	{
	 		$result=$query->result_array();
//	 		exit(var_dump($result[0]['nbviewers']));
	 		return $result[0]['nbviewers'];
	 	}
	 	else
	 	{
	 		//get live stats from gosquared, then record for cache or graph
	 		$nbviewers=0;
			$ch = curl_init('https://api.gosquared.com/latest/pages/?&api_key=KTMSGVT9BU3LUAZL&site_token=GSN-679547-N');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$json=curl_exec($ch);
			$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			// $retcode > 400 -> not found, $retcode = 200, found.
			curl_close($ch);
			if ($retcode<400 && $retcode!=0)
			{
				$list=json_decode($json)->list;
				foreach ($list as $page)
				{
					if(substr($page->path,1)==$channel.'/embed'	|| substr($page->path,1)==$channel)
					{
						$nbviewers+=$page->visitors;
					}
				}
			}
			
			//nbviewers is live stats
			//record
			//no need to calculate epoch, set mysql DEFAULT CURRENT_TIMESTAMP on epoch
			$this->db->insert('stats',array('nbviewers'=>$nbviewers,'channel'=>$channel));
			return $nbviewers;
		}
	}
	
	public function get_stats($channel,$startdate,$enddate) //read only
	{
		$this->db->select('UNIX_TIMESTAMP(date)*1000 as epoch, nbviewers as viewers');
		$this->db->where(array('channel' => $channel,'date >='=>$startdate,'date <='=>$enddate));
		$this->db->order_by('date');
	 	$query = $this->db->get('stats');
	 	return $query->result_array();		
	}
	
	public function get_max_viewers($channel,$startdate,$enddate) {
		$this->db->select_max('nbviewers');
		$this->db->where(array('channel' => $channel,'CONVERT_TZ(date,"Europe/Paris","GMT") >='=>$startdate, 'CONVERT_TZ(date,"Europe/Paris","GMT") <='=>$enddate));
	 	$query = $this->db->get('stats');
	 	$result=$query->result_array();
	 	return $result[0]['nbviewers']==null?0:$result[0]['nbviewers'];
	}
}