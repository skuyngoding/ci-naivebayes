<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dataset', 'm'); // load, alias
	}

	public function index()
	{
		$data = [
			'judul' => 'Halaman Utama',
			'dataset' => $this->m->getData() // get All data
		];

		$this->load->view('home/index', $data); // view, send data
	}

	public function add_dataset() // method for adding new dataset (data latih)
	{
		$jumlah = 0; // set default = 0
		if ($this->input->post('jumlah')) {
			$jumlah = $this->input->post('jumlah'); // replace default value
		}

		$data = [
			'judul' => 'Tambah Data Latih',
			'jmlReq' => $jumlah
		];

		$this->load->view('home/tambah_dataset', $data);
	}

	public function save_dataset()
	{
		$length = $this->input->post('jmlReq'); // length of data
		$res = $this->m->save_data($length); // insert data into tabel
		if ($res > 0) { // checking ... success or not
			$this->session->set_flashdata('msg', 'berhasil');
			redirect('home');
		} else {
			$this->session->set_flashdata('msg', 'gagal');
			redirect('home');
		}
	}

	public function uji_data()
	{
		$proses = $this->input->post('proses');
		if (!isset($proses)) {
			redirect('home');
		}

		// retrieve data uji
		$umur = $this->input->post('umur');
		$pendapatan = $this->input->post('pendapatan');
		$pelajar = $this->input->post('pelajar');
		$rating = $this->input->post('rating');

		// 1. Menghitung prior probabilities P(Ci)
		$jmlJenisBeli = $this->m->getBeli();

		// hitung masing-masing jenis beli (1 = Tidak | 2 = Ya)
		$jmlBeliTidak = $this->m->getBeli(1);
		$jmlBeliYa = $this->m->getBeli(2);

		// hitung PCi
		$pciBeliTidak = $jmlBeliTidak / $jmlJenisBeli;
		$pciBeliYa = $jmlBeliYa / $jmlJenisBeli;

		// 2. Menghitung conditional probabilities P(Xt|Ci)
		$jmlUmurBeliTidak = $this->m->getUmur($umur, 1);
		$jmlUmurBeliYa = $this->m->getUmur($umur, 2);
		$jmlUangBeliTidak = $this->m->getPendapatan($pendapatan, 1);
		$jmlUangBeliYa = $this->m->getPendapatan($pendapatan, 2);
		$jmlPelajarBeliTidak = $this->m->getPelajar($pelajar, 1);
		$jmlPelajarBeliYa = $this->m->getPelajar($pelajar, 2);
		$jmlRatingBeliTidak = $this->m->getRating($rating, 1);
		$jmlRatingBeliYa = $this->m->getRating($rating, 2);

		// hitung probabilitas
		$jmlUmurBeliTidak = $jmlUmurBeliTidak / $jmlBeliTidak;
		$jmlUmurBeliYa = $jmlUmurBeliYa / $jmlBeliYa;
		$jmlUangBeliTidak = $jmlUangBeliTidak / $jmlBeliTidak;
		$jmlUangBeliYa = $jmlUangBeliYa / $jmlBeliYa;
		$jmlPelajarBeliTidak = $jmlPelajarBeliTidak / $jmlBeliTidak;
		$jmlPelajarBeliYa = $jmlPelajarBeliYa / $jmlBeliYa;
		$jmlRatingBeliTidak = $jmlRatingBeliTidak / $jmlBeliTidak;
		$jmlRatingBeliYa = $jmlRatingBeliYa / $jmlBeliYa;

		// C. Menghitung posterior probabilities P(X|Ci)
		$postBeliTidak = $jmlUmurBeliTidak * $jmlUangBeliTidak * $jmlPelajarBeliTidak * $jmlRatingBeliTidak;
		$postBeliYa = $jmlUmurBeliYa * $jmlUangBeliYa * $jmlPelajarBeliYa * $jmlRatingBeliYa;

		// D. menghitung posterior probabilities P(Ci|X)
		$pciBeliTidak = $pciBeliTidak * $postBeliTidak;
		$pciBeliYa = $pciBeliYa * $postBeliYa;

		if ($pciBeliTidak > $pciBeliYa) {
			$kesimpulan = 'Karena nilai Beli <i>Tidak</i>, lebih besar dari nilai Beli <i>Ya</i>. Maka class dari data X atau hasil dari data uji adalah <strong>Pengguna tidak akan membeli Laptop</strong>';
			$jenisBeli = 1;
		} else if ($pciBeliYa > $pciBeliTidak) {
			$kesimpulan = 'Karena nilai Beli <i>Ya</i>, lebih besar dari nilai Beli <i>Tidak</i>. Maka class dari Data X atau Hasil dari data Uji adalah <strong>Pengguna akan membeli Laptop</strong>';
			$jenisBeli = 2;
		}

		// return to view
		$data = [
			'judul' => 'Halaman Utama',
			'dataset' => $this->m->getData(),
			'umur' => $umur,
			'pendapatan' => $pendapatan,
			'pelajar' => $pelajar,
			'rating' => $rating,
			'kesimpulan' => $kesimpulan,
			'jenis_beli' => $jenisBeli,
			'hasil_tidak' => $pciBeliTidak,
			'hasil_ya' => $pciBeliYa
		];

		$this->session->set_flashdata('hasil', 'ok');
		$this->load->view('home/index', $data);
	}
}
