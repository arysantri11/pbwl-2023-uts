<?php

namespace App\Core;

class Controller
{
	// Layout home
	public function home($view, $data = [])
	{
		require_once ROOT . "layouts/index.php";
	}

	// layout kategori
	public function kategori($view, $data = [])
	{
		require_once ROOT . "layouts/index.php";
	}

	// layout user
	public function user($view, $data = [])
	{
		require_once ROOT . "layouts/index.php";
	}

	// layout produk
	public function produk($view, $data = [])
	{
		require_once ROOT . "layouts/index.php";
	}

	// layout keranjang
	public function keranjang($view, $data = [])
	{
		require_once ROOT . "layouts/index.php";
	}

	// layout order
	public function order($view, $data = [])
	{
		require_once ROOT . "layouts/index.php";
	}

	// layout detail
	public function detail($view, $data = [])
	{
		require_once ROOT . "layouts/index.php";
	}
}
