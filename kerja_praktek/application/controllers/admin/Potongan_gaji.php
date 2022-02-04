<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Potongan_gaji extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
    }

    public function index()
        {
            $data['potongan'] = $this->db->order_by('id','desc')->get('tb_potongan_gaji')->result();
            $this->load->view('admin/potongan_gaji',$data);
        }


    public function store(){
       
        $data = [
            'potongan'				=> $this->input->post('potongan'),
            'jumlah_potongan'		=> $this->input->post('jumlah_potongan'),
        ];
        $this->db->insert('tb_potongan_gaji',$data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success">Berhasil menambahkan potongan_gaji !</div>');
        redirect(base_url('admin/potongan_gaji'));
    }


    public function update($id){
   
        $data = [
           
            'jumlah_potongan'		=> $this->input->post('jumlah_potongan'),
        ];

        $this->db->where('id',$id);
        $this->db->update('tb_potongan_gaji',$data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success">Berhasil mengedit potongan_gaji !</div>');
        redirect(base_url('admin/potongan_gaji'));
    }

    public function delete($id){
        $this->db->where('id',$id)->delete('tb_potongan_gaji');
        $this->session->set_flashdata('sukses','<div class="alert alert-success"> Berhasil Menghapus potongan_gaji !</div>');
        redirect(base_url('admin/potongan_gaji'));
    }
}
        
    /* End of file  User.php */
        
                            

		 