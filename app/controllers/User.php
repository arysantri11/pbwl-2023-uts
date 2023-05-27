<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User as UserModels;

class User extends Controller
{
	private object $user;

	public function __construct()
	{
		$this->user = new UserModels;
	}

	public function index()
	{
		$data['nav_aktif'] = "User";
		$data['dataUser'] = $this->user->getAll();

		$this->user('user/index', $data);
	}

	public function tambah()
	{
		$data['nav_aktif'] = "User";
		$data['dataUser'] = $this->user->getAll();

		$this->user('user/tambah', $data);
	}

	public function edit()
	{
		// explode = Membagi string diantara slash
		$url = explode('/', $_GET['page']);
		// end = mengambil data array pada index terakhir
		$parameter = end($url);

		$data['nav_aktif'] = "User";
		$data['dataUser'] = $this->user->getById($parameter);

		$this->user('user/edit', $data);
	}

	public function delete()
	{
		// explode = Membagi string diantara slash
		$url = explode('/', $_GET['page']);
		// end = mengambil data array pada index terakhir
		$parameter = end($url);

		$data['nav_aktif'] = "User";
		$data['dataUser'] = $this->user->getById($parameter);

		$this->user('user/delete', $data);
	}

	public function proses()
	{
		if (isset($_POST['btn_simpan'])) {
			$this->user->tambah($_POST);
			echo "<script>alert('Data user berhasil ditambahkan!');window.location = 'Index';</script>";
		} elseif (isset($_POST['btn_edit'])) {
			$this->user->ubah($_POST);
			echo "<script>alert('Data user berhasil diubah!');window.location = 'Index';</script>";
		} elseif (isset($_POST['btn_delete'])) {
			$this->user->hapus($_POST);
			echo "<script>alert('Data user berhasil hapus!');window.location = 'Index';</script>";
		}
		
	}

}
