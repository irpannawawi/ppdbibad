
/*---------------------------------------------------------------
  SQL DB BACKUP 28.06.2020 14:18 
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
INSERT INTO `agenda` VALUES   ('1','Daftar Ulang','<p>Daftar Ulang akan dilakukan pada tanggal :</p>\r\n<h2><strong>29 - 30 Juni 2020</strong></h2>','Panitia PPDB','2020-06-29 07:30:00');
INSERT INTO `agenda` VALUES ('2','PMB','<p>Penggalian Minat dan Bakat Dilaksanakan pada tanggal :</p>\r\n<h2><strong>1 - 2 Juli 2020</strong></h2>','Panitia PPDB','2020-07-01 08:00:00');
INSERT INTO `agenda` VALUES ('3','Maruf Ghofur dan MATACAKAP','<p>Agenda Maruf Ghofur dan MATACAKAP akan dilaksanakan pada tanggal :</p>\r\n<h2><strong>6 - 12 Juli 2020</strong></h2>','Panitia PPDB','2020-07-06 08:00:00');
INSERT INTO `agenda` VALUES ('4','PENDAFTARAN','<p>Pendaftaran dimulai pada tanggal :</p>\r\n<h2><strong>01 MARET - 29 JUNI 2020</strong></h2>','TIM PPDB MAIG','2020-03-01 07:00:00');

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
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_bayar`),
  KEY `no_daftar` (`no_daftar`),
  CONSTRAINT `bayar_ibfk_1` FOREIGN KEY (`no_daftar`) REFERENCES `daftar` (`no_daftar`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `bayar` VALUES   ('202005190001','PSB004','0','UFA SITI LATIFAH','','-','51','2020-05-19 02:58:29');
INSERT INTO `bayar` VALUES ('202005190002','PSB003','0','ADRIANSYAH DWI AGUSTHINO','','-','51','2020-05-19 03:02:17');
INSERT INTO `bayar` VALUES ('202005190003','PSB005','0','YETI PATMAWATI','','-','51','2020-05-19 03:05:35');
INSERT INTO `bayar` VALUES ('202005190004','PSB006','0','WINDA WIDIANTI','','-','51','2020-05-19 03:05:53');
INSERT INTO `bayar` VALUES ('202005190005','PSB007','0','SITI ROMDIAH','','-','51','2020-05-19 03:06:09');
INSERT INTO `bayar` VALUES ('202005190006','PSB008','0','INTAN NURAENI','','-','51','2020-05-19 03:06:25');
INSERT INTO `bayar` VALUES ('202005190007','PSB009','0','MILA MEISYA','','-','51','2020-05-19 03:06:39');
INSERT INTO `bayar` VALUES ('202005190008','PSB010','0','DERISA SANIA PUTRI','','-','51','2020-05-19 03:06:55');
INSERT INTO `bayar` VALUES ('202005190009','PSB011','0','SENI SANIATUL FALAHAH','','-','51','2020-05-19 03:07:10');
INSERT INTO `bayar` VALUES ('202005190010','PSB012','0','SITI TIARA YOPITASARI','','-','51','2020-05-19 03:07:24');
INSERT INTO `bayar` VALUES ('202005190011','PSB013','0','ANNISA PERMATA','','-','51','2020-05-19 03:09:34');
INSERT INTO `bayar` VALUES ('202005190012','PSB014','0','ALYA ALIYATUL H','','-','51','2020-05-19 03:09:46');
INSERT INTO `bayar` VALUES ('202005190013','PSB015','0','SHOFI NUR ADILAH','','-','51','2020-05-19 03:09:56');
INSERT INTO `bayar` VALUES ('202005190014','PSB016','0','J MILAH MELANI','','-','51','2020-05-19 03:10:07');
INSERT INTO `bayar` VALUES ('202005190015','PSB017','0','RANI RODIAH','','-','51','2020-05-19 03:10:16');
INSERT INTO `bayar` VALUES ('202005190016','PSB019','0','RISKA','','-','51','2020-05-19 03:10:29');
INSERT INTO `bayar` VALUES ('202005190017','PSB020','0','DEA SEPTIANA','','-','51','2020-05-19 03:13:20');
INSERT INTO `bayar` VALUES ('202005190018','PSB021','0','NURHASANAH','','-','51','2020-05-19 03:13:35');
INSERT INTO `bayar` VALUES ('202005190020','PSB024','0','TIA PITRIANI','','-','51','2020-05-19 03:14:04');
INSERT INTO `bayar` VALUES ('202005190021','PSB026','0','HANA ISTIQOMAH','','-','51','2020-05-19 03:16:09');
INSERT INTO `bayar` VALUES ('202005190022','PSB027','0','ADE IRWAN','','-','51','2020-05-19 03:16:21');
INSERT INTO `bayar` VALUES ('202005190023','PSB028','0','FAIZ MUHAMMAD','','-','51','2020-05-19 03:16:32');
INSERT INTO `bayar` VALUES ('202005190024','PSB029','0','RESA YULIAWATI','','-','51','2020-05-19 03:16:41');
INSERT INTO `bayar` VALUES ('202005190025','PSB030','0','GINA SORAYA','','-','51','2020-05-19 03:16:58');
INSERT INTO `bayar` VALUES ('202005190026','PSB031','0','DHEA RIANSYAH','','-','51','2020-05-19 03:17:13');
INSERT INTO `bayar` VALUES ('202005190027','PSB032','0','ADE CANDRA','','-','51','2020-05-19 03:17:22');
INSERT INTO `bayar` VALUES ('202005190028','PSB033','0','MUHAMMAD RIZKI FAUZAN DZIMAN','','-','51','2020-05-19 03:17:32');
INSERT INTO `bayar` VALUES ('202005190029','PSB034','0','CUCUM','','-','51','2020-05-19 03:17:45');
INSERT INTO `bayar` VALUES ('202005190030','PSB035','0','RISMA MAHARANI','','-','51','2020-05-19 03:20:10');
INSERT INTO `bayar` VALUES ('202005190031','PSB036','0','WILDAN AULIA RAHMAN','','-','51','2020-05-19 03:22:35');
INSERT INTO `bayar` VALUES ('202005190032','PSB038','0','SITI NURLAILAH AL MUBAROKAH','','-','51','2020-05-19 03:22:50');
INSERT INTO `bayar` VALUES ('202005190033','PSB039','0','DADI RAMDANI','','-','51','2020-05-19 03:23:21');
INSERT INTO `bayar` VALUES ('202005190034','PSB040','0','DEDE AFRIANI','','-','51','2020-05-19 03:23:37');
INSERT INTO `bayar` VALUES ('202005190035','PSB041','0','WISNU ABDUL HAMID','','-','51','2020-05-19 03:23:49');
INSERT INTO `bayar` VALUES ('202005190036','PSB042','0','LIA KAMELIA','','-','51','2020-05-19 03:24:26');
INSERT INTO `bayar` VALUES ('202005190037','PSB043','0','VINA SILFIANA','','-','51','2020-05-19 03:24:39');
INSERT INTO `bayar` VALUES ('202005190038','PSB045','0','RANI SURYANI','','-','51','2020-05-19 03:24:53');
INSERT INTO `bayar` VALUES ('202005190039','PSB046','0','ADE HILMI MAULANA','','-','51','2020-05-19 03:25:02');
INSERT INTO `bayar` VALUES ('202005190040','PSB047','0','IHAB SIHABUDIN','','-','51','2020-05-19 03:27:04');
INSERT INTO `bayar` VALUES ('202005190042','PSB049','0','RIPA SYAMROTUL M','','-','51','2020-05-19 03:27:23');
INSERT INTO `bayar` VALUES ('202005190043','PSB050','0','AAS NUR KHOLIPAH','','-','51','2020-05-19 03:27:37');
INSERT INTO `bayar` VALUES ('202005190045','PSB052','0','IMAN FIRMANUL HAKIM','','-','51','2020-05-19 03:27:55');

/*---------------------------------------------------------------
  TABLE: `biaya`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `biaya`;
CREATE TABLE `biaya` (
  `kode_biaya` varchar(20) NOT NULL,
  `nama_biaya` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `biaya` VALUES   ('001','Biaya Awal Tahun','700');

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
INSERT INTO `bukukas` VALUES   ('9','2020-05-19','0','0','Pembayaran PSB004','51','202005190001');
INSERT INTO `bukukas` VALUES ('10','2020-05-19','0','0','Pembayaran PSB003','51','202005190002');
INSERT INTO `bukukas` VALUES ('11','2020-05-19','0','0','Pembayaran PSB005','51','202005190003');
INSERT INTO `bukukas` VALUES ('12','2020-05-19','0','0','Pembayaran PSB006','51','202005190004');
INSERT INTO `bukukas` VALUES ('13','2020-05-19','0','0','Pembayaran PSB007','51','202005190005');
INSERT INTO `bukukas` VALUES ('14','2020-05-19','0','0','Pembayaran PSB008','51','202005190006');
INSERT INTO `bukukas` VALUES ('15','2020-05-19','0','0','Pembayaran PSB009','51','202005190007');
INSERT INTO `bukukas` VALUES ('16','2020-05-19','0','0','Pembayaran PSB010','51','202005190008');
INSERT INTO `bukukas` VALUES ('17','2020-05-19','0','0','Pembayaran PSB011','51','202005190009');
INSERT INTO `bukukas` VALUES ('18','2020-05-19','0','0','Pembayaran PSB012','51','202005190010');
INSERT INTO `bukukas` VALUES ('19','2020-05-19','0','0','Pembayaran PSB013','51','202005190011');
INSERT INTO `bukukas` VALUES ('20','2020-05-19','0','0','Pembayaran PSB014','51','202005190012');
INSERT INTO `bukukas` VALUES ('21','2020-05-19','0','0','Pembayaran PSB015','51','202005190013');
INSERT INTO `bukukas` VALUES ('22','2020-05-19','0','0','Pembayaran PSB016','51','202005190014');
INSERT INTO `bukukas` VALUES ('23','2020-05-19','0','0','Pembayaran PSB017','51','202005190015');
INSERT INTO `bukukas` VALUES ('24','2020-05-19','0','0','Pembayaran PSB019','51','202005190016');
INSERT INTO `bukukas` VALUES ('25','2020-05-19','0','0','Pembayaran PSB020','51','202005190017');
INSERT INTO `bukukas` VALUES ('26','2020-05-19','0','0','Pembayaran PSB021','51','202005190018');
INSERT INTO `bukukas` VALUES ('28','2020-05-19','0','0','Pembayaran PSB024','51','202005190020');
INSERT INTO `bukukas` VALUES ('29','2020-05-19','0','0','Pembayaran PSB026','51','202005190021');
INSERT INTO `bukukas` VALUES ('30','2020-05-19','0','0','Pembayaran PSB027','51','202005190022');
INSERT INTO `bukukas` VALUES ('31','2020-05-19','0','0','Pembayaran PSB028','51','202005190023');
INSERT INTO `bukukas` VALUES ('32','2020-05-19','0','0','Pembayaran PSB029','51','202005190024');
INSERT INTO `bukukas` VALUES ('33','2020-05-19','0','0','Pembayaran PSB030','51','202005190025');
INSERT INTO `bukukas` VALUES ('34','2020-05-19','0','0','Pembayaran PSB031','51','202005190026');
INSERT INTO `bukukas` VALUES ('35','2020-05-19','0','0','Pembayaran PSB032','51','202005190027');
INSERT INTO `bukukas` VALUES ('36','2020-05-19','0','0','Pembayaran PSB033','51','202005190028');
INSERT INTO `bukukas` VALUES ('37','2020-05-19','0','0','Pembayaran PSB034','51','202005190029');
INSERT INTO `bukukas` VALUES ('38','2020-05-19','0','0','Pembayaran PSB035','51','202005190030');
INSERT INTO `bukukas` VALUES ('39','2020-05-19','0','0','Pembayaran PSB036','51','202005190031');
INSERT INTO `bukukas` VALUES ('40','2020-05-19','0','0','Pembayaran PSB038','51','202005190032');
INSERT INTO `bukukas` VALUES ('41','2020-05-19','0','0','Pembayaran PSB039','51','202005190033');
INSERT INTO `bukukas` VALUES ('42','2020-05-19','0','0','Pembayaran PSB040','51','202005190034');
INSERT INTO `bukukas` VALUES ('43','2020-05-19','0','0','Pembayaran PSB041','51','202005190035');
INSERT INTO `bukukas` VALUES ('44','2020-05-19','0','0','Pembayaran PSB042','51','202005190036');
INSERT INTO `bukukas` VALUES ('45','2020-05-19','0','0','Pembayaran PSB043','51','202005190037');
INSERT INTO `bukukas` VALUES ('46','2020-05-19','0','0','Pembayaran PSB045','51','202005190038');
INSERT INTO `bukukas` VALUES ('47','2020-05-19','0','0','Pembayaran PSB046','51','202005190039');
INSERT INTO `bukukas` VALUES ('48','2020-05-19','0','0','Pembayaran PSB047','51','202005190040');
INSERT INTO `bukukas` VALUES ('50','2020-05-19','0','0','Pembayaran PSB049','51','202005190042');
INSERT INTO `bukukas` VALUES ('51','2020-05-19','0','0','Pembayaran PSB050','51','202005190043');
INSERT INTO `bukukas` VALUES ('53','2020-05-19','0','0','Pembayaran PSB052','51','202005190045');

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
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sekolah_lain` varchar(100) DEFAULT NULL,
  `status_santrinya` varchar(20) DEFAULT NULL,
  `status_sekolah` varchar(50) DEFAULT NULL,
  `nama_kecil_ibu` varchar(50) DEFAULT NULL,
  `alamat_ortu` varchar(100) DEFAULT NULL,
  `alamat_dua` varchar(50) DEFAULT NULL,
  `alamat_wali` varchar(100) DEFAULT NULL,
  `noreg_akta` text DEFAULT NULL,
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
INSERT INTO `daftar` VALUES   ('PSB003','01','S010','3207131509070245','','ADRIANSYAH DWI AGUSTHINO','','','','L','CIAMIS','2005-09-28','ISLAM','0','0','0','0','','DUSUN SIRNAMULYA RT/RW:003/002','','','','SIRNAJAYA','RAJADESA','','','0','','','','','0853 2096 3842','','','','','','Belum diisi','0','','','','','Belum diisi','0','','','','0','','0','','','','0','0053090709','1','1','diterima','online','2020-05-19 03:02:17','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB004','01','S010','1','','UFA SITI LATIFAH','','','','P','CIAMIS','2004-04-09','ISLAM','0','0','0','0','','DUSUN KUBANGSARI RT/RW 04/08','','','','SIRNABAYA ','RAJADESA','','','0','','','','','08882134768','','','','','','Diah','0','','','','','Maman','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 02:58:29','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB005','02','S010','1','','YETI PATMAWATI','','','','P','CIAMIS','2005-04-09','ISLAM','0','0','0','0','','DUSUN SIRNASARI RT/RW 06/09 ','','','','RAJADESA','RAJADESA','','','0','','','','','-','','','','','','Enceng Darsa','0','','','','','Ehat','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:05:35','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB006','01','0','3207120908070381','','WINDA WIDIANTI','','','','P','CIAMIS','2004-12-19','ISLAM','0','0','0','0','','DUSUN WETAN RT/RW 02/01','','','','BAYASARI','JATINAGARA','','','0','','','','','085216559136','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','0042407246','1','1','diterima','online','2020-05-19 03:05:53','MTS. RIJALUL HIKAM','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'004',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB007','01','S010','1','','SITI ROMDIAH','','','','P','CIAMIS','2004-11-03','ISLAM','0','0','0','0','','DUSUN PABUARAN RT/RW 06/03','','','','SIRNAJAYA','RAJADESA','','','0','','','','','-','','','','','','Eko Darso','0','','','','','Yoyoh ','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:06:09','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB008','01','S010','1','','INTAN NURAENI','','','','P','CIAMIS','2004-04-05','ISLAM','0','0','0','0','','DUSUN KUTASARI RT/RW 03/06','','','','SIRNABAYA ','RAJADESA','','','0','','','','','-','','','','','','Nanang','0','','','','','Aan Amiati','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:06:25','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB009','02','S010','1','','MILA MEISYA','','','','P','CIAMIS','2005-02-28','ISLAM','0','0','0','0','','DUSUN PABUARAN RT/RW 03/06','','','','SIRNAJAYA','RAJADESA','','','0','','','','','-','','','','','','Karsono','0','','','','','Titin Fatimah','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:06:39','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB010','01','S006','1','','DERISA SANIA PUTRI','','','','P','CIAMIS','2004-11-21','ISLAM','0','0','0','0','','DUSUN MEKARJAYA RT/RW 03/03','','','','ANDAPRAJA','RAJADESA','','','0','','','','','-','','','','','','Ahmad (Alm)','0','','','','','Hj, Wiwin Nuraeni','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:06:55','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB011','01','S010','1','','SENI SANIATUL FALAHAH','','','','P','CIAMIS','2004-08-23','ISLAM','0','0','0','0','','DUSUN BALONG','','','','SIRNAJAYA','RAJADESA','','','0','','','','','-','','','','','','Jaja Riswandi','0','','','','','Siti Umi Kulsum','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:07:10','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB012','01','S008','1','','SITI TIARA YOPITASARI','','','','P','CIAMIS','2004-05-09','ISLAM','0','0','0','0','','DUSUN WANGUNRT/RW 05/07','','','','WANGUNSARI','RANCAH','','','0','','','','','-','','','','','','Saryo','0','','','','','Tintin Rostinda','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:07:24','','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'002',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB013','01','S008','1','','ANNISA PERMATA','','','','P','CIAMIS','2005-05-14','ISLAM','0','0','0','0','','DUSUN MULYASARI RT/RW 02/03','','','','CIBUBUHAN','JATINAGARA','','','0','','','','','-','','','','','','H. Amat','0','','','','','Susi S','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:09:34','','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'002',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB014','02','S008','1','','ALYA ALIYATUL H','','','','P','CIAMIS','2004-10-31','ISLAM','0','0','0','0','','DUSUN KUTASARI RT/RW 02/05','','','','SIRNABAYA ','RAJADESA','','','0','','','','','-','','','','','','Ali Setiadi','0','','','','','Yani Nur Yani','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:09:46','','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'002',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB015','02','S008','1','','SHOFI NUR ADILAH','','','','P','CIAMIS','2005-04-15','ISLAM','0','0','0','0','','DUSUN WANGUN RT/RW 04/07','04/07','','','WANGUNSARI','RANCAH','Ciamis','Jawa Barat','0','Bersama Orang Tua','Sepeda Motor','','','-','','','','','','Daldiri, S.Pd.I','0','','','','','Tati Nurjanah, M.Pd.I','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-06-03 11:02:09','','','SWASTA',NULL,NULL,'Dsn.Wangun Ds.Wangunsari',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'002',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB016','02','S008','1','','J MILAH MELANI','','','','P','CIAMIS','2005-05-31','ISLAM','0','0','0','0','','KAMPUNG SUSUKAN RT/RW 06/02','','','','BOJONGGEDE','BOJONGGEDE KAB. BOGOR','','','0','','','','','-','','','','','','Jajang','0','','','','','Aie Jamilah','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:10:07','','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'002',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB017','02','0','3207137006040001','','RANI RODIAH','','','','P','CIAMIS','2004-06-30','ISLAM','0','0','0','0','','MANDALAWANGI','','','','TANJUNGSARI','RAJADESA','','','0','','','','','082295504216','','','','','','?','0','','','','','?','0','','','','0','','0','','','','0','0047216256','1','1','diterima','online','2020-05-19 03:10:16','MTS TANJUNGSARI','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'004',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB019','02','S010','1','','RISKA','','','','P','CIAMIS','2004-10-31','ISLAM','0','0','0','0','','DUSUN KUBANGSARI  RT/RW 01/07','','','','SIRNABAYA','RAJADESA','','','0','','','','','085223944572','','','','','','Maman Rahman','0','','','','','Ian Yani Setiani','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:10:29','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB020','02','S010','1','','DEA SEPTIANA','','','','P','CIAMIS','2004-09-26','ISLAM','0','0','0','0','','DUSUN SIRNAMULYA RT/RW 04/02','','','','SIRNAJAYA','RAJADESA','','','0','','','','','085223944572','','','','','','Cece','0','','','','','Emah','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:13:20','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB021','02','S010','1','','NURHASANAH','','','','P','CIAMIS','2004-10-14','ISLAM','0','0','0','0','','DUSUN SUKAMAJU RT/RW 01/02','','','','TANJUNGSARI','RAJADESA','','','0','','','','','085223944572','','','','','','Maman','0','','','','','Ina Romdona','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:13:35','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB024','02','S010','1','','TIA PITRIANI','','','','P','CIAMIS','2005-05-04','ISLAM','0','0','0','0','','DUSUN CIBULAKAN','','','','SIRNAJAYA','RAJADESA','','','0','','','','','085223944572','','','','','','Yoyo','0','','','','','Wiwi','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:14:04','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB026','02','S010','1','','HANA ISTIKOMAH','','','','P','CIAMIS','2004-11-03','ISLAM','0','0','0','0','','DUSUN SUKAWANGI','','','','BAYASARI','JATINAGARA','','','0','','','','','085223944572','','','','','','Yaya Maulana','0','','','','','Edah Siti Jubaedah','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-06-04 07:43:21','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB027','01','S010','1','','ADE IRWAN','','','','L','CIAMIS','2021-09-25','ISLAM','0','0','0','0','','DUSUN SIRNAMULYA RT/RW 04/02','','','','SIRNAJAYA','RAJADESA','','','0','','','','','0853406505424','','','','','','Nana Sutiana','0','','','','','Hadnah Enoh','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:16:21','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB028','01','S010','1','','FAIZ MUHAMMAD','','','','L','CIAMIS','2005-05-11','ISLAM','0','0','0','0','','DUSUN RIMPAKGEDE RT/RW 06/05','','','','SUKAMULYA','BAREGBEG','','','0','','','','','082216232411','','','','','','Tatang Abdullah','0','','','','','Ernawati','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:16:32','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB029','02','S010','1','','RESA YULIAWATI','','','','P','CIAMIS','2005-07-30','ISLAM','0','0','0','0','','DUSUN CIGEDUG RT/RW 01/09','','','','PURWARAJA','RAJADESA','','','0','','','','','082118765535','','','','','','Maman Hermanto','0','','','','','Lilis Lisnawati','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:16:41','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB030','01','S010','1','','GINA SORAYA','','','','P','CIAMIS','2004-08-08','ISLAM','0','0','0','0','','DUSUN PABUARAN','','','','SIRNAJAYA','RAJADESA','','','0','','','','','081222470867','','','','','','Supendi','0','','','','','Ikah Mudrikah','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:16:58','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB031','02','S010','1','','DHEA RIANSYAH','','','','P','CIAMIS','2004-11-29','ISLAM','0','0','0','0','','DUSUN CIGOONG','','','','SIRNABAYA','RAJADESA','','','0','','','','','082129005873','','','','','','Udin','0','','','','','Ida','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:17:13','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB032','02','S010','1','','ADE CANDRA','','','','L','LAMONGAN','2005-10-22','ISLAM','0','0','0','0','','DUSUN JAGAMULYA RT/RW','','','','RAJADESA','RAJADESA','','','0','','','','','082127693093','','','','','','Heri Afandi','0','','','','','Nurhayati','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:17:22','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB033','01','S003','1','','MUHAMMAD RIZKI FAUZAN DZIMAN','','','','L','CIAMIS','2004-05-16','ISLAM','0','0','0','0','','CILEUEUR RT/RW  02/02','','','','TANJUNGSUKUR','RAJADESA','','','0','','','','','088802227972','','','','','','M. Ansor','0','','','','','Ela Nurlela','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:17:32','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'001',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB034','01','S010','1','','CUCUM','','','','P','CIAMIS','2005-08-08','ISLAM','0','0','0','0','','CINTAMULYA RT/RW 06/01','','','','BAYASARI','JATINAGARA','','','0','','','','','082317328926','','','','','','Muhlis','0','','','','','Anah','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:17:45','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'001',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB035','01','S010','1','','RISMA MAHARANI','','','','P','CIAMIS ','2004-05-07','ISLAM','0','0','0','0','','DUSUN JAGAMULYA','','','','RAJADESA','RAJADESA','','','0','','','','','089630870306','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:20:10','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB036','02','0','1','','WILDAN AULIA RAHMAN','','','','L','CIREBON','2005-02-06','ISLAM','0','0','0','0','','PERUMAHAN CEMPAKA ARUM, JLN NUSA INDAH, NO 590','','','',' DESA WANASABA LOR','TALUN','','','0','','','','','0852-2419-1999','','','','','','Nurul Huda','0','','','','','Tuti Solehati','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:22:35','SMP 1 SUMBER','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'001',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB038','01','S010','3207136310040003','','SITI NURLAILAH AL MUBAROKAH','','','','P','CIAMIS','2004-10-23','ISLAM','1','1','147','40','','DUSUN CIPINANG RT. 01 RW. 01','01/01','','','TANJUNGSARI','RAJADESA','Ciamis','Jawa Barat','0','Bersama Orang Tua','Sepeda Motor','4.5 km','45 Me','082123015766','','','','','','DEDI JAMALUDIN','1975','S1','PNS/TNI/POLRI','Rp. 2jt s/d Rp. 4 jt','','TETI SUHIAWATI','1983','SMA Sederajat','Wirausaha','Rp. 500.000 s/d Rp. 999.000','0','ANWAR HANAPI','0','','Pedagang','','0','0044547663','1','1','diterima','online','2020-05-19 03:22:50','','','NEGERI','TETI','Dusun Cipinang RT. 01 RW. 01 Desa Tanjungsari Kecamatan Rajadesa Kabupaten Ciamis','Dusun Cipinang ','Dusun Cileueur RT. 01 RW. 01 Desa Tanjungsukur Kecamatan Rajadesa Kabupaen Ciamis','CSL 0019554','Membaca','Perawat Kesehatan','','tidak','','','','','','','','Ciamis','003','2147483647','2147483647','2147483647','');
INSERT INTO `daftar` VALUES ('PSB039','02','S001','3207131410040001','','DADI RAMDANI','','','','L','CIAMIS','2004-10-14','ISLAM','2','1','0','0','','DSN JAGAMULYA RT 07/RW 04','07/04','','','RAJADESA','RAJADEDA','Ciamis','Jawa barat','0','Bersama Orang Tua','Sepeda Motor','','','081460902951','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','0047259471','1','1','diterima','online','2020-06-02 07:48:34','','','NEGERI',NULL,NULL,'',NULL,'','','','','tidak',NULL,NULL,NULL,NULL,NULL,NULL,'','','001',NULL,NULL,NULL,'');
INSERT INTO `daftar` VALUES ('PSB040','01','S010','32073454120440002','','DEDE AFRIANI','','','','P','CIAMIS','2004-12-12','ISLAM','0','0','0','0','','DNS.BANGSAL RT/RW 11/04','','','','DERMARAJA','LUMBUNG','','','0','','','','','081220667642','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','0048451383','1','1','diterima','online','2020-06-02 07:48:52','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB041','01','0','1','','WISNU ABDUL HADI','','','','L','CIAMIS','2003-05-11','ISLAM','0','0','0','0','','DUSUN MANDALAWANGI RT/RW 03/04','','','','TANJUNGSARI','RAJADESA','','','0','','','','','081312125469','','','','','','Hadis','0','','','','','Nonoh','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-06-03 12:14:23','SMP IT NURUL HUDA UTSMANIAH','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','',NULL,NULL,'002',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB042','02','S010','1','','LIA KAMELIA','','','','P','CIAMIS','2004-10-19','ISLAM','0','0','0','0','','RAJADESA','','','','RAJADESA','RAJADESA','','','0','','','','','-','','','','','','Rosadi','0','','','','','Uun Unisah','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:24:26','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB043','01','S010','1','','VINA SILFIANA','','','','P','CIAMIS','2004-09-21','ISLAM','0','0','0','0','','DUSUN CIHANJUANG','','','','PURWARAJA','RAJADESA','','','0','','','','','081211256228','','','','','','Janta','0','','','','','Onih','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:24:39','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB044','01','S010','1','','YANI NURYANI','','','','P','CIAMIS','2004-07-31','ISLAM','0','0','0','0','','DUSUN CIHANJUANG','','','','PURWARAJA','RAJADESA','','','0','','','','','083807955406','','','','','','Eti Suhaeti','0','','','','','Eti Suhaeti','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-05-18 05:42:00','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB045','01','S010','1','','RANI SURYANI','','','','P','CIAMIS ','2004-03-15','ISLAM','0','0','0','0','','DUSUN CILUMBU RT/RW O4/02','','','','TANJUNGJAYA','RAJADESA','','','0','','','','','083825925650','','','','','','Asim','0','','','','','Atin','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:24:53','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB046','02','S010','1','','ADE HILMI MAULANA','','','','L','CIAMIS ','2005-04-21','ISLAM','0','0','0','0','','PABUARAN RT/RW 03/02','','','','SIRNAJAYA','RAJADESA','','','0','','','','','082215850868','','','','','','Engkos','0','','','','',' Yani','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:25:02','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB047','02','S010','1','','IHAB SIHABUDIN','','','','L','CIAMIS ','2005-05-14','ISLAM','0','0','0','0','','DUKUHSARI','','','','SIRNABAYA','RAJADESA','','','0','','','','','085315728458','','','','','','Sambas','0','','','','','Mamah','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:27:04','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB049','01','S010','1','','RIPA SYAMROTUL M','','','','P','CIAMIS ','2005-06-05','ISLAM','0','0','0','0','','DUSUN KUTASARI','','','','SIRNABAYA','RAJADESA','','','0','','','','','0881023174602','','','','','','Uu Jamaludin','0','','','','','Imas Masriah','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:27:23','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB050','02','S010','1','','AAS NUR KHOLIPAH','','','','P','CIAMIS ','2005-01-16','ISLAM','0','0','0','0','','PABUARAN','','','','SIRNAJAYA','RAJADESA','','','0','','','','','082215222716','','','','','','Kusnadi','0','','','','','Rukiah','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-05-19 03:27:37','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB052','01','S010','3207130909070306','','IMAN FIRMANUL HAKIM','','','','L','CIAMIS ','2004-04-29','ISLAM','1','2','165','48','','DUSUN KUTASARI','03/06','','','SIRNABAYA','RAJADESA','Ciamis','Jawa barat','0','Bersama Orang Tua','Sepeda Motor','','','082115524852','','','','','','Lilim','0','SMP Sederajat','Buruh','Kurang dari Rp. 500.000','','Iis','0','SD Sederajat','Buruh','Tidak Berpenghasilan','0','','0','','','','0','0043786439','1','1','diterima','online','2020-06-04 01:53:03','','','NEGERI','','','Kutasari','','23865','Main bola','Orang sukses','','tidak',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003','0','0','0',NULL);
INSERT INTO `daftar` VALUES ('PSB053','01','0','3207345701050001','','AI ELSA SARIPAH','','','','P','CIAMIS','2005-01-17','ISLAM','0','0','0','0','','DUSUN CIPARI RT./RW. 049/017','','','','AWILUAR (46258)','LUMBUNG','','','0','','','','','081221109181','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','0056175065','1','0','diterima','online','2020-06-02 07:49:58','MTSN 2 CIAMIS','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB054','01','S010','3207130107000021','','ADI TIA PRATAMA','','','','L','CIAMIS','2004-05-15','ISLAM','0','0','0','0','','DUSUN PABUARAN RT 05/02 ','','','','SIRNAJAYA','RAJADESA','','','0','','','','','+6282320571737','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','0058081653','1','0','diterima','online','2020-06-02 07:50:17','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB057','02','S010','3207131209070259','','FARIZ ABDULROHIM ALFARIZI','','','','L','CIAMIS','2004-10-01','ISLAM','0','0','0','0','','RT02/RW04 DSN. JAGAMULYA DESA. RAJADESA KEC. RAJADESA KAB. CIAMIS','','','','RAJADESA','RAJADESA','','','0','','','','','0895701295582','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','0047601985','1','0','diterima','online','2020-06-02 08:02:20','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB058','01','0','3207187003050002','','ICHA KHOERUNNISA','','','','P','CIAMIS','2005-03-30','ISLAM','0','0','0','0','','JALAN PASIR EURIH,DUSUN SINDANGSARI','','','','DESA KALIJAYA','KECAMATAN BANJARANYAR','','','0','','','','','081324971339','','','','','','Emor Makmur','0','','','','','Siti Khotimah','0','','','','0','','0','','','','0','0056060908','1','0','diterima','online','2020-06-02 08:03:31','SMPN 5 BANJARSARI','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'001',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB061','02','S010','3207133010050001','','RIDAN NOER RAMADHA ','','','','L','CIAMIS','2005-10-30','ISLAM','0','0','0','0','','JALAN TANJUNG SARI-BLOK CIPEUTEUY','','','','RAJADESA/DUSUN SIRNASARI RT5 RW9','RAJADESA','','','0','','','','','085703163028','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','0058358117','1','0','diterima','online','2020-06-04 05:16:26','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB064','02','S010','3207131609070566','','IHSAN AHMAD ADE ROBI','','','','L','CIAMIS','2005-09-21','ISLAM','0','0','0','0','','RAJA DESA SIRNAJAYA','','','','SIRNAJAYA','RAJADESA','','','0','','','','','088218317413','','','','','','Abdul Rohim','0','','','','','Entin','0','','','','0','','0','','','','0','11121012','1','0','diterima','online','2020-06-04 05:06:11','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB065','02','S008','3207120612040001','','DESTA FAZLUR RAHMAN','','','','L','BAYASARI,JATINAGARA','2004-12-06','ISLAM','0','0','0','0','','CILULUT ,TIGAHERANG','','','','TIGAHERANG','RAJADESA','','','0','','','','','082123789619','','','','','','Dede E','0','','','','','Elis Maesaroh','0','','','','0','','0','','','','0','0048081307','1','0','diterima','online','2020-06-04 05:06:53','','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'002',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB066','01','S008','1','','LUSI SITI PATIMAH','','','','P','CIAMIS ','2005-05-31','ISLAM','0','0','0','0','','CIBINGBIN RT/RW 06/03','','','','RAJADESA','RAJADESA','','','0','','','','','085321081656','','','','','','Ace Nugraha','0','','','','','Eros Rosmiati','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 05:08:00','','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','',NULL,NULL,'002',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB067','02','S010','1','','MELA MILATUSYIFFA','','','','P','CIAMIS ','2005-10-18','ISLAM','0','0','0','0','','KUTASARI RT/RW 02/05','','','','SIRNABAYA','RAJADESA','','','0','','','','','089630967588','','','','','','Ija','0','','','','','Ati','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 14:34:29','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB068','01','0','1','','NAURA APIA HUAIDA','','','','P','CIAMIS ','2005-07-25','ISLAM','0','0','0','0','','BABAKAN RT/RW 06/02','','','','BAYASARI','JATINAGARA','','','0','','','','','085353302388','','','','','','Endang','0','','','','','Tati','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 05:15:42','MTS YPI RIJALUL HIKAM','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'004',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB069','02','S008','1','','DAMAI MOH BASIT','','','','L','-','2020-01-01','ISLAM','0','0','0','0','','CIBINGBIN','','','','RAJADESA','RAJADESA','','','0','','','','','-','','','','','','Juanda','0','','','','','Aan Haryani','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 05:18:53','','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'002',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB070','02','S010','3207135203050001','','EUIS SUNDUSIAH ZAENAB','','','','P','CIAMIS','2005-03-12','ISLAM','0','0','0','0','','DUSUN CILUMBU. DESA TANJUNGJAYA.RT/RW:01/01 KECAMATAN RAJADESE','','','','TANJUNGJAYA','RAJADESA','','','0','','','','','085892544939','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','0051245821','1','0','diterima','online','2020-06-04 05:19:11','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB071','02','S008','1','','ABDUL AZIZ','','','','L','CIAMIS ','2020-01-01','ISLAM','0','0','0','0','','CIBINGBIN','','','','RAJADESA','RAJADESA','','','0','','','','','082121950813','','','','','','Eman','0','','','','','Esum','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 05:19:35','','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'002',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB072','01','0','1','','IMA MUTIARA SALSABILA','','','','P','CIAMIS ','2005-08-23','ISLAM','0','0','0','0','','PURWARAJA ','','','','RAJADESA','RAJADESA','','','0','','','','','0812205210398','','','','','','Burhanudin','0','','','','','Aroh Munawaroh','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 05:20:52','MTSN 2 CIAMIS','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB073','01','S010','1','','NURUL AENI','','','','P','CIAMIS ','2004-05-18','ISLAM','0','0','0','0','','CIPINANG, TANJUNGSARI ','','','','TANJUNGSARI','RAJADESA','','','0','','','','','081317587646','','','','','','Muhtar','0','','','','','Titin','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 05:21:15','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB074','02','S010','1','','SYIFA SOFIATUL MAKIYAH','','','','P','CIAMIS ','2005-08-23','ISLAM','0','0','0','0','','MARGAMULYA, ','','','','KARANGPANINGAL','TAMBAKSARI','','','0','','','','','085221748609','','','','','','Didin Mohamad W','0','','','','','Iis Siti Aisyah','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 05:21:59','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB075','01','S010','1','','FARHAN IBRAHIM','','','','L','CIAMIS ','2020-01-01','ISLAM','0','0','0','0','','KUTASARI RT/RW 01/05','','','','SIRNABAYA','RAJADESA','','','0','','','','','-','','','','','','Anwar ','0','','','','','Yeti Sumiati','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 05:22:53','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB076','01','S010','1','','MUHAMMAD FATHAN F','','','','L','CIAMIS ','2020-01-01','ISLAM','0','0','0','0','','CIGOONG RT/RW 05/02','','','','SIRNABAYA','RAJADESA','','','0','','','','','085322561300','','','','','','Misbahul Anwar','0','','','','','Ade Cicih K','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 05:23:30','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB077','02','0','1','','M ADIO AGUSTIAN','','','','L','CIAMIS ','2006-08-02','ISLAM','0','0','0','0','','DUSUN DESA RT/RW 02/04','','','','TANJUNGJAYA','RAJADESA','','','0','','','','','081383945093','','','','','','Yayat','0','','','','','Mimin','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 05:24:05','SMPN 205 JAKARTA BARAT','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'001',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB078','01','S010','1','','TRESNA AULIA','','','','P','BANDUNG','2004-05-27','ISLAM','0','0','0','0','','CIJOHO RT/RW 11/15','','','','MUKTISARI','CIPAKU','','','0','','','','','085314435400','','','','','','Ujang Didin','0','','','','','Iis Supenti','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 05:24:38','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB079','02','S010','1','','RISMAWATI','','','','P','CIAMIS ','2005-12-25','ISLAM','0','0','0','0','','DUSUN BALONG RT/RW 02/01','','','','SIRNAJAYA','RAJADESA','','','0','','','','','081395496618','','','','','','Enden Tatang','0','','','','','Rosmiati','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 05:25:45','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB080','02','S010','3207131112040002','','IWAN SETIAWAN','','','','L','CIBURUY','2004-12-11','ISLAM','0','0','0','0','','CIBURUY','','','','PURWARAJA','RAJADESA','','','0','','','','','085337204912','','','','','','Abdul Rohman','0','','','','','Ela Nurlaela','0','','','','0','','0','','','','0','111201013','1','0','diterima','online','2020-06-04 05:27:01','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB084','02','S010','5207122405040002','','LIMAN SULAIMAN','','','','L','CIAMIS','2004-05-24','ISLAM','1','0','0','0','','CINTAMULYA RT 01 RW 01','','','','BAYASARI','JATINAGARA','','','0','Bersama Orang Tua','Sepeda Motor','1.1 km','20 me','6282113569576','','','','','','ENJEN','1967','SD Sederajat','Wirausaha','Kurang dari Rp. 500.000','','E RATIMAH','1972','SD Sederajat','Buruh','Kurang dari Rp. 500.000','0','','0','','','','0','0047934042','1','0','diterima','online','2020-06-04 05:27:17','','','NEGERI','Erat','Ciamis jatinagara bayasari cintamulya RT 01 RW 01','','','','','','','ya',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003','2147483647','2147483647','2147483647',NULL);
INSERT INTO `daftar` VALUES ('PSB086','02','S010','3207121301120001','','MUHAMMAD FITHRAN PUTRA AGUSTIAN','','','','L','BANDUNG','2005-08-20','ISLAM','0','0','0','0','','BLOK CIPETIR RT 8 RW 2 ','','','','SUKAWANGI DESA BAYASARI','JATINAGARA','','','0','','','','','081 311 430 191','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','11120108','1','0','diterima','online','2020-06-04 05:30:55','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB087','01','S010','-','','RAFI ANWAR MAULA','','','','L','Ciamis','2004-05-21','','0','0','0','0','','Neglasari','','','','Neglasari','Pamarican','','','0','','','','','081323757023','','','','','','Eman Sukeman','0','','','','','Elis','0','','','','0','','0','','','','0','-','1','0','diterima','','2020-06-04 05:37:32','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB088','02','S010','-','','ASEP SYAEFULLOH','','','','L','Ciamis ','2004-06-25','','0','0','0','0','','Sukamulya','','','','Baregbeg','Ciamis','','','0','','','','','082320183017','','','','','','Rahmat','0','','','','','Nokyani Rohaeni','0','','','','0','','0','','','','0','-','1','0','diterima','','2020-06-04 07:25:52','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB089','01','S010','--','','SANTI SETIAWATI','','','','P','Ciamis ','2004-10-28','','0','0','0','0','','KUTASARI RT/RW 02/05','','','','SIRNABAYA','RAJADESA','','','0','','','','','-','','','','','','Aliman','0','','','','','Eti ','0','','','','0','','0','','','','0','-','1','0','diterima','','2020-06-04 07:27:26','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB090','01','S010','-','','NOVITA','','','','P','Ciamis ','2005-05-30','','0','0','0','0','','KUTASARI RT/RW 02/05','','','','SIRNABAYA','RAJADESA','','','0','','','','','-','','','','','','Endang','0','','','','','Dedeh Nurhalimah','0','','','','0','','0','','','','0','-','1','0','diterima','','2020-06-04 07:29:46','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB091','01','S003','1','','EGI GINANJAR','','','','L','CIAMIS ','2005-03-24','ISLAM','0','0','0','0','','CIPINANG RT/RW 02/01','','','','TANJUNGSARI','RAJADESA','','','0','','','','','088224389324','','','','','','Engkus Kusnadi','0','','','','','Eros Rosmiati','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 07:45:22','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'001',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB092','02','S006','1','','PUTRA ADRIANA ROMA DONI','','','','L','CIAMIS ','2004-10-31','ISLAM','0','0','0','0','','CIHANJUANG RT/RW ','','','','PURWARAJA','RAJADESA','','','0','','','','','08157330051','','','','','','Mustopa','0','','','','','Yani Rostika','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-04 08:33:54','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'001',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB093','02','S010','3207130809070236','','SYIFAURROHMAH','','','','P','CIAMIS','2004-11-29','ISLAM','0','0','0','0','','KUTASARI, RT 02 RW 05, SIRNABAYA, RAJADESA','','','','SIRNABAYA','RAJADESA','','','0','','','','','089630581414','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','111201014','1','0','diterima','online','2020-06-05 04:05:39','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB094','01','S010','1','','ALI AHMAD PADIL','','','','L','CIAMIS','2003-12-25','ISLAM','0','0','0','0','','PABUARAN RT 06/ RW 03','','','','SIRNAJAYA','RAJADESA','','','0','','','','','082115273800','','','','','','Rohimin','0','','','','','Ilah','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-05 04:46:53','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB095','01','S010','3207134701040004','','LELA SRI HERMAWATI','','','','P','CIAMIS','2004-01-07','ISLAM','0','0','0','0','','DUSUN GARUNGGANG RT/RW 06/03','','','','TANJUNGSARI','RAJADESA','','','0','','','','','087744640344','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','0048448219','1','0','diterima','online','2020-06-09 07:31:20','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB096','01','0','3207195705050001','','ALIVIA NURJANAH','','','','P','CIAMIS','2005-05-17','ISLAM','0','0','0','0','','SINDANG JAYA','','','','NEGLASARI','PAMARICAN','','','0','','','','','085315445144','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','0058454542','1','0','diterima','online','2020-06-09 07:26:04','MTS N 7 CIAMIS','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB097','01','0','3207124604050001','','SIFA SALSABILA','','','','P','CIAMIS','2005-04-06','ISLAM','0','0','0','0','','CIKANDE','','','','JATINAGARA','JATINAGARA','','','0','','','','','085224635068','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','0052401062','1','0','diterima','online','2020-06-09 07:28:38','MTS AL-IRSYAD','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'004',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB098','02','S001','1','','SYIFA JAUHARUL JANNAH','','','','P','CIAMIS ','2005-02-27','ISLAM','0','0','0','0','','DUSUN LINTUNGGOOONG ','','','','NAGARAWANGI','PANAWANGAN','','','0','','','','','082115351741','','','','','','Didin Fatahudin','0','','','','','Nia Kurniasih','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-09 07:10:42','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'001',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB099','01','0','3207125211040002','','SRI NURHAYATI','','','','P','CIAMIS','2004-11-12','ISLAM','0','0','0','0','','RT:07, RW:02, DSN SUKAWANGI','','','','BAYASARI','JATINAGARA','','','0','','','','','082116483172','','','','','','-','0','','','','','-','0','','','','0','','0','','','','0','0046383785','1','0','diterima','online','2020-06-14 08:32:55','','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'002',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB100','01','S010','1','','FARHAN SYAHID','','','','L','CIAMIS ','2003-12-06','ISLAM','0','0','0','0','','KUTASARI','','','','SIRNABAYA','RAJADESA','','','0','','','','','081297634519','','','','','','Omay (Alm)','0','','','','','Siti Mariah','0','','','','0','','0','','','','0','1','1','1','diterima','online','2020-06-19 06:13:30','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB101','02','0','1','','SANTI KARINA','','','','P','CIAMIS ','2006-06-18','ISLAM','0','0','0','0','','DUSUN KULON RT/RW 02/01','','','','BAYASARI','JATINAGARA','','','0','','','','','085294063471','','','','','','Murki','0','','','','','Een','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-14 08:33:53','MTS TERPADU RIYADHUL HIDAYAH','','SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'002',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB103','01','S010','1','','AGUS SALIM','','','','L','CIAMIS ','2004-08-21','ISLAM','0','0','0','0','','DUSUN CIGOONG RT/RW 02/01','','','','SIRNABAYA','RAJADESA','','','0','','','','','089570119077','','','','','','Ucu Samsudin','0','','','','','Aah ','0','','','','0','','0','','','','0','1','1','0','diterima','online','2020-06-14 08:34:49','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB104','02','S010','3207135511040001','','SRI MULYANI','','','','P','CIAMIS','2004-11-15','ISLAM','0','0','0','0','','DSN.KUBANGSARI,RT03/RW08','','','','SIRNABAYA','RAJADESA','','','0','','','','','089609201961','','','','','','Atang','0','','','','','Sriyanti','0','','','','0','','0','','','','0','0042147937','1','0','diterima','online','2020-06-15 22:05:54','','','NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB105','02','S010','1','','PIAN SOPYAN','','','','L','CIAMIS ','2004-04-03','ISLAM','0','0','0','0','','DUSUN PABUARAN RT/RW 04/02','','','','SIRNAJAYA','RAJADESA','','','0','','','','','081573246193','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-19 06:57:02','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB106','01','S010','1','','SIVA AINIYA AZMI','','','','P','CIAMIS ','2005-04-09','ISLAM','0','0','0','0','','DUSUN JAGAMULYA RT/RW 01/04','','','','RAJADESA','RAJADESA','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-19 07:00:02','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB107','01','S010','1','','FENTI HERAWATI','','','','P','CIAMIS ','2005-06-09','ISLAM','0','0','0','0','','-','','','','-','-','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-19 07:01:49','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB108','02','S010','1','','II NURAZIZAH','','','','P','CIAMIS ','2004-03-16','ISLAM','0','0','0','0','','SELACAI','','','','CIPAKU','CIPAKU','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-19 07:03:43','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB109','01','S010','1','','SITI ZAYYIDAH NUURIL','','','','P','CIAMIS ','2004-09-25','ISLAM','0','0','0','0','','SINDANGSARI','','','','TAMANSARI','TASIKMALAYA','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-19 07:06:05','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB110','02','S010','1','','SALMA NAFISA','','','','P','CIAMIS ','2005-01-05','ISLAM','0','0','0','0','','DUSUN SINDANGTAWA ','','','','SINDANGHAYU','BANJARSARI','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-19 07:08:09','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB111','02','S010','1','','ARIF AHMAD RIFAI','','','','L','CIAMIS ','2005-08-07','ISLAM','0','0','0','0','','-','','','','-','-','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-19 07:12:04','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB112','01','S010','1','','JEJEN SAEPULOH','','','','L','CIAMIS ','2020-01-01','ISLAM','0','0','0','0','','-','','','','-','-','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-19 07:13:19','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB113','02','S010','1','','SUFYAN SYAURI','','','','L','CIAMIS ','2004-01-24','ISLAM','0','0','0','0','','DUSUN MULYASARI','','','','SINDANGSARI','KAWALI','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-19 07:14:56','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB114','02','S010','1','','DELIS SULISTIANI','','','','P','CIAMIS ','2004-12-13','ISLAM','0','0','0','0','','DUSUN KAROYA','','','','TANJUNGSUKUR','RAJADESA','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-19 07:17:10','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB115','02','S010','1','','EKA PRAYOGA','','','','L','CIAMIS','2004-09-30','ISLAM','0','0','0','0','','DUSUN BALONG','','','','SIRNAJAYA','RAJADESA','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-19 07:19:01','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB116','02','0','1','','FITRI NUR ALIFATUSANI','','','','P','CIAMIS ','2004-11-14','ISLAM','0','0','0','0','','DUSUN MARGAHARJA  RT/RW 22/06','','','','BANTURSARI','SUKADANA','','','0','','','','','085777670474','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-19 07:22:32','MTS AL-IANAH KUSUMBI KARAWANG',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'004',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB118','01','0','3207194502060001','','REPI NURYANI','','','','P','CIAMIS','2005-02-05','ISLAM','0','0','0','0','','DUSUN PASIRANGIN RT 22/RW 08 ','','','','MARGAJAYA','PAMARICAN','','','0','','','','','0','','','','','','','0','','','','','','0','','','','0','','0','','','','0','0056117071','0','0','','online','2020-06-22 15:56:03','SMP ISLAM TERPADU NURUL HUDA PAMARICAN',NULL,'SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'002',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB119','01','0','3207195906040001','','ADE SYIFA FADILATUL HUDA','','','','P','CIAMIS','2004-06-19','ISLAM','0','0','0','0','','DUSUN SUKASARI RT 23/RW 08','','','','MARGAJAYA','PAMARICAN','','','0','','','','','0','','','','','','','0','','','','','','0','','','','0','','0','','','','0','0045300797','0','0','','online','2020-06-22 16:11:00','SMP ISLAM TERPADU NURUL HUDA PAMARICAN',NULL,'SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'002',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB120','01','S010','1','','RENA ROMADONA','','','','P','CIAMIS ','2004-09-27','ISLAM','0','0','0','0','','DUSUN SISIRANCA','','','','SIRNAJAYA','RAJADESA','','','0','','','','','083825371393','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-24 03:28:13','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB121','02','S010','1','','PANI PADILAH','','','','P','CIAMIS ','2005-05-02','ISLAM','0','0','0','0','','RAJADESA','','','','RAJADESA','RAJADESA','','','0','','','','','085320472897','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-24 03:30:05','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB122','02','S010','1','','HALIM ABDUL PATAH','','','','L','CIAMIS ','2005-07-14','ISLAM','0','0','0','0','','DUSUN KUBANGSARI','','','','SIRNABAYA','RAJADESA','','','0','','','','','082321391337','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-24 03:37:19','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB123','02','S001','3207135005040002','','IIS SITI AISYAH ','','','','P','CIAMIS ','2004-05-10','ISLAM','0','0','0','0','','CIBULAKAN, SISIRANCA ','','','','RAJADESA ','RAJADESA ','','','0','','','','','085797811619 ','','','','','','','0','','','','','','0','','','','0','','0','','','','0','0044614362 ','0','0','','online','2020-06-25 13:16:46','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'001',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB124','02','0','3207134609040002','','YUSI SITI NURJANAH','','','','P','CIAMIS','2004-09-06','ISLAM','0','0','0','0','','DUSUN GARUNGGANG RT/RW 05/03','','','','TANJUNGSARI','RAJADESA','','','0','','','','','085218353655','','','','','','','0','','','','','','0','','','','0','','0','','','','0','3040889929','0','0','','online','2020-06-26 02:21:27','MTS TANJUNGSARI',NULL,'SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'004',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB125','02','0','3207134609040002','','YUSI SITI NURJANAH','','','','P','CIAMIS','2004-09-06','ISLAM','0','0','0','0','','DUSUN GARUNGGANG RT/RW 05/03','','','','TANJUNGSARI','RAJADESA','','','0','','','','','085218353655','','','','','','','0','','','','','','0','','','','0','','0','','','','0','3040889929','0','0','','online','2020-06-26 02:23:42','MTS TANJUNGSARI',NULL,'SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'004',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB126','01','0','1','','AJI FAIZAL','','','','L','CIAMIS ','2005-01-17','ISLAM','0','0','0','0','','MULYASARI,JATINAGARA','','','','MULYASARI','JATINAGARA','','','0','','','','','1','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-26 09:41:44','TIDAK TERTULIS',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB127','02','0','1','','PARHANIDIN','','','','L','CIAMIS ','2004-01-14','ISLAM','0','0','0','0','','SUKAJAYA,RAJADESA','','','','SUKAJAYA','RAJADESA','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-26 09:51:54','TIDAK DIKETAHUI',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB128','02','0','1','','DICKY TAUFIKUR RAHMAN','','','','L','CIAMIS ','2004-10-14','ISLAM','0','0','0','0','','DSN.DESA DAYEUHLUHUR','','','','DAYEUHLUHUR','JATINAGARA','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-26 09:56:56','MTS SABILURROSYAD',NULL,'SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'004',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB129','01','S010','1','','IBNU AINULYAKIN','','','','L','CIAMIS','2005-12-26','ISLAM','0','0','0','0','','DSN.CILAPIN LANDEUH','','','','CILAPIN LANDEUH','RAJADESA','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','0059081696','0','0','','online','2020-06-26 10:01:33','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB130','01','0','1','','AANG ARSU NAJWA','','','','L','CIAMIS ','2020-06-26','ISLAM','0','0','0','0','','TANJUNGJAYA','','','','TANJUNGJAYA','RAJADESA','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-26 10:03:46','TIDAK DIKETAHUI',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'001',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB131','01','0','1','','IRFAN SYYID RAMDHANI','','','','L','CIAMIS ','2004-10-24','ISLAM','0','0','0','0','','DSN.DAYEUHLUHUR','','','','DAYEUHLUHUR','RAJADESA','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-26 10:06:33','MTS RIJALUL HIKAM',NULL,'SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'004',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB132','01','0','1','','M IKMAL KAMALUDIN','','','','L','CIREBON','2004-12-26','ISLAM','0','0','0','0','','MUNJUL','','','','ASTANAJAPURA','CIREBON','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','1','0','0','','online','2020-06-26 10:14:41','MTSN NURUL HUDA MUNJUL',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB133','02','S010','1','','HILMI','','','','L','CIAMIS ','2005-09-27','ISLAM','0','0','0','0','','DSN.KUTASARI','','','','SIRNABAYA','RAJADESA','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','0058520230','0','0','','online','2020-06-26 10:17:49','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB134','02','S010','1','','FIDIA ANGGRIAWAN','','','','L','CIAMIS ','2004-09-07','ISLAM','0','0','0','0','','DSN.KUTASARI','','','','SIRNABAYA','RAJADESA','','','0','','','','','-','','','','','','','0','','','','','','0','','','','0','','0','','','','0','0044313589','0','0','','online','2020-06-26 10:20:16','',NULL,'NEGERI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'003',NULL,NULL,NULL,NULL);
INSERT INTO `daftar` VALUES ('PSB135','02','S008','3207131407050001','','HALIM ABDUL FATAH','','','','L','CIAMIS','2004-07-14','ISLAM','0','0','0','0','','DUSUN KUBANGSARI,DESA SIRNABAYA,KEC,RAJADESA,KAB,CIAMIS','','','','SIRNABAYA','RAJADESA','','','0','','','','','082321391337','','','','','','','0','','','','','','0','','','','0','','0','','','','0','0059595304','0','0','','online','2020-06-27 11:00:21','',NULL,'SWASTA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'005',NULL,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
INSERT INTO `gambar_transfer` VALUES   ('4','SITI NURLAILAH AL MUBAROKAH','upload/159098132620200527_104528 copy.jpg','image/jpeg','PSB038');
INSERT INTO `gambar_transfer` VALUES ('6','eeeeeeeeeee','upload/1591331567KASTURI.png','image/png','PSB003');

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
INSERT INTO `info` VALUES   ('1','Alur Pendaftaran','assignment','<p style=\"text-align: center;\"><span style=\"color: #0000ff;\"><strong><span style=\"font-size: 18pt;\">ALUR PENDAFTARAN CALON SISWA BARU</span></strong></span></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li>Calon siswa mendaftar melalui link&nbsp;=&gt; <span style=\"color: #0000ff;\"><a style=\"color: #0000ff;\" href=\"../?pg=daftar\"><strong>KUNJUNGI LINK</strong></a></span></li>\r\n<li>Setelah memasukkan data harap langsung print/cetak bukti pendaftaran</li>\r\n<li>Lengkapi data diri dengan cara login pada web ppdb pada link =&gt; <strong><a href=\"../?pg=login\"><span style=\"color: #0000ff;\">KUNJUNGI LINK</span></a></strong></li>\r\n<li>setelah melengkapi data Cetak Lagi Bukti Daftar dan langsung ke sekolah&nbsp; untuk verifikasi berkas jangan lupa bawa persyaratan verifikasi berkas. [*<strong>syarat verifikasi berkas ada pada web ini maupun web utama</strong>]</li>\r\n<li>Calon siswa akan mendapat cap sekolah/bukti verifikasi setelah berkas di verifikasi. [bisa dilihat pada menu&nbsp;<strong>Data Pendaftar</strong>]</li>\r\n<li>Calon Siswa Menunggu Hasil Pengumuman PPDB dan bisa langsung melihat hasil pengumuman sesuai tanggal pengumuman pada link berikut ini =&gt; <a href=\"../?pg=pendaftar\"><span style=\"color: #0000ff;\"><strong>KUNJUNGI LINK</strong></span></a></li>\r\n</ol>','1');
INSERT INTO `info` VALUES ('2','Syarat Verifikasi','assignment','<p style=\"text-align: center;\"><span style=\"font-size: 24px; color: #ff9900;\"><strong>SYARAT VERIFIKASI BERKAS</strong></span></p>\r\n<p style=\"text-align: left;\">Calon siswa baru datang ke sekolah&nbsp; wajib membawa:</p>\r\n<ol>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>Bukti Cetak registrasi online Calon Siswa Baru</strong></h3>\r\n</li>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>Fotocopy SKHUN/SKBYS yang dilegalisir (Memperlihatkan aslinya dan bisa ditambah menyusul jika sudah ada)</strong></h3>\r\n</li>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>Fotocopy Ijazah yang dilegalisir</strong></h3>\r\n</li>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>Fotocopy NISN</strong></h3>\r\n</li>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>Fotocopy KK, Akta Kelahiran dan KTP orang tua / wali</strong></h3>\r\n</li>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>Foto 3x4 Latar Belakang Merah 2 Lembar</strong></h3>\r\n</li>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>Keterangan baik dari sekolah asal</strong></h3>\r\n</li>\r\n</ol>\r\n<p>Tambahkan Lampiran Jika Memiliki :</p>\r\n<ol>\r\n<li><strong>Fotocopy Kartu Jaminan Sosial</strong></li>\r\n<li><strong>Fotocopy Sertifikat prestasi yang relevan dan dilegalisir</strong></li>\r\n<li><strong>Fotocopy KKM/KKS/KIP/KPs yang masih berlaku</strong></li>\r\n</ol>','1');
INSERT INTO `info` VALUES ('3','Petunjuk Pengisian Registrasi','info','<h3>UNTUK PETUNJUK PENGISIAN FORMULIR CALON SISWA BARU LIHAT VIDEO DIBAWAH INI:</h3>\r\n<p>klik tulisan PUTAR VIDEO dibawah ini nanti akan diarahkan ke alamat video di web resmi&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h2><span style=\"background-color: #ccffcc;\"><strong>PUTAR VIDEO</strong></span></h2>','1');
INSERT INTO `info` VALUES ('4','Info Kontak','call','<p style=\"text-align: center;\"><strong>DAFTAR KONTAK</strong></p>\r\n<p style=\"text-align: center;\"><strong>-------------------------------------</strong></p>\r\n<p style=\"text-align: justify;\">jika ada yang kurang jelas dengan sistem pendaftaran ini silahkan ditanyakan melalui kontak dan whatsapp (Kilk Nomernya untuk diarahkan ke chat whatsapp) dibawah ini:</p>\r\n<ol>\r\n<li style=\"text-align: justify;\">Mumu M.&nbsp;&nbsp;=&gt; <a href=\"https://wa.me/6285223944572?text=Permisi%20Saya%20ingin%20bertanya%20perihal%20PPDB%20MA%20Ibadul%20Ghofur\" target=\"_blank\" rel=\"noopener\">085223944572</a></li>\r\n<li style=\"text-align: justify;\">Akmal M.&nbsp;=&gt; <a href=\"https://wa.me/6282318176072?text=Permisi%20Saya%20ingin%20bertanya%20perihal%20PPDB%20MA%20Ibadul%20Ghofur\" target=\"_blank\" rel=\"noopener\">082318176072</a></li>\r\n<li style=\"text-align: justify;\">Bayu K.&nbsp;=&gt; <a href=\"https://wa.me/6285254185195?text=Permisi%20Saya%20ingin%20bertanya%20perihal%20PPDB%20MA%20Ibadul%20Ghofur\" target=\"_blank\" rel=\"noopener\">085254185195</a></li>\r\n</ol>','1');

/*---------------------------------------------------------------
  TABLE: `jenis_sekolah`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `jenis_sekolah`;
CREATE TABLE `jenis_sekolah` (
  `id_jenissekolah` varchar(20) NOT NULL,
  `nama_jenissekolah` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jenissekolah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `jenis_sekolah` VALUES   ('001','SMP NEGERI');
INSERT INTO `jenis_sekolah` VALUES ('002','SMP SWASTA');
INSERT INTO `jenis_sekolah` VALUES ('003','MTs NEGERI');
INSERT INTO `jenis_sekolah` VALUES ('004','MTs SWASTA');
INSERT INTO `jenis_sekolah` VALUES ('005','SMP IT');

/*---------------------------------------------------------------
  TABLE: `jurusan`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan` (
  `kode_jur` varchar(10) NOT NULL,
  `nama_jur` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_jur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `jurusan` VALUES   ('01','MIA (Matematika Ilmu Alam)');
INSERT INTO `jurusan` VALUES ('02','IIS (Ilmu-Ilmu Sosial)');

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
INSERT INTO `mou` VALUES   ('S001','SMPN 1 RAJADESA','ya','0');
INSERT INTO `mou` VALUES ('S002','SMPN 2 RAJADESA','ya','0');
INSERT INTO `mou` VALUES ('S003','SMPN 3 RAJADESA','ya','0');
INSERT INTO `mou` VALUES ('S004','SMPN 4 RAJADESA','ya','0');
INSERT INTO `mou` VALUES ('S005','SMPN 5 RAJADESA','ya','0');
INSERT INTO `mou` VALUES ('S006','SMPN 6 RAJADESA','ya','0');
INSERT INTO `mou` VALUES ('S007','SMP MA`ARIF NU AL HUSAENIYAH','ya','0');
INSERT INTO `mou` VALUES ('S008','SMP TERPADU AL MUAAWANAH RAJADESA','ya','0');
INSERT INTO `mou` VALUES ('S009','MTsN 12 Ciamis','ya','0');
INSERT INTO `mou` VALUES ('S010','MTsN 13 Ciamis','ya','0');
INSERT INTO `mou` VALUES ('S011','MTSS Al-Muzayyin','ya','0');
INSERT INTO `mou` VALUES ('S012','MTSS AL ISTIQOMAH SUKAJAYA','ya','0');
INSERT INTO `mou` VALUES ('S013','MTSS NURUL HUDA TANJUNGSARI','ya','0');
INSERT INTO `mou` VALUES ('S014','Sidik Jahra Ciamis','ya','0');
INSERT INTO `mou` VALUES ('S015','SMP IT Al-Muaawanah','ya','0');
INSERT INTO `mou` VALUES ('S016','MTs Cihawar','ya','0');

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
INSERT INTO `pengawas` VALUES   ('51','-','Admin PPDB','','admin','$2y$10$490bmAlDpn5e.Cq75bWd6uPm4lOnlBZlfs.k7J/NLLF0.sftOKixa','admin','');
INSERT INTO `pengawas` VALUES ('52','-','Ade Miftah','','miftahakhirat99@gmail.com','$2y$10$gwboSQnuEZFVf4gwCLJgQOvtbojXl9eE4XenBV16UlBcJvCmka1r6','admin','');
INSERT INTO `pengawas` VALUES ('53','12345','Etih Kusnadi','','etihkusnadi','$2y$10$JNUdu79VOT9m706FQFgTTujwnTsRsO8iNZq0kP44pUt.UWcJDNdHW','admin','');
INSERT INTO `pengawas` VALUES ('54','1234567890','lilik roudhotul zannah ','','lilikrz','$2y$10$XITWQfNJhbue5CTfM4X1l.zNDxbbN2MUWYvBm7.IeaDEFNtoV1mtW','admin','');

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
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
INSERT INTO `pengumuman` VALUES   ('2','','PENGUMUMAN CALON SISWA YANG DINYATAKAN DITERIMA','0','<p>Untuk <strong>INFO</strong> Kelulusan akan bisa diakses pada tanggal&nbsp;</p>\r\n<p><span style=\"font-size: 24pt;\"><strong>Gelombang 1: 14 JUNI 2020</strong></span></p>\r\n<p><span style=\"font-size: 24pt;\"><strong>Gelombang 2: 28 JULI 2020</strong></span></p>\r\n<p>Persyaratan yang harus disipakan dalam daftar ulang :</p>\r\n<ol>\r\n<li><strong>Fotocopy Ijazah sekolah asal</strong></li>\r\n<li><strong>Fotocopy SKHUN sekolah asal</strong></li>\r\n<li><strong>Fotocopy Kartu Jaminan Sosial</strong></li>\r\n<li><strong>Fotocopy NISN</strong></li>\r\n<li><strong>Fotocopy KK, Akta Kelahiran dan KTP orang tua</strong></li>\r\n<li><strong>SKKB</strong></li>\r\n</ol>','2020-05-19 03:56:56');
INSERT INTO `pengumuman` VALUES ('3','','INFO PENGISIAN','0','<p>*harap isi sesuai data pribadi masing masing</p>\r\n<p>* untuk nama data wali silahkan diisi jika tidak tinggal bersama orang tua dan kosongkan bila tinggal bersama orang tua</p>','2020-03-26 04:57:18');

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
INSERT INTO `setting` VALUES   ('1','PPDB ONLINE','R1','MA IBADUL GHOFUR','SMK','Bpk. Daldiri, S.Pd.I','','Jl. Tanjungsukur No 1A Sirnabaya Rajadesa','Rajadesa','Ciamis','081584974294','081222648799','https://www.maibadulghofur.sch.id/','admin@maibadulghofur.sch.id','images/logoapp.png','FORMULIR PENDAFTARAN CALON SISWA BARU','KARTU PESERTA \nPENILAIAN AKHIR SEMESTER','2020-03-01','2020-06-27');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
INSERT INTO `slide` VALUES   ('4','slide1','images/1587330359slide-bannerppdb.png','');
INSERT INTO `slide` VALUES ('8','slide2','images/1587330702slide2.png','');
INSERT INTO `slide` VALUES ('9','slide3','images/1587330734slide-slide-bannerppdb.png','');
INSERT INTO `slide` VALUES ('10','slide4','images/1587330761slide4.jpg','');
