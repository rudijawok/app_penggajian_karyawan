<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Karyawan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
    }

    public function index()
        {
			$id = $status = $this->session->userdata('id');
			$data['kehadiran'] = $this->db->where('id_karyawan',$id)->order_by('id','desc')->get('tb_kehadiran')->result();
			
            $this->load->view('admin/karyawan_u',$data);
        }


}
        
    /* End of file  User.php */
        
                            

		 