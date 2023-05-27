<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Order as OrderModels;
use App\Models\User as UserModels;

class Order extends Controller
{
	private object $order;
	private object $user;

	public function __construct()
	{
		$this->order = new OrderModels;
		$this->user = new UserModels;
	}

	public function index()
	{
		$data['nav_aktif'] = "Order";
		$data['dataOrder'] = $this->order->getAll();

		$this->order('order/index', $data);
	}

	public function tambah()
	{
		$data['nav_aktif'] = "Order";
		$data['dataUser'] = $this->user->getAll();

		$this->order('order/tambah', $data);
	}

	public function edit()
	{
		// explode = Membagi string diantara slash
		$url = explode('/', $_GET['page']);
		// end = mengambil data array pada index terakhir
		$parameter = end($url);

		$data['nav_aktif'] = "Order";
		$data['dataUser'] = $this->user->getAll();
		$data['dataOrder'] = $this->order->getById($parameter);

		$this->order('order/edit', $data);
	}

	public function delete()
	{
		// explode = Membagi string diantara slash
		$url = explode('/', $_GET['page']);
		// end = mengambil data array pada index terakhir
		$parameter = end($url);

		$data['nav_aktif'] = "Order";
		$data['dataOrder'] = $this->order->getById($parameter);

		$this->order('order/delete', $data);
	}

	public function proses()
	{
		if (isset($_POST['btn_simpan'])) {
			$this->order->tambah($_POST);
			echo "<script>alert('Data order berhasil ditambahkan!');window.location = 'Index';</script>";
		} elseif (isset($_POST['btn_edit'])) {
			$this->order->ubah($_POST);
			echo "<script>alert('Data order berhasil diubah!');window.location = 'Index';</script>";
		} elseif (isset($_POST['btn_delete'])) {
			$this->order->hapus($_POST);
			echo "<script>alert('Data order berhasil hapus!');window.location = 'Index';</script>";
		}
		
	}

}
