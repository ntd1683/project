-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2022 at 04:15 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `adress` text NOT NULL,
  `gender` int(11) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photos` varchar(150) NOT NULL,
  `level` int(11) NOT NULL,
  `token` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `adress`, `gender`, `date`, `email`, `password`, `photos`, `level`, `token`) VALUES
(1, 'Nguyễn Tấn Dũng', '', 'Huyện Cư M\'Gar , Tỉnh Đắk Lắk', 1, '2003-08-16', 'ntdvlog1683@gmail.com', 'Dung@1683', 'admin.png', 1, 'user_61d4454de08859.097056781641301325'),
(2, 'Hồ Thuận Thành', '', 'Đắk Lắk', 1, '2003-10-31', 'hothuanthanh@gmail.com', 'Hothuanthanh@1683', 'default.png', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name`) VALUES
(1, 'Mạch máy tính'),
(2, 'Mạch Điện'),
(3, 'Đồ dùng điện');

-- --------------------------------------------------------

--
-- Table structure for table `classify_products`
--

CREATE TABLE `classify_products` (
  `id_products` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `gender` int(11) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `photos` varchar(100) NOT NULL,
  `adress` text NOT NULL,
  `amount_purchased` int(11) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `date`, `email`, `password`, `photos`, `adress`, `amount_purchased`, `token`, `phone`) VALUES
(2, 'Hồ Thuận Thành', 1, '2003-10-31', 'hothuanthanh@gmail.com', 'Thuanthanh@123', 'thuanthanh.jpg', 'Đắk Lắk', 90000000, NULL, '0123456789'),
(3, 'Trần Đặng Quang', 1, '2003-09-10', 'trandangquang123@gmail.com', 'Trandangquang@123', 'dang_quang.png', 'Đắk Lắk', 901231221, NULL, '1234565123');

-- --------------------------------------------------------

--
-- Table structure for table `manufactors`
--

CREATE TABLE `manufactors` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `photos` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufactors`
--

INSERT INTO `manufactors` (`id`, `name`, `photos`) VALUES
(1, 'MakerLab.vn', 'img_1640815407.png'),
(2, 'Seed Studio', 'img_1640818582.png'),
(5, 'Import', 'default.png'),
(6, 'NVIDIA', 'img_1641135842.png');

-- --------------------------------------------------------

--
-- Table structure for table `notifi`
--

CREATE TABLE `notifi` (
  `id` int(11) NOT NULL,
  `header` varchar(200) NOT NULL,
  `notifi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_customers` int(11) NOT NULL,
  `time_order` date NOT NULL,
  `name_receiver` varchar(150) NOT NULL,
  `phone_receiver` varchar(12) NOT NULL,
  `adress_receiver` text NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id_orders` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `id_manufactors` int(11) NOT NULL,
  `id_categorys` int(11) NOT NULL,
  `photos` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `discount`, `id_manufactors`, `id_categorys`, `photos`) VALUES
(1, 'Máy Tính BeagleBone Green Wireless (TI AM335x WiFi+BT) (Sale 30%)', 'Lưu ý vì sản phẩm bán theo giá Sale nên sẽ chỉ bao test trong 3 ngày kể từ khi nhận hàng để đảm bảo mạch hoạt động tốt, không bảo hành và đổi trả, kính mong Quý Khách lưu ý!\r\n\r\nBeagleBone Green Wireless (TI AM335x WiFi+BT) is a joint effort by BeagleBoard.org and Seeed Studio. Based on the open-source hardware design of BeagleBone Black, the newest BBGW has added two Grove connectors, making it easier to connect to the large family of Grove sensors. It is the first Wi-Fi + Bluetooth Low Energy (BLE) board from BeagleBone community. \r\n\r\nFeatures\r\n\r\nThe first Wi-Fi + Bluetooth Low Energy (BLE) board from BeagleBone community\r\nBuilt-in 2.4 GHz TI WLinkTM8 Module with two antenna solution\r\nOn-board chip antenna\r\nIEEE 802.11b/g/n compliant\r\nFCC, CE, and TELEC certified\r\nSupports AP+STA mode of communication\r\nComply with Bluetooth Advanced Audio Distribution Profile (A2DP)\r\nSupports MRAA library\r\nTechnical details\r\n\r\nDimensions: 126mm x76mm x24mm\r\nWeight: G.W 88g\r\nProcessor: AM335x 1GHz ARMR Cortex-A8\r\nRAM: 512MB DDR3\r\non-board Flash Storage: 4GB eMMC\r\nCPU Supports: NEON floating-point & 3D graphics accelerator\r\nMicro USB Supports: powering & communications\r\nUSB: 4 x USB2.0 Host\r\nGrove Connectors: 2 x (One I2C and One UART)\r\nGPIO: 2 x 46 pin headers\r\nEthernet: Wi-Fi 802.11b/g/n 2.4GHz and Bluetooth 4.1 LE\r\nPart List\r\n\r\nBeagleBone Green Wireless x 1\r\nUSB Cable x 1\r\nUser Guide x 1', 1150000, 25, 2, 3, 'img_1641114720.jpg'),
(3, 'Cáp Kết Nối MakerEDU XH2.54 4Wires 20cm Cable', 'Cáp kết nối MakerEDU XH2.54 4Wires 20cm Cable được sử dụng với các mạch Module, Cảm biến trong hệ sinh thái phần cứng MakerEDU, cáp có 2 loại:\r\nXH2.54 - XH2.54: sử dụng để nối các mạch Module, Cảm biến trong hệ sinh thái phần cứng MakerEDU với MakerEDU Shield theo chuẩn kết nối XH2.54.\r\nXH2.54 - Male Pin: sử dụng để nối các mạch Module, Cảm biến trong hệ sinh thái phần cứng MakerEDU với Breadboard hoặc với các phần cứng ở dạng rào cái (Female Header).\r\nThông số kỹ thuật:\r\nChuẩn kết nối:\r\nXH2.54 - XH2.54\r\nXH2.54 - Male Pin\r\nSố dây: 4 dây\r\nĐộ dài: 20cm.\r\nDây nguồn tiêu chuẩn: lõi đồng 22AWG (17 sợi 0.11mm)\r\nDây tín hiệu tiêu chuẩn: lõi đồng 24AWG (11 sợi 0.11mm)', 5000, 0, 1, 3, 'img_1641120867.jpg'),
(4, 'Vi Điều Khiển ATMEGA328P-PU Đã Nạp Bootloader Arduino', 'Vi Điều Khiển ATMEGA328P-PU đã nạp Bootloader Arduino được nhập chính hãng từ Singapore qua nhà phân phối Element14 với chất lượng tốt nhất, trên thị trường hiện nay có rất nhiều loại hàng giả, hàng lỗi từ Trung Quốc với giá rẻ mong Quý Khách lưu ý.\r\n\r\nVi Điều Khiển (MCU) ATMEGA328P-PU đã nạp Bootloader Arduino được sử dụng để thay thế nếu IC chính ATMEGA328P-PU trên mạch Arduino (Arduino Uno, Vietduino Uno,...) của bạn bị cháy hoặc bạn muốn thiết kế và tự tạo cho mình một mạch điều khiển riêng biệt dựa trên MCU ATMEGA328P-PU, Vi Điều Khiển là dạng IC cắm 28 chân được nạp sẵn Bootloader của cho Arduino Uno, chỉ cần gắn vào là đã có thể sử dụng.\r\n\r\nThông số kỹ thuật:\r\n\r\nVi Điều Khiển ATMEGA328P-PU đã nạp Bootloader Arduino Uno (tương thích Arduino Uno, Vietduino Uno,...)\r\nManufacturer: Microchip \r\nManufacturer Part Number: ATMEGA328P-PU\r\nVoltage - Supply (Vcc/Vdd): 1.8~ 5.5VDC\r\nDescription: IC MCU 8BIT 32KB FLASH 28DIP \r\nLead Free Status / RoHS Status: Lead free / RoHS Compliant \r\nPackaging: Tube \r\nCore Processor: AVR \r\nCore Size: 8-Bit \r\nSpeed: 20MHz \r\nConnectivity: I²C, SPI, UART/USART \r\nPeripherals: Brown-out Detect/Reset, POR, PWM, WDT \r\nNumber of I /O: 23 \r\nProgram Memory Size: 32KB (16K x 16) \r\nProgram Memory Type: FLASH \r\nEEPROM Size: 1K x 8 \r\nRAM Size: 2K x 8 \r\nData Converters: A/D 6x10b \r\nOscillator Type: Internal \r\nOperating Temperature: -40°C ~ 85°C \r\nPackage / Case: 28-DIP (0.300\", 7.62mm)', 75000, 0, 5, 1, 'img_1641136039.jpg'),
(7, 'Mạch Phát Âm Thanh MKL-M11 UART Control MP3 Player Module', 'Lưu ý mặc định sản phẩm không đi kèm cáp kết nối, Quý Khách có thể chọn mua thêm cáp kết nối trong tuỳ chọn mua hàng hoặc mua tại đây.\r\n\r\nMạch phát âm thanh MKL-M11 UART control MP3 Player module được sử dụng để phát âm thanh MP3 từ thẻ nhớ MicroSD, mạch có tích hợp Amply với công suất 2W đi kèm loa tương thích, mạch sử dụng giao tiếp UART nên dễ dàng kết nối và sử dụng với chỉ 2 chân giao tiếp TX và RX.\r\n\r\nMạch phát âm thanh MKL-M11 UART control MP3 Player module được thiết kế để có thể sử dụng trực tiếp an toàn với các board mạch giao tiếp ở mức điện áp 3.3/5VDC: Arduino, Raspberry Pi, Jetson Nano, Micro:bit,....\r\n\r\nThông số kỹ thuật:\r\n\r\nĐiện áp hoạt động: 5VDC\r\nChuẩn giao tiếp: Digital UART\r\nĐiện áp giao tiếp: TTL 3.3/5VDC\r\nTích hợp Amply 2W đi kèm loa tương thích.\r\nPhát âm thanh MP3 từ thẻ nhớ MicroSD\r\nThiết kế tối ưu để có thể sử dụng trực tiếp với các board mạch giao tiếp ở cả hai mức điện áp 3.3VDC hoặc 5VDC như: Arduino, Raspberry Pi, Jetson Nano, Micro:bit,....\r\nChuẩn kết nối:\r\n1 x Conector XH2.54 4Pins\r\n1 x Conector XH2.54 3Pins\r\n1 x Conector Domino 2P\r\nTương thích tốt nhất khi sử dụng với mạch MakerEDU Shield.', 115000, 10, 1, 3, 'img_1641137621.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classify_products`
--
ALTER TABLE `classify_products`
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_products` (`id_products`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `manufactors`
--
ALTER TABLE `manufactors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifi`
--
ALTER TABLE `notifi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customers` (`id_customers`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD KEY `id_orders` (`id_orders`),
  ADD KEY `id_products` (`id_products`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufactors`
--
ALTER TABLE `manufactors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifi`
--
ALTER TABLE `notifi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classify_products`
--
ALTER TABLE `classify_products`
  ADD CONSTRAINT `classify_products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categorys` (`id`),
  ADD CONSTRAINT `classify_products_ibfk_2` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_customers`) REFERENCES `customers` (`id`);

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
