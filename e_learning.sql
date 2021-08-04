-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2010 at 05:13 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=506 ;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(501, 1286987980, '127.0.0.1', 'kI41UTJr'),
(500, 1286987257, '127.0.0.1', 'S3a9CAkc'),
(499, 1286983508, '127.0.0.1', 'klX3uRc1'),
(498, 1286983350, '127.0.0.1', '7NQCHA57'),
(497, 1286983333, '127.0.0.1', 'm9AQSqfb'),
(491, 1286978943, '127.0.0.1', 'Jpst71kn'),
(492, 1286978950, '127.0.0.1', 'l09IPP8N'),
(493, 1286979572, '127.0.0.1', 'c9eDuhz9'),
(494, 1286980065, '127.0.0.1', 'OEMtnuBx'),
(495, 1286980143, '127.0.0.1', '4YPoVA0i'),
(496, 1286983308, '127.0.0.1', 'K0TL49VD'),
(502, 1287031468, '127.0.0.1', 'vbO6aUnK'),
(503, 1287139811, '127.0.0.1', '5Mx35Ojc'),
(504, 1287139841, '127.0.0.1', 'uUJBqvhF'),
(505, 1287139852, '127.0.0.1', 'SEjBVbMq');

-- --------------------------------------------------------

--
-- Table structure for table `tblagenda`
--

CREATE TABLE IF NOT EXISTS `tblagenda` (
  `id_agenda` int(5) NOT NULL AUTO_INCREMENT,
  `tema_agenda` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_posting` date NOT NULL,
  `tempat` varchar(150) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `keterangan` tinytext NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblagenda`
--

INSERT INTO `tblagenda` (`id_agenda`, `tema_agenda`, `isi`, `tgl_mulai`, `tgl_selesai`, `tgl_posting`, `tempat`, `jam`, `keterangan`) VALUES
(1, 'Workshop Kolaborasi PHP dan jQuery', 'Materinya mengenai cara mengkolaborasikan pemrograman PHP dan jQuery', '2010-09-11', '2010-09-12', '2010-09-09', 'Hotel Santika Yogyakarta', '09.00 s/d 16.00 WIB ', 'Contact Person :\r\nGede Lumbung (081916186418)\r\nHarga tiket workshop 50.000 per orang (snack, makan siang, piagam)'),
(2, 'Workshop "3 Hari Menjadi Master PHP"', 'Workshop ini bertujuan untuk mengenal kemampuan PHP lebih jauh lagi.', '2010-09-15', '2010-09-16', '2010-09-13', 'Jogja Expo Center', '15.00 s/d Selesai', 'Tiket bisa dibeli di Adi (081893274848)'),
(3, 'Bedah Buku "Membongkar Trik Rahasia Master PHP"', 'Acara bedah buku terbaru dari Lukmanul Hakim yang berjudul Membongkar Trik Rahasia Para Master PHP.\r\n', '2010-09-16', '2010-09-18', '2010-09-15', 'Toko Buku Gramedia Sudirman ', '08.00 s/d 12.00 WIB ', 'Contact Person :\r\nGede Lumbung (081916186418)\r\nHarga tiket workshop 50.000 per orang (snack, makan siang, piagam)'),
(4, 'Pameran Produk TI dan Hasil Karya Mahasiswa', 'Menampilkan produk-produk TI dari berbagai merk ternama dan menampilkan hasil karya mahasiswa-mahasiswi STIKOM PGRI Banyuwangi.', '2010-09-18', '2010-09-22', '2010-09-17', 'Aula STIKOM PGRI Banyuwangi', '09.00 s/d 20.00 WIB', 'Dimeriahkan dengan parade band SMA se-Banyuwangi dan bazzar.'),
(5, 'Pengenalan Lingkungan Kampus (PLK) Mahasiswa Baru 2010', 'Pengenalan lingkungan kampus mahasiswa baru angkatan 2010 sebagai sarana sosialisasi lingkungan kampus STIKOM PGRI Banyuwangi kepada mahasiswa baru.', '2010-09-23', '2010-09-25', '2010-09-18', 'STIKOM PGRI Banyuwangi', '08.00 s/d 15.00 WIB', 'Acara di hari terakhir, ditutup dengan acara outbond di pemandian Taman Suruh.');

-- --------------------------------------------------------

--
-- Table structure for table `tblberita`
--

CREATE TABLE IF NOT EXISTS `tblberita` (
  `id_berita` int(3) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(3) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `counter` int(3) NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tblberita`
--

INSERT INTO `tblberita` (`id_berita`, `id_kategori`, `judul_berita`, `isi`, `gambar`, `tanggal`, `waktu`, `counter`) VALUES
(1, 1, 'Corei3, Corei5, dan Corei7 Keluarga Baru Dari Intel', 'Intel Core i7 is an Intel brand name for several families of desktop and laptop 64-bit x86-64 processors using the Nehalem microarchitecture that are. Intel Core i7 is an Intel brand name for several families of desktop and laptop 64-bit x86-64 processors using the Nehalem microarchitecture that are. Intel Core i7 is an Intel brand name for several families of desktop and laptop 64-bit x86-64 processors using the Nehalem microarchitecture that are. Intel Core i7 is an Intel brand name for several families of desktop and laptop 64-bit x86-64 processors using the Nehalem microarchitecture that are', 'core.png', '2010-07-24', '00:00:00', 9),
(2, 2, 'iPhone Banyak Menuai Kecaman', 'iPhone 4 is a GSM cell phone with a high-resolution display, FaceTime video calling, HD video recording, a 5-megapixel camera, and more.iPhone 4 is a GSM cell phone with a high-resolution display, FaceTime video calling, HD video recording, a 5-megapixel camera, and more.iPhone 4 is a GSM cell phone with a high-resolution display, FaceTime video calling, HD video recording, a 5-megapixel camera, and more.iPhone 4 is a GSM cell phone with a high-resolution display, FaceTime video calling, HD video recording, a 5-megapixel camera, and more.', 'iphone.png', '2010-07-24', '00:00:00', 8),
(3, 1, 'Google Chrome Susupi Microsoft', 'Browser Microsoft, Internet Explorer (IE), bisa mendominasi karena tersedia secara default pada banyak komputer di pasaran. Google Chrome akan menggoyang dengan menyusup di lahan yang sama. Google rupanya sudah bersiap-siap menawarkan Google Chrome secara default pada komputer-komputer baru. Pichai juga menjanjikan Chrome akan keluar dari versi Beta (uji coba) pada awal 2009.\r\n\r\nJika Google berhasil menyusupkan Chrome dalam lahan yang selama ini jadi ''mainan'' Microsoft, lanskap perang browser akan mengalami perubahan. Saat ini Microsoft masih mendominasi pada kisaran 70 persen lewat Internet Explorer-nya, sedangkan Firefox menguasai sekitar 20 persen. ', '25chrome.jpg', '2010-07-25', '00:00:00', 5),
(4, 2, 'Google "Panas", Microsoft Beli Yahoo???', 'Google menolak keras atas tindakan Microsoft yang mau membeli Yahoo. "Ini bukan hanya sekedar transaksi jual beli yang sederhana, suatu perusahaan mengambil perusahaan lainnya. Ini mengenai esensi dari internet yaitu keterbukaan dan inovasi". Komentar David Drummond (Google''s senior vice president for corporate development and chief legal officer).\r\n\r\nYahoo adalah salah satu perusahaan terbesar di internet, belakangan ini Yahoo mulai kehabisan akal untuk mengalahkan pendapatan Google. Google memulai karir di Internet melalui search-engine nya, kesukseskan teknologi tersebut membuat Google terus melakukan inovasi dan mengajak para developer untuk memajukan teknologi Internet, sampai akhirnya Yahoo pun membuat halaman khusus untuk para developer. David Drummond juga menuding kalau Microsoft ingin mengambil keuntungan yang tidak pantas dan melakukan tindakan ilegal melalui Internet. Microsoft mengumumkan pada hari jum''at kemarin (1 februari 2008) penawarannya kepada Yahoo sebesar USD 44.6 Milyar.\r\n\r\nKomite kongres akan melakukan sesi ''hearing'' pada minggu ini untuk menimbang apakah penawaran Microsoft terhadap Yahoo termasuk implikasi Antitrust.', 'yahoo.jpg', '2010-07-25', '00:00:00', 3),
(5, 2, 'Browser Safari Diklaim Paling Handal di Windows', 'Dibandingkan browser Internet lainnya, Apple mengklaim browser web Safari buatannya adalah yang paling handal digunakan jika digunkan di atas sistem operasi Windows. Hal tersebut disampaikan CEO Apple Steve Jobs saat mengumumkan versi terbaru Safari yang dapat berjalan di Windows.\r\n\r\n"Kami kira para pengguna Windows akan benar-benar terkejut saat melihat begitu cepat dan menariknya berselancar di Internet menggunakan Safari," ujar Steve Jobs di acara Worldwide Developer Conference Apple di San Fransisco, AS, Senin (11/6). Ia mengklaim browser Safari dapat membuka sebuah halaman web dua kali lebih cepat dibandingkan Internet Explorer 7 di Windows dan masih lebih cepat dibandingkan Opera maupun Firefox.\r\n\r\nKehadiran Safari untuk para pengguna Windows akan semakin menyemarakkan persaingan browser web. Steve Jobs berharap peluncuran ini akan meningkatkan popularitas Safari yang baru mencapai 4,9 persen pangsa pasar browser web. Persaingan browser web saat ini masih didominasi IE dengan pangsa pasar 78 persen menyusul Firefox. Versi tes Safari 3 untuk Windows XP, ', '18safari.jpg', '2010-07-25', '00:00:00', 2),
(6, 1, 'Digerus Firefox, IE Makin Melempem', 'Browser Mozilla Firefox sepertinya makin berkibar. Berdasarkan data terbaru dari biro penelitian Net Applications, Firefox menapak naik dengan menguasai 20,78 persen pangsa pasar browser pada bulan November, naik dari angka 19,97 persen di bulan Oktober.\r\n\r\nDikutip detikINET dari Afterdawn, Selasa (2/1/2/2008), Firefox kemungkinan sukses menggaet user yang sebelumnya mengandalkan browser Internet Explorer (IE) besutan Microsoft. Pasalnya, masih menurut data Net Applications, pangsa pasar IE kini menurun di bawah 70 persen untuk kali pertama sejak tahun 1998. IE sekarang menguasai 69,8 persen pangsa pasar dari sebelumnya 71,3 persen di bulan Oktober.\r\n\r\nPadahal di masa jayanya di tahun 2003, IE pernah begitu dominan dengan menguasai 95 persen pasaran browser. Penurunan pangsa pasar IE ini disinyalir juga terkait musim liburan di AS di mana banyak perusahaan libur. Padahal browser IE banyak dipakai oleh kalangan perusahaan.\r\n\r\nAdapun produk browser lainnya menunjukkan tren peningkatan. Apple Safari kini punya pangsa 7,13 persen dan Google Chrome sebesar 0,83 persen dari yang sebelumnya 0,74 persen. Sementara pangsa pasar Opera mengalami penurunan dari yang sebelumnya 0,75 persen menjadi 0,71 persen saja. ', '47firefox.jpg', '2010-07-25', '00:00:00', 2),
(7, 1, 'Foxconn Kembangkan Motherboard AMD', 'JAKARTA  - Produsen motherboard Foxconn Technology meluncurkan motherboard terbarunya, seri A88GM. Seri terbaru ini memiliki chipset terkini AMD 880G+SB850, mendukung platform DDR3 dan AM3, serta Phenom II X6 CPU yang hemat daya dan tangguh.\r\n\r\nMotherboard Foxconn seri A88GM dilengkapi dengan 100 persen kapasitor-kapasitor tunggal yang dirancang oleh perusahaan jepang terkemuka, yaitu Fujitsu. Dengan umur pakai rata-rata 50.000 jam, kapasitor tunggal ini memberikan kestabilan, daya tahan dan umur yang panjang yang sangat penting untuk memenuhi kebutuhan daya prosesor high-end dan komponen lain yang ada saat ini sangat diperuntukkan untuk penggunaan banyak aplikasi dan games.\r\n\r\nSelain itu, dalam keterangan resminya, Rabu (28/7/2010), dibandingkan dengan pembengkakan dan kebocoran kapasitor yang dapat merusak motherboard secara lengkap, adanya 100 persen kapasitor tunggal membuat tidak adanya komponen cair, sehingga tidak bocor atau dapat meledak. Sebagai tambahan, kemampuan mereka untuk mentolerir kondisi ekstrim dan ketahanan secara keseluruhan membuat mereka lebih cocok untuk lingkungan operasional yang ekstrim.\r\n\r\nDalam rangka memenuhi kebutuhan konsumen dalam hal kenyamanan dan fitur lengkap multimedia, motherboard A88GM dilengkapi dengan berbagai macam pilihan konektivitas termasuk D-sub, juga digital video interface (DVI) untuk tampilan video digital dan High definition multimedia interface (HDMI) untuk video digital dan output audio guna membantu konsumen dalam memudahkan koneksi kabel. Berkat desain ini, konsumen dapat menikmati video berdefinisi tinggi dan audio pada saat yang sama untuk sepenuhnya memenuhi permintaan HD multimedia generasi berikutnya.\r\n\r\nFitur lain yang ditemukan pada motherboard Foxconn A88GM adalah 4+1 Power Phases, desain ini menggabungkan kekuatan menjamin pengiriman lebih stabil dan dukungan cepat kepada CPU selama bekerja dalam beban berat atau overclocking. Selain itu, 1 phase untuk Northbridge dan 1 phase untuk memori memungkinkan pengguna untuk melakukan banyak tugas secara mendadak dengan performa yang lebih baik dan mengurangi konsumsi daya. Juga, desain thermalnya memungkinkan pengguna untuk menikmati masa pakai suatu komponen lebih lama melalui suhu yang lebih rendah dan tanpa bising dikombinasikan dengan kinerja thermal tertinggi pada chipset, komponen daya CPU dan PCB. (srn)', 'foxcon.jpg', '2010-07-28', '16:13:00', 9),
(18, 1, 'Agresif, AMD Mulai Kejar Nvidia', 'Jakarta - Dominasi kubu hijau Nvidia dalam menggelontorkan produk-produk grafisnya, kini mendapat reaksi agresif dari AMD. Si kubu merah dilaporkan telah melampaui pengkapalan produk grafis Nvidia, selama kuartal dua 2010.\r\n\r\nLaporan yang dikutip detikINET dari Cnet, Jumat (30/7/2010) lalu mengatakan bahwa AMD lebih unggul 51 persen dalam pengkapalan produknya, dibanding Nvidia yang hanya 49 persen. Jika dibanding tahun lalu, jumlah ini begitu signifikan.\r\n\r\nDi tahun 2009 pada kuartal yang sama, posisi pun terbalik dengan kubu AMD yang hanya menguasai 41 persen pengkapalan produk-produknya, jika dibanding Nvidia. Keagresifan AMD membuat pertumbuhan grafis mereka meningkat 10 persen di tahun ini pada kuartal yang sama.\r\n\r\nNvidia sendiri sedikit ''kelabakan'' dengan melesetnya prediksi mereka, bahwa sang kompetitor kini terasa lebih agresif.\r\n\r\nSebagai informasi, AMD telah mengkapalkan setidaknya 16 juta kartu grafis DirectX 11 mereka sejak 9 bulan lalu. Perusahaan tersebut dipandang cukup sukses dengan menghadirkan grafis seri 5800. ', 'amd-ati.jpg', '2010-07-31', '01:21:18', 69),
(19, 2, 'Ponsel Android Bisa Nyalakan Mobil  ', 'Jakarta - Bertambah satu lagi daya tarik dari smartphone berbasis Android. Dengan sebuah aplikasi khusus, smartphone Android seperti Motorola Droid atau HTC Evo 4G bisa digunakan untuk menyalakan mesin mobil.\r\n\r\nSeperti diketahui, smartphone Android saat ini memang tengah naik daun dan menarik perhatian khalayak. Sebuah lelucon bahkan mengatakan, menggenggam smartphone Android dipercaya bisa membuat siapapun terlihat lebih menarik. Dengan kemampuan bisa menyalakan mobil, tentunya membuat smartphone Android dan penggunanya nampak lebih keren.\r\n\r\nLalu bagaimana caranya agar smartphone bisa berfungsi untuk menyalakan mobil? Sangat mudah, pengguna hanya perlu mengunduh aplikasi Android gratis bernama Viper SmartStart dan menginstal beberapa hardware tambahan untuk melengkapi mobil.\r\n\r\nDikutip detikINET dari TG Daily, Jumat (30/7/2010), jika sudah terpasang, aplikasi ini bisa digunakan untuk menyalakan atau mengontrol mobil secara virtual dari mana saja.\r\n\r\nTak hanya itu, Viper SmartStart juga memungkinkan pengguna mengunci mobil, membuka bagasi dan mendapat peringatan bahaya jika terjadi sesuatu pada mobil, melalui ponsel mereka. Pengguna bahkan bisa mengontrol beberapa mobil dari satu smartphone.', 'motorola-droid.jpg', '2010-07-31', '01:24:40', 8),
(20, 2, 'Google Masih Mungkin Merilis Nexus Two', 'Jakarta - Beredar rumor, Google masih mungkin merilis ponsel mereka Nexus Two. Padahal, sebelumnya Eric Schmidt sang CEO Google jelas-jelas mengatakan takkan ada lagi lanjutan Nexus One.\r\n\r\nRumor sedikit miring tersebut didapat detikINET dari Neowin, Jumat (30/7/2010). Berdasar sumber internal Google, Neowin mengatakan sebenarnya Google tengah membuat suksesor Nexus One yang disebut Nexus Two.\r\n\r\nWalau tak ada informasi detail mengenai hal ini, sang sumber mengatakan bulan depan ponsel tersebut bakal dirilis, dengan Android 3.0.\r\n\r\nSementara beberapa saat lalu, Nexus One dipastikan tak akan punya penerus. CEO Google Eric Schmidt mengisyaratkan perusahaannya tak akan memproduksi Nexus Two. Bahkan Nexus One mungkin akan jadi satu-satunya ponsel yang dibuat Google.\r\n\r\nSchmidt berkilah bahwa produknya tersebut sudah sukses di pasaran dan perusahaannya tak perlu untuk membuat penerusnya.', 'nexus-one.jpg', '2010-07-31', '01:26:20', 17),
(21, 2, 'Pemilik iPad Kaya dan Egois?  ', 'Jakarta - Sebuah studi yang dilakukan sebuah perusahaan di New Jersey, Amerika Serikat (AS) bernama MyType, menyimpulkan bahwa pemilik iPad merupakan sekelompok kalangan elit yang egois dan kurang ramah. \r\n\r\nStudi ini memang terdengar lucu dan mengada-mengada. Percaya atau tidak, yang jelas hasil survei MyType tersebut menyatakan pemilik iPad rata-rata enam kali lebih kaya ketimbang mereka yang tidak memiliki komputer tablet tersebut.\r\n\r\nPernyataan tersebut nampaknya cukup masuk akal mengingat iPad memang tergolong produk premium. Maka tak heran jika ada yang beranggapan, iPad bisa meningkatkan gengsi pemiliknya.\r\n\r\nSurvei ini juga menemukan bahwa pemilik iPad rata-rata kurang menyukai hal berbau seni dan musik melainkan lebih tertarik dengan video games, elektronik, sains, internet, finansial dan bisnis.\r\n\r\n"Ciri-ciri tersebut cocok dengan karakter orang-orang egois yang pernah kami teliti sebelumnya. Orang-orang dengan ciri-ciri seperti itu enam kali lebih mungkin membeli iPad daripada orang rata-rata," kata CEO MyType Tim Koelkebeck seperti dikutip detikINET dari IT Pro Portal, Jumat (30/7/2010).\r\n \r\nMyType merupakan perusahaan software yang menciptakan aplikasi tes kepribadian  di platform jejaring sosial seperti Facebook. Dalam survei ini, MyType menggunakan tes online berisi 50 pertanyaan yang berdasarkan fakta psikologis, serta teori dan riset modern. ', 'ipad-egois.jpg', '2010-07-31', '01:29:30', 14),
(22, 3, 'Siapa Jawara Open Source Indonesia?  ', 'Jakarta - Pemerintah, lewat Kementerian Pendayagunaan Aparatur Negara, telah meminta agar instansi pemerintah memanfaatkan piranti lunak Open Source pada 2011. Siapa yang paling jago? Akan terbukti dalam ajang bernama Indonesia Open Source Award (IOSA) 2010.\r\n\r\nIOSA 2010 akan digelar di Hotel Bidakara, Jakarta, pada Rabu, 28 Juli 2010. Seperti dikutip detikINET dari keterangan yang diterima, Selasa (27/7/2010), ajang tersebut juga akan digunakan untuk memantau kesiapan institusi pemerintahan untuk beralih ke Open Source.\r\n\r\nAcara tersebut diselenggarakan bersama-sama oleh Kementerian Komunikasi dan Informatika , Kementerian Riset dan Teknologi, Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi, Asosiasi Open Source Indonesia (AOSI), serta Komunitas Open Source.\r\n\r\nSelain penganugerahan, acara itu juga akan menampilkan workshop dan seminar. Termasuk di dalamnya, workshop yang terkait industri kreatif seperti pemanfaatan GIMP dan Blender, maupun sistem operasi Android yang sedang naik daun.\r\n\r\nSedangkan Seminarnya akan membahas topik kreativitas dengan memanfaatkan Open Source. Pembicara seperti Nukman Luthfie, Kak Seto hingga Indra Utoyo akan hadir di seminar tersebut. ', 'iosa-award.jpg', '2010-07-31', '01:35:18', 10),
(23, 3, '2011, Lembaga Pemerintah Sudah Harus Cicipi Open Source', 'Jakarta - Pemerintah kian memantapkan langkah untuk bermigrasi ke penggunaan software Open Source. Tahun 2011 dijadikan target titik baliknya. Pada saat itu, seluruh institusi pemerintah diharapkan sudah harus be legal, terutama berbasis Open Source.\r\n\r\nDemikian dikatakan Kemal Prihatman, Asisten Deputi Urusan Pengembangan dan Pemanfaatan TI Ristek dalam jumpa pers yang berlangsung di gedung BPPT, Jakarta, Kamis (5/6/2009).\r\n\r\nMenurutnya, target ini merupakan bagian dari isi surat edaran dari Menteri Pemberdayaan Aparatur Negara pada 5 April lalu yang isinya mewajibkan seluruh lembaga pemerintah untuk menggunakan software legal di seluruh jajarannya.\r\n\r\n"Namun kami dari Ristek dengan alasan efisiensi anggaran jelas menyarankan be legal dengan Open Source. Tak hanya sistem operasinya, tapi juga aplikasi pendukung lainnya," tegasnya.\r\n\r\nKemal memprediksi, jumlah komputer yang digunakan seluruh institusi pemerintah di seluruh Indonesia mencapai 800 ribu unit. Nah dari jumlah tersebut, ia tak berani memastikan bahwa seluruhnya sudah legal menggunakan software proprietary. "Mungkin sistem operasinya sudah legal tapi aplikasi yang lainnya belum," imbuhnya.\r\n\r\nRistek sendiri bersama dengan Asosiasi Open Source Indonesia (AOSI) pada tahun 2009 ini menargetkan akan membantu setidaknya 10 lembaga pemerintah untuk melakukan migrasi ke Open Source.\r\n\r\n"Kami lakukan secara bertahap, saat ini kita sedang membantu Depdiknas dan Kementerian PAN," tandasnya.', 'linux-tux.jpg', '2010-07-31', '01:37:28', 44),
(24, 4, 'Unggah Video di YouTube Kini 15 Menit  ', 'Jakarta - Mengunggah video di YouTube akan semakin mengasyikkan. YouTube kini memperpanjang surasi video yang diunggah dari sepuluh menit menjadi 15 menit.\r\n\r\nDalam postingan blognya, Joshua Siegel selaku product manager unggah dan pengaturan video YouTube menyebutkan, perpanjangan durasi video sudah lama menjadi permintaan sebagian besar pengguna YouTube.\r\n\r\nLangkah ini pun diambil YouTube karena yakin teknologi ''Content ID'' pada situsnya dapat bekerja baik. Content ID merupakan teknologi yang secara otomatis menghapus pelanggaran hak cipta oleh penyaringan secara digital melalui arsip di situs tersebut.\r\n\r\n"Karena keberhasilan upaya teknologi yang sedang berlangsung, kami bisa meningkatkan batas durasi unggah video," tulis Siegel seperti dilansir eWeek, dan dikutip detikINET, Jumat (30/7/2010). \r\n\r\nYouTube, menurut Siegel, terutama mengalamatkan penambahan durasi ini pada kemampuan situsnya untuk melindungi hak cipta dari setiap video yang diunggah. ', 'youtube.jpg', '2010-07-31', '01:40:18', 15),
(25, 2, 'Hadir di Indonesia, Xbox 360 Slim Dibanderol Rp 3,4 Juta  ', 'Jakarta - Jika di negara asalnya paket Xbox 360 slim beserta Kinect dibanderol pada kisaran harga USD 299 (sekitar Rp 2,7 juta), maka gamer di Indonesia harus merogoh kocek lebih dalam. Pasalnya, harga konsol berserta kendali berbasis kamera tersebut bakal melambung ketika sampainya di Tanah Air.\r\n\r\nBerdasarkan pengamatan detikINET, Jumat (30/7/2010), di pusat perbelanjaan konsol game di kawasan Mangga 2 Mall, beberapa toko sudah ada yang mulai menjajakan Xbox 360 slim berwarna hitam dengan kapasitas hardisk 250GB.\r\n\r\n"Di sini kami menjual Xbox 360 Slim seharga Rp 3,4. Itu hanya konsolnya saja belum termasuk Kinect dan game," ujar Merry, salah satu pemilik toko game yang telah menjual konsol tersebut.\r\n\r\nMeski dibanderol pada kisaran harga yang lebih mahal dari rilis resmi, namun Mery mengakui konsol teranyar besutan Microsoft tersebut tetap laris dan banyak diminati.\r\n\r\n"Kami baru mendatangkan 10 unit Xbox 360 slim langsung dari Amerika, dan semuanya sudah habis terjual," tambah Merry.\r\n\r\nXbox 360 slim memang merupakan salah satu konsol game yang paling dinanti saat ini. Kabarnya, konsol tersebut memiliki beberapa perbaikan dari seri terdahulu seperti dengan hadirnya Wi-Fi, kapasitas hardisk yang lebih besar, atau pun daya tahan terhadap panas yang diklaim lebih baik.', 'xbox-slim.jpg', '2010-07-31', '01:44:10', 5),
(26, 2, 'Xbox 360 Slim Belum Bisa Mainkan Game Bajakan  ', 'Jakarta - Selain membenahi beberapa kekurangan pada seri terdahulu, Microsoft juga mengubah Xbox 360 Slim menjadi lebih ''aman''. Kabarnya, konsol yang dibanderol Rp 3,4 Juta ini belum bisa memainkan game bajakan.\r\n\r\nHal tersebut diutarakan salah satu penjual konsol game yang menjajakan Xbox 360 Slim, "Kalau dibandingkan sama Xbox 360, selain spesifikanya yang beda Xbox 360 Slim juga belum bisa memainkan game bajakan," ujarnya.\r\n\r\nPun demikian, konsol tersebut masih tetap diminati oleh para gamer Tanah Air. Bahkan yang lebih mengherankan, kebanyakan para pembeli Xbox 360 Slim merupakan para gamer yang justru sudah memiliki Xbox 360.\r\n\r\n"Biasanya yang beli Xbox 360 Slim itu, justru orang yang sudah punya Xbox 360," ujar Merry, salah satu penjual konsol game di kawasan Mangga 2 Mall, kepada detikINET, Jumat (30/7/2010).\r\n\r\nMeryy juga memperkirakan hal tersebut dikarenakan para gamer Xbox 360 ingin memainkan game mereka secara online.\r\n\r\n"Mereka beli biasanya hanya untuk memainkan game secara online, kan kalau online pakai konsol yang sudah di-patch bisa langsung di-banned oleh Microsoft," tambah penjual yang akrab disapa Ci'' Meryy ini.\r\n\r\nBisa dibilang, besarnya pengguna Xbox 360 di Indonesia bisa jadi karena konsol tersebut bisa memainkan game bajakan. Tidak seperti PlayStation 3 yang hingga kini masih kebal dari tangan jahil para pembajak. Lalu apakah hal ini bakal menyurutkan penjualan Xbox 360 Slim?\r\n\r\n"Kalau dibilang bakal sepi pembeli sepertinya tidak, gamer di Indonesia juga banyak loh yang mau membeli game original. Dan kalau masalah memainkan game bajakan di Xbox 360 Slim, sepertinya hanya masalah waktu," pungkas Merry.\r\n', 'xbox-slim-non-bajak.jpg', '2010-07-31', '01:49:18', 22),
(27, 3, 'Pengembang Linux Kolaborasi Bikin OS Mobile', 'SAN FRANSISCO - Maraknya penyebaran smarphone di dunia menarik dua perusahaan pengembang Linux untuk membuat sistem operasi mobile.\r\n\r\nKedua perusahaan tersebut adalah LiMo Foundation dan GNOME Foundation. Mereka sepakat untuk bekerja sama membuat inovasi di dunia open source, khususnya di pasar sistem operasi untuk ponsel.\r\n\r\nSelain itu, dalam waktu dekat, LiMo Foundation akan menjadi bagian dari anggota dewan penasehat GNOME Foundation, sebaliknya GNOME akan menjadi Industry Liaison Partner untuk LiMo Foundation.\r\n\r\nDilansir melalui Cellular News, Senin (26/7/2010), pengembangan ini merepresentasikan formalisasi alami berdasarkan penggunaan komponen software GNOME Mobile yang signifikan dengan platform LiMo Release 2 dan Release 3.\r\n\r\nPlatform LiMo sendiri merupakan platform perangkat mobile berbasis Linux, termasuk komponen multi dari proyek GNOME Mobile seperti Glib, GTK+, D-Bus, GStreamer dan BlueZ, serta lainnya.\r\n\r\n"Tujuan dari GNOME Mobile adalah untuk menyediakan sebuah platform ke tahap berikutnya dari komputasi klien. Kami berkomitmen untuk membawa kualitas dan kebebasan kepada pengguna GNOME pada platform mobile," ujar Direktur Eksekutif Yayasan GNOME Stormy Peters.\r\n\r\n"Kami sangat bersemangat untuk bekerja sama dengan mitra komersial seperti LiMo Foundation untuk memastikan bahwa GNOME Mobile teknologi yang tersedia pada perangkat mobile yang terhubung dan menggabungkan platform LiMo," tandasnya.', 'tux-duduk.jpg', '2010-07-31', '02:08:10', 33),
(28, 2, 'Microsoft Kerja Keras Jegal iPad Apple', 'Jakarta - Menyaingi Apple jadi prioritas utama Microsoft saat ini. Sang CEO, Steve Ballmer mengungkapkan, bahwa perusahaannya sedang bekerja keras menciptakan komputer tablet yang bisa menjegal laju iPad.\r\n\r\nDisebutkan oleh sang penerus tahta Bill Gates, Microsoft dalam mengembangkan komputer bergaya tabletnya ini bekerja sama dengan sejumlah vendor hardware kenamaan seperti Hewlett-Packard (HP), Lenovo, Asus, Dell dan Toshiba.\r\n\r\n"Kami harus membuat hal ini terjadi pada tablet Windows 7. Ini harus disegerakan dan bekerja keras dengan partner kami," ungkap Ballmer dalam sebuah pertemuan yang berlangsung di kantor pusat Microsoft, seperti detikINET kutip dari Telegraph, Sabtu (31/7/2010).\r\n\r\n"Jika sudah siap nanti, produk itu akan segera dikapalkan. Kami ingin menghadirkan produk yang benar-benar diinginkan konsumen," tambahnya.\r\n\r\nMicrosoft pun membentuk tim khusus untuk menggarap prototip komputer tablet baru yang kini dijaga ketat dan sangat rahasia. \r\n\r\nDalam kesempatan yang sama, Microsoft juga kembali menegaskan tidak akan meneruskan proyek Courier, yakni proyek penggarapan komputer tablet sebelumnya yang disebut-sebut akan bersaing ketat dengan iPad dan telah bocor di YouTube.\r\n\r\nBallmer beralasan, Courier hanya salah satu dari banyak ide Microsoft dan tidak ada rencana untuk membuatnya saat itu.\r\n', 'ipad-mikocok.jpg', '2010-08-01', '15:38:20', 31),
(29, 2, 'Samsung Tablet Coba Jadi Alternatif iPad2', '<p>Jakarta - Menyaingi Apple jadi prioritas utama Microsoft saat ini. Sang CEO, Steve Ballmer mengungkapkan, bahwa perusahaannya sedang bekerja keras menciptakan komputer tablet yang bisa menjegal laju iPad.  Disebutkan oleh sang penerus tahta Bill Gates, Microsoft dalam mengembangkan komputer bergaya tabletnya ini bekerja sama dengan sejumlah vendor hardware kenamaan seperti Hewlett-Packard (HP), Lenovo, Asus, Dell dan Toshiba.  "Kami harus membuat hal ini terjadi pada tablet Windows 7. Ini harus disegerakan dan bekerja keras dengan partner kami," ungkap Ballmer dalam sebuah pertemuan yang berlangsung di kantor pusat Microsoft, seperti detikINET kutip dari Telegraph, Sabtu (31/7/2010).  "Jika sudah siap nanti, produk itu akan segera dikapalkan. Kami ingin menghadirkan produk yang benar-benar diinginkan konsumen," tambahnya.  Microsoft pun membentuk tim khusus untuk menggarap prototip komputer tablet baru yang kini dijaga ketat dan sangat rahasia.   Dalam kesempatan yang sama, Microsoft juga kembali menegaskan tidak akan meneruskan proyek Courier, yakni proyek penggarapan komputer tablet sebelumnya yang disebut-sebut akan bersaing ketat dengan iPad dan telah bocor di YouTube.  Ballmer beralasan, Courier hanya salah satu dari banyak ide Microsoft dan tidak ada rencana untuk membuatnya saat itu <span style="color: #00ff00;">Saya adalah seorang yang sangat<span style="color: #ff0000;"> mencintai keluarga saya..</span></span></p>', 'axio.jpg', '2010-08-01', '15:48:20', 86);

-- --------------------------------------------------------

--
-- Table structure for table `tbldosen`
--

CREATE TABLE IF NOT EXISTS `tbldosen` (
  `id_dosen` int(5) NOT NULL AUTO_INCREMENT,
  `dosen` varchar(200) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbldosen`
--

INSERT INTO `tbldosen` (`id_dosen`, `dosen`) VALUES
(1, 'H. Chairul Anam, SE'),
(2, 'Mohammad Feirus Abadi, S.Pd'),
(3, 'Drs. Eko Listiwikono, MM'),
(4, 'Solehatin, S.Kom'),
(5, 'Yoyon Arie Budi, ST'),
(6, 'Rudi Hartono, SE'),
(7, 'Tintin Harlina, S.Kom'),
(8, 'Rahman Yulianto, S.Kom'),
(9, 'Slamet Siswanto U, ST'),
(10, 'Drs. Agus Riyono'),
(11, 'Djuniharto, SE'),
(12, 'Ir. H. Moch. Najib, MM'),
(13, 'Tim'),
(14, 'Haykal, S.Pd, MT'),
(15, 'Dwi Yulian RL, S.Kom'),
(16, 'Erda Habiby, ST'),
(17, 'Drs. Mohamad Dedi'),
(18, 'Eko Heri Susanto, S.Kom'),
(19, 'Ferdi Berlianto, ST'),
(20, 'Iman Santoso'),
(21, 'Hadiq, ST'),
(22, 'Yoyon Arie Budi, ST'),
(23, 'Lukman Ariefi M, M.Pd'),
(24, 'Drs. Bambang Priyono'),
(25, 'Drs. Ismurdianto'),
(26, 'Nur Ahmadi, ST'),
(27, 'Sudjadi, MT');

-- --------------------------------------------------------

--
-- Table structure for table `tbldownload`
--

CREATE TABLE IF NOT EXISTS `tbldownload` (
  `id_download` int(5) NOT NULL AUTO_INCREMENT,
  `id_kat` int(5) NOT NULL,
  `judul_file` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `author` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbldownload`
--

INSERT INTO `tbldownload` (`id_download`, `id_kat`, `judul_file`, `nama_file`, `tgl_posting`, `author`) VALUES
(2, 7, 'Multiple Delete Dengan Checkbox (PHP)', '1017888225Multiple-Delete-Record-dg-checkbox.zip', '2010-09-26', 'hadiq'),
(22, 7, 'Pengenalan Logika Basic d C#', '873173204C_Sharp__Part_1_-_Pengenalan_Logika_Basic.zip', '2010-10-17', 'admin'),
(23, 10, 'Class dan Array di C#', '255647243C_Sharp__Part_2_-_Class_Dan_Array.zip', '2010-10-17', 'admin'),
(24, 7, 'Static and Function di C#', '364508405C_Sharp__Part_3_-_Static_And_Function.zip', '2010-10-17', 'admin'),
(25, 10, 'SQL 2005 dan C#', '1061638941C_Sharp_Part5_-_SQL2005.zip', '2010-10-17', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblhasil`
--

CREATE TABLE IF NOT EXISTS `tblhasil` (
  `id_hasil` int(10) NOT NULL AUTO_INCREMENT,
  `id_mk` int(10) NOT NULL,
  `no_soal` int(10) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `salah` int(5) NOT NULL,
  `benar` int(5) NOT NULL,
  `hasil` varchar(5) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_hasil`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tblhasil`
--

INSERT INTO `tblhasil` (`id_hasil`, `id_mk`, `no_soal`, `username`, `salah`, `benar`, `hasil`) VALUES
(1, 5, 2, '1109100350', 1, 4, '80.0'),
(2, 5, 1, '1109100350', 0, 8, '100.0'),
(3, 8, 1, '1109100351', 0, 1, '100.0'),
(4, 5, 1, '1109100351', 2, 6, '75.0'),
(5, 5, 2, '1109100351', 1, 4, '80.0'),
(6, 22, 1, '1109100351', 0, 1, '100.0'),
(7, 8, 1, '1109100350', 0, 1, '100.0'),
(8, 22, 1, '1109100350', 0, 1, '100.0'),
(9, 4, 1, '1109100350', 0, 2, '100.0'),
(10, 87, 1, '1109100350', 0, 4, '100.0'),
(11, 4, 1, '1109100456', 0, 2, '100.0');

-- --------------------------------------------------------

--
-- Table structure for table `tblinbox`
--

CREATE TABLE IF NOT EXISTS `tblinbox` (
  `id_inbox` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `tujuan` varchar(15) NOT NULL,
  `subjek` varchar(200) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `status_pesan` varchar(1) NOT NULL,
  PRIMARY KEY (`id_inbox`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tblinbox`
--

INSERT INTO `tblinbox` (`id_inbox`, `username`, `tujuan`, `subjek`, `pesan`, `waktu`, `status_pesan`) VALUES
(16, '1109100351', 'rudi', 'Salam Sejahtera', '<p>Woiii.....<br /><br />================<strong>BALAS</strong>================<br /><br /><strong>Rudi Hartono, SE</strong> : Woi juga.....</p>', '11-10-2010 | 05:57:pm', 'Y'),
(14, '1109100350', 'hadiq', 'Say Hello....', '<p>Halo pak hadiq....<br /><br />================<strong>BALAS</strong>================<br /><br /><strong>Hadiq, ST</strong> : Halo juga....</p>', '11-10-2010 | 05:55:pm', 'Y'),
(9, '1109100350', 'rudi', 'Salam Sejahtera', 'Halo pak rudi...\nPiye kabar''e???\nApik-apik wae kan...', '10-10-2010 | 09:12:pm', 'Y'),
(11, '1109100350', 'rudi', 'Say Hello....', '<p>Hello brow,,,,<br /><br />================<strong>BALAS</strong>================<br /><br /><strong>Rudi Hartono, SE</strong> : Hello juga deh bruuurr,,,</p>', '11-10-2010 | 05:18:pm', 'Y'),
(17, 'rudi', '1109100351', 'Salam Sejahtera', '<p>Woiii.....<br /><br />================<strong>BALAS</strong>================<br /><br /><strong>Rudi Hartono, SE</strong> : Woi juga.....</p>', '11-10-2010 | 05:58:pm', 'Y'),
(18, '1109100456', 'hadiq', 'Salam....', '<p>Halo...<br /><br />================<strong>BALAS</strong>================<br /><br /><strong>Hadiq, ST</strong> : Opo cuk???</p>', '14-10-2010 | 03:43:am', 'Y'),
(20, '1109100456', 'hadiq', 'Salam....', '<p>tes<br /><br />================<strong>BALAS</strong>================<br /><br /><strong>Hadiq, ST</strong> : OPO siehhh....???</p>', '14-10-2010 | 07:23:am', 'Y'),
(23, 'admin', '1109100456', 'Salam....', '<p>Woi cuuuukkk.....<br /><br />================<strong>BALAS</strong>================<br /><br /><strong>Administrator</strong> : Opo cuk???</p>', '18-10-2010 | 06:28:pm', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbljawabanpoll`
--

CREATE TABLE IF NOT EXISTS `tbljawabanpoll` (
  `id_jawaban_poll` int(3) NOT NULL AUTO_INCREMENT,
  `id_soal_poll` int(3) NOT NULL,
  `jawaban` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `counter` int(5) NOT NULL,
  PRIMARY KEY (`id_jawaban_poll`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbljawabanpoll`
--

INSERT INTO `tbljawabanpoll` (`id_jawaban_poll`, `id_soal_poll`, `jawaban`, `counter`) VALUES
(1, 1, 'Kurang', 8),
(2, 1, 'Cukup', 7),
(3, 1, 'Sangat Bagus', 8),
(4, 1, 'Tidak Tahu', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbljawabsoal`
--

CREATE TABLE IF NOT EXISTS `tbljawabsoal` (
  `id_jawaban` int(10) NOT NULL AUTO_INCREMENT,
  `id_soal` int(10) NOT NULL,
  `no_soal` int(10) NOT NULL,
  `jawaban` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `kunci` varchar(5) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_jawaban`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbljawabsoal`
--

INSERT INTO `tbljawabsoal` (`id_jawaban`, `id_soal`, `no_soal`, `jawaban`, `kunci`) VALUES
(1, 1, 1, 'Mouse', 'benar'),
(2, 1, 1, 'Monitor', 'salah'),
(3, 1, 1, 'Printer', 'salah'),
(4, 1, 1, 'Scanner', 'salah'),
(5, 2, 1, 'Random Access Memory', 'benar'),
(6, 2, 1, 'Random Algorithm Management', 'salah'),
(7, 3, 1, 'Adobe Photoshop', 'salah'),
(8, 3, 1, 'Corel Draw', 'benar'),
(9, 4, 1, 'Server', 'benar'),
(10, 4, 1, 'Repeater', 'salah'),
(11, 5, 2, 'UTP', 'benar'),
(12, 5, 2, 'Kabel Power', 'salah');

-- --------------------------------------------------------

--
-- Table structure for table `tblkategori`
--

CREATE TABLE IF NOT EXISTS `tblkategori` (
  `id_kategori` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tblkategori`
--

INSERT INTO `tblkategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Teknologi'),
(2, 'Gadget'),
(3, 'Open Source'),
(4, 'Internet'),
(9, 'Woi Gitu');

-- --------------------------------------------------------

--
-- Table structure for table `tblkategoridownload`
--

CREATE TABLE IF NOT EXISTS `tblkategoridownload` (
  `id_kategori_download` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kategori_download` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori_download`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tblkategoridownload`
--

INSERT INTO `tblkategoridownload` (`id_kategori_download`, `nama_kategori_download`) VALUES
(1, 'Materi Kuliah'),
(2, 'Tugas'),
(3, 'SAP'),
(4, 'Hasil Ujian'),
(6, 'E-Book Linux'),
(7, 'E-Book Pemrograman'),
(8, 'E-Book Multimedia'),
(9, 'E-Book Database'),
(10, 'E-Book Tips-Trik');

-- --------------------------------------------------------

--
-- Table structure for table `tblkategoritutorial`
--

CREATE TABLE IF NOT EXISTS `tblkategoritutorial` (
  `id_kategori_tutorial` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori_tutorial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblkategoritutorial`
--

INSERT INTO `tblkategoritutorial` (`id_kategori_tutorial`, `nama_kategori`) VALUES
(1, 'Pemrograman'),
(2, 'Desain Grafis'),
(3, 'Maintenance Komputer'),
(4, 'Desain Web'),
(5, 'Tips Trik Linux');

-- --------------------------------------------------------

--
-- Table structure for table `tblkomentarberita`
--

CREATE TABLE IF NOT EXISTS `tblkomentarberita` (
  `id_komen_berita` int(3) NOT NULL AUTO_INCREMENT,
  `id_berita` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komentar` tinytext NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  PRIMARY KEY (`id_komen_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tblkomentarberita`
--

INSERT INTO `tblkomentarberita` (`id_komen_berita`, `id_berita`, `nama`, `email`, `komentar`, `tanggal`, `waktu`) VALUES
(1, 27, 'Gede Lumbung', 'gedelumbung@gmail.com', 'Tes 1...2....3\r\nMau nggak yaw???', '2010-08-01', '01:35:18'),
(2, 27, 'Gede Lumbung', 'gedelumbung@gmail.com', 'Ng`tes lagi nie...\r\nBeneran mau gak yaw...\r\nHehehe...', '2010-08-01', '02:08:10'),
(4, 24, 'Suma Wijaya', 'gedelumbung@gmail.com', 'Wah, makin hebat aja nie Youtube...\nMudah-mudahan bisa jadi situs sharing video terlengkap...', '0000-00-00', '00:00:00'),
(9, 26, 'Suma Wijaya', 'gedelumbung@gmail.com', 'Makin keren aja nie XBOX 360...\nTapi tetep aja ntar bisa dijebol lagi sama hacker2, kyk kasus PS3 yang katanya gak bisa mainin game bajakan.. :))', '0000-00-00', '00:00:00'),
(10, 21, 'Lumbung', 'gedelumbung@gmail.com', 'Emang kalo udah ngomongin Apple, pasti semua bersifat egois...\nSama tuh kayak om Steve Jobs, si empunya Apple yang arogan...', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE IF NOT EXISTS `tbllogin` (
  `username` varchar(100) NOT NULL,
  `psw` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `idlink` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`username`, `psw`, `nama`, `status`, `idlink`) VALUES
('1106000001', '*397994E7A1DF13EB2088F34E014F880580FDBDCE', 'Abdul Ridwan', 'Mahasiswa', '1106000001'),
('1106000002', '*1D63704910678285E8FECE35591E028354287506', 'Bayu Pandu Wibisono', 'Mahasiswa', '1106000002'),
('1106000003', '*D08D74310806FB48BBD2E455032D598A9758ABC5', 'Daniel Didiek HS', 'Mahasiswa', '1106000003'),
('1106000004', '*32B4B854FA20B0A748AA55EB7A5DB24D18A04B1C', 'Dina Ratnasari', 'Mahasiswa', '1106000004'),
('1106000005', '*933CC64F742D1C0EC1633CE581F67C5ABBA2D9EF', 'Dodiek Adianto', 'Mahasiswa', '1106000005'),
('1106000006', '*922D4155036C58CF7F2EE8798A9D0D93EB417450', 'Dwi Wahyu Dian Savitri', 'Mahasiswa', '1106000006'),
('1106000007', '*0D753B693944F5B3EF375A18530828C93CB87D4C', 'Dzaki', 'Mahasiswa', '1106000007'),
('1106000008', '*C789C9712355564D92FB2AA5CE7BC523061DE69A', 'Eko Setiyono', 'Mahasiswa', '1106000008'),
('1106000009', '*FF5C127E9B02D2575CD39A1388B7EC2565D4F735', 'Etik Kus Endang', 'Mahasiswa', '1106000009'),
('1106000010', '*CB68C033478B08F06C9E9909EF8CD4E91B667742', 'Eva Zulfiayah Manshur', 'Mahasiswa', '1106000010'),
('1106000011', '*0C6A6A7EFA8E5DCA9F43E38F628741A887604DD1', 'Hairul Waritsin', 'Mahasiswa', '1106000011'),
('1106000012', '*A94EF36B4930261566BF93E3AB8174914D95D782', 'Hari Yanto', 'Mahasiswa', '1106000012'),
('1106000013', '*DC89CA0C5B1BD7364BFF6C0FC2EBDE3109F5B804', 'Hariyanto', 'Mahasiswa', '1106000013'),
('1106000014', '*FC0303891B69BDBD74BCFD58D67666A1A3D22702', 'Haykal', 'Mahasiswa', '1106000014'),
('1106000015', '*64DD7F3744F56169173B09E5997EF138ADD53112', 'Yayuk Sri Rahayu', 'Mahasiswa', '1106000015'),
('1106000016', '*B56EC2B77E082F23D6BC6154175430B5B32E8C76', 'Istupik', 'Mahasiswa', '1106000016'),
('1106000017', '*5A6C911E7C3E55B40E6CE5C143D0E6A8D4B9B07B', 'Ivan Rachmawan', 'Mahasiswa', '1106000017'),
('1106000018', '*A518B0B90704EF4B21186287A84008F711B8146B', 'Lilik Wahyuni', 'Mahasiswa', '1106000018'),
('1106000019', '*CE0E707291F18D39445D13B4AA0BAEDE889B0470', 'Mauris Hidayatur Rochman', 'Mahasiswa', '1106000019'),
('1106000020', '*1332B5A3F88ECC57911E2974A4953E11149A4BDE', 'Purbo Cahyono', 'Mahasiswa', '1106000020'),
('1106000021', '*9A3A812680A33751D817421D89E791A8A8D12C63', 'Riza Faishol', 'Mahasiswa', '1106000021'),
('1106000022', '*64D64060C9B008F3FB6F7FAAE4892508F99976E9', 'Rizal Kurnia Vitalis', 'Mahasiswa', '1106000022'),
('1106000023', '*746EFC6739F6ADE462085EB3407881A1D5118B56', 'Rizka Taurina Rachmawati', 'Mahasiswa', '1106000023'),
('1106000024', '*B3257BE5A0712EA06E55E0260C8D658CF1F0C729', 'Sadikin', 'Mahasiswa', '1106000024'),
('1106000025', '*1AAFB62E7E65BEE7AEC842BD7323C8FF3F17AE66', 'Solehatin', 'Mahasiswa', '1106000025'),
('1106000026', '*D69D01F0F8F8E3FA6D76838EED0F119ED4216622', 'Sunarto', 'Mahasiswa', '1106000026'),
('1106000027', '*B56CD9C3989A81518ACB1135C047B729CAA390D7', 'Syaihul Bahri', 'Mahasiswa', '1106000027'),
('1106000028', '*6E2C2618EF5A5A1FA6D1E8F904D47B56A27F102D', 'Taufik Saleh', 'Mahasiswa', '1106000028'),
('1106000029', '*CF6AB4CAAEA12C398B11A54E163B1CEBE9CDFA19', 'Tri Cipto Handoko', 'Mahasiswa', '1106000029'),
('1106000030', '*C794D8CCD0DFF21B56AF159503F78CAB93588915', 'Lhody Yulianto', 'Mahasiswa', '1106000030'),
('1106000031', '*FF12F56126E7F9F4A9BBC530E96A666C7F98A209', 'Djuniharto', 'Mahasiswa', '1106000031'),
('1106000600', '*D5DD1C6A55B7A5D218E0A8880A9758179F6E0582', 'Junaidi', 'Mahasiswa', '1106000600'),
('1106100032', '*48FF3F4BF53325735D9752EF672F6E6BEB6775EB', 'Agus Sofyan Hadi', 'Mahasiswa', '1106100032'),
('1106100033', '*4F61CEB7F18FB1EBEC46F9461EFA464E7FDF8BFB', 'Ahmad Ayatulloh Isa', 'Mahasiswa', '1106100033'),
('1106100035', '*BE85EA892AE5746473B7CF2CBCE91382F1DF1AE9', 'Astantri Andyka W.', 'Mahasiswa', '1106100035'),
('1106100036', '*E3056A4534506463A00B83B9DBD8F6277F849DAF', 'Bayu Surya Novita Putra', 'Mahasiswa', '1106100036'),
('1106100037', '*3BE96DF023A59AF9EF415AE7DF97AF5B59C19A65', 'Brighta Stareast', 'Mahasiswa', '1106100037'),
('1106100038', '*E50F449B566071173FA958292512E2D2C6D14BDC', 'Camilia Siska', 'Mahasiswa', '1106100038'),
('1106100039', '*5D1FEADF922FD5CFE657D6F42FCD04EDF7B2667A', 'Chairul Anam', 'Mahasiswa', '1106100039'),
('1106100040', '*810F6384F6227ED7E4AF74EF3C2B3604480FD852', 'Chandra Siswa', 'Mahasiswa', '1106100040'),
('1106100041', '*AD7FD019140D37B51925194B3F14C1485C737755', 'Dewi Wijayanti', 'Mahasiswa', '1106100041'),
('1106100042', '*2CF651E43929606FDC397789684B55D8D588CE3F', 'Dwi Handayani', 'Mahasiswa', '1106100042'),
('1106100043', '*DA4DEBD8752C7BCB74E25A3E78AFADF349D0EC90', 'Dyah Kumala Dewi', 'Mahasiswa', '1106100043'),
('1106100044', '*E3DDDA3E79286813F4912E24469CB2BEB3E5F217', 'Erlita Novika Retnowati', 'Mahasiswa', '1106100044'),
('1106100045', '*763492E9B97B53E0FA3CACD4A610C0C98787A6EF', 'Erwin Kurniawan', 'Mahasiswa', '1106100045'),
('1106100046', '*ED48FB33E03FE4CEAD1AC5023BFF48F122741A12', 'Firda Ulfiana', 'Mahasiswa', '1106100046'),
('1106100047', '*D62996C3788F8D120D59D290E542E4590FB15B1F', 'Hari Kurniawan', 'Mahasiswa', '1106100047'),
('1106100048', '*C78796E992777F986CE961ED474C24CA28A0CEAD', 'Hary Sutanto', 'Mahasiswa', '1106100048'),
('1106100049', '*0DB4CA98ED99F7E8EEC83371F3ABC72C02193556', 'Haryono Nusaputra P.', 'Mahasiswa', '1106100049'),
('1106100050', '*FE86E175908665BE864888BE6A688A7B894D8148', 'Hidayatul Mursidi', 'Mahasiswa', '1106100050'),
('1106100051', '*979AFD7BE6276A4CE9C2F17310AFADA20B3AEB1C', 'I Wayan Arnata Yasa', 'Mahasiswa', '1106100051'),
('1106100052', '*2E5D8B37F5F9348C96A9DE0F8FA2D4C1BB41422F', 'I''in Indrawasih R.', 'Mahasiswa', '1106100052'),
('1106100053', '*E951AA917F63DD716AC885FEB84BF87F8E7E9945', 'Imam Lutfiadi', 'Mahasiswa', '1106100053'),
('1106100055', '*6E2BC29078932CF2624C116D4C192815171FB1C2', 'Imam Muslim', 'Mahasiswa', '1106100055'),
('1106100056', '*92731BEB7E3D82C2A650BADDA62D60D5A5207504', 'Indah Kusumaningtyas', 'Mahasiswa', '1106100056'),
('1106100057', '*090FB88F07039B6E665A0698E81D6C7EC40AA7A2', 'Irma Agustina Zulfa', 'Mahasiswa', '1106100057'),
('1106100058', '*EB0C95B798BFC3A82588CBB95773B33D1993AF4C', 'Istianah', 'Mahasiswa', '1106100058'),
('1106100060', '*67931F98BD409AD25A3C91A417BFE596432CDB0B', 'Maya Masita Rosalina', 'Mahasiswa', '1106100060'),
('1106100061', '*D2E2D15DDE9D4E36642802E75CAE0C7DDD1EBC50', 'Meydiarno', 'Mahasiswa', '1106100061'),
('1106100062', '*1BF0D199A6ABB4C20C00BAD41072F33415336C70', 'Misyati', 'Mahasiswa', '1106100062'),
('1106100063', '*0F5A4879B28A30DA7CB56B12A4DDAA1B1DE0EE18', 'Mohammad Afandi', 'Mahasiswa', '1106100063'),
('1106100064', '*6565FD4CF593BCE323386089C69DAC96FF276BF6', 'Mohammad Sukman Hadi', 'Mahasiswa', '1106100064'),
('1106100065', '*164C3D610A695FE6419226A87DA9F62A582B19D1', 'Muhammad Furqon', 'Mahasiswa', '1106100065'),
('1106100067', '*6FA1770BDDB75AE2F136FDAEF67D97DEB4462251', 'Novrida Mafirungkas', 'Mahasiswa', '1106100067'),
('1106100068', '*52620A86B4402A3B185917A23C1AD1F9F89FED7B', 'Nur Hadi', 'Mahasiswa', '1106100068'),
('1106100069', '*AF8B056BBAAFBE190C21EE60CCB39C8C81C145D8', 'Nuri Tristanti', 'Mahasiswa', '1106100069'),
('1106100070', '*416A0EF1B6F90227AA372823D07981B30CB34434', 'Nurul Kholilah', 'Mahasiswa', '1106100070'),
('1106100071', '*6E8C1FB990D95AA69BCF45D40F7800904DFED865', 'Putu Surya Atmaja Bukian', 'Mahasiswa', '1106100071'),
('1106100072', '*02B2B9B45F66EF885741476FE4736A1B471EB183', 'Ratih Ramanita', 'Mahasiswa', '1106100072'),
('1106100073', '*E5E9221D4DDBFB0282659EE075272CEF2E7D6D07', 'Rhandy Haris Rahmat', 'Mahasiswa', '1106100073'),
('1106100074', '*A567DCC9F44438ED51D13F5F263871737FB91131', 'Samsul Arifin', 'Mahasiswa', '1106100074'),
('1106100075', '*A9849AB3C84EB6BA7A13F9BF169B0961E5391F85', 'Sandy Pramono', 'Mahasiswa', '1106100075'),
('1106100076', '*1DC4387CAA670D4D2C195365B5495731421EE567', 'Sugiyarti', 'Mahasiswa', '1106100076'),
('1106100077', '*81D0F2722BB135A531DEA221B1331DC1B55F12D0', 'Ulva Azizah', 'Mahasiswa', '1106100077'),
('1106100078', '*40FDD917155047EC1765CEDD2744E8DBF6417A07', 'Ziaul Aulia Fauzi', 'Mahasiswa', '1106100078'),
('1106100079', '*BA52E8CEBF5096BD9272625973DDB98E4ED68976', 'Kikih Okania', 'Mahasiswa', '1106100079'),
('1106100080', '*5679E4CD7CF68279D9E18FFC6603E11ACD143756', 'Gilang Indra Purnama', 'Mahasiswa', '1106100080'),
('1106100081', '*DE528CEFDD80BE8C5370A131DDC23823A937A9AC', 'Herman Hadi', 'Mahasiswa', '1106100081'),
('1106100082', '*7E478E97CBCE0266D7B495D04085B7987FAC3580', 'Martha Dany Esa', 'Mahasiswa', '1106100082'),
('1106100083', '*98F172B9F40DB3A3AE316A9926808D8095FB85C2', 'Alfiyan Tino', 'Mahasiswa', '1106100083'),
('1107000168', '*138BA104EB56362795A3BCA82F09418FA7B22BBD', 'Khairul Fajar', 'Mahasiswa', '1107000168'),
('1107000169', '*35E617872DD694A432058F29A314558454EEFB3F', 'Yosi Septianto', 'Mahasiswa', '1107000169'),
('1107000170', '*4AA151E485968BFD0205985A228F2B366B29BB72', 'Dinal Umar', 'Mahasiswa', '1107000170'),
('1107000171', '*EA27F1B7AE0DA27A38C22929CC3DD72DB37783EF', 'Sony Panca Budiarto', 'Mahasiswa', '1107000171'),
('1107000172', '*974FBFCE74A3AFFE22E7573BFEC22FBF8161328C', 'Ida Royani', 'Mahasiswa', '1107000172'),
('1107000173', '*28ACACCBF75EAB605E4D702A59C1E2358AB60B04', 'Muhammad Masud Zain', 'Mahasiswa', '1107000173'),
('1107000174', '*5810F78EBE99770D9DF15DDEEA49A7B9412053B3', 'Imam Syafii', 'Mahasiswa', '1107000174'),
('1107000175', '*653BA50D53806C0DFA960C84D135878F5AFE9C42', 'Muhammad Sauqi', 'Mahasiswa', '1107000175'),
('1107000176', '*B7144879A196E0FE175721F57DFF56C83CC089DB', 'Achmad Islahi', 'Mahasiswa', '1107000176'),
('1107000177', '*B5954FE68E43726B11A2673C3B20978411E2195E', 'Hari Yanto', 'Mahasiswa', '1107000177'),
('1107000178', '*673E2EA2F992A800354B6E363A69EADE60DBCB12', 'Yudi Heri Yulianto', 'Mahasiswa', '1107000178'),
('1107000179', '*AD94736740B07CFA0D4C01C474FC1138333E9D9E', 'Chairul Anam', 'Mahasiswa', '1107000179'),
('1107000180', '*EBD814EA685A8F2BDEB5C5FFADCFA325F459221F', 'Dian Aries Firduasi', 'Mahasiswa', '1107000180'),
('1107000181', '*F438574E4D2217E49DF1D33B5E0338F5945A5AF7', 'Rohmat', 'Mahasiswa', '1107000181'),
('1107000182', '*03A76B2C7929B23BB0D12A80274AAD716E1F36F1', 'Djuniharto', 'Mahasiswa', '1107000182'),
('1107000183', '*B8AB8D3EA6D26E5195BED790271DF957BBA0BE96', 'Rudi Hartono', 'Mahasiswa', '1107000183'),
('1107000184', '*28A5E6B82AE0AEAA7B6C4DEB455624CEA4A3DCED', 'Prayogi Adinoto', 'Mahasiswa', '1107000184'),
('1107000185', '*CA08348F394316E2EAA89ED20D3367589CBCED19', 'Hadi Pranowo', 'Mahasiswa', '1107000185'),
('1107000186', '*5D10C7BA4DB9825A44ED2307BB0C971011DA12BF', 'Yuli Didik', 'Mahasiswa', '1107000186'),
('1107000188', '*1EC31CB956E981D31969528D3DF1DF3E54A7ADF9', 'Ruli Widyatmoko', 'Mahasiswa', '1107000188'),
('1107100084', '*A5E0AE1BC14B41046A7907A8A5CC9DDFE7E5351D', 'Ahmad Ahyar', 'Mahasiswa', '1107100084'),
('1107100085', '*949DAE8D29899D2967AFBDCE96838031324A3E83', 'Abdul Haris Hairu', 'Mahasiswa', '1107100085'),
('1107100086', '*23271CE77353BD2826B24BCCEB27386CEEEF2C8D', 'Rachmat Amienullah', 'Mahasiswa', '1107100086'),
('1107100087', '*CDF390568B8E8F61E7D01D782C50733AFB42FE17', 'Anwar Sadat', 'Mahasiswa', '1107100087'),
('1107100088', '*791682354A06DAE4AC16BE06BBAB45A2B98AD411', 'Ali Sadikin', 'Mahasiswa', '1107100088'),
('1107100089', '*63C7CD837DF272ACF969496B1A87012703AFEC45', 'Mohamad Arief', 'Mahasiswa', '1107100089'),
('1107100090', '*A166B8703391BB21B9BB70659CB170124BCA0B34', 'Wahyu Adi Kartika', 'Mahasiswa', '1107100090'),
('1107100091', '*E799C512AD0289D4BF048626C83CBDB27F042DA7', 'Dinul Maulidin', 'Mahasiswa', '1107100091'),
('1107100092', '*E96D6D458661CBBF90C2BDCAF29218DC61772664', 'Edi Purnomo', 'Mahasiswa', '1107100092'),
('1107100093', '*08BC2D4467A24135FF5DF9C2451BC648C6014697', 'Yuly Anita Rahayu', 'Mahasiswa', '1107100093'),
('1107100094', '*8804D436F2260E2482A2841577922FAC30FC1195', 'Sofiyah', 'Mahasiswa', '1107100094'),
('1107100095', '*5B22B74E0F0A9B0A85B028825BE506333ED83E17', 'Fitroh Kumaladewi Nuraini', 'Mahasiswa', '1107100095'),
('1107100096', '*9E9CC9DC609CA1C3EC5EBABA7D7534EA4CEF9F03', 'Erni Sukmawati', 'Mahasiswa', '1107100096'),
('1107100097', '*8B24979B9BA343F7168F936EECDF80F38A390443', 'Trisna Handoko', 'Mahasiswa', '1107100097'),
('1107100098', '*B4AF8849DDB1808B03A407B79BCF4C4F6E3E5DB4', 'Yudi Kurniawan', 'Mahasiswa', '1107100098'),
('1107100099', '*F40F4D1F6F942502F9ED20735561F2E7EE2F6BA3', 'Nisaa Biruwalidaia Q.', 'Mahasiswa', '1107100099'),
('1107100100', '*634A4122BBE4DE6F6D456E9AB02DAC2ED144B5E8', 'Rini Rosdiati', 'Mahasiswa', '1107100100'),
('1107100101', '*F54429C8FF38E6EAA434D22678CB1E857326A4FA', 'Rio Arisandy', 'Mahasiswa', '1107100101'),
('1107100102', '*E3CE6148B5960CB0033696B73F3931EC361B1C57', 'Franky Parwisa', 'Mahasiswa', '1107100102'),
('1107100103', '*6F238F8B5ECEC3558E1AE9A5A88E9126BACE0634', 'Dewi Agustina', 'Mahasiswa', '1107100103'),
('1107100104', '*CAEEDBB889693BB276182F8675EEB54B432168B7', 'Prayogo Budi Hartono', 'Mahasiswa', '1107100104'),
('1107100105', '*9465A9EC6DAEEB37C1D1574BD51DA4E5972F2846', 'Nicky Garadika', 'Mahasiswa', '1107100105'),
('1107100106', '*B2F8708484EB382B2D62AF932D3D4C54E2146E4C', 'Ilham Wahyudi', 'Mahasiswa', '1107100106'),
('1107100107', '*F6A9E36415D420F50FD37236E3D940704E47B622', 'Slamet Idilfitri', 'Mahasiswa', '1107100107'),
('1107100108', '*6A5F8682835FC292FEAF3DAE4E0D481FED0E19F2', 'Hanim', 'Mahasiswa', '1107100108'),
('1107100109', '*70DBF39B015A37381CC6C2773091E31FCBD9015F', 'Haerul Mufit', 'Mahasiswa', '1107100109'),
('1107100110', '*F274761C13EC092D60AC220A11AAD88BC26A1552', 'Muhammad', 'Mahasiswa', '1107100110'),
('1107100111', '*54A9C8AEB9F245C9BB873A6D19A9F3AF25F55498', 'Andi Soemantoro', 'Mahasiswa', '1107100111'),
('1107100112', '*385451835829D9B85752D1A268DBECCD890B6346', 'Andhika Putra Herl.', 'Mahasiswa', '1107100112'),
('1107100113', '*CC452217BA0F6A6FB963E7E7C809DA1D782AC2CD', 'Aris Ardianto', 'Mahasiswa', '1107100113'),
('1107100114', '*EDEF64098BE2F61A9D81B302609194EAE3197511', 'Lian Bagus Febrianto', 'Mahasiswa', '1107100114'),
('1107100115', '*67FA803CF7699C5372B49F644C0FA86A2D7847AA', 'Dany Eka Fajrian', 'Mahasiswa', '1107100115'),
('1107100116', '*17C9B9B69C47795EB1A5E1EDD018BE941F65926E', 'Danny Sulistiyawan', 'Mahasiswa', '1107100116'),
('1107100117', '*3BBDC2F6020B02087FDA4847DEECC15EFF396253', 'Wanik Solina', 'Mahasiswa', '1107100117'),
('1107100118', '*A472305F47371C98BD4E88258C9DB4F3CD9B704F', 'Teguh Prayitno', 'Mahasiswa', '1107100118'),
('1107100119', '*F2CD6A028947632B20EBBCE101F5A61C502D9FB4', 'Arga Busliananda', 'Mahasiswa', '1107100119'),
('1107100120', '*448EC63D4BC2A66A7751B2FDA6CC7F50CD0752FD', 'Arif Darmawan', 'Mahasiswa', '1107100120'),
('1107100121', '*B471DA6773F38F03C40B0B929388B7FD9D0DC52E', 'Eky Lutfy Permitasari', 'Mahasiswa', '1107100121'),
('1107100122', '*A4FFB47A0D85940D805442005F5EFBB399635C22', 'Andy Kurniawan', 'Mahasiswa', '1107100122'),
('1107100123', '*91DFA47CC7AD8F60CECAFE2FE515731E19B4159B', 'Fuad Ansori', 'Mahasiswa', '1107100123'),
('1107100124', '*164121D65295449CB22E9D18213A2803E0B70A7F', 'Alfan Ardyansyah', 'Mahasiswa', '1107100124'),
('1107100125', '*B0071BED495F1EECD8EDAC25D8E4A47B9F40BF76', 'Imam Bukhori', 'Mahasiswa', '1107100125'),
('1107100126', '*8C4DCFFD59016C4BD80A964C040BE80092D56F88', 'Agus Romdloni', 'Mahasiswa', '1107100126'),
('1107100127', '*BB90CBC0BD3E6F567B8D7F545414FC48199C5089', 'Eko Pujiono', 'Mahasiswa', '1107100127'),
('1107100128', '*91E11F3FD76827817C478EDBD0F9A33559177E85', 'Hendrica Etmi Primarini', 'Mahasiswa', '1107100128'),
('1107100129', '*534CD7952AA6170BF766380826BEC22295D7D2C4', 'Sunarno', 'Mahasiswa', '1107100129'),
('1107100130', '*CB6C60E4EE354C74BABF6B970EF00F167686169D', 'Lailatul Isro`iyyah', 'Mahasiswa', '1107100130'),
('1107100131', '*369450FA147059686699E4B09CDEECE791E23E11', 'Havied Noerdiansyah', 'Mahasiswa', '1107100131'),
('1107100132', '*3283F6308176439A29548D879A073A2D4513B03C', 'Nanang Firman Syah', 'Mahasiswa', '1107100132'),
('1107100133', '*DC28A94F7BDD81CEF904217E25016A611589BA70', 'Ishak Efendi', 'Mahasiswa', '1107100133'),
('1107100134', '*992F17B0D238FE10EFB8F9E4F150E942D515213D', 'Muhamad Romadona M.', 'Mahasiswa', '1107100134'),
('1107100135', '*43C8DAFD412D475BD79B8354EFE1892DBA96A526', 'Yoseph Catur Setiyawan', 'Mahasiswa', '1107100135'),
('1107100136', '*49AFFDA77101EAE5F71248B3EBB28E0C74E5ED76', 'Zaenul Arifin', 'Mahasiswa', '1107100136'),
('1107100137', '*2BED1C2ACBB2F9D73230CF4B7E97811645347709', 'Risca Novi AnggraenY', 'Mahasiswa', '1107100137'),
('1107100138', '*62C63898473E84B1C938395061A85D6F69252505', 'Achmad Arif Solehudin', 'Mahasiswa', '1107100138'),
('1107100139', '*B9809709D87AE5286F33407C07ED2C9DE4DA3417', 'Qirodlotul Imat', 'Mahasiswa', '1107100139'),
('1107100140', '*BBCA688CCE912E16C669D341EB96BF4ED5939A23', 'Martha Fajrin Suci R.', 'Mahasiswa', '1107100140'),
('1107100141', '*42B9247F417F6CEB96153BE9ECCD3E33747601FB', 'Alfian Arief Ermawan', 'Mahasiswa', '1107100141'),
('1107100142', '*554E9EB6DEE6DB8A5C7DE11D4F98A0ACB5C00544', 'Indra Hari Sandi', 'Mahasiswa', '1107100142'),
('1107100143', '*0B4D75B35FAB4F456936492E2221CD3F76C49CE7', 'Mega Putri Rahayu', 'Mahasiswa', '1107100143'),
('1107100144', '*F20B849FEB924FFABFC04E02A54CC231AD003393', 'Endhar Taufani Martyn', 'Mahasiswa', '1107100144'),
('1107100145', '*439BD94852287F80516A82443AC825AEDEACF31B', 'Handoko Saputro', 'Mahasiswa', '1107100145'),
('1107100146', '*0C721849C7584BBA258B31E207528B883D55E7C6', 'Moh. Khamami', 'Mahasiswa', '1107100146'),
('1107100147', '*EA4000A4F971BFDDE84F6559344D933561D4EE59', 'Dinar Putri Permatasari', 'Mahasiswa', '1107100147'),
('1107100148', '*C6506B65B21B3D2294DF9D233E8E62BCF71A8411', 'Indra Fauzi', 'Mahasiswa', '1107100148'),
('1107100149', '*E68414A90DDE441E8EF4B3875B69B52916159D91', 'Surya Arif Bijaksono', 'Mahasiswa', '1107100149'),
('1107100150', '*B3F4816D12AFBE72156B6CC739CFA022523A0D11', 'Widya Agtalia Mariana', 'Mahasiswa', '1107100150'),
('1107100151', '*3D6EBB3812374C70E1F66EC78101A3542717F16F', 'Febriari Priatama', 'Mahasiswa', '1107100151'),
('1107100152', '*2BFBBA351559D5CD928859851B6E62D685A24F4B', 'Dian Puspitasari', 'Mahasiswa', '1107100152'),
('1107100153', '*DEA8CBE7F01C9EBCEE7E7BE04BC585B4D16008AB', 'Rif`an Azmi', 'Mahasiswa', '1107100153'),
('1107100154', '*99991992293F31EE83E76E2D1F1B7AC553CE5354', 'Soni Yudistira', 'Mahasiswa', '1107100154'),
('1107100155', '*EA116EF61326C0947F0684BD62489588E965318B', 'Koimam', 'Mahasiswa', '1107100155'),
('1107100156', '*01F6E8D98C2EC49CFB633CF3A74711F25BA29DD5', 'Ryo Rohman Hidayat', 'Mahasiswa', '1107100156'),
('1107100157', '*20409769F715C696A9109C7B0F6EDE27B25E01E1', 'Chrishendy Danys', 'Mahasiswa', '1107100157'),
('1107100158', '*93003E80C60842590A21AB4DFE02A01C57E4FBE9', 'Rika Wijayanti', 'Mahasiswa', '1107100158'),
('1107100159', '5e41fba32e57e14b', 'Erwin Arifianto', 'Mahasiswa', '1107100159'),
('1107100160', '*583FB34298AF6E347F7F6BA5644D0D692AD8BF2B', 'Debri  Firmansyah', 'Mahasiswa', '1107100160'),
('1107100161', '*8EBAFAD7ED49349DE9C2F631E8AC524CDB7C0E7C', 'Wisudha Haryo P.', 'Mahasiswa', '1107100161'),
('1107100162', '*214F7178D26E7CFC2A950D1F9B1E23E6B535C7A6', 'Ary Eko Prasetyo', 'Mahasiswa', '1107100162'),
('1107100163', '*B437C9C260F267DC1314F991D4A1F7D330817D34', 'Stio Wirawan', 'Mahasiswa', '1107100163'),
('1107100164', '*676A5EE6E14AF481543A57131DB48560861F2005', 'Arvendi Bekti Harjanto', 'Mahasiswa', '1107100164'),
('1107100165', '*88B7DE2CE4CDC81BF848131BDD00BCCA8DA9CE97', 'Andy Bagus Setyawan', 'Mahasiswa', '1107100165'),
('1107100166', '*5FF1A53424BF58D5FD38F9EE764DEE6CDA5B4463', 'Rudi Setiadi', 'Mahasiswa', '1107100166'),
('1107100167', '*F7A7FCA1F51106A3D8CD47ABFD11CB6225A5CDE3', 'Sandhi Pandu Pamungkas', 'Mahasiswa', '1107100167'),
('1108000304', '*C741E21F72380AB5AB0A0730E0B0C1405F9D0180', 'Rahmat Erlambang', 'Mahasiswa', '1108000304'),
('1108000306', '*7AD1340924BAD51DD73EC3414FAE0F180D490667', 'Faruk Alfiyan', 'Mahasiswa', '1108000306'),
('1108000307', '*8EAD9C94E0FC06664A34C641601CEE6B417B111F', 'Sulaibatul Aslamiyah', 'Mahasiswa', '1108000307'),
('1108000308', '*3E82EC613B138557564DE6B939A4CEF94064A460', 'Shohibuddin Humaird', 'Mahasiswa', '1108000308'),
('1108000310', '*896E2C1344A0A5EFCCCB291C235F0FBAD2CCDE26', 'Muh. Helmi Kurniawan', 'Mahasiswa', '1108000310'),
('1108000311', '*71926A83D546EBA1522F459165A4A409D32C5EBB', 'Prasetyo Aji Siswoyo', 'Mahasiswa', '1108000311'),
('1108000312', '*5C05CB168B25683E21B47583DE9840A6D24F9DF9', 'Nur Hayati', 'Mahasiswa', '1108000312'),
('1108000313', '*32631FA3F6D8314B3C1EE5E917A1CFEF0E1B082C', 'Mahdi Abdullah', 'Mahasiswa', '1108000313'),
('1108000316', '*04DDAD5214ED29BA07736DF900C6E5C8EA8F7C91', 'Jefri Yuwanto', 'Mahasiswa', '1108000316'),
('1108000317', '*98B9F2CB0B84D836A677DBEC89B053A9CD18B696', 'Ali Masturi', 'Mahasiswa', '1108000317'),
('1108000318', '*B3717F80FDEA12939BFFAEF87E15A8BFAE006B5D', 'Syaifuddin', 'Mahasiswa', '1108000318'),
('1108000319', '*B758F972A8BAFF0198AAF11DAFD8B3413135E920', 'Syarif Al Fajri', 'Mahasiswa', '1108000319'),
('1108000320', '*BC5685485361A328D0296C6ADB2102EC658F929F', 'Imam Ja`far hadi Purnnama', 'Mahasiswa', '1108000320'),
('1108000321', '*CBE73C27D40BB1DA35301A3A921CB62155EF92D2', 'Ocgik Wahyu Dewanto', 'Mahasiswa', '1108000321'),
('1108000322', '*6B58EF91BEFC172ABB4E2A96A982F3AEFF7C0329', 'Brian Kaldera', 'Mahasiswa', '1108000322'),
('1108100189', '*9754AEC0FA6D2BA9548DCA3E2C33839D995BA6EE', 'Abdul Mujib', 'Mahasiswa', '1108100189'),
('1108100190', '*10A2E8B81739074D61B5A804DFB11979842B7572', 'Achmad Arifka Bakri', 'Mahasiswa', '1108100190'),
('1108100191', '*34521427E34DBD8460B3B5327F4D4A48434DE074', 'Adi Ismanto', 'Mahasiswa', '1108100191'),
('1108100192', '*37359D1A3316F5D7D0CA37C4F72B5DCF22766353', 'Aditya Handoko', 'Mahasiswa', '1108100192'),
('1108100193', '*2AEDAEAEAF2D709B59F13723E9643816D34C926C', 'Agung Widya Pamungkas', 'Mahasiswa', '1108100193'),
('1108100194', '*7A2F9A5B1C30FCFA354E2B705C0E3DD855473383', 'AH Mufid', 'Mahasiswa', '1108100194'),
('1108100195', '*D5B30DA77CD2D09C29F056D09D2B6422D14917A4', 'Ahmad Fikrun Najid', 'Mahasiswa', '1108100195'),
('1108100196', '*6A38613062E26C8679F91F9A4FD3758B7FA0BE8D', 'Anan Purnawan', 'Mahasiswa', '1108100196'),
('1108100197', '*E876FB7B617B127002C47F1831E23A9D44B17FC7', 'Ananda Harditya Pratama', 'Mahasiswa', '1108100197'),
('1108100198', '*15D75DC7139EFB24BD94B93DB14DFE56EB7554AE', 'Andi Eka Muliya', 'Mahasiswa', '1108100198'),
('1108100199', '*2933172D9E8BB97A2CB6AC2BA2BC8635FB5E9999', 'Andika Sabastian Alam ', 'Mahasiswa', '1108100199'),
('1108100200', '*C10AB41A6113B8339E0892A01FD3F6D55C458397', 'Angga Riyan Saputra', 'Mahasiswa', '1108100200'),
('1108100201', '*01FAB438A3136640C9B3CE8917248D6B0FDEF16F', 'Anita Widiawati', 'Mahasiswa', '1108100201'),
('1108100202', '*808F5231021A48957DF323386EA45B5034792FD4', 'Ari Noviyanto', 'Mahasiswa', '1108100202'),
('1108100203', '*81F3A121D8F6091AB346A921E33DDD0FC61F9A51', 'Arif Hadi Sumitro', 'Mahasiswa', '1108100203'),
('1108100204', '*B9CB39E33148AE9BFB4DB4CF20A0C7575D2AE944', 'Arif Nurchayono', 'Mahasiswa', '1108100204'),
('1108100205', '*05BDE29771B5DCCFD6BF1B4C458105B73EB1249D', 'Asep Agus Isnaini', 'Mahasiswa', '1108100205'),
('1108100206', '*1431523F29142C0C1F0E4421D5C1354C2C647879', 'Avecenna Johan PK', 'Mahasiswa', '1108100206'),
('1108100207', '*0B6E229855EF6150630B16FA01CEA78C9D46A58E', 'Ayunda Eka Puspitasari', 'Mahasiswa', '1108100207'),
('1108100208', '*50F5F77E21A91EF0F9C8DC65A19B7059F235530E', 'Bambang Kusno Prastyo', 'Mahasiswa', '1108100208'),
('1108100209', '*D57079168E47672DE681EEEF65D3D90D353FBD3C', 'Binti Fajriatis Sujud', 'Mahasiswa', '1108100209'),
('1108100210', '*F4DFE17268DED1D93C53C4FDC5884ECA4A81E4A2', 'Cucu Dwi Pratiwi', 'Mahasiswa', '1108100210'),
('1108100211', '*26E70B9AA2EFE0B3FDE24335AFB47DAC622CC522', 'Didik Suhartadi', 'Mahasiswa', '1108100211'),
('1108100212', '*C2DC7629455EE2DA04223231409E9D64566851F1', 'Dwi Sinta', 'Mahasiswa', '1108100212'),
('1108100213', '*5CE5F3A62696202D1D0A1F62DFF7A9C342C09D79', 'Dyah Marta Rachmawati', 'Mahasiswa', '1108100213'),
('1108100214', '*AB906132D86D474500224C5E45116009285B4818', 'Dyah Pravita Sari', 'Mahasiswa', '1108100214'),
('1108100215', '*73EABD8E808049B29A73A9527C9737247CFCB537', 'Eko Adi Saputro', 'Mahasiswa', '1108100215'),
('1108100216', '*CACCE2E83302DB98ED62D795016142C49DF648C5', 'Eko Aditia Putra', 'Mahasiswa', '1108100216'),
('1108100217', '*31A6DC622759CF55FCB19AC66D587406FB03BCA6', 'Endang Suwarni', 'Mahasiswa', '1108100217'),
('1108100218', '*08532E733F961E92353E7F7E4F9A960F1E45F597', 'Erlina Puspalasari', 'Mahasiswa', '1108100218'),
('1108100219', '*020277C06F5787F9E0779360523CDCC4B7EDC78F', 'Erwin Eka Permana', 'Mahasiswa', '1108100219'),
('1108100220', '*1F082B1F279EAD248B6CF8EEF0025282F7BD86E6', 'Farid Rahman Fauzi', 'Mahasiswa', '1108100220'),
('1108100221', '*1B771290E547D5BDDCBFDA2747649F43391957DF', 'Fathul Qorib', 'Mahasiswa', '1108100221'),
('1108100222', '*0F90B129A9092E914192BADB5A79046F34ADA9EC', 'Febry Abriantoro', 'Mahasiswa', '1108100222'),
('1108100223', '*D55ED534E4D20CB54D4E3D565F5C402566C15016', 'Febri Hari Widiyanto', 'Mahasiswa', '1108100223'),
('1108100224', '*9B3D48BD419AB448F6BEC484C9E5301A9470B32D', 'Gede Maria Adnyana', 'Mahasiswa', '1108100224'),
('1108100225', '*95EDC3E1825E9F42D01865B1C90280965F9A79E5', 'Haris Sunandar', 'Mahasiswa', '1108100225'),
('1108100226', '*C9AFAD381CB7D1E0D4643A24E493C93561BA47BF', 'Hasim As`ari', 'Mahasiswa', '1108100226'),
('1108100227', '*B2010D9BE2FF8BD8ACC4113FC1F494BFB2BD47C6', 'Heni Jamalia', 'Mahasiswa', '1108100227'),
('1108100228', '*BE17F6D747735B53A79EED4F07ACB92A36FC61A2', 'Heri Kuswanto', 'Mahasiswa', '1108100228'),
('1108100229', '*DEF56C9BFA28FD573B0E09063E5C73986EBEBB1D', 'Hermawan', 'Mahasiswa', '1108100229'),
('1108100230', '*764EE0D31D4EC2729789F18AF0B9AE800A5FD108', 'Hilmi Yarisu Ardan', 'Mahasiswa', '1108100230'),
('1108100231', '*890750C479F245D1C173620C0FF136645CCC3223', 'Huriatul Amaliyah', 'Mahasiswa', '1108100231'),
('1108100232', '*82E274D2318345B6D897E2AA90BE2F1B32CC1E5B', 'Ihtiar Heriyo', 'Mahasiswa', '1108100232'),
('1108100233', '*FB90E29FFEDFED75FCFF5B4C792180734A01CFB7', 'Ika Evi Kurnia', 'Mahasiswa', '1108100233'),
('1108100234', '*F4D96540030D8416FDAC33DFC82D1A7BE517CCDF', 'Ika Niti Sandra ', 'Mahasiswa', '1108100234'),
('1108100235', '*6B21DB0D8108D4D3CE197FBF45EDC7F64AB08ACE', 'Arini Faradiyani', 'Mahasiswa', '1108100235'),
('1108100236', '*F1DCC579EC001296825EF797B0A43F4143C026A8', 'Isnaini', 'Mahasiswa', '1108100236'),
('1108100237', '*D83F381D248203380E0A455651A01795A40786FC', 'Jannatul Virdaus', 'Mahasiswa', '1108100237'),
('1108100238', '*2D19BCE46FF3C4D3F744ACC6B8191E6D9EAB5AFB', 'Joko Tri Sutrisno PMIP', 'Mahasiswa', '1108100238'),
('1108100239', '*D6AB9AE6F476431A95F3B48E7D55B6336BB4E07F', 'Kanti Kristini', 'Mahasiswa', '1108100239'),
('1108100240', '*72A266FF0B77ADF99FD88A30611BD960174D5616', 'Lailik', 'Mahasiswa', '1108100240'),
('1108100241', '*B5B7281D152C4248E6B21FAE0F065D5887E854E6', 'M Nasirin', 'Mahasiswa', '1108100241'),
('1108100242', '*089173DF9F1E23C9862C52F352A184FD291C9E6A', 'Maman Sutiko', 'Mahasiswa', '1108100242'),
('1108100243', '*FB63F27471482A09608018618666F4D123E9395C', 'Master Habibi Roin', 'Mahasiswa', '1108100243'),
('1108100244', '*C5647AB3A7FC5EE6E6AD12ECCC1D5E7D6B8B5999', 'Maulinda Kustiara', 'Mahasiswa', '1108100244'),
('1108100245', '*75F0958539365E0426B7A61CC2DE175F22838203', 'Moch Mujahidin', 'Mahasiswa', '1108100245'),
('1108100246', '*675847125955E3DE0DE64C2A2E3EBE9C9B63D961', 'Mohammad Arifin', 'Mahasiswa', '1108100246'),
('1108100247', '*557D565512631932CE50A8DAAB1FA004ECB10191', 'Mohammad Hasan', 'Mahasiswa', '1108100247'),
('1108100248', '*2746F97286E5A308F2EB51F9CE33EA97CA9F9198', 'Mohammad Aulia Rahman', 'Mahasiswa', '1108100248'),
('1108100249', '*69CC3D25F0089A63B98708F9021092DCF958D56F', 'Muhammad Fikri Mustaqim', 'Mahasiswa', '1108100249'),
('1108100250', '*D6B5BF7FBD4EB17957F9F4F7ED1249EC511B3A0E', 'Muhammad Irsyad R', 'Mahasiswa', '1108100250'),
('1108100251', '*FB4530044718AA8368CDB5B74B7C75A9931D528C', 'Mulyono', 'Mahasiswa', '1108100251'),
('1108100252', '*1BE8B4FE8739DDDCD0CCA6E05B66A87B29B8F3A7', 'Muslih', 'Mahasiswa', '1108100252'),
('1108100253', '*A02F30C7FFBD978E21985DE4DB0164CD97366430', 'Nasrul Umam', 'Mahasiswa', '1108100253'),
('1108100254', '*41AD954AE9E4DCD4DD586DAF49C6895DA880495E', 'Ninuk Milia Wulandari', 'Mahasiswa', '1108100254'),
('1108100255', '*EC777BC540186723AAB079FBF7CC4C4BC21169A1', 'Nur Zakia Mughoffar', 'Mahasiswa', '1108100255'),
('1108100256', '*AD49C7979C08F497D29526CABDFD8968DF848B50', 'Obie Septiando', 'Mahasiswa', '1108100256'),
('1108100257', '*ECB53581F4C9F2EB1D6F8C7B9EA3511A70CEC4E7', 'Kutiyono', 'Mahasiswa', '1108100257'),
('1108100258', '*ACC3342E1598588A2566EE29E587352FC26EE182', 'Rangga Febrianto', 'Mahasiswa', '1108100258'),
('1108100259', '*EBC97DEF43328A38845D8FB9C272DD2C6ACA1446', 'Ria Yulika Lestari', 'Mahasiswa', '1108100259'),
('1108100260', '*E17869D8B47E082AA7C90BA46FDDA948D0D1E2C9', 'Riqy Fikri', 'Mahasiswa', '1108100260'),
('1108100261', '*11602580F8D5F197914A462DBE886971515CC7E5', 'Ririn Kristiantini', 'Mahasiswa', '1108100261'),
('1108100262', '*5BD0C305FF4CAB838453E0C612ECF05239BC3E18', 'Rizal Ermawan', 'Mahasiswa', '1108100262'),
('1108100263', '*87540942A2426F1C9F4088C11F766B25D5C8802B', 'Rizka Chandra Prayoga', 'Mahasiswa', '1108100263'),
('1108100264', '*4483CD6317416C22553843531CC3E3F2E1957423', 'Riszi Ardiansyah Putranda', 'Mahasiswa', '1108100264'),
('1108100265', '*8B06DD253A89535B435FCC5A407531A03F713146', 'Rudi Hartono', 'Mahasiswa', '1108100265'),
('1108100266', '*D58E16985684257215F3AD86B94387311FDCBCBA', 'Sahara Thursina', 'Mahasiswa', '1108100266'),
('1108100267', '*F72F69CC8B76465B8AE23624C0EB91FBE8861150', 'Saiful Anwar', 'Mahasiswa', '1108100267'),
('1108100268', '*8F15F0F4BA81FF30915C3006660FABF8C6FC0DF9', 'Saifulloh', 'Mahasiswa', '1108100268'),
('1108100269', '*ACF835EE3D83A0464017D990714273DA1C68E31A', 'Santi Handayani', 'Mahasiswa', '1108100269'),
('1108100270', '*4D31ECEE8E1E697692482F46D00E837491BDEE7B', 'Septa Handayani Pratama', 'Mahasiswa', '1108100270'),
('1108100271', '*9FADDD3E92355375A38588ADD22B3B934E0EE62D', 'Silvi Fitria Nur Arifki', 'Mahasiswa', '1108100271'),
('1108100272', '*BD2744D6464B80135A19970562CA582F2A73F6C3', 'Siti Mas`ulah', 'Mahasiswa', '1108100272'),
('1108100273', '*C954FD51B699765CA0BDF5290F8B208D459BFA8F', 'Slamet Hariyadi', 'Mahasiswa', '1108100273'),
('1108100274', '*B21ABB4A36061DF2117AFFACFD32E92F756AAC12', 'Sugeng Wijaya', 'Mahasiswa', '1108100274'),
('1108100275', '*1B247C7E52DF8543008481A7269E0D8505405EB3', 'Sukma Hanggara', 'Mahasiswa', '1108100275'),
('1108100276', '*EC16764597086D8F776CF126E8949728B767CA48', 'Sunaryono', 'Mahasiswa', '1108100276'),
('1108100277', '*D53A8089642605FFCFD9A0414C5DC7589F533225', 'Suryadi', 'Mahasiswa', '1108100277'),
('1108100278', '*72DD9E1AC8686FA0C30581E41D6A609EB499404E', 'Suwanto', 'Mahasiswa', '1108100278'),
('1108100279', '*623F41C116A201E2DFB45A7A9E371C96EDEBC0B5', 'Suwarni Aswad', 'Mahasiswa', '1108100279'),
('1108100280', '*C88F763B024394CD82EDCC8859C9D937250B711E', 'Tri Prasetyo A', 'Mahasiswa', '1108100280'),
('1108100281', '*9C7FA7F56B41529E85B289C1F9D21F84F6B4AEA4', 'Wahyu Rio Indrawan', 'Mahasiswa', '1108100281'),
('1108100282', '*CEC5ACAE1113A12E2B5DE04B7311A3CC428CD7D9', 'Yuli Wafiroh', 'Mahasiswa', '1108100282'),
('1108100283', '*8C27309D2B71EFF13D1FDB563B8701313DD9D7C8', 'Yusuf Efendi', 'Mahasiswa', '1108100283'),
('1108100284', '*ED3AD2BB8531932B5A504C9750C5B0AEF57B3484', 'Zainurida', 'Mahasiswa', '1108100284'),
('1108100285', '*8DDCEA208A3EC4F047C74032329E7B36F30E2039', 'Hadi Purnomo', 'Mahasiswa', '1108100285'),
('1108100286', '*AE129F20D46709AC2AC88C7703392E1754588AE4', 'Dhimas F', 'Mahasiswa', '1108100286'),
('1108100287', '*92935A8711847274C83031618F17B53CC0854C66', 'Agus Sucipto', 'Mahasiswa', '1108100287'),
('1108100288', '*E01457F4EBB71FDC9239E788C3F81BF07924EC22', 'Silvia Dwi Harmeidiawati', 'Mahasiswa', '1108100288'),
('1108100289', '*32C8D44A5C1955CB010204EC516D74ADEB3455C3', 'Rifqi Andriayansyah', 'Mahasiswa', '1108100289'),
('1108100290', '*BFA9802F3F42E0366C194128F1887B8BA6640711', 'Khotmil Yanti', 'Mahasiswa', '1108100290'),
('1108100291', '*C93458230DBEE5CBF1D1F1B192160A6B24FB72DB', 'Adi Kurniawan', 'Mahasiswa', '1108100291'),
('1108100292', '*E96C7D2F207842E070BBF5178423E4AC13377A5B', 'Johan Wijaya', 'Mahasiswa', '1108100292'),
('1108100293', '*D70EA0B105ECCEE7440B0DDF489353C1216CEC9C', 'Anna Arini', 'Mahasiswa', '1108100293'),
('1108100294', '*CB6664C2494B2EC86586BBD13DC0EA094B15D559', 'Nita Yuli Indra', 'Mahasiswa', '1108100294'),
('1108100295', '*EF937976EB4736F79CA925B657A5ADAF842B74DD', 'M Supriyono', 'Mahasiswa', '1108100295'),
('1108100296', '*4CF5C3DF0DB13278795724445EBE9516D19712AD', 'Syaifuddin Yuliansyah', 'Mahasiswa', '1108100296'),
('1108100297', '*09C81D4EC3DBBFE7C1D134CD7FBB7160861F4523', 'Dherry Arman Rentalam', 'Mahasiswa', '1108100297'),
('1108100298', '*3380A92E1C5FA83124CE4F37F4E390E8E181971E', 'Tri Apri Susanto', 'Mahasiswa', '1108100298'),
('1108100299', '*547B2EC3F2E01B1499B16A3887DA398A608E145D', 'Mustain', 'Mahasiswa', '1108100299'),
('1108100300', '*260FA82CB66CA001465C355E07634AA6F2A8ECCA', 'M. Ali Chofur Rochim', 'Mahasiswa', '1108100300'),
('1108100301', '*5341FE4512EDBE47C03A1EC69E6662207B4DB87C', 'Alpan Akbar', 'Mahasiswa', '1108100301'),
('1108100302', '*E18740B0F64FBB73A94073E45BAC26FAA7E194AA', 'Arif Fadilah', 'Mahasiswa', '1108100302'),
('1108100303', '*E4382117FCBC9F43C469F9484F1A3F61D8090259', 'Aditya Permana Putra ', 'Mahasiswa', '1108100303'),
('1108100304', '*2932DEA75515B26871EBF07F48BD6735AF928E14', 'Wisnu Wardana', 'Mahasiswa', '1108100304'),
('1109000329', '*1CB24750A6C2328FEB36B67705FD6059CBFACEBE', 'Ninik Reniyanti', 'Mahasiswa', '1109000329'),
('1109000333', '*DAB4BE63AC90F4FABE6323C4BD7369E9BFE1878A', 'Khairul Anwar', 'Mahasiswa', '1109000333'),
('1109000334', '*907B7F47C6ECD7C7F7A6E07FE5EE4FF630F45601', 'Ahmad Hermanto', 'Mahasiswa', '1109000334'),
('1109000335', '*1846978BF8C153DE8BFAE57B9E6E51219FB883C3', 'Pieter Yulivianou', 'Mahasiswa', '1109000335'),
('1109000336', '*B667661F166C9EFA628EF926CAD1FF7F9A6D42D1', 'Taufik Walhidayat', 'Mahasiswa', '1109000336'),
('1109000337', '*BCBFFE3CA8F51C0D5D97AE99FAB4C37CA3526AEF', 'Lyly Nur Mustoffa Muslich', 'Mahasiswa', '1109000337'),
('1109000338', '*55E0283F482CB9066211DA72370357E5E08480B2', 'Andik Kurniawan', 'Mahasiswa', '1109000338'),
('1109000339', '*938C52984C8926971B30AF677317AAF5BF838281', 'Dhana Tirtha Dahanana', 'Mahasiswa', '1109000339'),
('1109000340', '*F8254498E07B2448830BB5A9621B08DBDEA85170', 'M Taufiq', 'Mahasiswa', '1109000340'),
('1109100329', '*819B4529412930528E66131787C058F6EFFC7E2D', 'Dedi Winarno', 'Mahasiswa', '1109100329'),
('1109100330', '*CF80DC98D63746AE59B16B2551BF0AF564E24CDA', 'Windy Aufa', 'Mahasiswa', '1109100330'),
('1109100331', '*7524E079F495CD572E39D20CCF9D5593A905FA31', 'Suliyana', 'Mahasiswa', '1109100331'),
('1109100332', '*32E95ED6C3F4177C21C50D15615C1B5F657E8BCC', 'Yenni Rosetiawati', 'Mahasiswa', '1109100332'),
('1109100333', '*B11BF5004035528312209B6E2E8A3C34B653B6DA', 'Lina Hurin Rahmawati', 'Mahasiswa', '1109100333'),
('1109100334', '*4D75E836A93AFAE36B164975B5909343BD428615', 'Selamet Wahyudi', 'Mahasiswa', '1109100334'),
('1109100335', '*24495D9BD4C4D2274CD3BF5420257595B1EEB6C1', 'Dessy Nirmala Sari', 'Mahasiswa', '1109100335'),
('1109100336', '*464511B148236BB6B3B53E7ED064B23F1993B495', 'Niluh Kadek Diyah PD', 'Mahasiswa', '1109100336'),
('1109100337', '*363019E42279550D24ABCBA3C45AADFA6C12AF6B', 'Faridhatis Salmi', 'Mahasiswa', '1109100337'),
('1109100338', '*B02C78BC43185AE8C6C3EF6119ADAE280EC24533', 'Elok Karunia Dewi', 'Mahasiswa', '1109100338'),
('1109100339', '*BDA102A15D54640F54C21C1E3338044C47B50F3F', 'Faris Esa Aridinata', 'Mahasiswa', '1109100339'),
('1109100340', '*7F62C8E2246BCBD8BB42F54BA86D3848D24DA88F', 'Fingky Budiarti', 'Mahasiswa', '1109100340'),
('1109100341', '*CEB95D1C455851C1F0F43AC7E57EB97A589F58CA', 'Firman Hidayat', 'Mahasiswa', '1109100341'),
('1109100342', '*AC28C62BFB34E9218B8EA9BD356025875A521BC7', 'Dwi Nur Samsu', 'Mahasiswa', '1109100342'),
('1109100343', '*703F08F3E4583AE9DFF29C7DDB29E3AB112631FC', 'Puji Agustian AW', 'Mahasiswa', '1109100343'),
('1109100344', '*A8CDCFC00E0122F088BDAD70FE14A903D98BC401', 'Wahyudi', 'Mahasiswa', '1109100344'),
('1109100345', '*A63598BEF50460022EA515848B0EF144B908FAE2', 'Muhammad Irjik', 'Mahasiswa', '1109100345'),
('1109100346', '*7B1B61AB05107895B4C7D6FC3D7A1153EFF9EE67', 'Imam Ramanto', 'Mahasiswa', '1109100346'),
('1109100347', '*DF7395A4BD1E0F2581F69C959AC1914AF64177A8', 'Willy Witanto', 'Mahasiswa', '1109100347'),
('1109100348', '1a60aae9361fada8', 'Rizki Marta Amalia', 'Mahasiswa', '1109100348'),
('1109100349', '*6E2C30AD4616C9210AD250019B23EC52D95AABB3', 'Rani Hidayanti', 'Mahasiswa', '1109100349'),
('1109100350', '1a6166a2362410b2', 'I Wayan Gede Suma Wijaya', 'Mahasiswa', '1109100350'),
('1109100351', '1a61609f36240aaf', 'Okky Hadi Wibawa', 'Mahasiswa', '1109100351'),
('1109100352', '*FCF9C9E509396CA252AFD94AF45DFE3187F6B787', 'Christin Dini Kartika ', 'Mahasiswa', '1109100352'),
('1109100353', '*FD71FC9960FA95BEF165A26F9D415EACE0EF0ED3', 'Dendang Wahyudi', 'Mahasiswa', '1109100353'),
('1109100354', '*611BD1F035AF09B571F61D2CE1D2B6C6EF162D7F', 'Fira Felina A', 'Mahasiswa', '1109100354'),
('1109100355', '*6D4D5D252BAA687F8A6E77353E1F85575E0AD6DC', 'Feri Hardiansyah', 'Mahasiswa', '1109100355'),
('1109100356', '*91312D83DA0759A1FC450B99DA6432B3C018BC39', 'Yusron Hadi', 'Mahasiswa', '1109100356'),
('1109100357', '*C32C2F0749E4E05381476D457577F511CF1017F9', 'Yoga Harinata', 'Mahasiswa', '1109100357'),
('1109100358', '*072213563B3355DC69B94B0B66CB8E0D79C1418A', 'Hermanto', 'Mahasiswa', '1109100358'),
('1109100359', '*E924E5BDF812E8D89F82AC32011C3A4B4214883A', 'Hedi Wibowo', 'Mahasiswa', '1109100359'),
('1109100360', '*C0496C2EB7364629EDCE5279FA62CCA89F6E725A', 'Icha Novianti', 'Mahasiswa', '1109100360'),
('1109100361', '*F7D0B6C28C849170FDCB5B7893E5237A5863F3D1', 'Arie Jayanto', 'Mahasiswa', '1109100361'),
('1109100362', '*D20425817BFDB489D3EC884B5E375FFB69D4AD9B', 'Helman Arif', 'Mahasiswa', '1109100362'),
('1109100363', '*4DD32FE3C222EB0C074C36ADDF3988A946AAC33A', 'Nur Alimin', 'Mahasiswa', '1109100363'),
('1109100364', '*CAC9EA7BF954F1142B6D30415AA2FDB72C6FFEA0', 'Ade Herman Febrytama', 'Mahasiswa', '1109100364'),
('1109100365', '*4B5CE0441855F84FF319D9AD68EB93C15831E170', 'Topan Arif S', 'Mahasiswa', '1109100365'),
('1109100366', '*A0E857A4E4DFD587B605BF55C518D07CB963E266', 'Gufron Maulidin', 'Mahasiswa', '1109100366'),
('1109100367', '*5D06CBC2A240F67133035416C1C20CC977F40FAF', 'Satriyo Handoyo', 'Mahasiswa', '1109100367'),
('1109100368', '*BB3C700DB39CF4D8545141F0A3846FE48F5A59CF', 'Helmi Darmanto', 'Mahasiswa', '1109100368'),
('1109100369', '*84DC962B78F6B4363DF9F1F4B764FA5ED44CA960', 'Sugeng Wijayadi Budi Utomo', 'Mahasiswa', '1109100369'),
('1109100370', '*85178B753B0AD5EB4C1DE1151E667DF639DF1C09', 'Nurwanto S', 'Mahasiswa', '1109100370'),
('1109100371', '*12755AA8DDA9C93D0B6B5DA84A8280A4DD5C4DAA', 'Denis Hidayat', 'Mahasiswa', '1109100371'),
('1109100372', '*FC2CF919D82E874931D3A590EA4023F5BE7CBFB3', 'Fitriyah', 'Mahasiswa', '1109100372'),
('1109100373', '*180DB7B7515B63BE58AF2443CA429E6968EAA58D', 'Muh Novi Raharjo', 'Mahasiswa', '1109100373'),
('1109100374', '*085D210525A004235AA2FEC277E715FE353C8C01', 'Tudrik Maula', 'Mahasiswa', '1109100374'),
('1109100375', '*C026A41BA0F148BD3DA6E1BBBB713C8EF942209D', 'Rudi Hermawan ', 'Mahasiswa', '1109100375'),
('1109100376', '*0C2E4A8057EEF42DAF73D3ADBC1AFAE1424C8B25', 'Zulkifli', 'Mahasiswa', '1109100376'),
('1109100377', '*DFCAB206AE987781E8A8407A3F5346D38C7A3AC8', 'Hairul Anam ', 'Mahasiswa', '1109100377'),
('1109100378', '*DAADFE60F66169B7937344374C637D577ABF9C50', 'Bayu Dwi Saputra ', 'Mahasiswa', '1109100378'),
('1109100379', '*75AE09A53521D65E96647ED2497B34CC798C3F7D', 'Ilham Ulum', 'Mahasiswa', '1109100379'),
('1109100380', '1a681365361fbf98', 'Bagus Irwanto', 'Mahasiswa', '1109100380'),
('1109100381', '*5F65D02AEED9612AA79A9C082C4E0901E2929A23', 'Eka Prasetya', 'Mahasiswa', '1109100381'),
('1109100382', '*A4402F23C34C1CAA5CF837FD304307711ECD968B', 'Titik Kaniatin ', 'Mahasiswa', '1109100382'),
('1109100383', '*34EA9F27566B9AF26C87A6B084DA5ED658314926', 'Ari Pristanto', 'Mahasiswa', '1109100383'),
('1109100384', '*A4E95AE124DBF8A6C8C5CA750DE6790588C84F8B', 'Nida Usfiya', 'Mahasiswa', '1109100384'),
('1109100385', '*89A97AAD87E7761986F151D1F3ADE6722A714887', 'Samsul Imam Romadi', 'Mahasiswa', '1109100385'),
('1109100386', '*3ED35A30AF7D1BF1F35CA92748FFAB7E6F817A9C', 'Agus Asrud S', 'Mahasiswa', '1109100386'),
('1109100387', '*C12050D82902895E2A72BED984B96F16764CAF9D', 'Diah Ayu Pramudita', 'Mahasiswa', '1109100387'),
('1109100388', '*1C8DBC6B14074604E9D69C6EC66E16E2284767C6', 'Supriyanto', 'Mahasiswa', '1109100388'),
('1109100389', '*0489EC32126297813AC20EB8F27F5740E1BEB2FC', 'Moh Taufiq', 'Mahasiswa', '1109100389'),
('1109100390', '*9308ED4512314AAAD8A71CDE21DE06A63FF24B65', 'Bagus Purnomo Aji', 'Mahasiswa', '1109100390'),
('1109100391', '*18FF912F01E9FDBDF21A3C3615F033427241BF95', 'Ariesta Dwi Friska Yanti ', 'Mahasiswa', '1109100391'),
('1109100392', '*27F2C70B8D9E1470D067F47E97E4B878524245D5', 'Helmi Budiyanto', 'Mahasiswa', '1109100392'),
('1109100393', '*FA4B8D6C4944FF9916E6283ABA0485AB1B8BDA92', 'Moch Ridwan Adi S', 'Mahasiswa', '1109100393'),
('1109100394', '*F6357E831F2C9FA290FF311FEEA45B5844E22EE2', 'Yohanes Kurniawan', 'Mahasiswa', '1109100394'),
('1109100395', '*2122B3DAAF61C27534F10CE0594BB2906C61FCCD', 'Moh Khairun N', 'Mahasiswa', '1109100395'),
('1109100396', '*199A7D2532646A345FC02BDC630059A829A55D9C', 'Muhammad Yunus Hafif', 'Mahasiswa', '1109100396'),
('1109100397', '*726186AAA2E20935C8175CDF5EBB568A06A41FE2', 'Dewi Kusniah Wardani', 'Mahasiswa', '1109100397'),
('1109100398', '*C073B3A8DBA143D6A5CB7962BEF980BE4A7252FF', 'Milda Tsalitsatun Nisa', 'Mahasiswa', '1109100398'),
('1109100399', '*CA2FAF60BEB1868BC5D49972D9D01505F8128B9B', 'Okky Adhari Utama', 'Mahasiswa', '1109100399'),
('1109100400', '*0350DFFEF2364502E2BD59829F3E62CE963095BD', 'Akh Subbanul M', 'Mahasiswa', '1109100400'),
('1109100401', '*FC69B1ACEDDA4FBB52BD3A09CB2004E76E7578F3', 'Muhammad Afton M', 'Mahasiswa', '1109100401'),
('1109100402', '*4E22A44C57EDD7E856910B7F1D45700C4C923718', 'Agus Rohman Yusuf', 'Mahasiswa', '1109100402'),
('1109100403', '*C9C23FC6819A438210DF1795A76C959B5DC87DD7', 'Bagus Santoso', 'Mahasiswa', '1109100403'),
('1109100404', '*F2EFB98F4049EB85484B5B001194389056577ACF', 'Sofian Fanama', 'Mahasiswa', '1109100404'),
('1109100405', '*32ED981878FBCC93CD55D6B32C1A9DDB6586D137', 'Dwiky Kristianto', 'Mahasiswa', '1109100405'),
('1109100406', '*51B66501409F2E0E0C5A5786BAAE0D863B3F8E24', 'Faudi Rusito', 'Mahasiswa', '1109100406'),
('1109100407', '*F4547ACFEE5F8992AD1A9BA74EC6C646D294109E', 'Novan Arvi Risandi ', 'Mahasiswa', '1109100407'),
('1109100408', '*CFA246D5D2EF713A09B355FB0A09DE7F3A5AAA57', 'Restu Arisandi', 'Mahasiswa', '1109100408'),
('1109100409', '*17B148E11AC7AB8F17FF0430FEBC8D15A93B1AEB', 'Febsa Febriani Setiyawan ', 'Mahasiswa', '1109100409'),
('1109100410', '*9860CE7B48870F16E51F9E7AFB0E01275C3D02CF', 'Rendra Pranata T', 'Mahasiswa', '1109100410'),
('1109100411', '*8DD1FA22A883F9FC2AA2AA1E08A0DE87687C5F88', 'Fariz Hariyanto', 'Mahasiswa', '1109100411'),
('1109100412', '*E7241D15EE9379C15C9471C6560B2C2AC215A94D', 'Maya Lestiawati', 'Mahasiswa', '1109100412'),
('1109100413', '*EBE7859A8DA7F153F65B46B9E1F9776A6B14880B', 'David Haryanto', 'Mahasiswa', '1109100413'),
('1109100414', '*024936014A2D64C166A09F61150BF596ACA57D57', 'Zaenal Arifin ', 'Mahasiswa', '1109100414'),
('1109100415', '*17C9BF368908505C046DDCE0FF72ADFB070969D2', 'Yudi Susilo R', 'Mahasiswa', '1109100415'),
('1109100416', '*4A46DA43F27D5C4664190E558FDE879E41415132', 'Firman Marta Nugraha ', 'Mahasiswa', '1109100416'),
('1109100417', '*AA7D0A93CD17CFC34CDBB6DFB86D0E73B2286E4B', 'Irham Mubarok', 'Mahasiswa', '1109100417'),
('1109100418', '*74E770E5FA3EE813E5EF39D94FE9F36F126CC2C8', 'Abdul Komar', 'Mahasiswa', '1109100418'),
('1109100419', '*65374DBD6331C0403C7AA65652D62CA6115B8F49', 'Elok Wita Kurniasari', 'Mahasiswa', '1109100419'),
('1109100420', '*32C2AE45BC08A80908FCBFF32BF670BBE64E3B62', 'Wahyu Setyo Nugroho', 'Mahasiswa', '1109100420'),
('1109100421', '*4157EF9367463901F3CB7BF5115DDAD4D808E119', 'Dianita Dwi Farida Anim', 'Mahasiswa', '1109100421'),
('1109100422', '*D90A84084844AD493A074B0F9DA254C99A1F2E5F', 'Teguh Widya Kasih', 'Mahasiswa', '1109100422'),
('1109100423', '*9682DACDA49FEB26E5976B44A6B7D75E5375646B', 'Septian Masruroh ', 'Mahasiswa', '1109100423'),
('1109100424', '*3210B9004AB0E00338539BE388ECFCBEF9BEDDDF', 'Wahid Setyo W', 'Mahasiswa', '1109100424'),
('1109100425', '*5F6795D4D92552DDC8BFEAC347FC1B0280E7F633', 'Doni Putra', 'Mahasiswa', '1109100425'),
('1109100426', '*77CFE9B7F93FE60D42DA6A65262BD6AFB4F6F898', 'Arjuna Riadi Putra', 'Mahasiswa', '1109100426'),
('1109100427', '*B01AC22FA5116257BBB66E1288F413DF2B5FDE72', 'Tono Sumarsono', 'Mahasiswa', '1109100427'),
('1109100428', '*7DF215E99FA74924EACD7688096DE63449439D22', 'Luqman Fauzi', 'Mahasiswa', '1109100428'),
('1109100429', '*DE0B2549FAAEF2FF639ECB7E6C3B8484BA0A5B9E', 'Rosyid Edi S', 'Mahasiswa', '1109100429'),
('1109100430', '*9D73EB75122A36285D35F5F4E8FB7A80F82E8DAB', 'Heni Elvi Laili', 'Mahasiswa', '1109100430'),
('1109100431', '*6FBCC4B70BAFA9AD7B8F7C7E89A7D418139C52D3', 'Wiwit Widayanti', 'Mahasiswa', '1109100431'),
('1109100432', '*ABF30F7A4B08898038403686D5318EB8EDBAA650', 'Ahmad Firman Fauzi', 'Mahasiswa', '1109100432'),
('1109100433', '*CA7C84AA31DBF6FC2B133AC381D63A0864A748CE', 'Moh Rafid', 'Mahasiswa', '1109100433'),
('1109100434', '*97C772298D302B23E9B59605EA58776A779FA048', 'M Catur Mukti P', 'Mahasiswa', '1109100434'),
('1109100435', '*C81319659EE560E49E8CA18D978FB4CBCA627F59', 'Ucta Pradema Sanjaya', 'Mahasiswa', '1109100435'),
('1109100436', '*64A73B5743CCFDED17847815FC8F01822C7F9FE4', 'Suyatno', 'Mahasiswa', '1109100436'),
('1109100437', '*EBB7B42F50D725B91F187E1435633B37452079C9', 'Abdul Haris Ramadin ', 'Mahasiswa', '1109100437'),
('1109100438', '*62F19FBC7178E8092DB4BE70ABD59BC268BD116D', 'Hendhita Candra Lusmana', 'Mahasiswa', '1109100438'),
('1109100439', '*7122CC5122CE552C979A5033D7FA3D256EC780C1', 'Mariyadi', 'Mahasiswa', '1109100439'),
('1109100440', '*85D0C931EA87A3A9B91DF2AB449D852BD5FA696E', 'Dito Budi SP', 'Mahasiswa', '1109100440'),
('1109100441', '*468746E75DB4A382426EB1E5C2227F36101475A6', 'Mariono', 'Mahasiswa', '1109100441'),
('1109100442', '*DA92917E52714158FA60F3B34F20DC2550C6988F', 'Bayu Endartono', 'Mahasiswa', '1109100442'),
('1109100443', '*3F48D7BE7112DF955CC0E3AB9811C81082FE97BE', 'Irfan Fauzi ', 'Mahasiswa', '1109100443'),
('1109100444', '*5D389920B19871EB61231E60A4E63BE20135FDBB', 'Ali Mukabshol Alawi', 'Mahasiswa', '1109100444'),
('1109100445', '*F747020042A37771508005FFF2A3EBEBD9EF863E', 'Teguh Suryo Saputro', 'Mahasiswa', '1109100445'),
('1109100446', '*1567C9F337BB23667DC6CFCEFAEF5A08CC28303F', 'Mujibur Rohman ', 'Mahasiswa', '1109100446'),
('1109100447', '*21E0F136A7D64E5ABA459CCD616D7DAB41707E96', 'Kikit Supriyanto', 'Mahasiswa', '1109100447'),
('1109100448', '*74F36B9717F9E9FC8F11100D818BFD0AAA4C8376', 'Delima Dwi Sayekti', 'Mahasiswa', '1109100448'),
('1109100449', '*A96A47FBDB68CAAD5917D6E909760011AA3BEC3A', 'Eksa Fakhurdin ', 'Mahasiswa', '1109100449'),
('1109100450', '*67B7865E52AD921071D317264D1CA68A37B522DC', 'M Yusuf Sumarno', 'Mahasiswa', '1109100450'),
('1109100451', '*7E32D0D883248246EE035F23DC43D8340C700B87', 'Taufik Rohman', 'Mahasiswa', '1109100451'),
('1109100452', '*B485B5B3747D7E8CED274A9112D1E8BAE08EEC14', 'Tri Imam Roby Ardan', 'Mahasiswa', '1109100452'),
('1109100453', '*EC86E625CF22E9C0C97F17371D7D6E463C07D426', 'Wahyudi', 'Mahasiswa', '1109100453'),
('1109100454', '*D71789BCC2FF542FCF2BD8B1969FA409A874CC1F', 'Evan Fajar Pratama ', 'Mahasiswa', '1109100454'),
('1109100455', '*6176CFAE6F18D3D20A77C09CC8E13841E776232D', 'Samuel Margaret Adi Wena', 'Mahasiswa', '1109100455'),
('1109100456', '*707A0131F6F4EDFDEA6DC451157F761CFE448910', 'Untung Jasuli', 'Mahasiswa', '1109100456'),
('1109100457', '*588758B6E70E7089D0FBA1C01F35798FACDFB34D', 'Irvan Hidayat', 'Mahasiswa', '1109100457'),
('1109100458', '*1705AB0EB37C505C14808113542733A115302289', 'Ade Sofan Kunaifi', 'Mahasiswa', '1109100458'),
('1109100459', '*BEB6A1256046DF98FA381C4DEC3AB773DBECEFE3', 'Dwi Apriluddin Payungadi', 'Mahasiswa', '1109100459'),
('1109100460', '*D8A9BA7CEF827A889EBE37210DCB043BF4247E80', 'Andre Refaldi', 'Mahasiswa', '1109100460'),
('1109100461', '*CD92D9B7E0D5545095D915B83448B8CCAC34AF01', 'Muhtadi Mukhtar ', 'Mahasiswa', '1109100461'),
('1109100462', '*D3076E637B65D4E9C11CE818E3F0030EB8237CFD', 'Miftakhul Faris', 'Mahasiswa', '1109100462'),
('1109100463', '*1DB84A6A0B0C2F6617AE2C775FA38398B536C44F', 'Rezita Meyla Andhika Sari', 'Mahasiswa', '1109100463'),
('1109100464', '*1AE01D148F3BF90331E0E548399080CF9C0ABD81', 'Nanda Aziz Mutaqim ', 'Mahasiswa', '1109100464'),
('1109100465', '*9B79BE3C9F1ABE11DB9E2AB55E6C9AA8D390030B', 'Andi Mei K', 'Mahasiswa', '1109100465'),
('1109100466', '*F0F30EA06E38DDC0A3A973126742EE4B0A7CFF16', 'Tri Harisandi', 'Mahasiswa', '1109100466'),
('1109100467', '*E7DD92FAB7E923B2B1142F595A2BBDF3FCCEF533', 'Imam Wahyudi', 'Mahasiswa', '1109100467'),
('1109100468', '*3585A8F3515856227EEBA729DD4879126EF48F29', 'Husbanul A', 'Mahasiswa', '1109100468'),
('1109100469', '*A4933B58B0791E3C264E0C3245AFF82C60435D12', 'Pipit Herfiyanti', 'Mahasiswa', '1109100469'),
('1109100470', '*F517FED426873A5EFDF305209536103761A96A7D', 'Indar Dwi Riantini', 'Mahasiswa', '1109100470'),
('1109100471', '*785583365AE411EA6BE17C8D23347D2DC9C21ED4', 'Andri Anto Hario W', 'Mahasiswa', '1109100471'),
('1109100472', '*F9087380075F0D86EA7E7C6F0F17AFA66520F3E6', 'Nur Hasan Faid', 'Mahasiswa', '1109100472'),
('1109100473', '*9D0E15AEA5FFB32EDBD9EB4ECA5E85DB09059ACA', 'Notriska Pohan', 'Mahasiswa', '1109100473'),
('1109100474', '*9168B47318CF67990630112BAE97B6B9D2B29A90', 'Defia Estu Pratiwi', 'Mahasiswa', '1109100474'),
('1109100475', '*ED4F2CDCB24A0EA68B6415B451FDE2D8D8DB6B14', 'Septi Nur Widyastuti', 'Mahasiswa', '1109100475'),
('1109100476', '*A59281FC77B07A460FD85A92518F22B582838022', 'Verawati', 'Mahasiswa', '1109100476'),
('1109100477', '*062462C6E72CE70DDBC8BC93EB5C2C8BA0664AAF', 'Tri Yuli Kurniawan', 'Mahasiswa', '1109100477'),
('1109100478', '*84883502E1DC94854A13A69A5516FA17B3743A67', 'Nadhifatul U', 'Mahasiswa', '1109100478'),
('1109100479', '*0DC607C8CF588E65BDF895641EDE8EF7FA33F1C2', 'Faradhiba Aurarima ', 'Mahasiswa', '1109100479'),
('1109100480', '*85E94AD35AC341E948AE4A1543C88E20FC3A5393', 'Moh. Hariyanto', 'Mahasiswa', '1109100480');
INSERT INTO `tbllogin` (`username`, `psw`, `nama`, `status`, `idlink`) VALUES
('1109100481', '*FA3A55207A536149EB83484716085024376A2C56', 'Adhitya Fery Pradana', 'Mahasiswa', '1109100481'),
('1109100482', '*142CEE208CA43F8768E901C1A310D2BFC159C52A', 'Nurviana Alwi Dullah', 'Mahasiswa', '1109100482'),
('1109100483', '*432900FAA6C935809494589C09505CDCE0865427', 'Krida Maharsi D', 'Mahasiswa', '1109100483'),
('1109100484', '*9A45A49D2196CB1648FDFE1AA0C6C9E8DF971258', 'Gushadi Ferdinan Dani', 'Mahasiswa', '1109100484'),
('1109100485', '*3D697129F16EDB9F5D1607713EBB070EEC4BD1EA', 'Tony Eko F', 'Mahasiswa', '1109100485'),
('1109100486', '*9CE3CED1AA9C81D4FF9888DC346D042E50231A06', 'Khairul Umam ', 'Mahasiswa', '1109100486'),
('1109100487', '*39FC6C514695DE2717805947B16C181B79024B86', 'Duwi Setiyo Utomo', 'Mahasiswa', '1109100487'),
('1109100488', '*020AD3CA8FE52588CFAC806394F62BC0478C1EBD', 'Teguh Santoso', 'Mahasiswa', '1109100488'),
('1109100489', '*D3B223CA3A7C70BB39A605B9AF03AD7C6592304C', 'Mahmudsyah Idris Romy', 'Mahasiswa', '1109100489'),
('1109100490', '*12DBB5FCA5759F1EC2FE49FD72C34C8513846C1B', 'Franky Kurniawan A', 'Mahasiswa', '1109100490'),
('1109100492', '*D79DA34A0166EC85F35C959C0A4185220C0DA733', 'Syaiful Bahri', 'Mahasiswa', '1109100492'),
('1109100493', '*AFD1FCA1C46F43B8D27FBE52AD1CAB88555FB8F6', 'Utomo Mandala Putra', 'Mahasiswa', '1109100493'),
('1109100494', '*D951AAF0E315F392EEB864EE1DCE3156E46D0F8F', 'Hari Maryono', 'Mahasiswa', '1109100494'),
('1109100495', '*23CD050859D69E9E134D10BAF6E392173E1B3B84', 'Helli Iswanto', 'Mahasiswa', '1109100495'),
('1109100496', '*85ED97172C4E907E89111E27C35247D63783CAAB', 'Nur Huda', 'Mahasiswa', '1109100496'),
('1109100497', '*3C5BDBAFEAC7F9EB8AB5A0453B9B97077E16D9DB', 'Endina Putri A', 'Mahasiswa', '1109100497'),
('1109100498', '*B24CD8DA6104484EBDD35DEE6020D4A259E0110E', 'Hendi Citra Novia', 'Mahasiswa', '1109100498'),
('1109100499', '*48FD70F6E0A8CEA4C71698F5BC2FE71C3EEE7C9A', 'Sukron Maulana', 'Mahasiswa', '1109100499'),
('1109100500', '*6BD4F929324DD68B42DA28E8700FF154B27C950A', 'Susanti', 'Mahasiswa', '1109100500'),
('1109100501', '*5A14A4B598BE13BB3542500D7D79C1217A085929', 'Ahmad Furqon Abadi ', 'Mahasiswa', '1109100501'),
('1109100502', '*7B36E42A1A07CB86554E23847478F9BDE8761599', 'Debi Sasmito', 'Mahasiswa', '1109100502'),
('1109100503', '*1A8FDE1C7EDCC083FFC398DF6E3BC2DE21FDFA1F', 'Devi Faiqotul Azizah', 'Mahasiswa', '1109100503'),
('1109100504', '*5740D19719F1123262FE779D9A50A2999AD0EAD1', 'Vivi Icha A', 'Mahasiswa', '1109100504'),
('1109100505', '*6603134DE7E412D3BFF51F871DEA084F2C860E9A', 'Lenny Idiyasari', 'Mahasiswa', '1109100505'),
('1109100506', '*E0D0017A6A7B57941EF2324A39699F435D8643CB', 'Moh Alfian J', 'Mahasiswa', '1109100506'),
('1109100507', '*9B9B5FF446F9A7BC7C99D1A3DB9B9FC1811F1632', 'Sam Sapto Hadiwiyono', 'Mahasiswa', '1109100507'),
('1109100508', '*4A33F9BFC7CC9AB0B28FC70DAD0025F262B19B06', 'Yudit Tri Saputra Himawan', 'Mahasiswa', '1109100508'),
('1109100509', '*3E1ADE8911F15A4E485DC0C5C1D296A0F0F76D9E', 'Yusy Dwi Herwiyanto ', 'Mahasiswa', '1109100509'),
('1109100510', '*41B3BE3595D66693847AA634B95713E27ED7D374', 'Ridwan Subiyono', 'Mahasiswa', '1109100510'),
('1109100511', '*0ADAE81CF5EB3EAA06DA37B0314C0D32EB9D63E3', 'Ivan Surya Dilaga', 'Mahasiswa', '1109100511'),
('1109100512', '*DB48E3DF2B6AAE0679BE154AB79A451B214F9D67', 'Indah Purnama Sari', 'Mahasiswa', '1109100512'),
('1109100513', '*4AC6A8889F10A373BB4E9EF65FEC708CA8CBA66B', 'Davidson ', 'Mahasiswa', '1109100513'),
('1109100514', '*29A50FE6E3D6BF37F141813D39F6A557133A71FD', 'Muchammad Yusron Aminullah', 'Mahasiswa', '1109100514'),
('1109100515', '*1410C94B8D07A392C796CE0CB890B839A2C66358', 'Imam Asyari', 'Mahasiswa', '1109100515'),
('1109100516', '*3CA7C6B30B63A17F7121BF615A9C2858E7785CDF', 'Herman Hadi', 'Mahasiswa', '1109100516'),
('31040516', '*A63C3E862011E07AF20E79B4E2F302920BC5A3B4', 'Ahmad junaidi', 'Mahasiswa', '31040516'),
('31040517', '*20BCBFA10DEA1D54A12B534E6E4AF5296F5E0943', 'Ali Wafa', 'Mahasiswa', '31040517'),
('31040518', '*74F41F2156AF886B5A9E677B1CA0E472DC96BFF7', 'Asfuri', 'Mahasiswa', '31040518'),
('31040519', '*50EC5D05AD67870204CA63A75DC44F9CF5726F6C', 'Awig Prasetyanto', 'Mahasiswa', '31040519'),
('31040520', '*02277C2F43524EC861A6CBD8F86848F80D1276ED', 'Choiro Hidayanti', 'Mahasiswa', '31040520'),
('31040522', '*064D6045EB453F66D3672B79ADC73809A12293E0', 'Dewi Maherawati', 'Mahasiswa', '31040522'),
('31040524', '*D3836DB2C96C959D87A3036C3594C7990C634ADC', 'Eko Rusdianto Kurniawan', 'Mahasiswa', '31040524'),
('31040525', '*56A065F1941B55FE2654550C7F5EB1F2701FC2B5', 'Endhar Insan Setiary', 'Mahasiswa', '31040525'),
('31040528', '*1074EBD3073DC5F2E5FD29AF920EC1F91AE3B4B5', 'Kurniawan Habibi', 'Mahasiswa', '31040528'),
('31040531', '*A45A4A482865B7EF803EDFF39AAFC695D5750732', 'Rosidah', 'Mahasiswa', '31040531'),
('31040537', '*50BE0CACCF5D7DE0DFBB33FF99278AA90990A5B4', 'Rieky Dwi Setiawan', 'Mahasiswa', '31040537'),
('31040550', '*9964189D43AA7787D95F91E539EE88BCBC28F4BC', 'Moh. Ali', 'Mahasiswa', '31040550'),
('31040577', '*F48F15A5F22462BC5F48C13681857015EC18B665', 'Aris Sunandi', 'Mahasiswa', '31040577'),
('31040578', '*532EFED97DE8761D4890E291EFA3E236EA740C19', 'Eko Rayendra', 'Mahasiswa', '31040578'),
('31040602', '*B855E93FA52C5DB2371D5FD9B1A978B035A80050', 'Achmad Zaini', 'Mahasiswa', '31040602'),
('31050551', '*F285AB200004DEB4C9CF56EB874B63C8A1DC67A1', 'Abdul Rozak', 'Mahasiswa', '31050551'),
('31050552', '*B0019B01389DCB1AF9404814411D4370EFC1B959', 'Agus Supriyadi', 'Mahasiswa', '31050552'),
('31050553', '*3B6562C753F1A92F26FC57AA1796E8889FBF842B', 'Anton Dwi Susilo', 'Mahasiswa', '31050553'),
('31050554', '*3A3190C09102DD40BB01B7ED7F95AB94E1404074', 'Anwar Nuris', 'Mahasiswa', '31050554'),
('31050555', '*99DABE2EF92903812197C064F64E4B31BC202C1D', 'Bagus Ary Wibowo', 'Mahasiswa', '31050555'),
('31050556', '*C30DC60D92F5760B7806B5137ED21E68EC28D0ED', 'Bagus Sang Aji', 'Mahasiswa', '31050556'),
('31050557', '*F133C9BD0C930E0AB984B230E8B8718D3CAF5C1D', 'Brian Kaldera', 'Mahasiswa', '31050557'),
('31050558', '*494AA9386F185F2C87F4ABD6BED1AB3D8E6BE7CC', 'Diana Hadi', 'Mahasiswa', '31050558'),
('31050559', '*3F384201952F629B82E7AE0AFCC3D7F0D1EBCAC9', 'Didik Wahyudi', 'Mahasiswa', '31050559'),
('31050560', '*3673BE8E2C72CD71040C539887E97A91DDF26F1A', 'Faruk Alfiyan', 'Mahasiswa', '31050560'),
('31050561', '*BC4BE54A87731C410D5235F4EB4706FBFC48F75D', 'Ferdian Rokhmansyah', 'Mahasiswa', '31050561'),
('31050562', '*783282B7ADC1AA849D4F6E0E2C349DE1EF62385C', 'Kuswinarti Yuliana', 'Mahasiswa', '31050562'),
('31050563', '*DBF80F84BAA2D761E6B70E4DFAAF72AD4D919FF3', 'M. Fatulloh MS.', 'Mahasiswa', '31050563'),
('31050564', '*F1C00CAACF0E67F1FCFBFC6C41EE4EE7D5EEC818', 'Maulana Noer Indra', 'Mahasiswa', '31050564'),
('31050565', '*39821A1664CD45BB94D9DD185B64B3F2825E49D7', 'Muhammad Syaifullah', 'Mahasiswa', '31050565'),
('31050566', '*4D9C0F5B3C4228709020EBC69915BE9DAD3C6065', 'Muhammad Uzain  Al Umar', 'Mahasiswa', '31050566'),
('31050567', '*1E71A2BBD207BE5B7B75E44F864DA8131AC2CD26', 'Ninik Reniyanti', 'Mahasiswa', '31050567'),
('31050568', '*82B1F90DF7D788B315B289487B5D4A56ED948CBF', 'Nurrachmad Wahyu Tede', 'Mahasiswa', '31050568'),
('31050569', '*66A724F23DCBFC93A2DB0DBE52A13E6848BA4AF5', 'Retno Jamilatus Saadah', 'Mahasiswa', '31050569'),
('31050570', '*AC5704D76E4DCA2205EE3F929479C4B2C17D0E86', 'Selamet Hariyadi', 'Mahasiswa', '31050570'),
('31050571', '*CDCDB84064AF651379E194A033A5B9389C3F43DA', 'Shohibun Humaird', 'Mahasiswa', '31050571'),
('31050572', '*EC7F6909305370FBD21A6EDCBADC29680C617EA1', 'Suhariyanto', 'Mahasiswa', '31050572'),
('31050573', '*DCA6E72ABDFF7D5AA9BA06755C0921488C3CCCFD', 'Sulaibatul Aslamiyah', 'Mahasiswa', '31050573'),
('31050574', '*B5A8D91E0EBBA217778034597D76773C373183FA', 'Susiadi Sukandar Wahono', 'Mahasiswa', '31050574'),
('31050575', '*69809B06AA198663DD0B104F4CAC466F12A97F2D', 'Totok Wahyudi', 'Mahasiswa', '31050575'),
('31050576', '*FDE8052CE0416612B20FD3BA2F980C6976A6D109', 'Triyana Wahyuni', 'Mahasiswa', '31050576'),
('3106100581', '*94A010B75FE36DBBA2675E523E2060EF51C555B2', 'Ahmad Rofiqi', 'Mahasiswa', '3106100581'),
('3106100582', '*B4665B093268B989FF418F25D18C9B429CAE8FD3', 'Alek Susanto', 'Mahasiswa', '3106100582'),
('3106100583', '*D5CC353C26136C46724E7E3BDFF1864431BE8516', 'Dana Indrayana', 'Mahasiswa', '3106100583'),
('3106100584', '*75EC1100E1BD530F4ED02F16A7AADE0319DA22B1', 'Devita Eka Priyatna', 'Mahasiswa', '3106100584'),
('3106100585', '*140435E54D5EF22F7513A0FEF6FA6B868F7B9223', 'Eny Naswari Sih Lestari', 'Mahasiswa', '3106100585'),
('3106100588', '*F8D235CDF939568E34F649E254155C019D986DFF', 'Hadi Darmaji', 'Mahasiswa', '3106100588'),
('3106100589', '*AB411D86135D68C23A3EB396095B99070A93A590', 'Hermanto', 'Mahasiswa', '3106100589'),
('3106100592', '*F0142A34D4437E01623A783C52B8BB06868CFA4D', 'Mohammad Gojali', 'Mahasiswa', '3106100592'),
('3106100593', '*74EF9D8CF261B4958751C199573F98A7A7434296', 'Nofi Riyanti', 'Mahasiswa', '3106100593'),
('3106100594', '*E813858BE49D418A26A8F43D3E1B20326E67BED6', 'Novi Mas Nizar', 'Mahasiswa', '3106100594'),
('3106100595', '*ECA9886EC9EE1D3CF6B7EB570E1847A5326E6255', 'Prayitno', 'Mahasiswa', '3106100595'),
('3106100596', '*ED6E8225F5EBAB03D3D8CF70C9AC413F3B201C4B', 'Rina Ekawati', 'Mahasiswa', '3106100596'),
('3106100597', '*BA821EFA4E7FFE84260F9ADC8EED8ED0EE069670', 'Riza Aditta Putra', 'Mahasiswa', '3106100597'),
('3106100598', '*9A3AEEC91E3CD29D05E71A0F3807952798CE6D39', 'Rudi Hartono', 'Mahasiswa', '3106100598'),
('3106100599', '*A18587357364F33210DD13901891283D35827EAA', 'Setiyo Nugroho', 'Mahasiswa', '3106100599'),
('3106100600', '*CEB7BCCB6A87F7DDEDB317025C9DDF59A32DC0EC', 'Junaidi', 'Mahasiswa', '3106100600'),
('3106100601', '*CFCC0AD6283A96B78C6CC495B3329EEBCB821595', 'Moh. Zainul Arif', 'Mahasiswa', '3106100601'),
('3106100603', '*5A35CE4D12107696E6835C129B194255C0AB92F3', 'A. Rofiq', 'Mahasiswa', '3106100603'),
('3107100604', '*E27EEF06F73AC9EB35CCAFFBE84A7C54CC31328F', 'Lukman Hakim', 'Mahasiswa', '3107100604'),
('3107100605', '*EBA0D83142BA6CCCA40038B1C98F399A59AE6C97', 'Annisa Harida', 'Mahasiswa', '3107100605'),
('3107100606', '*E08EC566CF18F1264D47DC2C6D12ED9FA81A21B0', 'Dwi Lestari', 'Mahasiswa', '3107100606'),
('3107100607', '*5CB069BD59C3F8B34D7DD047B7874E105FF82C00', 'Novita Firdiawati', 'Mahasiswa', '3107100607'),
('3107100608', '*229354A3F2EEDB0E610DEC4FD8E3408E8D663246', 'Siti Mariyam', 'Mahasiswa', '3107100608'),
('3107100609', '*ABC627DF99D227BFED657632180DBA984C3B6D06', 'Mohamad Zainul Arief', 'Mahasiswa', '3107100609'),
('3107100610', '*30B40C61B2BABAF2D4FE43E1F2997D5547448346', 'Ricky Hermawan', 'Mahasiswa', '3107100610'),
('3107100611', '*B0A1FE2D29D9BC790553D08B97E9331289F8595E', 'Yeyen Ari Sukma', 'Mahasiswa', '3107100611'),
('3107100612', '*8803CE9EDED96A18542701374B4F655870382DE3', 'Lalu Muhammad Saleh', 'Mahasiswa', '3107100612'),
('3107100613', '*884372EFF8DD685EB974C49616AE0E5DFD43FB73', 'Hairul Umam', 'Mahasiswa', '3107100613'),
('3107100614', '*81B7A0A6CE01C18B180BF9BBB76208561A292123', 'Brenda Thohar D. C.', 'Mahasiswa', '3107100614'),
('3107100615', '*47BE069C1E2B530C72F9FE49757414DAEDA1AAD7', 'Akwam Andy Syamsuri', 'Mahasiswa', '3107100615'),
('3107100616', '*E1A4C8F5ED4B1F145058839DB6B3D1B6F75B3793', 'Nurul Hidayat', 'Mahasiswa', '3107100616'),
('3107100617', '*D045DA5EBF71A90197AE9BE2D61A3D3FBAF1F248', 'Ririn Puji Astuti', 'Mahasiswa', '3107100617'),
('3107100618', '*5F53CFCEBB43489499C535ACB0DD2FCBB668A472', 'Tri Indah Permatasari', 'Mahasiswa', '3107100618'),
('3107100619', '*C5402B282CF2FC5C9BD1B7F749B9A6A48B3B290A', 'Raydise Putri Astrianda', 'Mahasiswa', '3107100619'),
('3107100620', '*D87E3A2C1562CDC32CD6A10DB538823DB041F183', 'Hari Bangun Nuswantoro', 'Mahasiswa', '3107100620'),
('3107100621', '*C431205979153FD2F1ED4BC7E563F9AE96027E77', 'Merry Dwi Jayanti', 'Mahasiswa', '3107100621'),
('3107100622', '*B59D44CBDE96380334330B884E978012507E7158', 'Ida Susiana', 'Mahasiswa', '3107100622'),
('3107100623', '*E9CF3DD55B1DB2DF10EF04CF638670C6ED4B86FA', 'Adam Fatkhiy', 'Mahasiswa', '3107100623'),
('3107100624', '*EF01FF0A4F06570D29F8C324AAEE42D52537A8A6', 'Budi Hartono', 'Mahasiswa', '3107100624'),
('3107100625', '*00A97543D5389EA33A38CB0B795CD5EA997C0BA3', 'Yeni Kusumawati', 'Mahasiswa', '3107100625'),
('3107100626', '*697683F4DD45E3F4EBF20358BB0528C03CF2FBBC', 'Dian Krisdianto', 'Mahasiswa', '3107100626'),
('3107100627', '*D5F5BA2AE131F9FE4466C80B54BFA3C76B9FF260', 'Alfian Adinata', 'Mahasiswa', '3107100627'),
('3107100628', '*04C3058626FDEA98953D07627EE5DF02BFEE4B52', 'Aditiya Ambarawardhana', 'Mahasiswa', '3107100628'),
('3107100629', '*F8F8B6A46DD8E4F6D58E78767693383AB62A2C16', 'Novi Indah Wijayanti', 'Mahasiswa', '3107100629'),
('3107100630', '*E620F559E7A1BE29D40B8A6DBA89DA219CF49E14', 'Yopi Heru Prayogi', 'Mahasiswa', '3107100630'),
('3108000677', '*ACFC1D2C5AC933D2A02045A23D52B9A60C167B28', 'Miftahul Ulum', 'Mahasiswa', '3108000677'),
('3108100615', '*45FBF56FCF06C92216AD31D86D7B10DD67D461BD', '', 'Mahasiswa', '3108100615'),
('3108100631', '*64EEDD2834E2CC8C376CBE2CEE34B59C7567398F', 'Ahmad Bahori', 'Mahasiswa', '3108100631'),
('3108100632', '*EBE9FC41381FD63021704A68C1818418469CE66D', 'Ana Maria Sofiana', 'Mahasiswa', '3108100632'),
('3108100633', '*2A2BADBEC4B722AE08AC7B8CB6C6A02C35475324', 'Andre Michael Hugo Meyer', 'Mahasiswa', '3108100633'),
('3108100634', '*AE84AFC2A51C30986AA6C31388EF286EFD566D49', 'Ari Rizki Yusnitasari', 'Mahasiswa', '3108100634'),
('3108100635', '*DAFB1D42A84E27E8643289648E06CAEEB961F254', 'Arief Rachman', 'Mahasiswa', '3108100635'),
('3108100636', '*F5AD254B3329322FC0FF17E7B11F7A39A44C1E59', 'Asri Nurlatiefah Utami', 'Mahasiswa', '3108100636'),
('3108100637', '*FD2DD145CEC5F5298C166C0C030E8D06A778D404', 'Ayu Kartika Sari', 'Mahasiswa', '3108100637'),
('3108100638', '*F535229E1C2F558F8E3091AE5A0A26E375CCA222', 'Bambang Sutikno', 'Mahasiswa', '3108100638'),
('3108100639', '*D180B691F3B68CCF93D644A7CDA3911DFAD39B7C', 'Davian Indra Wijaya', 'Mahasiswa', '3108100639'),
('3108100640', '*675B50F26C16593A5B08AAFCC8E149EF8505A480', 'Dwi Pramono', 'Mahasiswa', '3108100640'),
('3108100641', '*597055D9EE41DEC3AEE370980C002A475181991B', 'Dwi Septianita Wati', 'Mahasiswa', '3108100641'),
('3108100642', '*D7D44B7CD214DC2C69E3429E411C9C73E274F5DB', 'Dwika Nurwangita', 'Mahasiswa', '3108100642'),
('3108100643', '*CA564E98FCE8080D5AC2D2CD33F506D0EF45E858', 'Eka Retna Asih', 'Mahasiswa', '3108100643'),
('3108100644', '*B6F3CECB99D770F38E1DD1CC6C5B6DF25E91380D', 'Eka Wulandari', 'Mahasiswa', '3108100644'),
('3108100645', '*4BF769F60C7D86770BAB2915886C8B7D19F46D37', 'Eko Herdiyanto', 'Mahasiswa', '3108100645'),
('3108100646', '*1C8A19A80C10A866ED27738E5158A4F971F9DECC', 'Eliza Wati', 'Mahasiswa', '3108100646'),
('3108100647', '*3AE57E12696970CEF5F31596A73FFE3402D79C24', 'Ernawati', 'Mahasiswa', '3108100647'),
('3108100648', '*3C067ADF0E99A4C3B3455A1F1E1B949BB5C0FC83', 'Farida Trisilawati', 'Mahasiswa', '3108100648'),
('3108100649', '*81E782C497BF69F0CD6FE9374B4CC99C7E916F9D', 'Hendy Ahmad Habiby', 'Mahasiswa', '3108100649'),
('3108100650', '*B7EA2366FBC1158A42AB49B80F5CF95BF3F787DF', 'Heni Istriyaningsih', 'Mahasiswa', '3108100650'),
('3108100651', '*D2BDD344840BDA9712A4932C7B8611FF6DE3CAA3', 'Ike Stoviana Poetri', 'Mahasiswa', '3108100651'),
('3108100652', '*82187F608FF8BCB15CB50F3657D327659F57D5E2', 'Intan Wulandari', 'Mahasiswa', '3108100652'),
('3108100653', '*AE303FBE8553BAF04FE639640392D49D1D3635A8', 'Ivan Kurniawan', 'Mahasiswa', '3108100653'),
('3108100654', '*69DDD265D44EE44AB7A59A51440582F737028C49', 'Jufri Hafiki', 'Mahasiswa', '3108100654'),
('3108100655', '*8E754E2979E79A962B32290554CA8F0DD9A26374', 'Lena Ari Agustin', 'Mahasiswa', '3108100655'),
('3108100656', '*A096E6355E59D865FFFFBC38F24EBC1CF0B6B6F9', 'Moh Abdi Anshorullah', 'Mahasiswa', '3108100656'),
('3108100657', '*34CAB8EAFFCD57055906627F53DC63EC28E212C0', 'Neidia Fatma Prasanti', 'Mahasiswa', '3108100657'),
('3108100658', '*02F222DD46AE7644A620D8DA015866CE1E2C53D8', 'Novita Jayanti', 'Mahasiswa', '3108100658'),
('3108100659', '*F45B39CBBB709CB8BBF8195C892B7F5D85A8CB4C', 'R Sulaeman Effendi', 'Mahasiswa', '3108100659'),
('3108100660', '*B9CAA4EC508B77FB2C94837957D997DF0FE0C635', 'Rohman', 'Mahasiswa', '3108100660'),
('3108100661', '*5DEFF2801C3CDE2C346F8CD8054BD32695C330D3', 'Sholehudin', 'Mahasiswa', '3108100661'),
('3108100662', '*6091AAC0BAB34B6326A23219DA556A0ED079A1A8', 'Siti Nurliati', 'Mahasiswa', '3108100662'),
('3108100663', '*7789F9E07F9A2A64973C8667849FCBD823D1804C', 'Sugi Makmur Nanita ', 'Mahasiswa', '3108100663'),
('3108100664', '*7A137DE8DE668139CE35C5807DE4D7B4A0D01F4C', 'Sutra Kurniawati', 'Mahasiswa', '3108100664'),
('3108100665', '*72AF74AFD6FE88066D67C02A8D9B77DB89BA6E09', 'Tri Farida', 'Mahasiswa', '3108100665'),
('3108100666', '*2DEBF89DD2BC67F04960DCB3AED452DB5DAABFF8', 'Wiwik Puspitasari', 'Mahasiswa', '3108100666'),
('3108100667', '*7F46444450220692C29446645C417ABAFA46F436', 'Yudi Kurniawan', 'Mahasiswa', '3108100667'),
('3108100668', '*F85D070B8F2A80D41EBC7B718F444D58C298E028', 'Prakas Tian Valentino', 'Mahasiswa', '3108100668'),
('3108100669', '*EC2B59BC38494A304A32B17D837188B2C8B05EE3', 'Friska Mayangsari', 'Mahasiswa', '3108100669'),
('3108100670', '*32FA28E36E43C6F339C9C0BA94D6A69AED63D6A5', 'Kamila', 'Mahasiswa', '3108100670'),
('3108100671', '*92C3FA5C8CC97FCA2B16DF861C9FF2CE0504ED5E', 'Eny Suprapti', 'Mahasiswa', '3108100671'),
('3108100672', '*FE38B880D5DE85D195FC4D4B6B5DA53BBC6C18DE', 'Imelda Putri Febriana', 'Mahasiswa', '3108100672'),
('3108100673', '*ED47BFE07B07F2BC7DDD23528375385721EBB9A8', 'Firman Yulianto', 'Mahasiswa', '3108100673'),
('3108100674', '*9EDE56B50CF8D288117F7BE49DC6C8E003F8B021', 'Kiki Pahlevi', 'Mahasiswa', '3108100674'),
('3108100675', '*30F4B90CAE35A82129EB7AD6D5E97D1CD357FF7B', 'Andhi Jeksono', 'Mahasiswa', '3108100675'),
('3108100676', '*7BD8AC298D3D1CB7F0B33270245F811BDC27E6E9', 'Reni Hanggarani', 'Mahasiswa', '3108100676'),
('3109000677', '*ECCC0F0FCA9214A144E8378A3BC8109C2F2CE4F3', 'Abdul Hadi', 'Mahasiswa', '3109000677'),
('3109100678', '*0E82DA281371AFF9C8F87AA0E75B10E0427998FC', 'Cinta Utami P', 'Mahasiswa', '3109100678'),
('3109100679', '*E6B4203FBEECD50C5BEE4021D7DFCA264C8C759D', 'Sulaiman', 'Mahasiswa', '3109100679'),
('3109100680', '*358EC0498579D4C2B8A7FD64B2BA480A2FFBC49B', 'Andhika Maulana ', 'Mahasiswa', '3109100680'),
('3109100681', '*57F35E8BE701743B7B784D036C8A82084EE6FC6F', 'Leonardo B.P', 'Mahasiswa', '3109100681'),
('3109100682', '*18373E810253134A4B44409AAC8A0995A8981ED7', 'Putri Agustin Widiati ', 'Mahasiswa', '3109100682'),
('3109100683', '*51908D13767C9AF0EA070F874A9D0A738B5F04A0', 'Sintiya Fauzi', 'Mahasiswa', '3109100683'),
('3109100684', '*345ABEB13890706998E268B8FA2D4355C268228B', 'Heri Yono', 'Mahasiswa', '3109100684'),
('3109100685', '*8B719803C8F7DB1CE81984ED28F06A12C8575681', 'Eva Dwi Nurlita', 'Mahasiswa', '3109100685'),
('3109100686', '*B2363013C34EE9F8C24350E47000FDEC3E7546B0', 'Agus Sugiarto', 'Mahasiswa', '3109100686'),
('3109100687', '*2F9246A722FC6DCB7754564B1823049806EB02CD', 'Erick Surya Mada', 'Mahasiswa', '3109100687'),
('3109100688', '*86B90852139141ECD195EDC1C0D8B09091D67582', 'Dina Fafiana', 'Mahasiswa', '3109100688'),
('3109100689', '*93959B76BD142A9101CCC426F3917E67E0FA7226', 'Hefi Ermawati', 'Mahasiswa', '3109100689'),
('3109100690', '*ECCA2AB1990B2875A0A530E1025BA91B73E8F0DE', 'Ety Okta Suryani', 'Mahasiswa', '3109100690'),
('3109100691', '*E39CE95A5DAD06E6A8F983C3AB7E3783A6817CB9', 'Asep Didin', 'Mahasiswa', '3109100691'),
('3109100692', '*748E0D9EEC323E60205FA87A4597BEAEA7DBF500', 'Atik Karlina', 'Mahasiswa', '3109100692'),
('3109100693', '*216F0D574FD3E653E7929848978384DE84D340B4', 'Wahyu Fitria Apriliansyah ', 'Mahasiswa', '3109100693'),
('3109100694', '*EA486282FC26A9008F435B85230D540C462E2C16', 'Titis Antisa', 'Mahasiswa', '3109100694'),
('3109100695', '*4750B9A1C55BB90FF7326207FEB0CA5030ACDD2B', 'Nur Siami', 'Mahasiswa', '3109100695'),
('3109100696', '*B3DB8778F82DDC73B8C3917E038047AE0A80DFF2', 'Yuli Indrayana Mahardika', 'Mahasiswa', '3109100696'),
('3109100697', '*C14473AE152954D2686BC19199240FDC8D5ED051', 'Suprapti Anggraini', 'Mahasiswa', '3109100697'),
('3109100698', '*F5338D192E6AB4837A95B2F27FAD565C27A78E0E', 'Moch Amin Siddiq', 'Mahasiswa', '3109100698'),
('3109100699', '*E0D29CAA00D1DA02867050799162004B42088644', 'Dito Kurniyadi', 'Mahasiswa', '3109100699'),
('3109100700', '*4999BB52B7077DD2455E33233A418B25A05323BC', 'Fikri Agham Hakiki', 'Mahasiswa', '3109100700'),
('3109100701', '*6AB30DB5C5418272F441BA599864FB23570D0297', 'Dian Rahmawati ', 'Mahasiswa', '3109100701'),
('3109100702', '*9F7F01B3484431764F8E8A0AB205756B1039554A', 'Septi Wulandari', 'Mahasiswa', '3109100702'),
('3109100703', '*0DA504395F740E7C63992AC924FC26BD8BA022A7', 'Hery Setiawan', 'Mahasiswa', '3109100703'),
('3109100704', '*CA1CB52E8B4AC8B448CB16A05D66BF149676153E', 'Patria Kusumajati', 'Mahasiswa', '3109100704'),
('3109100705', '*1EB45DA477DD9B58C302B1041CA040D45D8554CB', 'Andy Himawan', 'Mahasiswa', '3109100705'),
('3109100706', '*DC50FF0BC03BBEC996522E1637D37BE9205D19D3', 'Siswanto', 'Mahasiswa', '3109100706'),
('3109100707', '*B6656903271F041E4F0D063ABC439B4FBCD869E7', 'M Nurudin', 'Mahasiswa', '3109100707'),
('3109100708', '*CD9875F66BE1605C9A41342C5D42B5E4E4172423', 'Sudarmini', 'Mahasiswa', '3109100708'),
('3109100709', '*61D3966CE33D4B9B3292408F11D59832812E8905', 'Siti Widayati DL', 'Mahasiswa', '3109100709'),
('3109100710', '*FC59CD09BC95B3187792D573BE0FFD84ECC2423D', 'Ida Ratna Santi', 'Mahasiswa', '3109100710'),
('3109100711', '*725A00C0305075748AD61278FEE69100CCE97D83', 'Tutik Pratama Yanti', 'Mahasiswa', '3109100711'),
('3109100712', '*4F955D7DE7613F01D781AC5C8483F654793572EB', 'Vidia Endang I', 'Mahasiswa', '3109100712'),
('3109100713', '*16AE7F3497149828E7522DB3712EEF54A0C90A5F', 'Sukron Makmun H', 'Mahasiswa', '3109100713'),
('3109100714', '*85CFFC897387ABE58AE79492AF228E5EF76D40F8', 'Ibnu Salaf', 'Mahasiswa', '3109100714'),
('3109100715', '*6FF1FF509ED00907E953E6FAF355699D6327BE40', 'Lutfi Hakim', 'Mahasiswa', '3109100715'),
('3109100716', '*535F00686E84CC2858F44A8ACD535B063F69416B', 'Dian Rosida', 'Mahasiswa', '3109100716'),
('3109100717', '*A278E4DE11BB85D0C170FB39A45A09578D423620', 'Moh Nuris Sofyan', 'Mahasiswa', '3109100717'),
('3109100718', '*FC8916840384F2B195E39AA6EA35808CE87FE14A', 'Rosfita Romadhani', 'Mahasiswa', '3109100718'),
('3109100719', '*B94A5C74B980433E1E719F568DEF5C3D956A435D', 'Dewi Purwati', 'Mahasiswa', '3109100719'),
('3109100720', '*1C370AA985352431A5FED8BEB793A07304785565', 'Erma Hidayati', 'Mahasiswa', '3109100720'),
('3109100721', '*2ACCDE6023EEE3E7AB2598F68DB41B8498BBB94A', 'Anang Maruf', 'Mahasiswa', '3109100721'),
('3109100722', '*AB8A5BF4C676A258EEC2D018FA21CD0402040380', 'Niersa Marga Sulistiyanto ', 'Mahasiswa', '3109100722'),
('3109100723', '*5B21B174A48654A277D0A21DC434077CEB13817C', 'Yuyun Susilawati', 'Mahasiswa', '3109100723'),
('3109100724', '*A590F0D83E82A45D0A4857A46171D54F573BE48E', 'Kukuh Budi Satrio', 'Mahasiswa', '3109100724'),
('3109100725', '*519AB6D4CFE18EFC80F1BE424740BDF194DB65E0', 'Moh Syahril', 'Mahasiswa', '3109100725'),
('3109100726', '*252E4B7FAFECE6E1FFD2EA08789B31D3F281A947', 'Rini Siti Rokaya', 'Mahasiswa', '3109100726'),
('3109100727', '*8776C8BD0C3EDF99EC553FA89D6070A98FBD6CE9', 'Erwin Agus Sugianto', 'Mahasiswa', '3109100727'),
('3109100728', '*246507203824BA2B6307814DD5D93053E8CF61A8', 'Yunda Ardianingrum', 'Mahasiswa', '3109100728'),
('rudi', '545d1a4658d63f4e', 'Rudi Hartono, SE', 'PA', '6'),
('yoyon', '*0E2629FFB245BFDF78438894C8702E1CD0092FA8', 'Yoyon Arie Budi, ST', 'PA', '5'),
('solehatin', '*A060F9E5F4F3C4832C63FE84DCA86A6952C9D4A2', 'Solehatin, S.Kom', 'PA', '4'),
('eko', '*E0707B5CB9A4521B1AC58BBA5E3AB5EA5C744067', 'Drs. Eko Listiwikono, MM', 'PA', '3'),
('feirus', '*FB9437EE1689D1F47E1DCA8009048FD25470BE7C', 'Mohammad Feirus Abadi, S.Pd', 'PA', '2'),
('anam', '*91F7EA6036A04AC3DABBFE0480A01AA27F053CED', 'H. Chairul Anam, SE', 'PA', '1'),
('admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 'Administrator', 'admin', 'admin'),
('tintin', '*3C04FBB4AE79ED3C4FAD30946B94904D1CA0ACFB', 'Tintin Harlina, S.Kom', 'PA', '7'),
('rahman', '*14D10CA27A4134AD46EF6D2386A1119B5A882517', 'Rahman Yulianto, S.Kom', 'PA', '8'),
('slamet', '*902647C54593668555FD2B47E0F106C0AF0D5BAA', 'Slamet Siswanto U, ST', 'PA', '9'),
('agus', '*809312860A5AB082E7D21D361D527FFD0FE3D432', 'Drs. Agus Riyono', 'PA', '10'),
('juniharto', '*59962FBA5EE766F9E6EFB303BDCF3464DD1A9649', 'Djuniharto, SE', 'PA', '11'),
('najib', '*99CD900F16CE3F2686E060F2817DB7A21055E33E', 'Ir. H. Moch. Najib, MM', 'PA', '12'),
('haykal', '*67FD9B2C148C0DA60EB5DEFC5DDF63F79A89460A', 'Haykal, S.Pd, MT', 'PA', '14'),
('dwi', '*8A17C7CA5005815A9161F0F7DE4F3078A48A0106', 'Dwi Yulian RL, S.Kom', 'PA', '15'),
('erda', '*3E52230B7E54CE7A136C9BF91BABCB8302743AEB', 'Erda Habiby, ST', 'PA', '16'),
('dedi', '*EB843EC8306F24E29F211198F55C4B09E7183AA1', 'Drs. Mohamad Dedi', 'PA', '17'),
('ekoheri', '*ECD53870892C07291B68ED1C418F2CF061483A48', 'Eko Heri Susanto, S.Kom', 'PA', '18'),
('berlian', '*F00F0CFFDF6D89413F719937332C7D275097ABF6', 'Ferdi Berlianto, ST', 'PA', '19'),
('iman', '*CDD59F95E7DFC9515B5BC3B6F6CFC9DBF6435BA2', 'Iman Santoso', 'PA', '20'),
('hadiq', '*9131276CE8B10303E2A8E72FF0E733BA596A8F54', 'Hadiq, ST', 'PA', '21'),
('lukman', '*61A87EFA5706CD3DF2E796F0005595E519EBB245', 'Lukman Ariefi M, M.Pd', 'PA', '23'),
('bambang', '*D08D6DE0A520C41345911E71269AC1EC3D8D7F80', 'Drs. Bambang Priyono', 'PA', '24'),
('ismurdianto', '*630A062BC04E95E08A6A95D4653DB5E5660A29EF', 'Drs. Ismurdianto', 'PA', '25'),
('ahmadi', '*A9B5ADFA6FD9462B96B96FC08A8A1284F1854C8F', 'Nur Ahmadi, ST', 'PA', '26'),
('sudjadi', '*A03B2E7C9896F3B8599DFCFD6C027C89DE2C7410', 'Sudjadi, MT', 'PA', '27');

-- --------------------------------------------------------

--
-- Table structure for table `tblmatkul`
--

CREATE TABLE IF NOT EXISTS `tblmatkul` (
  `id_mk` int(10) NOT NULL AUTO_INCREMENT,
  `semester` int(2) NOT NULL,
  `kode_mk` int(10) NOT NULL,
  `nama_mk` varchar(200) NOT NULL,
  `sks` int(2) NOT NULL,
  `id_dosen` int(10) NOT NULL,
  `prasyarat` varchar(20) NOT NULL,
  `prodi` varchar(2) NOT NULL,
  PRIMARY KEY (`id_mk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

--
-- Dumping data for table `tblmatkul`
--

INSERT INTO `tblmatkul` (`id_mk`, `semester`, `kode_mk`, `nama_mk`, `sks`, `id_dosen`, `prasyarat`, `prodi`) VALUES
(1, 1, 3009201, 'Manajemen Umum', 2, 1, '', 'MI'),
(2, 1, 3009501, 'Bahasa Inggris I', 2, 2, '', 'MI'),
(3, 1, 3009202, 'Matematika Dasar', 3, 3, '', 'MI'),
(4, 1, 3009303, 'Algoritma & Pemrograman I', 3, 4, '', 'MI'),
(5, 1, 3009301, 'Instalasi Komputer', 2, 5, '', 'MI'),
(6, 1, 3009302, 'Komputer Akuntansi', 3, 6, '', 'MI'),
(7, 1, 3009203, 'Pengantar Teknologi Informasi', 2, 7, '', 'MI'),
(8, 1, 3009304, 'Desain Grafis I', 2, 8, '', 'MI'),
(9, 2, 3009305, 'Sistem Operasi', 3, 9, '3009301', 'MI'),
(10, 2, 3009307, 'Desain Grafis II', 2, 8, '3009304', 'MI'),
(11, 2, 3009503, 'Bahasa Indonesia', 2, 10, '', 'MI'),
(12, 2, 3009306, 'Algoritma & Pemrograman II', 3, 4, '3009303', 'MI'),
(13, 2, 3009204, 'Sistem Informasi Manajemen', 2, 11, '3009203', 'MI'),
(14, 2, 3009206, 'Matematika Diskrit', 3, 12, '3009202', 'MI'),
(15, 2, 3009205, 'Pengolahan Basis Data', 3, 7, '', 'MI'),
(16, 2, 3009402, 'Praktikum Komputer Akuntansi', 1, 13, '3009302', 'MI'),
(17, 2, 3009401, 'Praktikum Instalasi', 1, 13, '3009301', 'MI'),
(18, 3, 3009403, 'Metode Penelitian Ilmiah', 2, 14, '3009503', 'MI'),
(19, 3, 3009312, 'Rekayasa Perangkat Lunak', 3, 15, '3009306', 'MI'),
(20, 3, 3009311, 'Implementasi Basis Data', 2, 7, '3009205', 'MI'),
(21, 3, 3009310, 'Pemrograman Visual', 2, 4, '3009306', 'MI'),
(22, 3, 3009309, 'Jaringan Komputer', 2, 16, '3009301', 'MI'),
(23, 3, 3009208, 'Kewirausahaan', 2, 17, '', 'MI'),
(24, 3, 3009308, 'Desain Web', 2, 18, '3009307, 3009203', 'MI'),
(25, 3, 3009207, 'Sistem Digital', 3, 19, '3009301', 'MI'),
(26, 3, 3009209, 'Teknik Riset Operasional', 2, 20, '3009202', 'MI'),
(27, 3, 3009404, 'Praktikum Pemrograman', 1, 13, '3009306', 'MI'),
(28, 4, 3009313, 'Analisis & Desain Sistem Informasi', 3, 15, '3009204, 3009312', 'MI'),
(29, 4, 3009317, 'Pemrograman Client/Server', 3, 21, '3009311', 'MI'),
(30, 4, 3009314, 'Interaksi Manusia & Komputer', 2, 15, '3009310', 'MI'),
(31, 4, 3009210, 'Statistik', 2, 17, '3009202', 'MI'),
(32, 4, 3009318, 'Pemrograman Berbasis Web', 3, 18, '3009308, 3009306', 'MI'),
(33, 4, 3009407, 'Seminar Manajemen', 2, 17, '3009403', 'MI'),
(34, 4, 3009316, 'Object Oriented Programming', 3, 14, '3009306', 'MI'),
(35, 4, 3009315, 'Sistem Informasi Akuntansi', 2, 6, '3009302, 3009204', 'MI'),
(36, 4, 3009406, 'Praktikum Basis Data', 1, 13, '3009311', 'MI'),
(37, 4, 3009405, 'Praktikum Jaringan', 1, 13, '3009309', 'MI'),
(38, 5, 3009319, 'Sistem Security', 2, 5, '3009309', 'MI'),
(39, 5, 3009320, 'E-Business', 2, 17, '3009208, 3009203', 'MI'),
(40, 5, 3009212, 'Analisa Numerik', 2, 12, '3009202', 'MI'),
(41, 5, 3009211, 'Perilaku Dalam Organisasi', 2, 20, '3009201', 'MI'),
(42, 5, 3009101, 'Pancasila & Kewarganegaraan', 2, 23, '', 'MI'),
(43, 5, 3009408, 'Praktek Kerja Lapangan (PKL)', 3, 13, '80 SKS', 'MI'),
(44, 5, 3009321, 'Analisis Bisnis', 2, 17, '3009208', 'MI'),
(45, 5, 3009409, 'Praktikum Sistem Informasi Akuntansi', 1, 13, '3009315', 'MI'),
(46, 5, 3009411, 'Praktikum Web', 1, 13, '3009318', 'MI'),
(47, 5, 3009410, 'Prkatikum Client/Server', 1, 13, '3009317', 'MI'),
(48, 5, 3009102, 'Agama', 2, 23, '', 'MI'),
(49, 6, 3009504, 'Ke-PGRI-an', 2, 24, '', 'MI'),
(50, 6, 3009213, 'Sistem Manajemen Mutu', 2, 25, '3009201', 'MI'),
(51, 6, 3009412, 'Tugas Akhir', 4, 13, '104 SKS', 'MI'),
(52, 2, 3009502, 'Bahasa Inggris II', 2, 2, '3009501', 'MI'),
(53, 1, 1009101, 'Agama', 2, 23, '', 'TI'),
(54, 1, 1009201, 'Matematika Dasar', 3, 3, '', 'TI'),
(55, 1, 1009202, 'Pengantar Teknologi Informasi', 2, 7, '', 'TI'),
(56, 1, 1009203, 'Manajemen Umum', 2, 25, '', 'TI'),
(57, 1, 1009301, 'Algoritma & Pemrograman I', 3, 21, '', 'TI'),
(58, 1, 1009302, 'Instalasi Komputer', 2, 16, '', 'TI'),
(59, 1, 1009303, 'Desain Grafis I', 2, 8, '', 'TI'),
(60, 1, 1009501, 'Bahasa Inggris I', 2, 2, '', 'TI'),
(61, 2, 1009102, 'Pancasila & Kewarganegaraan', 2, 23, '', 'TI'),
(62, 2, 1009204, 'Matematika Diskrit', 3, 12, '1009201', 'TI'),
(63, 2, 1009205, 'Jaringan Komputer I', 2, 5, '1009302', 'TI'),
(64, 2, 1009206, 'Sistem Informasi Manajemen', 2, 11, '1009203', 'TI'),
(65, 2, 1009207, 'Sistem Digital', 3, 19, '1009302', 'TI'),
(66, 2, 1009304, 'Algoritma & Pemrograman II', 3, 21, '1009301', 'TI'),
(67, 2, 1009305, 'Desain Grafis II', 2, 8, '1009303', 'TI'),
(68, 2, 1009401, 'Praktikum Maintenance', 1, 13, '1009302', 'TI'),
(69, 2, 1009502, 'Bahasa Inggris II', 2, 2, '1009501', 'TI'),
(70, 3, 1009208, 'Aljabar Linier', 2, 12, '1009201', 'TI'),
(71, 3, 1009209, 'Pengolahan Basis Data', 3, 6, '1009206', 'TI'),
(72, 3, 1009210, 'Software Engine Fundamental', 3, 15, '1009304', 'TI'),
(73, 3, 1009211, 'Organisasi Komputer', 2, 11, '1009207', 'TI'),
(74, 3, 1009306, 'Struktur Data', 3, 14, '1009304', 'TI'),
(75, 3, 1009307, 'Jaringan Komputer II', 2, 9, '1009205', 'TI'),
(76, 3, 1009308, 'Animasi Grafis', 2, 26, '1009305', 'TI'),
(77, 3, 1009309, 'Pemrograman Visual', 2, 21, '1009304', 'TI'),
(78, 3, 1009503, 'Bahasa Indonesia', 2, 10, '', 'TI'),
(79, 3, 1009402, 'Praktikum Algoritma & Pemrograman', 1, 13, '1009304', 'TI'),
(80, 3, 1009403, 'Praktikum Jaringan I', 1, 13, '1009205', 'TI'),
(81, 4, 1009212, 'Analisa Numerik', 2, 12, '1009208', 'TI'),
(82, 4, 1009213, 'Software Modelling', 2, 18, '1009210', 'TI'),
(83, 4, 1009310, 'ADSI', 2, 15, '1009206, 1009210', 'TI'),
(84, 4, 1009311, 'Sistem Operasi', 3, 9, '1009211, 1009205', 'TI'),
(85, 4, 1009312, 'Implementasi Basis Data', 2, 1, '1009209', 'TI'),
(86, 4, 1009313, 'OOP', 3, 14, '1009304', 'TI'),
(87, 4, 1009314, 'Desain Web', 2, 18, '1009202', 'TI'),
(88, 4, 1009315, 'Pengolahan Citra Digital', 3, 21, '1009208', 'TI'),
(89, 4, 1009404, 'Jaringan Komputer II', 1, 13, '1009307, 1009403', 'TI'),
(90, 4, 1009412, 'MPI', 3, 3, '1009503', 'TI'),
(91, 5, 1009214, 'Kriptografi', 3, 5, '1009204, 1009307', 'TI'),
(92, 5, 1009215, 'Kecerdasan Buatan', 2, 9, '1009204', 'TI'),
(93, 5, 1009316, 'ADBO', 3, 18, '1009313', 'TI'),
(94, 5, 1009317, 'Multimedia', 3, 26, '1009308', 'TI'),
(95, 5, 1009318, 'Pemrograman C++', 3, 14, '1009304', 'TI'),
(96, 5, 1009319, 'Pemrograman Client/Server', 3, 21, '1009309, 1009312', 'TI'),
(97, 5, 1009320, 'Pemrograman Berbasis Web', 3, 18, '1009314, 1009304', 'TI'),
(98, 5, 1009405, 'Praktikum Basis Data', 1, 13, '1009312', 'TI'),
(99, 5, 1009406, 'Praktikum Pengolahan Citra', 1, 13, '1009315', 'TI'),
(100, 6, 1009216, 'Statistik', 2, 17, '1009201', 'TI'),
(101, 6, 1009217, 'TRO', 2, 20, '1009201', 'TI'),
(102, 6, 1009321, 'IMK', 2, 15, '1009309', 'TI'),
(103, 6, 1009322, 'Pemrograman Java', 3, 9, '1009304', 'TI'),
(104, 6, 1009323, 'Multimedia Lanjut', 2, 26, '1009317', 'TI'),
(105, 6, 1009324, 'Sistem Security', 2, 5, '1009307, 1009214', 'TI'),
(106, 6, 1009325, 'Decision Support System', 2, 15, '1009310', 'TI'),
(107, 6, 1009407, 'Praktikum Pemrograman Client/Server', 1, 13, '1009319, 1009405', 'TI'),
(108, 6, 1009408, 'Praktikum Web', 1, 13, '1009320', 'TI'),
(109, 6, 1009409, 'Praktikum OOP', 1, 13, '1009313', 'TI'),
(110, 6, 1009413, 'Tugas Proyek', 4, 13, '106 SKS', 'TI'),
(111, 7, 1009103, 'Kepemimpinan', 2, 3, '', 'TI'),
(112, 7, 1009218, 'Kewirausahaan', 2, 20, '1009203', 'TI'),
(113, 7, 1009410, 'Praktikum C++', 1, 13, '1009318', 'TI'),
(114, 7, 1009411, 'Praktikum Java', 1, 13, '1009322', 'TI'),
(115, 7, 1009414, 'KKN', 3, 13, '128 SKS', 'TI'),
(116, 8, 1009504, 'Ke-PGRI-an', 2, 24, '', 'TI'),
(117, 8, 1009415, 'Skripsi', 6, 13, '137 SKS', 'TI');

-- --------------------------------------------------------

--
-- Table structure for table `tblpengumuman`
--

CREATE TABLE IF NOT EXISTS `tblpengumuman` (
  `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT,
  `judul_pengumuman` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `penulis` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblpengumuman`
--

INSERT INTO `tblpengumuman` (`id_pengumuman`, `judul_pengumuman`, `isi`, `tanggal`, `penulis`) VALUES
(1, 'Jadwal Pengisian KRS Semester Ganjil 2010-2011', '<p><span>Jadwal Pengisian KRS Semester Ganjil 2010-2011 dimulai tanggal 27 Agustus 2010 s/d 25 September 2010 via online. Bagi yang telat, dianggap cuti.</span></p>', '2010-10-09', 'hadiq'),
(2, 'Perkuliahan Semester Ganjil 2010-2010', '<p><span>Perkuliahan Semester Ganjil 2010-2010 dimulai setelah libur hari raya Idul Fitri tanggal 27 September <sup>2010.</sup></span></p>', '2010-10-09', 'hadiq'),
(3, 'Pelaksanaan PLK MaBa 2010', '<p><span>Untuk Pelaksanaan PLK MaBa 2010 akan dilaksanakan pada tanggal 23 September - 25 September 2010.</span></p>', '2010-10-09', 'hadiq'),
(4, 'Perpanjangan Waktu Pengurusan KRS', '<p><span>Karena banyaknya jadwal yang tidak sesuai, maka pelaksanaan KRS yang seharusnya berakhir hari sabtu tanggal 25 September 2010, diperpanjang hingga Senin 27 September 2010.</span></p>', '2010-10-09', 'hadiq');

-- --------------------------------------------------------

--
-- Table structure for table `tblsoal`
--

CREATE TABLE IF NOT EXISTS `tblsoal` (
  `id_soal` int(10) NOT NULL AUTO_INCREMENT,
  `no_soal` int(10) NOT NULL,
  `id_matkul` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `pertanyaan` text COLLATE latin1_general_ci NOT NULL,
  `jwb_a` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `jwb_b` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `jwb_c` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `jwb_d` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `jwb_e` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `kunci` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `author` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tblsoal`
--

INSERT INTO `tblsoal` (`id_soal`, `no_soal`, `id_matkul`, `pertanyaan`, `jwb_a`, `jwb_b`, `jwb_c`, `jwb_d`, `jwb_e`, `kunci`, `author`) VALUES
(1, 1, '5', 'Manakah yang termasuk ke dalam periperal Input di dalam komputer...', 'Mouse', 'Printer', 'Scanner', 'Monitor', '', 'a', 'yoyon'),
(2, 1, '5', 'Kepanjangan dari RAM adalah...', 'Random Algorithm Management', 'Random Access Memory', 'Rational Access Management', '', '', 'b', ''),
(3, 1, '8', 'Salah satu software pengolah gambar yang dikhususkan untuk gambar vektor ialah...', 'Photoshop', 'Gimp', 'Corel Draw', '', '', 'c', ''),
(4, 1, '22', 'Komputer yang berfungsi untuk melayani komputer-komputer lainnya disebut...', 'Server', 'Repeater', 'Switch', '', '', 'a', ''),
(5, 2, '5', 'Dibawah ini yang bukan merupakan jenis-jenis kabel jaringan ialah...', 'UTP', 'Coaxial', 'Power', 'Fibre Optik', '', 'c', ''),
(6, 1, '5', 'Perangkat lunak yang bukan merupakan katagori kelompok sistem operasi adalah :', 'Ms Windows', 'Spreedsheet Calc', 'Linux', '', '', 'b', ''),
(7, 1, '5', 'Sistem Operasi adalah software atau perangkat lunak untuk keperluan...', 'Aplikasi pengolah kata', 'Aplikasi pengolah angka', 'Menjalankan program aplikasi lain di atasnya', '', '', 'c', ''),
(8, 1, '5', 'Secara garis besar sebuah sistem komputer dibagi kedalam tiga katagori yaitu input device, prosesing device dan output device. Yang tidak termasuk ke dalam katagori input device adalah...', 'Keyboard', 'Scanner', 'Monitor', 'Michrophone', '', 'c', ''),
(9, 1, '5', 'Linux adalah sistem operasi yang menggunakan lisensi GPL, Kepanjangan dari GPL adalah...', 'General Public Linux', 'General Public License', 'General Private Linux', 'General Private License', '', 'b', ''),
(10, 1, '5', 'Ada banyak media penyimpan data yang bisa digunakan saat ini. Diantara media-media penyimpan data yang disebutkan di bawah ini, mana yang memiliki kapasitas paling kecil...', 'Flashdisk', 'Disket', 'Harddisk', 'CD (Compact Disk)', '', 'b', ''),
(11, 1, '5', 'Berdasarkan bentuknya, media penyimpan dapat dibagi kedalam 3 kelompok, yaitu magnetis, optis, Elektronis. Yang termasuk kedalam media penyimpan optic adalah...', 'CD', 'Memory', 'Disket', 'Hard Disk', '', 'a', ''),
(12, 2, '5', 'Untuk melakukan penelusuran informasi di internet, diperlukan software browser. Yang bukan merupakan software browser di bawah ini adalah..', 'Netscape Navigator', 'Firefox', 'Internet Explorer', 'Ms. Power Point', 'Safari', 'd', ''),
(13, 2, '5', 'Dalam perkembangannya isi (content) dari halaman web menjadi bervariasi, sehingga browser menjadi lebih menarik dan interaktif. Berikut yang tidak / belum tersedia sebuah halaman web...', 'Teks', 'Gambar', 'Audio', 'Aroma', '', 'd', ''),
(14, 2, '5', 'Untuk membuka halaman web (website)tertentu, kita harus mengetahui alamat URL (Uniform Resource Locator) dan menuliskannya di...', 'Address', 'Password', 'ID', 'Favorite', '', 'a', ''),
(15, 2, '5', 'Situs yang berisi fasilitas pencarian informasi disebut dengan situs ...', 'Web Mail', 'Portal', 'Search Engine', 'Berita', 'Jejaring Sosial', 'c', ''),
(16, 1, '4', 'Yang bukan merupakan tipe data dalam pemrograman C# adalah...', 'Int', 'Char', 'Double', 'For', '', 'd', ''),
(17, 1, '4', 'Salah satu fungsi perulangan yang sering dipakai dalam dunia pemrograman adalah...', 'While', 'If', 'Switch', 'Or', '', 'a', ''),
(18, 1, '87', 'Kepanjangan dari CSS adalah...', 'Cascading Style Sheet', 'Component Social System', 'Configuration Style System', '', '', 'a', ''),
(19, 1, '87', 'Sub-sub menu yang muncul ketika suatu link disentuh/on hover disebut...', 'Slide', 'Drop Down', 'Tab', 'Tree', '', 'b', ''),
(20, 1, '87', 'Yang bukan merupakan attribut dari tag table ialah...', 'width', 'height', 'align', 'border', 'id', 'e', ''),
(21, 1, '87', 'Fungsi dari tag br dalam penulisan kode HTML ialah....', 'Memberikan jarak ke bawah tanpa spasi', 'Memberikan jarak ke bawah dengan 1 spasi', 'Memberikan jarak ke bawah dengan 2 spasi', 'Memberikan jarak ke bawah dengan 3 spasi', '', 'a', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblsoalpolling`
--

CREATE TABLE IF NOT EXISTS `tblsoalpolling` (
  `id_soal_poll` int(3) NOT NULL AUTO_INCREMENT,
  `soal_poll` text COLLATE latin1_general_ci NOT NULL,
  `status` char(1) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_soal_poll`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblsoalpolling`
--

INSERT INTO `tblsoalpolling` (`id_soal_poll`, `soal_poll`, `status`) VALUES
(1, 'Bagaimana pelaksanaan proses akademik di semester genap ini?', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbltutorial`
--

CREATE TABLE IF NOT EXISTS `tbltutorial` (
  `id_tutorial` int(3) NOT NULL AUTO_INCREMENT,
  `id_kategori_tutorial` int(3) NOT NULL,
  `judul_tutorial` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `author` varchar(20) NOT NULL,
  `counter` int(3) NOT NULL,
  PRIMARY KEY (`id_tutorial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `tbltutorial`
--

INSERT INTO `tbltutorial` (`id_tutorial`, `id_kategori_tutorial`, `judul_tutorial`, `isi`, `gambar`, `tanggal`, `waktu`, `author`, `counter`) VALUES
(1, 1, 'Membuat Script Program Posting ke Twitter dengan PHP', 'Kamu punya account di Twitter dan kebetulan seorang programming? Anda baca di artikel yang tepat. Sebenarnya walaupun kamu bukan seorang programmer pun, kamu pasti akan mengerti beberapa potong baris kode PHP ini karena sangat mudah dimengerti dan diterapkan.\r\n\r\nSyarat untuk menjalankan program ini hanya cukup mempunyai satu server, baik server gratisan maupun server milik pribadi ataupun localhost asalkan ada Apache / IIS. Di bawah ini, saya akan berikan script php program untuk memposting / mengupdate aktivitas anda ke Twitter dengan PHP, gantikan saja username dan password serta message sesuai dengan apa yang kamu kehendaki:\r\n\r\nJika program ini berhasil dijalankan, maka postingan anda akan tampil di timeline Twitter kamu dan akan muncul pesan success, dan jika gagal, akan muncul pesan kesalahan. Hati-hati jika kamu mengcopy baris program php ini, terutama pada bagian quote (?). Jika ingin copy paste kode php ini, setelah kamu copy, periksa tanda tersebut, biasanya akan muncul kesalahan, jadi lebih baik untuk ketik ulang sesuai dengan baris diatas. Silahkan coba dijalankan atau dimodifikasi sehingga program ini akan lebih fleksibel dan mudah dipakai. Cara ini akan membuka wawasanmu betapa mudahnya bikin program untuk akses ke Twitter karena Twitter memang menyediakan API yang memudahkan user untuk melakukan login ke account secara gampang.\r\n', 'php-logo.jpg', '2010-07-25', '00:00:00', 'rudi', 5),
(2, 3, 'Mempercepat Dan Mengoptimalkan Proses Komputer Kita', 'Tidak ada salahnya menggunakan komputer apa adanya. Tentu saja, ada risikonya. Misalnya, komputer kian hari kian lambat. Padahal perawatan sudah dijalankan. Baik meng-update driver, menghapus file sampah, dan beragam perawatan rutin lain.Atau mungkin komputer berjalan stabil, namun suara yang ditimbulkannya sangat mengganggu. Masalah burn CD kadang juga membuat jengkel. Apalagi misalnya, CD tersebut hendak digunakan pada audio di mobil.Sebel memang jika PC tidak menuruti kemauan kita sebagai pemiliknya. Semua masalah yang mungkin timbul seperti di atas disebabkan PC yang liar. Seperti kuda dari padang rumput, sebelum digunakan harus dijinakkan terlebih dahulu. Agar kita terhindar dari ketidaknyamanan menungganginya.Berikut ini akan dijelaskan bagaimana cara menanggulangi berbagai permasalahan saat menggunakan PC, baik di rumah maupun di tempat kerja. Kami juga menambahkan cara penyelamatan data e-mail. Selamat mencoba!.\r\n\r\n<b>1. Percepat Booting dan Ringankan beban CPU</b>\r\nSeiring dengan waktu, lama kelamaan PC terasa makin lambat dan ?berat?. Apa saja yang dapat dilakukan untuk menanggulanginya?\r\nLangkah pertama mempercepat boot via BIOS. Untuk keterangan selengkapnya, Anda dapat melihatnya pada ?Menguak Tabir BIOS? di PC Media 04/2004 yang lalu.? Selanjutnya mulai ke area operating system. Untuk Windows XP, mulai dengan membuka System Configuration Utility. Pada tab BOOT.INI, beri tanda (P) pada ?/NOGUIBOOT?. Ini akan mempersingkat waktu boot dengan menghilangkan Windows startup screen. Pada tab Startup, seleksi ulang seminimal mungkin item yang sangat dibutuhkan. Hal yang sama juga dilakukan pada service yang dijalankan. Usahakan jumlah service yang ter-load tidak lebih dari 25.\r\n\r\n<b>2. Overclock</b>\r\nIni bagian yang paling menarik. Pada bagian ini kami akan memandu overclocking, dengan mengandalkan beberapa software yang bisa di-download gratis dari internet.\r\n\r\nOverclock Motheboard\r\nUntuk melakukan overclock terhadap motherboard sedikit berbeda. Anda harus menyesuaikan aplikasi sesuai dengan chipset motherboard. Di sini kami mengambil contoh overclocking dua buah motherboard. Pertama adalah motherboard dengan chipset nForce2.\r\n\r\n<b>3. Upgrade Processor</b>\r\nSebelum membeli sebuah processor baru, pastikan bahwa motherboard yang Anda miliki mampu mendukung calon processor baru Anda (lihat tabel ?Chipset dan Processor Support?). Selain itu, pastikan juga maksimum FSB untuk processor yang mampu didukung motherboard Anda. Hal ini juga berhubungan banyak dengan chipset yang digunakan pada motherboard Anda.\r\n\r\nSebagai contoh untuk processor Intel. Chipset Intel seri 845 hanya memiliki bus maksimal 533 MHz. Berbeda dengan chipset Intel 848 ataupun 875P yang sudah mampu bekerja dengan processor dengan bus 800 MHz.\r\n\r\nHal ini juga berlaku untuk processor AMD. Seperti VIA KT400 yang belum bisa bekerja dengan bus processor 400 MHz. Berbeda dengan KT600 yang sudah mampu bekerja pada bus processor 400 MHz.\r\n\r\nAda baiknya juga untuk memastikan produsen motherboard yang Anda gunakan menyediakan update BIOS pada situsnya. Terutama update BIOS untuk kecepatan processor yang terbaru. Update BIOS diperlukan sekiranya BIOS lama motherboard Anda belum mendukung (biasanya) multiplier processor terbaru.', 'hardware-logo.jpg', '2010-07-25', '00:00:00', 'rudi', 10),
(3, 1, 'Membuat Pilihan Tanggal Dengan Combo Box Pada PHP ', 'Biasanya ketika kita membuat suatu web, pastinya terdapat unsur taanggal bukan? Nah, disini saya akan menuliskan bagaimana cara membuatnya dengan bahasa PHP. Salah satu cara untuk memilih tanggal adalah menggunakan ComboBox. Tujuan dengan menggunakan ComboBox adalah untuk mempermudah user dalam memilih pilihan yang sudah disediakan. Hal ini juga menghindari kesalahan user dalam penulisan suatu', 'php-logo.jpg', '2010-07-25', '00:00:00', 'rudi', 13),
(4, 1, 'Membuat Hit Counter Dengan PHP', 'Pada artikel kali ini, aku akan men-share sedikit script PHP untuk membuat counter sederhana seperti yang terdapat di bagian footer website ini. Bagi kamu yang udah ngerasa expert, sebaiknya berhenti membaca sekarang juga, karna dari judulnya, kamu seharusnya tau bahwa kita cuma mo bikin counter simple. Cara kerja counter ini kurang lebih kayak gini: halaman utama dibuka-&gt;input ke ', 'php-logo.jpg', '2010-07-25', '00:00:00', 'yoyon', 20),
(5, 5, 'Mengembalikan Panel di Gnome Seperti Sedia Kala', 'Tahu lah ya kita sebagai pengguna Linux itu maunya terus bereksperiment dengan penampilan sehingga sering kali kita merubahnya kelewat ekstrim sehingga seringkali bentuknya sudah tidak dikenali lagi. Ini yang terjadi pada saya sewaktu saya bereksperimen dengan panel di Sabily 9.04 saya. Tapi rupanya saya tidak sengaja mendelete network launcher di panel :(\r\n\r\nNah Memang bisa saja saya mengkostum Panel Gnome seperti pernah saya tanyakan ke master linux, mas Andy MSE. Namun hasil dari pimpin my panel saya terlalu ekstrim sehingga saya sendiri tidak mengenali lagi ini Ubuntu atau apa? hehehehe. akhirnyasaya men-searching di embah google cara me restore Gnome Panel seperti sediakala layaknya baru diinstal. berikut caranya:\r\n\r\npertama: ke <b>Applications > Acessories > Terminal</b>\r\n\r\nkedua: setelah masuk Terminal, ketik kode berikut\r\n\r\n    gconftool-2 –recursive-unset /apps/panel\r\n\r\nketiga: Kita Restart GDM dengan cara ketik Ctrl+Alt+f1 ,f2, f3, etc hingga kita masuk CLI (command Line Interface) sepenuhnya …\r\n\r\nKeempat: setelah masuk CLI, ketik:\r\n\r\n    sudo /etc/init.d/gdm stop\r\n\r\nKemudian :\r\n\r\n    sudo /etc/init.d/gdm start\r\n\r\nNiscaya Gnome Panel kamu akan seperti sedia kala …', 'tux-linux.png', '2010-09-11', '10:29:20', 'rudi', 49),
(6, 1, 'Membelah Web Dengan PHP Function', 'asanya tidak lengkap mempelajari bahasa pemrograman tanpa mempelajari apa yang di sebut dengan function. pengertian dari function sendiri adalah sub program yang terpisah dan dapat digunakan secara berulang-ulang. ini pengertian saya sendiri kok, karena saya biasa menggunakan function, lebih untuk menyederhanakan pembangunan program.\r\n\r\nDalam PHP juga ada function, terus ada tidak procedure nya? perbedaan antara function dan procedure adalah nilai keluaran dan sub program tersebut. Misalkan jika sub program tersebut di lengkapi dengan return maka subprogram tersebut adalah function, karena mengembalikan sebuah nilai, sedangkan jika tidak mengembalikan apa-apa, artinya tidak ada keyword return maka subprogram tersebut adalah procedure. Ini hanya untuk membedakan kok, pekerjaan dilapangan akan berbeda-beda dan menuntut penggunaan yang bervariasi, contohnya adalah mesin blog paling populer sejagad, yaitu wordpress.\r\n\r\nkita akan membuat sebuah function sederhana dengan menggunakan function, saya hanya memberikan konsep dasar function saja, nanti bisa dikembangkan sesuai kebutuhan.\r\n\r\n function cetak(){\r\n\r\n  $str="Belajar PHP dengan function";\r\n\r\n  return $str;\r\n\r\n }\r\n\r\n ?>\r\n\r\nArtinya function tersebut akan mengembalikan nilai berupa string. Tidak ada paramater yang disertakan. Contoh diatas adalah function yang paling sederhana. Jika dibuat menjadi procedure cukup dihilangkan keyword return, ganti dengan perintah echo untuk mencetak, maka hal itu bisa disebut dengan procedure. Cara menggunakannya bagaimana ?\r\n\r\n cetak();\r\n cetak();\r\n cetak();\r\n\r\nSedangkan function dengan menggunakan parameter adalah sebagai berikut\r\n\r\n function tambah($a,$b){\r\n  return $a+$b;\r\n }\r\n\r\nUntuk menggunakannya bagaimana ? seperti dibawah ini\r\n\r\n echo tambah(10,90); // menghasilkan 100\r\n echo tambah(18,50); // menghasilkan 68\r\n\r\nArtinya penggunaan function akan menjadi lebih fleksibel, banyak kreasi sehingga aplikasi yang dibuat menjadi lebih mudah dan cepat. Function bisa diartikan sebuah proses, anda bisa menyatukan semua proses-proses dalam sistem website anda dalam sebuah file yang berisi semua function, dan munkin anda bisa membuat framework sendiri. Dalam Wordpress juga seperti itu kok. Jadi jika anda sempat, pelajari function, terlebih anda akan mempelajari OOP.\r\nsemoga membantu.', 'php-logo.jpg', '2010-09-11', '10:56:18', 'yoyon', 25),
(98, 1, 'Kenapa Menggunakan Framework PHP Lebih Baik Dari Coding Manual?', '<p>Framework php disini adalah software yang dibuat dengan menggunakan PHP, nah software ini akan mempu membuat aplikasi web lain berbasis software framewrok tadi. Jadi semakin stabil, banyak feature dan mudah dikembangkan maka aplikasi web yang digunakan juga semakin bagus dan berkualitas. Dengan menggunakan framework php, kita bisa menghemat banyak waktu, karena semua fungsi-fungsi untuk pembuatan web sudah tersedia dan kita tinggal menggunakannya saja. <br /><br />Jika ada upgrade versi, kita tinggal mengupdate mesin frameworknya saja tanpa perlu menulis ulang program. Dengan diupgrage, framework menjadi lebih baik, mungkin saja ada fitur baru yang akan membuat aplikasi anda berjalan lebih optimal. Bekerja dengan framework php juga lebih terstruktur karena ada konsep MVC (model, visual, controller) yang membuat aplikasi web bisa dikerjakan banyak orang. Jadi dengan adanya framework php, apa kita ndak perlu belajar web lagi?<br /><br />Wah salah dunk kalau kayak gitu. Framework php itu didesain dengan sangat rumit, didalammnya full OOP, jadi harus paham terlebih dahulu konsep OOP di php, bisa baca OOP PHP bag 1, Membuat Object pada OOP dan Deklarasi hak akses pada OOP juga Inheritance pada OOP. Nah untuk sampai tahap OOP, harus melalui dulu apa yang disebut dengan pemrograman struktural. Disini masih perlu ikut kuliah pemrograman web, ha ha. Tapi untuk kedepannya, lebih baik fokus dengan framework, jauhkan sedikit ego anda sebagai programmer yang harus pure memakai produk sendiri. <br /><br />CMS juga menjadi perhatian tersendiri, karena CMS saat ini banyak digunakan karena mudah dan gratis. Nah, jika bisa mengutak-atik CMS, tahu dalemanya maka anda memiliki barang yang sangat bagus dan menarik. Tidak perlu coding dari awal lagi. SEO (search engine optimization) juga harus diperhatikan, karena ini faktor yang penting (kan nggak lucu kalau web anda sudah dirancang sedemikian baik, tapi sepi pengunjung). Ketiganya itu saya tidak mempelajarinya di kampus, dan sekarang saya sudah lulus, sedihnya. Jadi sebagai wejangan (halah.. sok tuwa he he), jika ingin bersaing di dunia web atau perusahaan besar, lebih baik perhatikan ketika elemen penting diatas, karena saat ini saya baru menyadari betapa pentingnya ketiga tersebut.<br /><br />Nah, framework php yang saya gunakan adalah Codeigniter, karena ini framework pertama yang saya pelajari dan langsung jatuh cinta sama Codeigniter.</p>', 'frame-work.jpg', '2010-10-09', '10:46:00', 'hadiq', 9);
