<?php
class Service extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Service_model');
		$this->load->model('Bulan_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{ // method index untuk menampilkan list atau daftar Bulan Service pada Tahun tertentu
		$data['title'] = "Laporan Service";
		$data['perbulan'] = $this->Service_model->getThumbTotal();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('Service/index', $data);
		$this->load->view('templates/footer');
	}
	public function bulan($bulan)
	{ // method bulan, untuk nampilin data service per bulanya
		$data['services'] = $this->Service_model->getDataServiceSesuaiBulan($bulan);
		$data['bulan'] = $this->Bulan_model->getBulan($bulan);
		$data['total'] = $this->Service_model->getTotal($bulan);
		$data['title'] = $this->Bulan_model->getNamaBulan($bulan);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('Service/bulan', $data);
		$this->load->view('templates/footer');
	}
	public function tambah($bulan)
	{ // method tambah. untuk menambahkan data service ke dalam data base, dan data bulan sudah terisi sesuai method bulan
		$data['services'] = $this->Service_model->getDataServiceSesuaiBulan($bulan);
		$data['bulan'] = $this->Bulan_model->getBulan($bulan);
		$data['total'] = $this->Service_model->getTotal($bulan);
		$data['title'] = $this->Bulan_model->getNamaBulan($bulan);
		$this->Service_model->formValidationService();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('Service/service/bulan/' . $bulan, $data);
			$this->load->view('templates/footer');
		} else {
			$this->Service_model->getTambahData($bulan);
			$this->session->set_userdata('flash', 'di Tambahkan');
			redirect('service/bulan/' . $bulan);
		}
	}
	public function hapus($bulan, $id)
	{ // method hapus, untuk menghapus data sesuai dengan id
		$this->Service_model->deleteSatuData($id);
		$this->session->set_userdata('flash', 'di Hapus');
		redirect('service/bulan/' . $bulan);
	}
	public function ubah($bulan, $id)
	{ // method ubah untuk mengupdate isi table sesuai dengan id dan bulanya
		$data['bulan'] = $bulan;
		$data['title'] = 'Ubah Data';
		$data['services'] = $this->Service_model->getDataServiceSesuaiBulanDanId($bulan, $id);
		$this->Service_model->formValidationService();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('service/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Service_model->ubahData($id);
			$this->session->set_userdata('flash', 'di Ubah');
			redirect('service/bulan/' . $bulan);
		}
	}
}
