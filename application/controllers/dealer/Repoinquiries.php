<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repoinquiries extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','date', 'form','breadcrumb'));
		$this->load->library(array('form_validation', 'security', 'session', 'pagination'));
		$this->load->model('model_base');

// 		if ( $this->have_sess_branch() != true ){
// 			$this->logout_branch();	
// 			//redirect('dealer/login/logout','refresh');
// 		}
// 		$this->session->unset_userdata('selected_client');	
    }
	
    public function index( $inq_name = "xallx", $inq_created_from = "xallx", $inq_created_to = "xallx", $filter = 1 )
	{
		$inq_name = $this->clean_input( $inq_name );
		$inq_created_from = $this->clean_input( $inq_created_from );
		$inq_created_to = $this->clean_input( $inq_created_to );
		$filter = $this->clean_input( $filter );

        $this->session->set_userdata('current_url', current_url());

		$header = [];
		$header['header_title'] = 'Repo Inquiries';
		$header['header'] = 'Repo Inquiries';
		$header['header_small'] = '';
		
        $content = [];
        
        // echo "<pre>";
        // print_r($this->session->all_userdata());
        // echo "</pre>";

		if ( $this->input->post('search_mode') ) {
			$this->form_validation->set_rules('inq_name', 'name', 'trim');
			$this->form_validation->set_rules('inq_created_from', 'start date', 'trim');
			$this->form_validation->set_rules('inq_created_to', 'end date', 'trim');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msg_error', validation_errors());	
				redirect('dealer/repoinquiries/index/xallx/xallx/xallx', 'refresh');
			} else {
				$data = $this->input->post();

				$inq_name = $data['inq_name'];
				$inq_created_from = $data['inq_created_from'];
				$inq_created_to = $data['inq_created_to'];

				if (!$inq_name) {
					$inq_name = "xallx";
				}

				if (!$inq_created_from) {
					$inq_created_from = "xallx";
				}

				if (!$inq_created_to) {
					$inq_created_to = "xallx";
				}

				// $this->godprintp($data);
				redirect('dealer/repoinquiries/index/' . $inq_name ."/" . $inq_created_from . "/". $inq_created_to, 'refresh');
			}	
		}

		$config = array();
		$config["base_url"] = base_url() . "dealer/repoinquiries/index/". $inq_name ."/" . $inq_created_from . "/". $inq_created_to ."/";
		$this->_sort($inq_name, $inq_created_from, $inq_created_to );
		$total_row = $this->model_base->count_data('inquiries_repo');
		$config["total_rows"] = $total_row;
		$config['per_page'] = 50;
		$config['uri_segment'] = 7;
		$config['num_links'] = 10;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_link'] = 'Next';

		$config['last_tag_open'] = '<li>';
		$config['last_link'] = 'Last';
		$config['last_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>';
		$config['first_link'] = 'First'; 
		$config['first_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$offset = ($filter - 1) * $config["per_page"];
		$this->db->limit( $config["per_page"] , $offset);
		$content["current_count_start"] = $offset;
		
		$this->_sort($inq_name, $inq_created_from, $inq_created_to );
		$content['inquiries'] = $this->model_base->get_all('inquiries_repo');

		// $this->godprint( $content['inquiries'] );

		$content['inq_name'] = $inq_name;
		$content['inq_created_from'] = $inq_created_from;
		$content['inq_created_to'] = $inq_created_to;

		$content['controller']=$this; 
		$content['all'] = base_url('dealer/repoinquiries/index/xallx/xallx');
		$content['published'] = base_url('dealer/repoinquiries/index/inq_status/published');
		$content['draft'] = base_url('dealer/repoinquiries/index/inq_status/draft');
		$content['deleted'] = base_url('dealer/repoinquiries/index/inq_status/deleted');
		$content['create'] = base_url('dealer/repoinquiries/create');

		$this->load->view("template/dealer_header", $header);
		$this->load->view('dealer/repoinquiries/index', $content);
		$this->load->view("template/dealer_footer");
    }

    public function _sort ($inq_name, $inq_created_from, $inq_created_to) {

		$inq_name = $this->clean_input( $inq_name );
		$inq_created_from = $this->clean_input( $inq_created_from );
		$inq_created_to = $this->clean_input( $inq_created_to );

		$this->db->order_by('inquiries_repo.inq_created', 'DESC');

		if ( $inq_name != 'xallx') {
			$this->db->like("inq_name", urldecode($inq_name));	
		}

		if ( $inq_created_from != 'xallx') {
			$this->db->where("inq_created >=", date("Y\-m\-d\ H:i:s", strtotime($inq_created_from)));	
		}

		if ( $inq_created_to != 'xallx') {
			$this->db->where("inq_created <=", date("Y\-m\-d\ H:i:s", strtotime($inq_created_to . ' +1 day')));	
		}
			$this->db->where('inquiries_repo.deb_id', $this->session->userdata('deb_id'));
			$this->db->join("repo", "repo.mot_id = inquiries_repo.mot_id");
		    $this->db->join("dealers_branches", "dealers_branches.deb_id = repo.deb_id");
    }
    
    public function edit($id)
	{
        // echo "<pre>";
        // print_r($this->session->all_userdata());
        // echo "</pre>";

		$header = [];
		$header['header_title'] = 'Repo Inquiry';
		$header['header'] = 'Repo Inquiry';
		$header['header_small'] = 'Edit';
		
		$content = [];

		//validations

		if($this->input->post()) {

			//validations
			$this->form_validation->set_rules('inq_process', 'Inquiry Status', 'required|trim');
			$this->form_validation->set_rules('inq_repo_remarks', 'Inquiry Remarks', 'trim');

			if ($this->form_validation->run() == FALSE) {
				$content['msg_error'] = validation_errors();
			} else {
                // success
                
		  		$data = $this->input->post();

				$data['inq_updated'] = $this->getDatetimeNow();

		        $this->model_base->update_data($id, 'inq_id', $data, 'inquiries_repo');
				$this->session->set_flashdata('msg_success', 'Inquiry Updated!');	

				redirect('dealer/repoinquiries/edit/' . $id, 'refresh');
			}
		}


			$this->db->where('inquiries_repo.deb_id', $this->session->userdata('deb_id'));
			$this->db->join("repo", "repo.mot_id = inquiries_repo.mot_id");
			$this->db->join("dealers_branches", "dealers_branches.deb_id = repo.deb_id");
			$content['inquiries'] = $this->model_base->get_one($id, "inq_id", "inquiries_repo");
		
		$this->db->flush_cache();

        // $this->godprint($content['inquiries']);

        $current_url  =  $this->session->userdata('current_url');
        $content['back'] = $current_url;
        
		$this->load->view("template/dealer_header", $header);
		$this->load->view('dealer/repoinquiries/edit', $content);
		$this->load->view("template/dealer_footer");
	}

	public function clean_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = $this->security->xss_clean($data);
		return $data;
	}

	public function dealers_inquirydownload(){
		// $dealerid = $this->input->get('dealerid');
		// $debid = $this->input->get('debid');
		$datefrom = "";
		$dateto = "";
		if($this->input->get('downloadall')=='true'){
			$fileName = 'data-'.time().'.xlsx';  
	        // load excel library

	        $this->load->library('excel');
	        $listInfo = $this->model_base->dealers_inquiries($this->session->userdata('dea_id'),$datefrom,$dateto);

	        $objPHPExcel = new PHPExcel();
	        $objPHPExcel->setActiveSheetIndex(0);
	        // set Header

	        $objPHPExcel->getActiveSheet()->SetCellValue('A1', '#');
	        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'BRANCH');
	        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'NAME');
	        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Contact');
	        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Model Unit');  
	        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Terms'); 
	        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Color');
	        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Date');
	        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Status');    
	        // set Row
	        $rowCount = 2;
	        foreach ($listInfo as $list) {
	            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->ID);
	            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->BRANCH);
	            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->NAME);
	            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->PHONE);
	            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->BRAND);
	            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->TERM);
	            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->COLOR);
	            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->DATE);
	            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->STATUS);
	            $rowCount++;
	        }
	        $filename = $this->session->userdata('acc_name')." Inquiries-". date("Y-m-d-H-i-s").".csv";
	       // header('Content-Type: application/vnd.ms-excel'); 
	       // header('Content-Disposition: attachment;filename="'.$filename.'"');
	       // header('Cache-Control: max-age=0'); 
	       // $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
	       // $objWriter->save('php://output');
	        header('Content-Encoding: UTF-8');
            header('Content-type: text/csv; charset=UTF-8');
            header('Content-Disposition: attachment; filename="'.$filename.'"');
            echo "\xEF\xBB\xBF"; // UTF-8 BOM
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
	        $objWriter->save('php://output');
		}else{
			$datefrom = $this->input->get('datefrom');
			$dateto = $this->input->get('dateto');
			$fileName = 'data-'.time().'.xlsx';  
	        // load excel library

	        $this->load->library('excel');
	        $listInfo = $this->model_base->dealers_inquiries($this->session->userdata('dea_id'),$datefrom,$dateto);

	        $objPHPExcel = new PHPExcel();
	        $objPHPExcel->setActiveSheetIndex(0);
	        // set Header

	        $objPHPExcel->getActiveSheet()->SetCellValue('A1', '#');
	        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'BRANCH');
	        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'NAME');
	        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Contact');
	        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Model Unit');  
	        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Terms'); 
	        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Color');
	        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Date');
	        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Status');    
	        // set Row
	        $rowCount = 2;
	        foreach ($listInfo as $list) {
	            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->ID);
	            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->BRANCH);
	            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->NAME);
	            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->PHONE);
	            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->BRAND);
	            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->TERM);
	            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->COLOR);
	            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->DATE);
	            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->STATUS);
	            $rowCount++;
	        }

	        $filename = $this->session->userdata('acc_name')." Inquiries-". date("Y-m-d-H-i-s").".csv";
	        //header('Content-Type: application/vnd.ms-excel;charset=UTF-8'); 
	        //header('Content-Disposition: attachment;filename="'.$filename.'"');
	        //header('Cache-Control: max-age=0'); 
	        //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
	        //$objWriter->save('php://output'); 
	        
	        header('Content-Encoding: UTF-8');
            header('Content-type: text/csv; charset=UTF-8');
            header('Content-Disposition: attachment; filename="'.$filename.'"');
            echo "\xEF\xBB\xBF"; // UTF-8 BOM
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
	        $objWriter->save('php://output');
	        
    	}
	}


}

