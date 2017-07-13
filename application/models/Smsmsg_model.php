<?php
class Smsmsg_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }
    
    public function get_smsmsg($all_flag = TRUE)
	{
        $this->db->from('tb_recsms');
        $this->db->order_by("No", "desc");
        $this->db->limit(10, 0);
        $query = $this->db->get(); 
        return $query->result_array();
        /*
        if ($all_flag === TRUE)
        {
                $this->db->from('tb_recsms');
                $this->db->order_by("No", "desc");
                $this->db->limit(10, 0);
                $query = $this->db->get(); 
                return $query->result_array();
                /*
                $query = $this->db->get('tb_recsms');
                return $query->result_array();
               
        }

        $query = $this->db->get_where('tb_recsms', array('NewSms' => 0));
        return $query->row_array();
        */
	}

    public function insert_sms($phoneNum,$msg_body){

       date_default_timezone_set('US/Eastern');
     //  echo date_default_timezone_get();
       $currenttime = date('m/d/Y h:i:s a');
      
        //$recTime =  date('m/d/Y h:i:s a', time());
        $recTime =  $currenttime;

        $data = array(
                'PhoneNum' => $phoneNum,
                'RecTime' => $recTime,
                'Content' => $msg_body
        );

        $this->db->insert('tb_recsms', $data);
        //send_Sms("+17274872339", $msg);
        //send_Sms("+8615714254213", $msg);
        //send_Sms("+8618242423147", $msg);
        // Create connection
    
    }
}