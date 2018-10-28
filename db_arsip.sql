-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2018 at 06:41 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id` int(3) NOT NULL,
  `kode` varchar(6) NOT NULL,
  `nosurat` varchar(30) NOT NULL,
  `tglmsk` date NOT NULL,
  `tglslsai` date NOT NULL,
  `asal` varchar(50) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `intruksi` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id`, `kode`, `nosurat`, `tglmsk`, `tglslsai`, `asal`, `perihal`, `intruksi`, `keterangan`, `file`) VALUES
(4, '100', 'd', '2014-12-15', '2015-12-15', 'sd', 'sd', 'sd', 'sd', '20508-ramadan-kareem-wallpaper.jpg'),
(5, '200', 'ASDASDAq', '2014-12-15', '2015-12-16', 'q', 'r', 'e', 'r', ''),
(6, '100', '1234', '2018-07-15', '2018-08-15', 'fff', 'ggg', 'hhh', 'jjj', '70708-ramadan-kareem-wallpaper.jpg'),
(9, '100', '798798798798', '2014-12-15', '2014-12-16', 'as', 'd', 's', 'w', '');

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id_bag` int(1) NOT NULL,
  `Bagian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bag`, `Bagian`) VALUES
(1, 'PPAT'),
(2, 'Perencanaan dan Keuangan'),
(3, 'Pemerintahan'),
(4, 'Perekonomian dan Pembangunan'),
(5, 'Pemberdayaan Masyarakat'),
(6, 'Pelayanan'),
(7, 'Trantib'),
(8, 'Umum'),
(9, 'Camat'),
(10, 'Sekcam'),
(11, 'Kasubbag Umum');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_dispo` int(3) NOT NULL,
  `id_arsip` int(3) NOT NULL,
  `indeks` varchar(50) NOT NULL,
  `tglslsai` date NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `tglmsk` date NOT NULL,
  `asal` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id_dispo`, `id_arsip`, `indeks`, `tglslsai`, `perihal`, `tglmsk`, `asal`, `file`) VALUES
(1, 0, '100/12123/kec.pkh', '2018-02-28', 'sdf', '2018-02-22', 'dsgf', '');

-- --------------------------------------------------------

--
-- Table structure for table `kodearsip`
--

CREATE TABLE `kodearsip` (
  `kode` varchar(6) NOT NULL,
  `keterangan` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kodearsip`
--

INSERT INTO `kodearsip` (`kode`, `keterangan`) VALUES
('000', 'Umum'),
('001', 'Lambang'),
('001.1', 'Garuda'),
('001.2', 'Bendera Kebangsaan'),
('001.3', 'Lagu Kebangsaan'),
('001.31', 'Provinsi'),
('001.32', 'Kabupaten/Kota'),
('001.4', 'Daerah'),
('002', 'Tanda Kehormatan/Penghargaan'),
('003', 'Hari Raya/Besar'),
('003.1', 'Nasional 17 Agustus, Hari Pahlawan dsb.'),
('003.2', 'Hari Raya Keagamaan'),
('003.3', 'Hari Ulang Tahun (HUT)'),
('003.4', 'Hari-hari Besar Internasional'),
('004', 'Ucapan'),
('005', 'Undangan'),
('006', 'Tanda Jabatan'),
('006.1', 'Pamong Praja'),
('006.2', 'Pejabat lainnya'),
('006.3', 'Pejabat lainnya'),
('010', 'Urusan Dalam'),
('011', 'Gedung Kantor'),
('012', 'Rumah Dinas'),
('015', 'Jasa Listrik'),
('016', 'Telepon/Faximile/Internet'),
('017', 'Keamanan Ketertiban Kantor'),
('018', 'Kebersihan Kantor'),
('019', 'Protokol'),
('020', 'Peralatan'),
('021', 'Alat Tulis'),
('022', 'Mesin Kantor'),
('023', 'Prabot Kantor'),
('024', 'Alat Angkutan'),
('025', 'Pakaian Dinas'),
('028', 'Inventaris'),
('030', 'Kekayaan Daerah'),
('031', 'Sumber Daya Alam'),
('032', 'Asset Daerah'),
('040', 'PERPUSTAKAAN / DOKUMENTASI / KEARSIPAN'),
('041', 'Perpustakaan'),
('041.1', 'Umum'),
('041.2', 'Khusus'),
('041.3', 'Perguruan Tinggi'),
('041.4', 'Sekolah'),
('041.5', 'Keliling'),
('042', 'Dokumentasi'),
('045', 'Kearsipaan'),
('046', 'Sandi '),
('047', 'Website'),
('048', 'Pengelolaan Data'),
('049', 'Jaringan Komunikasi Data'),
('050', 'PERENCANAAN '),
('051', 'Bidang Pemerintah'),
('057', 'Bidang Pengawasan'),
('058', 'Bidang Kepegawaian'),
('059', 'Bidang Keuangan'),
('060', 'ORGANSASI/KETATALAKSANAAN'),
('060.1', 'Program Kerja'),
('061', 'Organisasi Instansi Pemerintah'),
('062', 'Organisasi badan non pemerintah'),
('065', 'Ketatalaksanaan'),
('066', 'Stempel Dinas'),
('067', 'Pelayanan Umum / Pelayanan Publik / Analisis'),
('068', 'Komputerisasi / Siskomdagri'),
('069', 'Standar Pelayanan Minimal'),
('070', 'PENELITIAN'),
('077', 'Provinsi'),
('078', 'Kabupaten/Kota'),
('079', 'Kecamatan /Desa'),
('080', 'KONFERENSI'),
('081', 'Gubernur'),
('082', 'Bupati / Walikota'),
('083', 'Komponen Eselon Lainnya'),
('084', 'Instansi lainnya'),
('090', 'PERJANJIAN DINAS'),
('094', 'Perjalanan Pegawai termasuk pemanggilanpegawai'),
('100', 'Pemerintahan'),
('101', 'Meliputi: Tata Praja, Legislatif, Yudikatif, Hubungan luar negeri'),
('102', 'GDN'),
('110', 'Pemerintah pusat'),
('111', 'Presiden'),
('112', 'Wakil Presiden'),
('113', 'Susunan Kabinet'),
('114', 'Departemen Dalam Negeri'),
('120', 'PEMERINTAH PROVINSI'),
('120.04', 'Monografi'),
('120.1', 'Koordinasi'),
('125', 'Pembentukan Pemekaran Wilayah'),
('126', 'Pembagian Wilayah'),
('127', 'Penyerahan Urusan'),
('130', 'PEMERINTAH KABUPATEN / KOTA'),
('134', 'Forum Koordinasi Pemerintah Di Daerah'),
('134.1', 'Muspida'),
('134.2', 'Forum PAN (Panitian Anggaran Nasional)'),
('134.3', 'Forum Koordinasi Lainnya'),
('134.4', 'Kerjasama antar Kabupaten/Kota'),
('135', 'Pembentukan / Pemekaran Wilayah'),
('136', 'Pembagian Wilayah'),
('137', 'Penyerahan Urusan'),
('138', 'Pemerintah Wilayah Kecamatan'),
('140', 'PEMERINTAHAN DESA / KELURAHAN'),
('141', 'Pamong Desa'),
('142', 'Penghasilan Pamong Desa'),
('143', 'Kekayaan Desa'),
('144', 'Dewan Tingkat Desa, Dewan Marga, Rembug Desa'),
('145', 'Administrasi Desa'),
('146', 'Kewilayahan'),
('146.1', 'Pembentukan Desa/Kelurahan'),
('146.2', 'Pemekaran Desa/Kelurahan'),
('146.3', 'Perubahan Batas Wilayah / Perluasan Desa / Kelurahan'),
('146.4', 'Perubahan Nama Desa / Kelurahan'),
('146.5', 'Kerjasama Antar Desa / Kelurahan'),
('147', 'Lembaga-lembaga Tingkat Desa'),
('148', 'Perangkat Kelurahan'),
('148.1', 'Kepala Kelurahan'),
('148.2', 'Sekretaris Kelurahan'),
('148.3', 'Staf Kelurahan'),
('149', 'Dewan Kelurahan'),
('149.1', 'Rukun Tetangga'),
('149.2', 'Rukun Warga'),
('149.3', 'Rukun Kampung'),
('150', 'LEGISLATIF MPR / DPR / DPD'),
('160', 'DPRD PROVINSI'),
('170', 'DPRD KABUPATEN'),
('180', 'HUKUM'),
('180.1', 'Kontitusi'),
('180.11', 'Dasar Hukum'),
('180.12', 'Undang-Undang Dasar'),
('180.2', 'GBHN'),
('180.3', 'Amnesti, Abolisi dan Grasi'),
('190', 'HUBUNGAN LUAR NEGERI'),
('200', 'Politik'),
('210', 'KEPARTAIAN'),
('220', 'ORGANISASI KEMASYARAKATAN'),
('230', 'ORGANISASI PROFESI DAN FUNGSIONAL'),
('231', 'Ikatan Dokter Indonesia'),
('232', 'Persatuan Guru Republik Indonesia'),
('233', 'PERSATUAN SARJANA HUKUM INDONESIA'),
('234', 'Persatuan Advokat Indonesia'),
('235', 'Lembaga Bantuan Hukum Indonesia'),
('236', 'Korps Pegawai Republik Indonesia'),
('237', 'Persatuan Wartawan Indonesia'),
('238', 'Ikatan Cendikiawan Muslim Indonesia'),
('239', 'Organisasi Profesi Dan Fungsional Lainnya'),
('240', 'ORGANISASI PEMUDA'),
('241', 'Komite Nasional Pemuda Indonesia'),
('242', 'Organisasi Mahasiswa'),
('243', 'Organisasi Pelajar'),
('250', 'ORGANISASI BURUH, TANI, NELAYAN DAN ANGKUTAN'),
('260', 'ORGANISASI WANITA'),
('261', 'Dharma Wanita'),
('262', 'Persatuan Wanita Indonesia'),
('263', 'Pemberdayaan Perempuan (wanita)'),
('264', 'Kongres Wanita'),
('270', 'PEMILIHAN UMUM'),
('300', 'Keamanan dan Ketertiban'),
('310', 'PERTAHANAN'),
('320', 'KEMILITERAN'),
('330', 'KEAMANAN'),
('340', 'PERTAHANAN SIPIL'),
('350', 'KEJAHATAN'),
('360', 'BENCANA'),
('361', 'Gunung Berapi / Gempa'),
('362', 'Banjir / Tanah Longsor'),
('363', 'Angin Topan'),
('364', 'Kebakaran'),
('364.1', 'Pemadam Kebakaran'),
('365', 'Kekeringan'),
('366', 'Tsunami'),
('370', 'KECELAKAAN / SAR'),
('400', 'Kesejahteraan'),
('401', 'Keluarga Miskin'),
('402', 'PNPM Mandiri Pedesaan'),
('410', 'PEMBANGUNAN DESA'),
('411', 'Pembinaan Usaha Gotong Royong'),
('411.14', 'Pungutan'),
('411.2', 'Lembaga Sosial Desa (LSD)'),
('411.25', 'Petunjuk / Pembinaan Pelaksanaan'),
('411.3', 'Koperasi Desa'),
('411.32', 'Kuliah Kerja Nyata (KKN)'),
('411.33', 'Pusat Latihan'),
('411.34', 'Kursus-Kursus'),
('411.35', 'Kurikulum / Sylabus'),
('411.36', 'Ketrampilan'),
('411.37', 'Pramuka'),
('411.4', 'Pembinaan Kesejahteraan Keluarga (PKK)'),
('420', 'PENDIDIKAN'),
('420.1', 'Pendidikan Khusus Klasifikasi Disini Pendidikan Putra/I Irja'),
('421', 'SEKOLAH'),
('421.1', 'Pra Sekolah'),
('421.2', 'Sekolah Dasar'),
('421.3', 'Sekolah Menengah'),
('421.4', 'Sekolah Tinggi'),
('421.5', 'Sekolah Kejuruan'),
('421.6', 'Kegiatan Sekolah, Dies Natalis Lustrum'),
('421.7', 'Kegiatan Pelajar'),
('421.71', 'Reuni Darmawisata'),
('421.72', 'Pelajar Teladan'),
('421.73', 'Resimen Mahasiswa'),
('421.8', 'Sekolah Pendidikan Luar Biasa'),
('421.9', 'Pendidikan Luar Sekolah / Pemberantasan Buta Huruf'),
('422', 'Administrasi Sekolah'),
('422.1', '  Persyaratan Masuk Sekolah, Testing, Ujian, Pendaftaran, Mapras, Perpeloncoan'),
('422.2', 'Tahun Pelajaran'),
('422.3', 'Hari Libur'),
('422.4', 'Uang Sekolah, Klasifikasi Disini SPP'),
('422.5', 'Beasiswa'),
('423', 'Metode Belajar'),
('423.1', 'Kuliah'),
('423.2', 'Ceramah, Simposium'),
('423.3', 'Diskusi'),
('423.4', 'Kuliah Lapangan, Widyawisata, KKN, Studi Tur'),
('423.5', 'Kurikulum'),
('423.6', 'Karya Tulis'),
('423.7', 'Ujian'),
('424', 'Tenaga Pengajar, Guru, Dosen, Dekan, Rektor'),
('425', 'Sarana Pendidikan'),
('425.1', 'Gedung'),
('425.11', 'Gedung Sekolah'),
('425.12', 'Kampus'),
('425.13', 'Pusat Kegiatan Mahasiswa'),
('425.2', 'Buku'),
('425.3', 'Perlengkapan Sekolah'),
('426', 'Keolahragaan'),
('426.1', 'Cabang Olah Raga'),
('426.2', 'Sarana'),
('426.21', 'Gedung Olah Raga'),
('426.22', 'Stadion'),
('426.23', 'Lapangan'),
('426.24', 'Kolam renang'),
('426.3', 'Pesta Olah Raga'),
('426.4', 'KONI'),
('427', 'Kepramukaan/Gelanggang Remaja'),
('428', 'Gelanggang Remaja'),
('429', 'Pendidikan  Kedinasan Untuk Depdagri, Lihat 890'),
('430', 'KEBUDAYAAN'),
('431', 'Kesenian'),
('431.1', 'Cabang Kesenian'),
('431.2', 'Sarana'),
('431.21', 'Gedung Kesenian'),
('432', 'Kepurbakalaan'),
('433', 'Sejarah'),
('434', 'Bahasa'),
('435', 'Usaha Pertunjukan, Hiburan, Kesenangan'),
('440', 'KESEHATAN'),
('441', 'Pembinaan Kesehatan'),
('442', 'Obat-obatan'),
('443', 'Penyakit Menular'),
('444', 'Gizi'),
('445', 'Rumah Sakit, Balai Kesehatan, PUSKESMAS, PUSKESMAS Keliling, Poliklinik'),
('446', 'Tenaga Medis'),
('448', 'Pengobatan Tadisional'),
('450', 'AGAMA'),
('451', 'Islam'),
('451.1', 'Peribadatan'),
('451.11', 'Sholat'),
('451.12', 'Zakat Fitrah'),
('451.13', 'Puasa'),
('451.14', 'Puasa'),
('451.2', 'Rumah Ibadah'),
('451.3', 'Tokoh Agama'),
('451.4', 'Pendidikan'),
('451.41', 'Tinggi'),
('451.42', 'Menengah'),
('451.43', 'Dasar'),
('451.44', 'Pondok Pesantren'),
('451.45', 'Gedung Sekolah'),
('451.46', 'Tenaga Pengajar'),
('451.47', 'Buku'),
('451.48', 'Dakwah'),
('451.49', 'Organisasi / Lembaga Pendidikan'),
('451.5', 'Harta Agama Wakaf, Baitulmal, dsb'),
('451.6', 'Peradilan'),
('451.7', 'Organisasi Keagamaan Bukan Politik Majelis Ulama'),
('451.8', 'Mazhab'),
('456', 'Urusan Haji'),
('456.1', 'ONH'),
('456.2', 'Manasik'),
('460', 'SOSIAL'),
('463', 'Kesejahteraan Anak / Keluarga'),
('463.1', 'Anak Putus Sekolah'),
('463.2', 'Ibu Teladan'),
('463.3', 'Anak Asuh'),
('464', 'Pembinaan Pahlawan'),
('465', 'Kesejahteraan Sosial'),
('465.1', 'Lanjut Usia'),
('465.2', 'Korban Kekacauan, Pengungsi, Repatriasi'),
('466', 'Sumbangan Sosial'),
('466.1', 'Sumbangan Sosial'),
('466.2', 'Pencarian Dana Untuk Sumbangan'),
('466.3', 'Meliputi: Penyelenggaraan Undian, Ketangkasan, Bazar, dsb'),
('466.4', 'Panti Asuhan'),
('466.5', 'Panti Jompo'),
('467', 'Bimbingan Sosial'),
('467.1', 'Masyarakat Suku Terasing '),
('468', 'PMI'),
('469', 'Makam'),
('470', 'KEPENDUDUKAN'),
('471', 'Pendaftaran Penduduk'),
('472', 'Pencatatan Sipil'),
('472.1', 'Kelahiran, Kematian Dan Advokasi'),
('472.11', 'Kelahiran'),
('472.12', 'Kematian'),
('472.13', 'Advokasi Kelahiran Dan Kematian'),
('472.2', 'Perkawinan, Peceraian Dan Advokasi'),
('473.', 'Informasi Kependudukan'),
('473.1', 'Teknologi Informasi'),
('473.11', 'Perangkat Keras'),
('473.12', 'Perangkat Lunak'),
('473.13', 'Jaringan Komunikasi Data'),
('473.2', 'Kelembagaan Dan Sumber Daya Informasi'),
('480', 'MEDIA MASSA'),
('481', 'Penerbitan'),
('481.1', 'Surat Kabar'),
('481.2', 'Majalah'),
('481.3', 'Buku'),
('481.4', 'Penerjemahan'),
('482', 'Radio'),
('485', 'Pers'),
('485.1', 'Kewartawanan'),
('485.2', 'Wawancara'),
('485.3', 'Informasi Nasional'),
('500', 'Perekonomian'),
('510', 'PERDAGANGAN'),
('520', 'PERTANIAN'),
('522', 'Kehutanan'),
('523', 'Perikanan'),
('524', 'Peternakan'),
('525', 'Perkebunan'),
('530', 'PERINDUSTRIAN'),
('539', 'Perusahaan Daerah / BUMD/BULD'),
('540', 'PERTAMBANGAN / KESAMUDRAAN'),
('541', 'Minyak Bumi / Bensin'),
('546', 'Geologi'),
('546.1', 'Vulkanologi'),
('546.11', 'Pengawasan Gunung Berapi'),
('546.2', 'Sumur Artesis, Air Bawah Tanah'),
('550', 'PERHUBUNGAN'),
('551', 'Perhubungan Darat'),
('552', 'Perhubungan Laut'),
('553', 'Perhubungan Udara'),
('554', 'Pos'),
('555', 'Telekomunikasi'),
('556', 'Pariwisata dan Rekreasi'),
('560', 'TENAGA KERJA'),
('560.1', 'Pengangguran'),
('561', 'UPAH'),
('562', 'PENEMPATAN TENAGA KERJA, TKI'),
('563', 'LATIHAN KERJA'),
('564', 'TENAGA KERJA'),
('564.1', 'Butsi'),
('564.2', 'Padat Karya'),
('570', 'PERMODALAN'),
('580', 'PERBANKAN/ MONETER'),
('581', 'Kredit'),
('582', 'Investasi'),
('590', 'AGRARIA'),
('593', 'Pengurusan Hak-Hak Tanah'),
('600', 'Pekerjaan Umum dan Ketenagaan'),
('610', 'PENGAIRAN'),
('611', 'Irigasi'),
('620', 'JALAN'),
('630', 'JEMBATAN'),
('640', 'BANGUNAN'),
('650', 'TATA KOTA'),
('670', 'KETENAGAAN'),
('671', 'Listrik'),
('671.21', 'PLTA  '),
('671.22', 'PLTD'),
('671.23', 'PLTG P'),
('671.24', 'PLTM'),
('671.25', 'PLTN'),
('671.26', 'PLTPB'),
('690', 'AIR MINUM'),
('700', 'Pengawasan'),
('701', 'Bidang Urusan Dalam'),
('702', 'Bidang Peralatan'),
('703', 'Bidang Kekayaan Daerah'),
('704', 'Bidang Perpustakaan / Dokumentasi / Kearsipan Sandi'),
('705', 'Bidang Perencanaan'),
('706', 'Bidang Organisasi / Ketatalaksanaan'),
('707', 'Bidang Penelitian'),
('708', 'Bidang Konferensi'),
('709', 'Bidang Perjalanan Dinas'),
('710', 'BIDANG PEMERINTAHAN'),
('720', 'BIDANG POLITIK'),
('727', 'Bidang Pemilihan Umum'),
('730', 'BIDANG KEAMANAN/KETERTIBAN'),
('740', 'BIDANG KESEJAHTERAAN RAKYAT'),
('750', 'BIDANG PEREKONOMIAN'),
('760', 'BIDANG PEKERJAAN UMUM'),
('780', 'BIDANG KEPEGAWAIAN'),
('781', 'Bidang Pengadaan Pegawai'),
('782', 'Bidang Mutasi Pegawai'),
('783', 'Bidang Kedudukan Pegawai'),
('784', 'Bidang Kesejahteran Pegawai'),
('785', 'Bidang Cuti'),
('786', 'Bidang Penilaian'),
('787', 'Bidang Tata Usaha Kepegawaian'),
('788', 'Bidang Pemberhentian Pegawai'),
('789', 'Bidang Pendidikan Pegawai'),
('790', 'BIDANG KEUANGAN'),
('791', 'Bidang Anggaran'),
('792', 'Bidang Otorisasi'),
('793', 'Bidang Verifikasi'),
('794', 'Bidang Pembukuan'),
('795', 'Bidang Perbendaharaan'),
('796', 'Bidang Pembina Kebendaharaan'),
('797', 'Bidang Pendapatan'),
('799', 'Bidang Bendaharaan\r\n'),
('800', 'Kepegawaian'),
('810', 'PENGADAAN'),
('820', 'MUTASI'),
('822', 'Kenaikan Gaji Berkala'),
('823', 'Kenaikan Pangkat / Pengangkatan'),
('824', 'Pemindahan / Pelimpahan / Perbantuan'),
('825', 'Datasering dan Penempatan Kembali'),
('826', 'Penunjukan Tugas Belajar'),
('828', 'Mutasi Dengan Instansi Lain'),
('830', 'KEDUDUKAN'),
('831', 'Perhitungan Masa Kerja'),
('832', 'Penyesuaian Pangkat / Gaji'),
('833', 'Penghargaan Ijazah / Penyesuaian'),
('834', 'Jenjang Pangkat / Eselonering'),
('840', 'KESEJAHTERAAN PEGAWAI'),
('841', 'Tunjangan'),
('841.1', 'Jabatan'),
('841.2', 'Kehormatan'),
('841.3', 'Kematian/Uang Duka'),
('841.4', 'Tunjangan Hari Raya'),
('841.5', 'Perjalanan Dinas Tetap/Cuti/Pindah'),
('841.6', 'Keluarga'),
('841.7', 'Sandang, Pangan, Papan (Bapertarum)'),
('842', 'Dana'),
('842.1', 'Taspen'),
('842.2', 'Kesehatan'),
('842.3', 'Asuransi'),
('843', 'Perawatan Kesehatan'),
('844', 'Koperasi / Distribusi'),
('845', 'Perumahan/Tanah'),
('846', 'Bantuan Sosial'),
('850', 'CUTI'),
('860', 'PENILAIAN'),
('861', 'Penghargaan'),
('861.1', 'Bintang/Satyalencana'),
('861.2', 'Kenaikan Pangkat Anumerta'),
('861.3', 'Kenaikan Gaji Istimewa'),
('861.4', 'Hadiah Berupa Uang'),
('861.5', 'Pegawai Teladan'),
('862', 'Hukuman'),
('863', 'Konduite, DP3, Disiplin Pegawai'),
('864', 'Ujian Dinas'),
('865', 'Penilaian Kehidupan Pegawai Negeri'),
('870', 'TATA USAHA KEPEGAWAIAN'),
('871', 'Formasi'),
('872', 'Bezetting/Daftar Urut Kepegawaian'),
('873', 'Registrasi'),
('873.1', 'NIP'),
('873.2', 'KARPEG'),
('873.3', 'Legitiminasi/Tanda Pengenal\r\n'),
('873.4', 'Daftar Keluarga, Perkawinan, Perceraian, Karis, Karsu'),
('874', 'Daftar Riwayat Pekerjaan'),
('875', 'Kewenangan Mutasi Pegawai'),
('876', 'Penggajian'),
('876.1', 'SKPP'),
('877', 'Sumpah/Janji'),
('878', 'Korps Pegawa'),
('880', 'PEMBERHENTIAN PEGAWAI'),
('881', 'Permintaan Sendiri'),
('882', 'Dengan Hak Pensiun'),
('883', '  Karena Meninggal'),
('884', 'Alasan Lain'),
('885', 'Uang Pesangon'),
('886', 'Uang Tunggu'),
('887', 'Untuk Sementara Waktu'),
('888', 'Tidak Dengan Hormat'),
('890', 'PENDIDIKAN PEGAWAI'),
('891', 'Perencanaan'),
('892', 'Pendidikan _Egular / Kader'),
('893', 'Pendidikan dan Pelatihan / Non Reguler'),
('894', 'Pendidikan Luar Negeri'),
('895', 'Metode'),
('896', 'Tenaga Pengajar / Widyaiswara/Narasumber'),
('897', 'Administrasi Pendidikan'),
('898', 'Fasilitas Belajar'),
('899', 'Sarana'),
('900', 'Keuangan'),
('910', 'ANGGARAN'),
('920', 'OTORISASI / SKO'),
('930', 'VERIFIKASI'),
('940', 'PEMBUKUAN'),
('950', 'PERBENDAHARAAN'),
('960', 'PEMBINAAN KEBENDAHARAAN'),
('961', 'Pemeriksaan Kas Dan Hasil Pemeriksaan Kas'),
('970', 'PENDAPATAN'),
('990', 'BENDAHARAWAN');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `lvl` int(3) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`lvl`, `keterangan`) VALUES
(1, 'Admin'),
(2, 'Camat/Sekcam'),
(3, 'Kasubbag Umum'),
(4, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bagian` varchar(30) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `passid` varchar(10) NOT NULL,
  `lvl` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `bagian`, `userid`, `passid`, `lvl`) VALUES
(1, 'Arif', 'Umum', 'admin', 'admin', 1),
(3, 'Ujat Sudrajat', 'Camat', 'camat', '1234', 2),
(5, 'Asep Anton \r\n', 'Kepala Subbagian Umum', 'kasubbag', '1234', 3),
(6, 'Yandri Permana', 'Sekcam', 'sekcam', '1234', 2),
(7, 'FebryA', 'PPAT', 'staff', '1234', 4),
(9, 'bayu', 'Perencanaan dan Keuangan', 'bdk', 'bdk', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bag`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_dispo`);

--
-- Indexes for table `kodearsip`
--
ALTER TABLE `kodearsip`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`lvl`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD UNIQUE KEY `userid_2` (`userid`),
  ADD UNIQUE KEY `userid_3` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bag` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_dispo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
