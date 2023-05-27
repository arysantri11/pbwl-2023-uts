<?php

namespace App\Models;

use App\Core\Model as Model;

class Order extends Model {
    public function getAll()
    {
        $sql = "SELECT * FROM tb_order INNER JOIN tb_users ON tb_order.order_id_user=tb_users.user_id ORDER BY tb_order.order_tgl DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];

        while ($rows = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $data[] = $rows;
        }

        return $data;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM tb_order INNER JOIN tb_users ON tb_order.order_id_user=tb_users.user_id WHERE tb_order.order_id=:order_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":order_id", $id);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function tambah($data = [])
	{
		$order_id_user = $data['order_id_user'];
		$order_kode = $data['order_kode'];
		$order_ttl = $data['order_ttl'];
		$order_kurir = $data['order_kurir'];
		$order_ongkir = $data['order_ongkir'];
		$order_byr_deadline = $data['order_byr_deadline'];
		$order_batal = $data['order_batal'];

		$sql = "INSERT INTO tb_order 
                (order_id_user, order_kode, order_ttl, order_kurir, order_ongkir, order_byr_deadline, order_batal) VALUES 
                (:order_id_user, :order_kode, :order_ttl, :order_kurir, :order_ongkir, :order_byr_deadline, :order_batal)";

		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":order_id_user", $order_id_user);
		$stmt->bindParam(":order_kode", $order_kode);
		$stmt->bindParam(":order_ttl", $order_ttl);
		$stmt->bindParam(":order_kurir", $order_kurir);
		$stmt->bindParam(":order_ongkir", $order_ongkir);
		$stmt->bindParam(":order_byr_deadline", $order_byr_deadline);
		$stmt->bindParam(":order_batal", $order_batal);
		$stmt->execute();
		
	}

    public function ubah($data = [])
    {
        $order_id_user = $data['order_id_user'];
		$order_kode = $data['order_kode'];
		$order_ttl = $data['order_ttl'];
		$order_kurir = $data['order_kurir'];
		$order_ongkir = $data['order_ongkir'];
		$order_byr_deadline = $data['order_byr_deadline'];
		$order_batal = $data['order_batal'];
        $order_id = $data['order_id'];

        $sql = "UPDATE tb_order SET 
                order_id_user=:order_id_user, 
                order_kode=:order_kode, 
                order_ttl=:order_ttl, 
                order_kurir=:order_kurir, 
                order_ongkir=:order_ongkir, 
                order_byr_deadline=:order_byr_deadline, 
                order_batal=:order_batal
                WHERE order_id=:order_id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":order_id_user", $order_id_user);
		$stmt->bindParam(":order_kode", $order_kode);
		$stmt->bindParam(":order_ttl", $order_ttl);
		$stmt->bindParam(":order_kurir", $order_kurir);
		$stmt->bindParam(":order_ongkir", $order_ongkir);
		$stmt->bindParam(":order_byr_deadline", $order_byr_deadline);
		$stmt->bindParam(":order_batal", $order_batal);
        $stmt->bindParam(":order_id", $order_id);
        $stmt->execute();
    }

    public function hapus($data = [])
    {
        $order_id = $data['order_id'];

        $sql = "DELETE FROM tb_order WHERE order_id=:order_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":order_id", $order_id);
        $stmt->execute();
    }
}