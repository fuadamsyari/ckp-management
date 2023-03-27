<?php
class PoTinta_model extends CI_Model
{
	// model untuk menampilkan semua data po
	public function getAllPo()
	{
		$this->db->order_by('po_ke', 'asc');
		return $this->db->get('po_list')->result_array();
	}
	// model untuk menampilkan semua data po Tinta
	public function getAllPoTinta($po_ke)
	{
		return $this->db->get_where('po_tinta', ['po_ke' => $po_ke])->result_array();
	}
	// model untuk menampilkan data tinta sesuai dengan id
	public function getPotintaSesuaiId($id)
	{
		return $this->db->get_where('po_tinta', ['id' => $id])->row_array();
	}
	// model untuk menampilkan po list
	public function getPolist($po_ke)
	{
		return $this->db->get_where('po_list', ['po_ke' => $po_ke])->row_array();
	}
	// form validation untuk input po tinta
	public function formValidationPoTinta()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('customer', 'Customer', 'trim|required');
		return $this->form_validation->run();
	}
	// modedl untuk menambahkan data
	public function getTambahData($po_ke)
	{
		$tanggalInput = $this->input->post('tanggal', true); // mengambil input tanggal
		$formatted_date = date("d/m/y", strtotime($tanggalInput)); //mengganti format penulisan tanggal
		$formatted_date = str_replace("-", "/", $formatted_date); //mengganti format tanggal sesuai yang di inginkan
		$data = [
			'tanggal' => html_escape($formatted_date),
			'warna' => html_escape($this->input->post('warna', true)),
			'tinta' => html_escape($this->input->post('tinta', true)),
			'terjual' => 50000,
			'modal' => 30000,
			'untung' => 20000,
			'customer' => html_escape($this->input->post('customer', true)),
			'po_ke' => $po_ke
		];
		return $this->db->insert('po_tinta', $data);
	}
	// model untuk menghapus data tinta per po tinta sesuai dengan id nya
	public function hapusSatuData($id)
	{
		return $this->db->delete('po_tinta', ['id' => $id]);
	}
	// model untuk mengubah data tinta per po tinta sesuai dengan id nya
	public function ubahData($id)
	{
		$dataBaru = [
			'tanggal' => $this->input->post('tanggal'),
			'warna' => $this->input->post('warna'),
			'tinta' => $this->input->post('tinta'),
			'customer' => $this->input->post('customer'),
		];
		$this->db->where('id', $id);
		$this->db->update('po_tinta', $dataBaru);
	}
	// model untuk menambah list po list
	public function getTambahPo($data)
	{
		return $this->db->insert('po_list', $data);
	}
	public function getHapusPo()
	{
		$this->form_validation->set_rules('po_ke', 'Po Ke', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			return redirect('potinta');
		} else {
			$po_ke = $this->input->post('po_ke');
			return $this->db->delete('po_list', ['po_ke' => $po_ke]);
		}
	}
}
