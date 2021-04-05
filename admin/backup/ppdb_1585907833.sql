
/*---------------------------------------------------------------
  SQL DB BACKUP 03.04.2020 16:57 
  HOST: localhost
  DATABASE: *
  TABLES: *
  ---------------------------------------------------------------*/

/*---------------------------------------------------------------
  TABLE: `agenda`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda` (
  `id_agenda` int(3) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `kegiatan` text NOT NULL,
  `petugas` varchar(200) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO `agenda` VALUES   ('1','registrasi ulang','<p>registrasi ulang</p>','amar','2020-04-17 12:08:00');

/*---------------------------------------------------------------
  TABLE: `bayar`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `bayar`;
CREATE TABLE `bayar` (
  `id_bayar` varchar(20) NOT NULL,
  `no_daftar` varchar(20) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `user` int(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bayar`),
  KEY `no_daftar` (`no_daftar`),
  CONSTRAINT `bayar_ibfk_1` FOREIGN KEY (`no_daftar`) REFERENCES `daftar` (`no_daftar`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*---------------------------------------------------------------
  TABLE: `biaya`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `biaya`;
CREATE TABLE `biaya` (
  `kode_biaya` varchar(20) NOT NULL,
  `nama_biaya` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `biaya` VALUES   ('001','Atribut, Seragam Olahraga, kain sasirangan utkPutr','175000');
INSERT INTO `biaya` VALUES ('002','Atribut, seragam olahraga, kain sasirangan, jilbab','225000');

/*---------------------------------------------------------------
  TABLE: `bukukas`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `bukukas`;
CREATE TABLE `bukukas` (
  `id_kas` int(2) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `debet` int(10) NOT NULL,
  `kredit` int(10) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `user` int(2) NOT NULL,
  `id_bayar` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kas`),
  KEY `id_bayar` (`id_bayar`),
  CONSTRAINT `bukukas_ibfk_1` FOREIGN KEY (`id_bayar`) REFERENCES `bayar` (`id_bayar`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*---------------------------------------------------------------
  TABLE: `daftar`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `daftar`;
CREATE TABLE `daftar` (
  `no_daftar` varchar(20) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `saudara` int(3) NOT NULL,
  `tinggi` int(3) NOT NULL,
  `berat` int(3) NOT NULL,
  `kebutuhan_khusus` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `dusun` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `jenis_tinggal` varchar(100) NOT NULL,
  `alat_transportasi` varchar(100) NOT NULL,
  `jarak` varchar(10) NOT NULL,
  `waktu_tempuh` varchar(5) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `skhun` varchar(20) NOT NULL,
  `nopes_ujian` varchar(20) NOT NULL,
  `no_ijazah` varchar(20) NOT NULL,
  `no_kps` varchar(50) NOT NULL,
  `nama_ayah` varchar(150) NOT NULL,
  `tahun_lahir_ayah` int(4) NOT NULL,
  `pendidikan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `penghasilan_ayah` varchar(100) NOT NULL,
  `nohp_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(150) NOT NULL,
  `tahun_lahir_ibu` int(4) NOT NULL,
  `pendidikan_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `penghasilan_ibu` varchar(100) NOT NULL,
  `nohp_ibu` int(15) NOT NULL,
  `nama_wali` varchar(150) NOT NULL,
  `tahun_lahir_wali` int(4) NOT NULL,
  `pendidikan_wali` varchar(50) NOT NULL,
  `pekerjaan_wali` varchar(100) NOT NULL,
  `penghasilan_wali` varchar(50) NOT NULL,
  `angkatan` int(5) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `daftar_ulang` int(3) NOT NULL,
  `status_bayar` int(3) NOT NULL,
  `baju` varchar(20) NOT NULL,
  `jenis_daftar` varchar(10) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sekolah_lain` varchar(100) DEFAULT NULL,
  `status_santrinya` varchar(20) DEFAULT NULL,
  `status_sekolah` varchar(50) DEFAULT NULL,
  `nama_kecil_ibu` varchar(50) DEFAULT NULL,
  `alamat_ortu` varchar(100) DEFAULT NULL,
  `alamat_dua` varchar(50) DEFAULT NULL,
  `alamat_wali` varchar(100) DEFAULT NULL,
  `noreg_akta` text,
  `hobi` varchar(50) DEFAULT NULL,
  `citacita` varchar(100) DEFAULT NULL,
  `no_kks` varchar(50) DEFAULT NULL,
  `penerima_kps` varchar(50) DEFAULT NULL,
  `usulan_pip` varchar(50) DEFAULT NULL,
  `penerima_kip` varchar(50) DEFAULT NULL,
  `no_kip` varchar(50) DEFAULT NULL,
  `tertera_kip` varchar(50) DEFAULT NULL,
  `terima_kip` varchar(50) DEFAULT NULL,
  `alasan_pip` varchar(50) DEFAULT NULL,
  `npsn_sekolah_asal` varchar(50) DEFAULT NULL,
  `kab_sekolah_asal` varchar(50) DEFAULT NULL,
  `kode_jenissekolah` varchar(20) DEFAULT NULL,
  `no_kk` int(30) DEFAULT NULL,
  `nik_ayah` int(30) DEFAULT NULL,
  `nik_ibu` int(30) DEFAULT NULL,
  `nss_sekolah` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`no_daftar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `daftar` VALUES   ('P001','15%','S001','133313','','COBA NOPEN','','','','L','SLEMAN','2020-04-01','ISLAM','0','0','0','0','','YOGYAKARTA DEPOK CONDONG CATUR SLEMAN','','','','SLEMAN','TEPEL','','','0','','','','','081325220787','','','','','','g','0','','','','','g','0','','','','0','','0','','','','0','1311232','1','0','diverifikasi','online','2020-04-03 10:15:04','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'001',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('P002','30%','S004','1212','','supri','','','','P','sleman','2020-04-03','','0','0','0','0','','yogyakarta depok condong catur sleman','','','','ff','ff','','','0','','','','','081325220787','','','','','','ff','0','','','','','ff','0','','','','0','','0','','','','0','121212','1','0','diterima','','2020-04-03 16:22:34','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'001',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('P003','30%','S001','36356','','COBA JENISSEKOLAH','','','','L','SLEMAN','2020-04-03','ISLAM','0','0','0','0','','YOGYAKARTA DEPOK CONDONG CATUR SLEMAN','','','','YY','YY','','','0','','','','','081325220787','','','','','','amar','0','SD Sederajat','Buruh','Kurang dari Rp. 500.000','','hgh','0','SMP Sederajat','Tenaga Kerja Indonesia','Rp. 2jt s/d Rp. 4 jt','0','','0','','','','0','3563','1','0','tidak','online','2020-04-03 16:35:11','','','NEGERI','dghd','dhd',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','003','123','1233441','13131313','34434');

/*---------------------------------------------------------------
  TABLE: `gambar_transfer`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `gambar_transfer`;
CREATE TABLE `gambar_transfer` (
  `id_transfer` int(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `tipe_file` varchar(20) DEFAULT NULL,
  `no_daftar` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_transfer`),
  KEY `no_daftar` (`no_daftar`),
  CONSTRAINT `gambar_transfer_ibfk_1` FOREIGN KEY (`no_daftar`) REFERENCES `daftar` (`no_daftar`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*---------------------------------------------------------------
  TABLE: `info`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `info`;
CREATE TABLE `info` (
  `id_info` int(3) NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
INSERT INTO `info` VALUES   ('1','Alur Pendaftaran','assignment','<p style=\"text-align: center;\"><span style=\"color: #0000ff;\"><strong><span style=\"font-size: 18pt;\">ALUR PENDAFTARAN CALON SISWA BARU</span></strong></span></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li>Calon siswa mendaftar melalui link&nbsp;</li>\r\n<li>Setelah memasukkan data harap langsung print/cetak bukti pendaftaran</li>\r\n<li>Lengkapi data diri dengan cara login pada web ppdb pada link =&gt;</li>\r\n<li>setelah melengkapi data Cetak Lagi Bukti Daftar dan langsung ke sekolah&nbsp; untuk verifikasi berkas jangan lupa bawa persyaratan verifikasi berkas. [*<strong>syarat verifikasi berkas ada pada web ini maupun web utama</strong>]</li>\r\n<li>Calon siswa akan mendapat cap sekolah/bukti verifikasi setelah berkas di verifikasi. [bisa dilihat pada menu&nbsp;<strong>Data Pendaftar</strong>]</li>\r\n<li>Calon Siswa Menunggu Hasil Pengumuman PPDB dan bisa langsung melihat hasil pengumuman sesuai tanggal pengumuman pada link berikut ini&nbsp;</li>\r\n</ol>','1');
INSERT INTO `info` VALUES ('2','Syarat Verifikasi','assignment','<p style=\"text-align: center;\"><span style=\"font-size: 24px; color: #ff9900;\"><strong>SYARAT VERIFIKASI BERKAS</strong></span></p>\r\n<p style=\"text-align: left;\">Calon siswa baru datang ke sekolah&nbsp; wajib membawa:</p>\r\n<ol>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>Bukti Cetak registrasi online Calon Siswa Baru</strong></h3>\r\n</li>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>1 Lembar Fotocopy SKHUN/SKBYS yang dilegalisir (Memperlihatkan aslinya dan bisa ditambah menyusul jika sudah ada)</strong></h3>\r\n</li>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>1 Lembar Fotocopy Ijazah yang dilegalisir</strong></h3>\r\n</li>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>1 Lembar Fotocopy Kartu Keluarga yang dilegalisir</strong></h3>\r\n</li>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>Foto 3x4 Latar Belakang Merah 2 Lembar</strong></h3>\r\n</li>\r\n</ol>\r\n<p>Tambahkan Lampiran Jika Memiliki :</p>\r\n<ol>\r\n<li><strong>Fotocopy Sertifikat prestasi yang relevan dan dilegalisir</strong></li>\r\n<li><strong>Fotocopy KKM/KKS/KIP/KPs yang masih berlaku</strong></li>\r\n</ol>','1');
INSERT INTO `info` VALUES ('3','Petunjuk Pengisian Registrasi','info','<h3>UNTUK PETUNJUK PENGISIAN FORMULIR CALON SISWA BARU LIHAT VIDEO DIBAWAH INI:</h3>\r\n<p>klik tulisan PUTAR VIDEO dibawah ini nanti akan diarahkan ke alamat video di web resmi&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h2><span style=\"background-color: #ccffcc;\"><strong>PUTAR VIDEO</strong></span></h2>','1');
INSERT INTO `info` VALUES ('4','Info Kontak','call','<p style=\"text-align: center;\"><strong>DAFTAR KONTAK</strong></p>\r\n<p style=\"text-align: center;\"><strong>-------------------------------------</strong></p>\r\n<p style=\"text-align: justify;\">jika ada yang kurang jelas dengan sistem pendaftaran ini silahkan ditanyakan melalui kontak dan whatsapp dibawah ini:</p>','1');

/*---------------------------------------------------------------
  TABLE: `jenis_sekolah`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `jenis_sekolah`;
CREATE TABLE `jenis_sekolah` (
  `id_jenissekolah` varchar(20) NOT NULL,
  `nama_jenissekolah` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jenissekolah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `jenis_sekolah` VALUES   ('001','SMP INTERNASIONAL');
INSERT INTO `jenis_sekolah` VALUES ('002','Madrasah');
INSERT INTO `jenis_sekolah` VALUES ('003','SMK INTERNASIONAL');

/*---------------------------------------------------------------
  TABLE: `jurusan`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan` (
  `kode_jur` varchar(10) NOT NULL,
  `nama_jur` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_jur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `jurusan` VALUES   ('15%','Otomatisasi & Tata Kelola Perkantoran');
INSERT INTO `jurusan` VALUES ('30%','Akuntansi & Keuangan Lembaga');
INSERT INTO `jurusan` VALUES ('5%','Tata Busana');
INSERT INTO `jurusan` VALUES ('50%','Perhotelan');

/*---------------------------------------------------------------
  TABLE: `mou`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `mou`;
CREATE TABLE `mou` (
  `kode_mou` varchar(5) NOT NULL,
  `sekolah_mou` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  PRIMARY KEY (`kode_mou`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `mou` VALUES   ('S001','SMPN 1 TEMPEL','ya','0');
INSERT INTO `mou` VALUES ('S002','SMPN 2 TEMPEL','ya','0');
INSERT INTO `mou` VALUES ('S003','SMPN 3 TEMPEL','ya','0');
INSERT INTO `mou` VALUES ('S004','SMPN 4 TEMPEL','ya','0');
INSERT INTO `mou` VALUES ('S005','SMP MUHAMMADIYAH 1 TEMPEL','ya','0');
INSERT INTO `mou` VALUES ('S006','SMPN 1 TURI','ya','0');
INSERT INTO `mou` VALUES ('S007','SMPN 2 TURI','ya','0');
INSERT INTO `mou` VALUES ('S008','SMPN 3 TURI','ya','0');
INSERT INTO `mou` VALUES ('S009','SMP MUHAMMADIYAH TURI','ya','0');
INSERT INTO `mou` VALUES ('S010','SMP SANTO ALOYSIUS TURI','ya','0');

/*---------------------------------------------------------------
  TABLE: `pengawas`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `pengawas`;
CREATE TABLE `pengawas` (
  `id_pengawas` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(10) NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pengawas`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
INSERT INTO `pengawas` VALUES   ('51','-','Admin PPDB','','admin','$2y$10$490bmAlDpn5e.Cq75bWd6uPm4lOnlBZlfs.k7J/NLLF0.sftOKixa','admin','');

/*---------------------------------------------------------------
  TABLE: `pengumuman`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `pengumuman`;
CREATE TABLE `pengumuman` (
  `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `user` int(3) NOT NULL,
  `text` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
INSERT INTO `pengumuman` VALUES   ('2','','PENGUMUMAN CALON SISWA YANG DINYATAKAN DITERIMA','0','<p>Untuk <strong>INFO</strong> Kelulusan akan bisa diakses pada tanggal&nbsp;</p>\r\n<p><span style=\"font-size: 24pt;\"><strong>Gelombang 1: 12 APRIL 2020</strong></span></p>\r\n<p><span style=\"font-size: 24pt;\"><strong>Gelombang 2: 7 JULI 2020</strong></span></p>\r\n<p>&nbsp;</p>','2020-03-09 12:19:01');
INSERT INTO `pengumuman` VALUES ('3','','INFO PENGISIAN','0','<p>*harap isi sesuai data pribadi masing masing</p>\r\n<p>* untuk nama data wali silahkan diisi jika tidak tinggal bersama orang tua dan kosongkan bila tinggal bersama orang tua</p>','2020-03-26 11:57:18');

/*---------------------------------------------------------------
  TABLE: `santristatus`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `santristatus`;
CREATE TABLE `santristatus` (
  `kode_status` varchar(20) NOT NULL,
  `nama_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kode_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `santristatus` VALUES   ('aktif','aktif');
INSERT INTO `santristatus` VALUES ('alumni','alumni');

/*---------------------------------------------------------------
  TABLE: `seragam`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `seragam`;
CREATE TABLE `seragam` (
  `kode_seragam` varchar(20) NOT NULL,
  `ukuran_seragam` varchar(30) NOT NULL,
  PRIMARY KEY (`kode_seragam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `seragam` VALUES   ('diterima','diterima');
INSERT INTO `seragam` VALUES ('diverifikasi','diverifikasi');
INSERT INTO `seragam` VALUES ('tidak','tidak diterima');

/*---------------------------------------------------------------
  TABLE: `session`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_time` varchar(10) NOT NULL,
  `session_hash` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO `session` VALUES   ('1','1447610188','$2y$10$dt9BTs7FlTXgpactflaXPOSVWrs.wurWsKBGv18JkzolJmHZOj.B.');

/*---------------------------------------------------------------
  TABLE: `setting`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `aplikasi` varchar(100) NOT NULL,
  `kode_sekolah` varchar(10) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `jenjang` varchar(5) NOT NULL,
  `kepsek` varchar(50) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `web` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo` text NOT NULL,
  `header` text NOT NULL,
  `header_kartu` text NOT NULL,
  `open_ppdb` varchar(10) NOT NULL,
  `close_ppdb` varchar(10) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO `setting` VALUES   ('1','PPDB ONLINE','R1','NAMA SEKOLAH','SMK','NAMA KEPSEK','19454','alamat isi disini','kec','kab','081325220787','-','https://xx.sch.id','email@gmail.com','images/logoapp.png','FORMULIR PENDAFTARAN CALON SISWA BARU','KARTU PESERTA \nPENILAIAN AKHIR SEMESTER','2020-03-17','2020-04-26');

/*---------------------------------------------------------------
  TABLE: `sex`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `sex`;
CREATE TABLE `sex` (
  `kode_kelamin` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_kelamin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `sex` VALUES   ('L','L');
INSERT INTO `sex` VALUES ('P','P');

/*---------------------------------------------------------------
  TABLE: `slide`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide` (
  `id_slide` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id_slide`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
