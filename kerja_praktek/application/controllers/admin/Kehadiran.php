<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Kehadiran extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
    }

    public function index()
        {
            $data['kehadiran'] = $this->db->order_by('id','desc')->get('tb_kehadiran')->result();
			$data['karyawan'] = $this->db->order_by('id','desc')->get('tb_karyawan')->result();
            $this->load->view('admin/kehadiran',$data);
        }

    public function store(){
     
        $data = [
			'id_karyawan'		=> $this->input->post('id_karyawan'),
            'bulan'				=> $this->input->post('bulan'),
			'tahun'				=> $this->input->post('tahun'),
			'nik'				=> $this->input->post('nik'),
            'nama_karyawan'		=> $this->input->post('nama_karyawan'),
			'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
			'nama_jabatan'		=> $this->input->post('nama_jabatan'),
			'hadir'				=> $this->input->post('hadir'),
			'sakit'				=> $this->input->post('sakit'),
			'alpa'				=> $this->input->post('alpa'),
        ];

        $this->db->insert('tb_kehadiran',$data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success">Berhasil menambahkan kehadiran !</div>');
        redirect(base_url('admin/kehadiran'));
    }

    public function edit($id){
    	$data['kehadiran']		= $this->db->where('id',$id)->get('tb_kehadiran')->row_array();
        $data['k']  = $this->db->get('tb_kehadirankategori');
  
        $this->load->view('admin/kehadiran-edit',$data);

    }

    public function update($id){
  
        $data = [
			'bulan'				=> $this->input->post('bulan'),
			'tahun'				=> $this->input->post('tahun'),
			'hadir'				=> $this->input->post('hadir'),
			'sakit'				=> $this->input->post('sakit'),
			'alpa'				=> $this->input->post('alpa'),
        ];
        $this->db->where('id',$id);
        $this->db->update('tb_kehadiran',$data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success">Berhasil mengedit kehadiran !</div>');
        redirect(base_url('admin/kehadiran'));
    }

    public function delete($id){
        $this->db->where('id',$id)->delete('tb_kehadiran');
        $this->session->set_flashdata('sukses','<div class="alert alert-success"> Berhasil Menghapus kehadiran !</div>');
        redirect(base_url('admin/kehadiran'));
    }

	public function cetak($id){
			$ids = $id ;
			
				
			$data['kehadiran']	= $this->db->where('id',$ids)->get('tb_kehadiran')->row_array();
			$data['potongan']	= $this->db->get('tb_potongan_gaji');

			$jabatan = $data['kehadiran']['nama_jabatan'] ;
			$data['gaji'] = $this->db->where('nama_jabatan',$jabatan)->get('tb_jabatan')->row_array();
			
			
			$s =  $this->db->where('id',3)->get('tb_potongan_gaji')->row_array()		;
			$a =  $this->db->where('id',4)->get('tb_potongan_gaji')->row_array()		;
			$sakit = $data['kehadiran']['sakit']*$s['jumlah_potongan'];
			$alpa = $data['kehadiran']['alpa']*$a['jumlah_potongan'];
			$data['potongan'] = $sakit+$alpa ;

            $this->load->view('admin/print',$data);
	}
}
        
    /* End of file  User.php */
        
                            

		 