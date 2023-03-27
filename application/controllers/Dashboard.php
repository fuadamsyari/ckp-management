<?php
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Service_model');
		$this->load->model('Tinta_model');
		$this->load->model('Bulan_model');
		$this->load->model('Belanja_model');
		$this->load->model('Kasbon_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{
		$data['title'] = "Dasboard";
		$data['gaji'] = 500000;
		$data['kuliah'] = 500000;

		// 
		$bulan = $this->db->get_where('bt_selected', ['tahun' => date('Y')])->row_array('bt');
		$bulan = $data['bulan'] = $bulan['bt'];
		// $data['nama_bulan'] = $this->Bulan_model->getNamaBulan($data['bulan'])
		$data['nama_bulan'] = $this->Bulan_model->getBulan($bulan);
		// kasbon
		$data['kasbon'] = [
			'fuad' => $this->db->get_where('kasbon', ['id' => 1])->row_array(),
			'other' => $this->db->get_where('kasbon', ['id' => 2])->row_array()
		];


		$data['service'] = $this->Service_model->getTotal($bulan);
		$data['tinta'] = $this->Tinta_model->getTotal($bulan);
		$data['belanja'] = $this->Belanja_model->getTotal($bulan);
		$data['total_kasbon'] = $this->Kasbon_model->getTotal($bulan);
		$data['sisa_saldo'] = $this->db->get_where('saldo', ['saldo' => 'Sisa Saldo'])->row_array();
		$data['ATM'] = $this->db->get_where('saldo', ['saldo' => 'ATM'])->row_array();
		$data['Cash'] = $this->db->get_where('saldo', ['saldo' => 'Cash'])->row_array();




		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar');
		$this->load->view('dashboard/index');
		$this->load->view('templates/footer');
	}

	public function ubahsisasaldo()
	{
		$data = ['nominal' => html_escape($this->input->get_post('sisa_saldo'))];
		$this->db->where('saldo', 'Sisa Saldo');
		$this->db->update('saldo', $data);
		redirect(base_url());
	}
	public function ubahsaldo()
	{
		$id2 = $this->input->get_post('ATM');
		$id3 = $this->input->get_post('Cash');
		$this->db->query("UPDATE saldo SET nominal = $id2 WHERE saldo.id = 2");
		$this->db->query("UPDATE saldo SET nominal = $id3 WHERE saldo.id = 3");
		redirect(base_url());
	}
	public function ubahkasbon()
	{
		$id1 = $this->input->get_post('fuad');
		$id2 = $this->input->get_post('other');
		$this->db->query("UPDATE kasbon SET kasbon = $id1 WHERE kasbon.id = 1");
		$this->db->query("UPDATE kasbon SET kasbon = $id2 WHERE kasbon.id = 2");
		redirect(base_url());
	}

	public function ubahbulan()
	{
		$bulan = ['bt' => $this->input->post('bulan')];
		$this->db->where('id', 1);
		$this->db->update('bt_selected', $bulan);
		redirect(base_url());
	}
}
