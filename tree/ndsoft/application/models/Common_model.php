<?php
class Common_model extends CI_Model
{
   
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function GetData($table,$field='',$condition='',$group='',$order='',$limit='',$result='')
    {
        if($field != '')
        $this->db->select($field);
        if($condition != '')
        $this->db->where($condition);
        if($order != '')
        $this->db->order_by($order);
        if($limit != '')
        $this->db->limit($limit);
        if($group != '')
        $this->db->group_by($group);
        if($result != '')
        {
            $return =  $this->db->get($table)->row();
        }else{
            $return =  $this->db->get($table)->result();
        }
        return $return;
    }
    

    
    // insert and update
	public function SaveData($table,$data,$condition='')
    {
        $DataArray = array();
        if(!empty($data))
        {            
            if(!empty($condition))
            {
              $data['updated_at']=date("Y-m-d H:i:s");
            }
            else
            {
              $data['created']=date("Y-m-d H:i:s");
              $data['updated_at']=date("Y-m-d H:i:s");
            }
        }
        $table_fields = $this->db->list_fields($table);
        foreach($data as $field=>$value)
        {
            if(in_array($field,$table_fields))
            {
                $DataArray[$field]= $value;
            }
        }
       
        if($condition != '')
        {
            $this->db->where($condition);
            $this->db->update($table, $DataArray);
        }else{
            $this->db->insert($table, $DataArray);
        }
    }
    function delete($table,$con)
    {
        $this->db->where($con);
        $this->db->delete($table);
    }
    function JoinFunction($cond)
    {
        $this->db->select("m.*,p.*");
        $this->db->from("Members m");
        $this->db->join("Members p","m.id=p.ParentId");
        if($cond!=false)
        {
            $this->db->where($cond);
        }
        $query = $this->db->get();
        return $query->result();
    }
    
   
}

?>