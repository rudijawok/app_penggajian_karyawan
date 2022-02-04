<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Hak_akses extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
    }

    public function index()
        {
            $data['hakakses'] = $this->db->order_by('id','desc')->get('tb_hak_akses')->result();
            $this->load->view('admin/hak_akses',$data);
        }


    public function store(){
       
        $data = [
            'keterangan'		=> $this->input->post('keterangan'),
            'hak_akses'			=> $this->input->post('hak_akses'),
        ];
        $this->db->insert('tb_hak_akses',$data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success">Berhasil menambahkan hak_akses !</div>');
        redirect(base_url('admin/hak_akses'));
    }


    public function update($id){
   
        $data = [
            'keterangan'		=> $this->input->post('keterangan'),
            'hak_akses'			=> $this->input->post('hak_akses'),
        ];

        $this->db->where('id',$id);
        $this->db->update('tb_hak_akses',$data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success">Berhasil mengedit hak_akses !</div>');
        redirect(base_url('admin/hak_akses'));
    }

    public function delete($id){
        $this->db->where('id',$id)->delete('tb_hak_akses');
        $this->session->set_flashdata('sukses','<div class="alert alert-success"> Berhasil Menghapus hak_akses !</div>');
        redirect(base_url('admin/hak_akses'));
    }
}
        
    /* End of file  User.php */
        
                            

		 