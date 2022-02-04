<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Laporan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
    }

    public function index()
        {
            $data['kehadiran'] = $this->db->order_by('id','desc')->get('tb_kehadiran')->result();
			$data['karyawan'] = $this->db->order_by('id','desc')->get('tb_karyawan')->result();
            $this->load->view('admin/laporan_gaji',$data);
        }


    public function cetak_semua()
        {
            
			$data['karyawan'] = $this->db->query('SELECT tb_kehadiran.bulan,tb_kehadiran.tahun,tb_kehadiran.hadir,tb_kehadiran.sakit,tb_kehadiran.alpa,tb_karyawan.nama_karyawan,tb_karyawan.jabatan, tb_jabatan.nama_jabatan,tb_jabatan.gaji_pokok,tb_jabatan.tunjangan_jabatan FROM tb_kehadiran JOIN tb_karyawan JOIN tb_jabatan WHERE tb_kehadiran.id_karyawan = tb_karyawan.id AND tb_karyawan.jabatan = tb_jabatan.nama_jabatan order by tb_kehadiran.id DESC')->result();
			$data['sakit']= $this->db->where('id',3)->get('tb_potongan_gaji')->row_array();
			$data['alpa']= $this->db->where('id',4)->get('tb_potongan_gaji')->row_array();
            $this->load->view('admin/print_gaji_karyawan',$data);
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
            $this->load->view('admin/print_gaji',$data);
	}
}
  
    /* End of file  User.php */
        
                            

