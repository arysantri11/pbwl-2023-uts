<?php

namespace App\Controllers;

use App\Core\Controller;

class Home extends Controller
{

	public function index()
	{
		$data['row_index'] = "Ini file app/controllers/Index.php - index()";
		$data['nav_aktif'] = "Home";
		
		$this->home('home/index', $data);
	}
}
