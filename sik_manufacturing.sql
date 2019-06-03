-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Mei 2019 pada 16.00
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sik_manufacturing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bom`
--

CREATE TABLE `bom` (
  `id_bom` int(20) NOT NULL,
  `id_product` int(20) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `bom_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bom`
--

INSERT INTO `bom` (`id_bom`, `id_product`, `quantity`, `bom_type`) VALUES
(1, 4, '1', 'Manufacture this product'),
(2, 3, '1', 'Manufacture this product');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bom`
--

CREATE TABLE `detail_bom` (
  `id_detail_bom` int(20) NOT NULL,
  `id_bom` int(20) NOT NULL,
  `id_product` int(20) NOT NULL,
  `quantity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_bom`
--

INSERT INTO `detail_bom` (`id_detail_bom`, `id_bom`, `id_product`, `quantity`) VALUES
(1, 1, 1, '1'),
(4, 1, 5, '1'),
(7, 1, 6, '1'),
(10, 1, 8, '1'),
(11, 1, 7, '2'),
(12, 2, 9, '2'),
(13, 2, 11, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `manufacturing`
--

CREATE TABLE `manufacturing` (
  `id_manufacturing` int(20) NOT NULL,
  `id_product` int(20) NOT NULL,
  `id_bom` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `deadline_start` date NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `manufacturing`
--

INSERT INTO `manufacturing` (`id_manufacturing`, `id_product`, `id_bom`, `id_user`, `quantity`, `deadline_start`, `status`) VALUES
(1, 4, 1, 1, '50', '2019-01-25', 'confirmed'),
(2, 4, 1, 1, '100', '2019-02-20', 'produce'),
(3, 4, 1, 1, '20', '2019-03-26', 'done'),
(4, 4, 1, 1, '70', '2019-04-06', 'done'),
(5, 4, 1, 1, '120', '2019-05-23', 'done'),
(6, 4, 1, 1, '170', '2019-06-23', 'confirmed'),
(8, 4, 1, 1, '140', '2019-08-23', 'produce'),
(9, 4, 1, 1, '110', '2019-09-23', 'produce'),
(10, 4, 1, 1, '190', '2019-10-23', 'produce'),
(11, 4, 1, 1, '210', '2019-11-23', 'done'),
(12, 4, 1, 1, '20', '2019-12-23', 'done'),
(13, 4, 1, 1, '100', '2019-07-11', 'produce');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_type` varchar(30) NOT NULL,
  `sales_price` varchar(20) NOT NULL,
  `id_tax` int(20) NOT NULL,
  `id_product_category` int(20) NOT NULL,
  `stok` varchar(10) NOT NULL,
  `internal_notes` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `product_name`, `product_type`, `sales_price`, `id_tax`, `id_product_category`, `stok`, `internal_notes`, `foto`) VALUES
(1, 'Mouse Logitech', 'Storable Product', '200000', 1, 1, '300', 'Mouse From Logitech Corp', 'logitech-wired-optical-mouse-m100r-black-30.jpg'),
(3, 'Polygon Bike', 'Storable Product', '10000000', 2, 3, '0', 'Polygon Bike Package', 'collosus.jpg'),
(4, 'Acer PC Package', 'Storable Product', '6000000', 1, 4, '100', 'Acer PC Package for Sale', 'Aspire_X1700_L_1.jpg'),
(5, 'Monitor Acer', 'Storable Product', '1500000', 1, 1, '300', 'Monitor Acer For Acer PC Package', '51vxfozze-L__SX425_.jpg'),
(6, 'Keyboard Logitech', 'Storable Product', '400000', 1, 1, '700', 'Keyboard From Logitech Corp', '705f200e3f4be1628dcd7fba48fd1cbffa3c1717.jpg'),
(7, 'Sound PC Logitech', 'Storable Product', '500000', 1, 1, '1000', 'Sound PC From Logitech Corp', 'u_21775700.jpg'),
(8, 'CPU Acer PC', 'Storable Product', '2000000', 1, 1, '500', 'CPU Acer PC For Acer PC Package', '5ba8a16bbf84b.jpg'),
(9, 'MTB Bicycle Tire', 'Storable Product', '500000', 2, 2, '0', 'Ban Sepeda Untuk Product Polygon', '263939x21-h5166-collapsible-mtb-bicycle-tire-6249-623707161-b7d72f974c2bf82f25406d7e625900b9-.jpg'),
(10, 'Ritchey MTB', 'Storable Product', '3000000', 2, 2, '0', 'Body Sepeda Untuk Poligon', 'frameset-breakaway-cross-green-yellow-angle.jpg'),
(11, 'DMZ V12 Montain Bike Pedals Black', 'Storable Product', '200000', 2, 2, '0', 'Pedal Untuk Poligon', '16886_1_Zoom.jpg'),
(12, 'SDL 501 Black', 'Storable Product', '400000', 2, 2, '0', 'Sadel Untuk Sepeda Poligon', 'sdl0501-035_aeffect_blk_img1.jpg'),
(13, 'Giant Connect IX 701', 'Storable Product', '1000000', 2, 2, '0', 'Stir Untuk Sepeda Poligon', 'handle-bar-mtb-flat-sumber-googling.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category`
--

CREATE TABLE `product_category` (
  `id_product_category` int(20) NOT NULL,
  `name_category` varchar(30) NOT NULL,
  `strategy` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_category`
--

INSERT INTO `product_category` (`id_product_category`, `name_category`, `strategy`) VALUES
(1, 'PC Component', 'FIFO'),
(2, 'Bike Component', 'FIFO'),
(3, 'Bike Package', 'FIFO'),
(4, 'PC Package', 'FIFO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `taxes`
--

CREATE TABLE `taxes` (
  `id_tax` int(20) NOT NULL,
  `tax_name` varchar(30) NOT NULL,
  `amount` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `taxes`
--

INSERT INTO `taxes` (`id_tax`, `tax_name`, `amount`) VALUES
(1, 'PPn', '10'),
(2, 'Pajak', '20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `address`, `phone`, `level`) VALUES
(1, 'admin', 'admin@manufacturing.com', '21232f297a57a5a743894a0e4a801fc3', 'tanggung', '11111111', '1'),
(2, 'reynaldi', 'reynaldiolp@gmail.com', '1d0258c2440a8d19e716292b231e3190', 'tulungagung', '0885706526558', '2'),
(3, 'Alin', 'alin@gmail.com', '8df03bca3f48d310f74fe6092af08c95', 'Tangerang', '12342', '2'),
(4, 'Reza', 'reza@gmail.com', 'bb98b1d0b523d5e783f931550d7702b6', 'Kediri', '081233454545', '2'),
(5, 'Lukman', 'lukman@gmail.com', 'b5bbc8cf472072baffe920e4e28ee29c', 'Turen', '08562677333', '2'),
(6, 'Info Admin', 'info@manufacturing.com', '21232f297a57a5a743894a0e4a801fc3', 'PT Manufacturing', '3322111', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`id_bom`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `detail_bom`
--
ALTER TABLE `detail_bom`
  ADD PRIMARY KEY (`id_detail_bom`),
  ADD KEY `id_bom` (`id_bom`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `manufacturing`
--
ALTER TABLE `manufacturing`
  ADD PRIMARY KEY (`id_manufacturing`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_bom` (`id_bom`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product_2` (`id_product`,`id_bom`,`id_user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_tax` (`id_tax`,`id_product_category`),
  ADD KEY `id_product_category` (`id_product_category`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id_product_category`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id_tax`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bom`
--
ALTER TABLE `bom`
  MODIFY `id_bom` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_bom`
--
ALTER TABLE `detail_bom`
  MODIFY `id_detail_bom` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `manufacturing`
--
ALTER TABLE `manufacturing`
  MODIFY `id_manufacturing` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id_product_category` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id_tax` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bom`
--
ALTER TABLE `bom`
  ADD CONSTRAINT `bom_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_bom`
--
ALTER TABLE `detail_bom`
  ADD CONSTRAINT `detail_bom_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `detail_bom_ibfk_2` FOREIGN KEY (`id_bom`) REFERENCES `bom` (`id_bom`);

--
-- Ketidakleluasaan untuk tabel `manufacturing`
--
ALTER TABLE `manufacturing`
  ADD CONSTRAINT `manufacturing_ibfk_1` FOREIGN KEY (`id_bom`) REFERENCES `bom` (`id_bom`),
  ADD CONSTRAINT `manufacturing_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `manufacturing_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_tax`) REFERENCES `taxes` (`id_tax`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_product_category`) REFERENCES `product_category` (`id_product_category`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
