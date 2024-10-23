<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_base extends CI_Model {

	public function insert_data($data, $table_name) {
		$this->db->insert($table_name, $data);
		return $this->db->insert_id();
	}

	public function update_data($id, $col, $data, $table_name) {
		$this->db->where($col, $id);
		$this->db->update($table_name, $data); 
	}

	public function delete_data($id, $col, $col_del, $table_name) {
		$data[$col_del] = 'deleted';
		$this->db->where($col, $id);
		$this->db->update($table_name, $data); 
	}

	public function get_one($id, $col, $table_name) {
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($col, $id); 
		$query = $this->db->get();
		return $query->result_array(); 	
	}
	public function get_onev2($id, $col, $table_name, $con,$stat) {
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($con, $stat);
		$this->db->where($col, $id);
		$query = $this->db->get();
		return $query->result_array(); 	
	}

	public function get_all($table_name) {
		$this->db->select('*');
		$this->db->from($table_name);
		$query = $this->db->get();
		return $query->result_array(); 	
	}
	
	public function count_data($table_name) {
		$query = $this->db->get($table_name);
		$num = $query->num_rows();
		return $num;
	}

	public function like_data($data, $col, $table_name) {
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->like($col, $data);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_lastData($col, $table_name) {
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->order_by($col,"DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_firstData($col, $table_name) {
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->order_by($col,"ASC");
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_ajax($search) {
	 	if ($search == null) {
	 		return null;
	 	}
		$this->db->select('*');
		$this->db->from("motorcycles");
		$this->db->like("mot_brand", $search,'after');
		$this->db->or_like("mot_model", $search,'both');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_ajax2($keyword) {
	 	if ($keyword == null) {
	 		return null;
	 	}
		$this->db->select('*');
		$this->db->from("motorcycles");
		$this->db->like("mot_keyword", $keyword,'both');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function downloaddealermotorcycles($dealerid, $debid){

		if(empty($debid)){
			$this->db->select(array('a.dea_name as DEALER', 'b.name as BRANCH', 'c.mot_brand as BRAND', 'c.mot_slug as MODEL', 'd.dem_colors as COLORS', 
				'd.dem_created as DATECREATED'));
			$this->db->from('dealers a');
			$this->db->join('dealers_branches as b', 'a.dea_id=b.dea_id');
			$this->db->join('dealers_motorcycles as d', 'b.deb_id=d.deb_id');
			$this->db->join('motorcycles as c', 'd.mot_id=c.mot_id');
			$this->db->where('b.dea_id', $dealerid);
			$query = $this->db->get();
			return $query->result();
		}else{
			$this->db->select(array('a.dea_name as DEALER', 'b.name as BRANCH', 'c.mot_brand as BRAND', 'c.mot_slug as MODEL', 'd.dem_colors as COLORS', 
				'd.dem_created as DATECREATED'));
			$this->db->from('dealers a');
			$this->db->join('dealers_branches as b', 'a.dea_id=b.dea_id');
			$this->db->join('dealers_motorcycles as d', 'b.deb_id=d.deb_id');
			$this->db->join('motorcycles as c', 'd.mot_id=c.mot_id');
			$this->db->where('b.dea_id', $dealerid);
			$this->db->where('d.deb_id', $debid);
			$query = $this->db->get();
			return $query->result();
		}
	}
	
	public function dealers_inquiries($userid,$datefrom, $dateto){

			if(empty($datefrom) && empty($dateto)){
				$this->db->select(array('a.inq_id as ID', 'c.acc_name as BRANCH', 'a.inq_name as NAME', 'a.inq_phone as PHONE','concat(b.mot_brand," ",b.mot_slug) as BRAND', 
					'a.inq_payment as TERM','a.inq_color as COLOR','DATE_FORMAT(a.inq_created,"%M %d %Y") as DATE','a.inq_updated as LASTUPDATE', 'a.inq_process as STATUS'));
				$this->db->from('inquiries_new a');
				$this->db->join("motorcycles b", "b.mot_id = a.mot_id");
				$this->db->join("dealers_branches c", "c.deb_id = a.deb_id");
				$this->db->where('a.dea_id', $userid);
				$this->db->order_by("inq_created", 'DESC');
				$query = $this->db->get();
				return $query->result();
			}else{
				$this->db->select(array('a.inq_id as ID', 'c.acc_name as BRANCH', 'a.inq_name as NAME', 'a.inq_phone as PHONE','concat(b.mot_brand," ",b.mot_slug) as BRAND', 
					'a.inq_payment as TERM','a.inq_color as COLOR','DATE_FORMAT(a.inq_created,"%M %d %Y") as DATE','a.inq_updated as LASTUPDATE', 'a.inq_process as STATUS'));
				$this->db->from('inquiries_new a');
				$this->db->join("motorcycles b", "b.mot_id = a.mot_id");
				$this->db->join("dealers_branches c", "c.deb_id = a.deb_id");
				$this->db->where('a.dea_id', $userid);
				$this->db->where("inq_created >=", $datefrom);
				$this->db->where("inq_created <=", $dateto);
				$this->db->order_by("inq_created", 'DESC');
				$query = $this->db->get();
				return $query->result();
			}
	}
	
	public function updateimages($id,$data){
		// $this->db->where("mot_id",$id);
		// $this->db->update("motorcycles",$data);

// 		$this->db->where("mop_id",$id);
// 		$this->db->update("motorcycles_pictures",$data);
        $this->db->where("testimonialid",$id);
		$this->db->update("homepage_testimonial",$data);
	}	

}