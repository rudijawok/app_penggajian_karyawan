<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Jabatan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
    }

    public function index()
        {
            $data['jabatan'] = $this->db->order_by('id','desc')->get('tb_jabatan')->result();
            $this->load->view('admin/jabatan',$data);
        }


    public function store(){
       
        $data = [
            'nama_jabatan'		=> $this->input->post('nama_jabatan'),
            'gaji_pokok'		=> $this->input->post('gaji_pokok'),
            'tunjangan_jabatan'			=> $this->input->post('tunjangan'),
        ];
        $this->db->insert('tb_jabatan',$data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success">Berhasil menambahkan jabatan !</div>');
        redirect(base_url('admin/jabatan'));
    }


    public function update($id){
   
        $data = [
            'nama_jabatan'		=> $this->input->post('nama_jabatan'),
            'gaji_pokok'		=> $this->input->post('gaji_pokok'),
            'tunjangan_jabatan'			=> $this->input->post('tunjangan'),
        ];

        $this->db->where('id',$id);
        $this->db->update('tb_jabatan',$data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success">Berhasil mengedit jabatan !</div>');
        redirect(base_url('admin/jabatan'));
    }

    public function delete($id){
        $this->db->where('id',$id)->delete('tb_jabatan');
        $this->session->set_flashdata('sukses','<div class="alert alert-success"> Berhasil Menghapus jabatan !</div>');
        redirect(base_url('admin/jabatan'));
    }
}
        
    /* End of file  User.php */
        
                            

		 