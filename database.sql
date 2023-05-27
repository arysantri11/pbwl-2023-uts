CREATE TABLE tb_users (
      user_id INT(11) NOT NULL AUTO_INCREMENT,
      user_username VARCHAR(100) NOT NULL,
      user_password VARCHAR(100) NOT NULL,
      user_nama VARCHAR(100) NOT NULL,
      user_telp VARCHAR(30) DEFAULT NULL,
      user_alamat TEXT DEFAULT NULL,
      user_level ENUM('USER', 'ADMIN', 'KETUA', 'SEKRETARIS', 'BENDAHARA', 'PEMBINA') DEFAULT 'USER',
      user_aktif ENUM('Y', 'N') DEFAULT 'Y',
      user_created_at TIMESTAMP DEFAULT NOW(),
      user_update_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
      PRIMARY KEY(user_id),
      UNIQUE KEY (user_username)
);

CREATE TABLE tb_kategori (
      kat_id INT(11) NOT NULL AUTO_INCREMENT,
      kat_nama VARCHAR(100) NOT NULL,
      kat_text TEXT DEFAULT NULL,
      PRIMARY KEY(kat_id),
      UNIQUE KEY(kat_nama)
);

CREATE TABLE tb_petugasshalat (
      ps_id INT(11) NOT NULL AUTO_INCREMENT,
      ps_id_kategori INT(11) NOT NULL,
      ps_id_imam INT(11) NOT NULL,
      ps_id_khatib INT(11) NOT NULL,
      ps_id_muadzin INT(11) NOT NULL,
      ps_id_bilal INT(11) NOT NULL,
      ps_text TEXT DEFAULT NULL,
      ps_date DATE NOT NULL,
      ps_created_at TIMESTAMP DEFAULT NOW(),
      ps_update_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
      PRIMARY KEY(ps_id),
      FOREIGN KEY(ps_id_kategori) REFERENCES tb_kategori(kat_id) ON UPDATE CASCADE ON DELETE RESTRICT,
      FOREIGN KEY(ps_id_imam) REFERENCES tb_users(user_id) ON UPDATE CASCADE ON DELETE RESTRICT,
      FOREIGN KEY(ps_id_khatib) REFERENCES tb_users(user_id) ON UPDATE CASCADE ON DELETE RESTRICT,
      FOREIGN KEY(ps_id_bilal) REFERENCES tb_users(user_id) ON UPDATE CASCADE ON DELETE RESTRICT,
      FOREIGN KEY(ps_id_muadzin) REFERENCES tb_users(user_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE tb_kas (
      kas_id INT(11) NOT NULL AUTO_INCREMENT,
      kas_id_user INT(11) NOT NULL,
      kas_masuk INT(50) DEFAULT 0,
      kas_keluar INT(50) DEFAULT 0,
      kas_text TEXT DEFAULT NULL,
      kas_sebelum INT(50) NOT NULL,
      kas_sesudah INT(50) NOT NULL,
      kas_date DATE DEFAULT NULL,
      kas_created_at TIMESTAMP DEFAULT NOW(),
      kas_update_at DATETIME DEFAULT NOW() ON UPDATE NOW(),
      PRIMARY KEY(kas_id),
      FOREIGN KEY(kas_id_user) REFERENCES tb_users(user_id) ON UPDATE CASCADE ON DELETE RESTRICT
);