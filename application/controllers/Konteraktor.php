<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konteraktor extends Pertamina 
{	
	public $page = 20;

	public function __construct()
	{
		parent::__construct();
		$this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');
		$this->page = $this->input->get('page');

		$this->load->model('mjson_location');
		$this->load->js(base_url('assets/public/app/kontraktor.js'));
		$this->load->model('mkontraktor');

	}

	public function index() 
	{

		$this->page_title->push('Konteraktor', 'Data Konteraktor');

		$this->data = array(
			'title' => "Konteraktor - Sistem Monitoring", 
			'breadcrumbs' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'kontraktor' => $this->mkontraktor->get_tampil()
			
		);

		$this->template->view('Pertamina/kontraktor/data-kontraktor', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Konteraktor', 'Data Konteraktor');

		$this->form_validation->set_rules('nama', 'Nama Konteraktor ', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Jenis Konteraktor', 'trim|required');
		$this->form_validation->set_rules('direktur', 'Direktur ', 'trim|required');
		$this->form_validation->set_rules('sekretaris', 'Sekretaris', 'trim|required');
		$this->form_validation->set_rules('HSSE', 'HSSE', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->mkontraktor->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Konteraktor - Sistem Monitoring", 
			'breadcrumbs' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),

			
		);

		$this->template->view('Pertamina/kontraktor/create-kontraktor', $this->data);
	}

	public function update($param = 0)
	{
		$this->page_title->push('Konteraktor', 'Update Data Konteraktor');

		$this->form_validation->set_rules('nama', 'Nama Konteraktor ', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Jenis Konteraktor', 'trim|required');
		$this->form_validation->set_rules('direktur', 'Direktur ', 'trim|required');
		$this->form_validation->set_rules('sekretaris', 'Sekretaris', 'trim|required');
		$this->form_validation->set_rules('HSSE', 'HSSE', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->mkontraktor->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Konteraktor - Sistem Monitoring", 
			'breadcrumbs' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->mkontraktor->get($param)
			
		);

		$this->template->view('Pertamina/kontraktor/update-kontraktor', $this->data);
	}

	public function delete($param = 0)
	{
		$this->mkontraktor->delete($param);

		redirect('Konteraktor');
	}

}

/* End of file Konteraktor.php */
/* Location: ./application/controllers/Konteraktor.php */