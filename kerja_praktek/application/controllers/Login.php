<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('home/login');
    }

    public function auth(){
      
        $username   = $this->input->post('username');
        $password   = md5($this->input->post('password'));

        $data = $this->db->query("SELECT * FROM tb_karyawan where username='$username' and password='$password'");

        if ($data->num_rows() > 0) {
                $user = $data->row_array();
                $data_sess = array(
                    'nama_karyawan'    		=> $user['nama_karyawan'],
                    'id'       				=> $user['id'],
                    'ss'          			=> $user['status'],
                    'status'				=> 'login',
                );
                $this->session->set_userdata( $data_sess );
            
            redirect(base_url('admin'));
            }else {
                $this->session->set_flashdata('alert','<div class="alert alert-warning">Username atau Password Salah !</div>');
                redirect(base_url('login'));
        }
        

    }

    public function logout(){
        
        $this->session->sess_destroy();
        $this->session->set_flashdata('alert','<div class="alert alert-warning">Berhasil logout !</div>');
        redirect(base_url('login'));
        
    }
        
}
        
    /* End of file  Login.php */
        
                            