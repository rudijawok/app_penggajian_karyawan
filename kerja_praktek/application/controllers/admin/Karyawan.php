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
            $data['karyawan'] = $this->db->order_by('id','desc')->get('tb_karyawan')->result();
			$data['jabatan'] = $this->db->get('tb_jabatan')->result();
            $this->load->view('admin/karyawan',$data);
            
        }
	
	public function print()
    {
            $data['karyawan'] = $this->db->order_by('id','desc')->get('tb_karyawan')->result();
            $this->load->view('admin/print_karyawan',$data);
    }
 
    public function store(){
        $foto1  = $_FILES['foto'];
            if ($foto1) {
                $config['allowed_types'] = 'jpg|png|gif';                                         
                $config['max_size'] = '0';
                $config['upload_path'] = './uploads/karyawan/';
                $this->upload->initialize($config);
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                } else {
                    $this->upload->display_errors();
                }
            }

        $data = [
            'nik'				=> $this->input->post('nik'),
            'nama_karyawan'		=> $this->input->post('nama_karyawan'),
            'username'			=> $this->input->post('username'),
			'password'			=> md5($this->input->post('password')) ,
			'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
			'jabatan'			=> $this->input->post('jabatan'),
			'tanggal_masuk'		=> $this->input->post('tanggal_masuk'),
			'status'			=> $this->input->post('status'),
            'foto'         		=> $foto,
        ];
        $this->db->insert('tb_karyawan',$data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success">Berhasil menambahkan karyawan !</div>');
        redirect(base_url('admin/karyawan'));
    }

    public function update($id){
        $foto       = $_FILES['foto']['name'];

        $data = [
            'nik'				=> $this->input->post('nik'),
            'nama_karyawan'		=> $this->input->post('nama_karyawan'),
            'username'			=> $this->input->post('username'),
			'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
			'jabatan'			=> $this->input->post('jabatan'),
			'tanggal_masuk'		=> $this->input->post('tanggal_masuk'),
			'status'			=> $this->input->post('status'),
        ];
		
        $config['allowed_types'] = 'jpg|png|gif|jfif';
        $config['max_size'] = '4096';
        $config['upload_path'] = './uploads/karyawan/';
        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto')) {
            $gambarLama = $this->input->post('foto_old');
            if ($gambarLama != 'default.jpg') {
                unlink(FCPATH . '/uploads/karyawan/' . $gambarLama);
            }
            $gambarBaru = $this->upload->data('file_name');
            $this->db->set('foto', $gambarBaru);
        } else {
            // echo $this->upload->display_errors();
        }
        $this->db->where('id',$id);
        $this->db->update('tb_karyawan',$data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success">Berhasil mengedit karyawan !</div>');
        redirect(base_url('admin/karyawan'));
    }

	public function password($id){

		$data = [ 
			'password' => md5($this->input->post('password')),
		];

		$this->db->where('id',$id);
        $this->db->update('tb_karyawan',$data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success">Berhasil Mengganti Password karyawan !</div>');
        redirect(base_url('admin/karyawan'));
	}

    public function delete($id){
        $data = $this->db->query("SELECT * FROM tb_karyawan where id='$id'");
        foreach ($data->result() as $u){
            unlink('uploads/karyawan/'.$u->foto);
        } 
        $this->db->where('id',$id)->delete('tb_karyawan');
        $this->session->set_flashdata('sukses','<div class="alert alert-success"> Berhasil Menghapus karyawan !</div>');
        redirect(base_url('admin/karyawan'));
    }
}
        
    /* End of file  User.php */
