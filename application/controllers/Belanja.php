<?php
class Belanja extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Bulan_model');
		$this->load->model('Belanja_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{
		$data['title'] = 'Belanja';
		$data['perbulan'] = $this->Belanja_model->getThumbTotal();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('Belanja/index');
		$this->load->view('templates/footer');
	}
	public function bulan($bulan)
	{
		$data['perbulan'] = $this->Bulan_model->getSemuaBulan();
		$data['title'] = 'Belanja';
		$data['bulan'] = $this->Bulan_model->getBulan($bulan);
		$data['belanja'] = $this->Belanja_model->getDataBelanjaBerdasarkanBulan($bulan);
		$data['total'] = $this->Belanja_model->getTotal($bulan);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('Belanja/bulan');
		$this->load->view('templates/footer');
	}
	public function tambah($bulan)
	{
		$data['perbulan'] = $this->Bulan_model->getSemuaBulan();
		$data['title'] = 'Belanja';
		$data['bulan'] = $this->Bulan_model->getBulan($bulan);
		$data['belanja'] = $this->Belanja_model->getDataBelanjaBerdasarkanBulan($bulan);
		$data['total'] = $this->Belanja_model->getTotal($bulan);
		$this->Belanja_model->formValidationBelanja();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('Belanja/bulan');
			$this->load->view('templates/footer');
		} else {
			$this->Belanja_model->getTambahData($bulan);
			$this->session->set_userdata('flash', 'di Tambahkan');
			redirect('belanja/bulan/' . $bulan);
		}
	}
	public function hapus($bulan, $id)
	{
		$this->Belanja_model->deleteSatuData($id);
		$this->session->set_userdata('flash', 'di Hapus');
		redirect('belanja/bulan/' . $bulan);
	}
	public function ubah($bulan, $id)
	{
		$data['title'] = 'Ubah Data';
		$data['belanja'] = $this->Belanja_model->getDataBelanjaBerdasarId($id);
		$data['bulan'] = $bulan;
		$this->Belanja_model->formValidationBelanja();

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('Belanja/ubah');
			$this->load->view('templates/footer');
		} else {
			$this->Belanja_model->getUbahData($bulan, $id);
			$this->session->set_userdata('flash', 'di Ubah');
			redirect('belanja/bulan/' . $bulan);
		}
	}
}
