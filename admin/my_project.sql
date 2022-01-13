-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Jan 13, 2022 at 01:48 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.20

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
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `adress` text NOT NULL,
  `gender` int NOT NULL,
  `date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photos` varchar(150) NOT NULL,
  `level` int NOT NULL,
  `token` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `adress`, `gender`, `date`, `email`, `password`, `photos`, `level`, `token`) VALUES
(1, 'Nguyễn Tấn Dũng', '0329817809', 'Huyện Cư M\'Gar , Tỉnh Đắk Lắk', 1, '2003-08-16', 'ntdvlog1683@gmail.com', 'NTDung@16082003', 'admin.png', 1, 'user_61dccfebcd6ba8.685646621641861099'),
(2, 'Hồ Thuận Thành', '01234567891', 'Đắk Lắk', 1, '2003-10-31', 'hothuanthanh@gmail.com', 'Hothuanthanh@1683', 'default.png', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name`) VALUES
(1, 'Mạch máy tính'),
(2, 'Mạch điện'),
(3, 'Đồ dùng điện'),
(4, 'ARDUINO'),
(5, 'Cảm biến');

-- --------------------------------------------------------

--
-- Table structure for table `classify_products`
--

CREATE TABLE `classify_products` (
  `id_products` int NOT NULL,
  `id_category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classify_products`
--

INSERT INTO `classify_products` (`id_products`, `id_category`) VALUES
(3, 3),
(7, 3),
(1, 3),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `gender` int NOT NULL,
  `date` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `photos` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `adress` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `token` varchar(100) DEFAULT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `date`, `email`, `password`, `photos`, `adress`, `token`, `phone`) VALUES
(2, 'Hồ Thuận Thành', 1, '2003-10-31', 'hothuanthanh@gmail.com', 'Thuanthanh@123', 'thuanthanh.jpg', 'Đắk Lắk', NULL, '0123456789'),
(3, 'Trần Đặng Quang', 1, '2003-09-10', 'trandangquang123@gmail.com', 'Trandangquang@123', 'dang_quang.png', 'Đắk Lắk', NULL, '1234565123'),
(4, 'Nguyễn Tấn Dũng', 1, '2003-08-16', 'nguyentandung1608@gmail.com', 'Dung1683', 'default.png', '107 Nguyễn Lương Bằng, Thành phố Buôn Ma Thuột , Tỉnh Đắk Lắk', NULL, '0329817898'),
(5, 'Phan Lê Thuỳ Dương', 0, '2003-04-27', 'phanlethuyduong@gmail.com', 'Duong2003', 'default.png', 'Xã Hoà Đông, Thành phố Buôn Ma Thuột , Tỉnh Đắk Lắk', NULL, '0231294924'),
(6, 'Nguyễn Đặng Hải Yến', 0, '2003-07-07', 'HaiYen@gmail.com', 'HaiYen@gmail.com', 'default.png', 'Nguyễn Khuyến , Thành phố Buôn Ma Thuột , Tỉnh Đắk Lắk', NULL, '0213021312'),
(7, 'Nguyễn Thị Tường Vi', 0, '2003-06-02', 'nguyenthituongvi@gmail.com', 'nguyenthituongVi2003', 'default.png', 'Y-Moan , Thành phố Buôn Ma Thuột, Tỉnh Đắk Lắk', NULL, '0292123456'),
(8, 'Nguyễn Nam Long', 1, '1997-01-01', 'J2teamnnl@gmail.com', 'J2teamnnl@gmail.com', 'default.png', 'Hà Nội', NULL, '0123456789'),
(9, 'pham van A', 0, NULL, 'abc@gmail.com', '12345678', NULL, NULL, NULL, '0987654321');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id_admin` int DEFAULT NULL,
  `id_customers` int DEFAULT NULL,
  `token` varchar(250) NOT NULL,
  `created at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufactors`
--

CREATE TABLE `manufactors` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `photos` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `photos` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pin` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notifi`
--

INSERT INTO `notifi` (`id`, `name`, `photos`, `detail`, `pin`) VALUES
(2, 'Nguyễn Tấn Dũng', 'admin.png', 'Ngày 1/2/2022 kết hợp J2TEAM bán hàng', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `id_customers` int DEFAULT NULL,
  `time_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name_receiver` varchar(150) NOT NULL,
  `phone_receiver` varchar(12) NOT NULL,
  `adress_receiver` text NOT NULL,
  `note` text NOT NULL,
  `status` int NOT NULL,
  `total_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_customers`, `time_order`, `name_receiver`, `phone_receiver`, `adress_receiver`, `note`, `status`, `total_price`) VALUES
(1, 2, '2022-01-07 11:07:30', 'Hồ Thuận Thành', '0123456789', 'Đắk Lắk', 'Tới gọi em', 1, 207000),
(3, 8, '2022-01-01 13:36:36', 'Nguyễn Nam Long', '0123456789', 'Hà Nội', 'Em boom hàng ạ', 1, 1082770),
(4, 7, '2022-01-07 13:38:55', 'Nguyễn Thị Tường Vi', '0123456789', 'Y-Moan, Thành phố Buôn Ma Thuột, Tỉnh Đắk Lắk', 'Em boom hàng', 1, 942500),
(6, 8, '2022-01-08 17:29:58', 'Nguyễn Nam Long', '0123456789', 'Hà Nội', 'Em boom hàng', 1, 3070000);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id_orders` int NOT NULL,
  `id_products` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id_orders`, `id_products`, `quantity`) VALUES
(1, 7, 2),
(2, 3, 3),
(3, 9, 1),
(3, 10, 1),
(3, 11, 1),
(3, 12, 1),
(3, 13, 1),
(4, 1, 1),
(4, 3, 1),
(4, 4, 1),
(6, 1, 2),
(6, 10, 4),
(6, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL,
  `discount` int DEFAULT NULL,
  `id_manufactors` int NOT NULL,
  `id_categorys` int NOT NULL,
  `photos` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `discount`, `id_manufactors`, `id_categorys`, `photos`) VALUES
(1, 'Máy Tính BeagleBone Green Wireless (TI AM335x WiFi+BT) (Sale 30%)', 'Lưu ý vì sản phẩm bán theo giá Sale nên sẽ chỉ bao test trong 3 ngày kể từ khi nhận hàng để đảm bảo mạch hoạt động tốt, không bảo hành và đổi trả, kính mong Quý Khách lưu ý!\r\n\r\nBeagleBone Green Wireless (TI AM335x WiFi+BT) is a joint effort by BeagleBoard.org and Seeed Studio. Based on the open-source hardware design of BeagleBone Black, the newest BBGW has added two Grove connectors, making it easier to connect to the large family of Grove sensors. It is the first Wi-Fi + Bluetooth Low Energy (BLE) board from BeagleBone community. \r\n\r\nFeatures\r\n\r\nThe first Wi-Fi + Bluetooth Low Energy (BLE) board from BeagleBone community\r\nBuilt-in 2.4 GHz TI WLinkTM8 Module with two antenna solution\r\nOn-board chip antenna\r\nIEEE 802.11b/g/n compliant\r\nFCC, CE, and TELEC certified\r\nSupports AP+STA mode of communication\r\nComply with Bluetooth Advanced Audio Distribution Profile (A2DP)\r\nSupports MRAA library\r\nTechnical details\r\n\r\nDimensions: 126mm x76mm x24mm\r\nWeight: G.W 88g\r\nProcessor: AM335x 1GHz ARMR Cortex-A8\r\nRAM: 512MB DDR3\r\non-board Flash Storage: 4GB eMMC\r\nCPU Supports: NEON floating-point & 3D graphics accelerator\r\nMicro USB Supports: powering & communications\r\nUSB: 4 x USB2.0 Host\r\nGrove Connectors: 2 x (One I2C and One UART)\r\nGPIO: 2 x 46 pin headers\r\nEthernet: Wi-Fi 802.11b/g/n 2.4GHz and Bluetooth 4.1 LE\r\nPart List\r\n\r\nBeagleBone Green Wireless x 1\r\nUSB Cable x 1\r\nUser Guide x 1', 1150000, 25, 2, 3, 'img_1641114720.jpg'),
(3, 'Cáp Kết Nối MakerEDU XH2.54 4Wires 20cm Cable', 'Cáp kết nối MakerEDU XH2.54 4Wires 20cm Cable được sử dụng với các mạch Module, Cảm biến trong hệ sinh thái phần cứng MakerEDU, cáp có 2 loại:\r\nXH2.54 - XH2.54: sử dụng để nối các mạch Module, Cảm biến trong hệ sinh thái phần cứng MakerEDU với MakerEDU Shield theo chuẩn kết nối XH2.54.\r\nXH2.54 - Male Pin: sử dụng để nối các mạch Module, Cảm biến trong hệ sinh thái phần cứng MakerEDU với Breadboard hoặc với các phần cứng ở dạng rào cái (Female Header).\r\nThông số kỹ thuật:\r\nChuẩn kết nối:\r\nXH2.54 - XH2.54\r\nXH2.54 - Male Pin\r\nSố dây: 4 dây\r\nĐộ dài: 20cm.\r\nDây nguồn tiêu chuẩn: lõi đồng 22AWG (17 sợi 0.11mm)\r\nDây tín hiệu tiêu chuẩn: lõi đồng 24AWG (11 sợi 0.11mm)', 5000, 0, 1, 3, 'img_1641120867.jpg'),
(4, 'Vi Điều Khiển ATMEGA328P-PU Đã Nạp Bootloader Arduino', 'Vi Điều Khiển ATMEGA328P-PU đã nạp Bootloader Arduino được nhập chính hãng từ Singapore qua nhà phân phối Element14 với chất lượng tốt nhất, trên thị trường hiện nay có rất nhiều loại hàng giả, hàng lỗi từ Trung Quốc với giá rẻ mong Quý Khách lưu ý.\r\n\r\nVi Điều Khiển (MCU) ATMEGA328P-PU đã nạp Bootloader Arduino được sử dụng để thay thế nếu IC chính ATMEGA328P-PU trên mạch Arduino (Arduino Uno, Vietduino Uno,...) của bạn bị cháy hoặc bạn muốn thiết kế và tự tạo cho mình một mạch điều khiển riêng biệt dựa trên MCU ATMEGA328P-PU, Vi Điều Khiển là dạng IC cắm 28 chân được nạp sẵn Bootloader của cho Arduino Uno, chỉ cần gắn vào là đã có thể sử dụng.\r\n\r\nThông số kỹ thuật:\r\n\r\nVi Điều Khiển ATMEGA328P-PU đã nạp Bootloader Arduino Uno (tương thích Arduino Uno, Vietduino Uno,...)\r\nManufacturer: Microchip \r\nManufacturer Part Number: ATMEGA328P-PU\r\nVoltage - Supply (Vcc/Vdd): 1.8~ 5.5VDC\r\nDescription: IC MCU 8BIT 32KB FLASH 28DIP \r\nLead Free Status / RoHS Status: Lead free / RoHS Compliant \r\nPackaging: Tube \r\nCore Processor: AVR \r\nCore Size: 8-Bit \r\nSpeed: 20MHz \r\nConnectivity: I²C, SPI, UART/USART \r\nPeripherals: Brown-out Detect/Reset, POR, PWM, WDT \r\nNumber of I /O: 23 \r\nProgram Memory Size: 32KB (16K x 16) \r\nProgram Memory Type: FLASH \r\nEEPROM Size: 1K x 8 \r\nRAM Size: 2K x 8 \r\nData Converters: A/D 6x10b \r\nOscillator Type: Internal \r\nOperating Temperature: -40°C ~ 85°C \r\nPackage / Case: 28-DIP (0.300\", 7.62mm)', 75000, 0, 5, 1, 'img_1641136039.jpg'),
(7, 'Mạch Phát Âm Thanh MKL-M11 UART Control MP3 Player Module', 'Lưu ý mặc định sản phẩm không đi kèm cáp kết nối, Quý Khách có thể chọn mua thêm cáp kết nối trong tuỳ chọn mua hàng hoặc mua tại đây.\r\n\r\nMạch phát âm thanh MKL-M11 UART control MP3 Player module được sử dụng để phát âm thanh MP3 từ thẻ nhớ MicroSD, mạch có tích hợp Amply với công suất 2W đi kèm loa tương thích, mạch sử dụng giao tiếp UART nên dễ dàng kết nối và sử dụng với chỉ 2 chân giao tiếp TX và RX.\r\n\r\nMạch phát âm thanh MKL-M11 UART control MP3 Player module được thiết kế để có thể sử dụng trực tiếp an toàn với các board mạch giao tiếp ở mức điện áp 3.3/5VDC: Arduino, Raspberry Pi, Jetson Nano, Micro:bit,....\r\n\r\nThông số kỹ thuật:\r\n\r\nĐiện áp hoạt động: 5VDC\r\nChuẩn giao tiếp: Digital UART\r\nĐiện áp giao tiếp: TTL 3.3/5VDC\r\nTích hợp Amply 2W đi kèm loa tương thích.\r\nPhát âm thanh MP3 từ thẻ nhớ MicroSD\r\nThiết kế tối ưu để có thể sử dụng trực tiếp với các board mạch giao tiếp ở cả hai mức điện áp 3.3VDC hoặc 5VDC như: Arduino, Raspberry Pi, Jetson Nano, Micro:bit,....\r\nChuẩn kết nối:\r\n1 x Conector XH2.54 4Pins\r\n1 x Conector XH2.54 3Pins\r\n1 x Conector Domino 2P\r\nTương thích tốt nhất khi sử dụng với mạch MakerEDU Shield.', 115000, 10, 1, 3, 'img_1641137621.jpg'),
(8, 'Mạch Nút Nhấn MKL-M02 Push Button Tact Switch Module', 'Lưu ý mặc định sản phẩm không đi kèm cáp kết nối, Quý Khách có thể chọn mua thêm cáp kết nối trong tuỳ chọn mua hàng hoặc mua tại đây.\r\n\r\nMạch nút nhấn MKL-M02 push button tact switch module sử dụng nút nhấn kích thước lớn giúp dễ dàng lắp đặt, thao tác, nút nhấn sử dụng trong loại là loại nhấn nhả (tact switch) thường được dùng để kích tín hiệu, nút nhấn có nắp chụp với nhiều màu sắc khác nhau để dễ phân biệt.\r\n\r\nMạch nút nhấn MKL-M02 push button tact switch module thuộc hệ sinh thái phần cứng cơ điện tử MakerEDU nên có thể sử dụng trực tiếp an toàn với các board mạch giao tiếp ở cả hai mức điện áp 3.3VDC và 5VDC như: Arduino, Raspberry Pi, Jetson Nano, Micro:bit,....với chuẩn kết nối Connector XH2.54 thông dụng.\r\n\r\nThông số kỹ thuật:\r\n\r\nLoại nút nhấn: nhấn nhả (tact switch)\r\nĐiện áp hoạt động: 5VDC\r\nChuẩn giao tiếp: Digital\r\nĐiện áp giao tiếp: TTL 3.3/5VDC\r\nCó 4 phiên bản màu sắc: Xanh Dương , Xanh Lá, Vàng, Đỏ.\r\nThuộc hệ sinh thái phần cứng cơ điện tử MakerEDU nên có thể sử dụng trực tiếp an toàn với các board mạch giao tiếp ở cả hai mức điện áp 3.3VDC và 5VDC như: Arduino, Raspberry Pi, Jetson Nano, Micro:bit,....\r\nBổ sung thêm các thiết kế ổn định, chống nhiễu.\r\nChuẩn kết nối: Conector XH2.54 3Pins\r\nTương thích tốt nhất khi sử dụng với mạch MakerEDU Shield.', 20000, 0, 1, 3, 'img_1641560276.jpg'),
(9, 'Arduino Due', 'Arduino Due được Arduino thiết kế dựa trên vi xử lý trung tâm ARM AT91SAM3X8E với ưu điểm là tốc độ vượt trội, bộ nhớ chương trình lớn và bổ xung các giao tiếp mới: USB, DAC,..., phù hợp cho các ứng dụng cần tốc độ xử lý cao.\r\n\r\nLưu ý quan trọng:\r\n\r\nCần xóa chương trình nạp trên Vi điều kiển chính ARM AT91SAM3X8E bằng cách nhấn nút Erase 1s trước khi nạp, nếu không quá trình nạp có thể bị lỗi.\r\nGPIO của Arduino Due có mức điện áp giao tiếp là 3.3VDC, nếu giao tiếp với các board mạch sử dụng mức điện áp cao hơn (ví dụ 5VDC) thì cần thêm trở 1k mắc nối tiếp để tránh làm cháy Arduino Due.\r\nThông số kỹ thuật:\r\n\r\nMicrocontroller AT91SAM3X8E\r\nOperating Voltage 3.3V\r\nInput Voltage (recommended) 7-12V\r\nInput Voltage (limits) 6-16V\r\nDigital I/O Pins 54 (of which 12 provide PWM output)\r\nAnalog Input Pins 12\r\nAnalog Output Pins 2 (DAC)\r\nTotal DC Output Current on all I/O lines 130 mA\r\nDC Current for 3.3V Pin 800 mA\r\nDC Current for 5V Pin 800 mA\r\nFlash Memory 512 KB all available for the user applications\r\nSRAM 96 KB (two banks: 64KB and 32KB)\r\nClock Speed 84 MHz\r\nSize: 53.3 x 101.52 mm', 525000, 5, 5, 4, 'img_1641560341.jpg'),
(10, 'Arduino Mega 2560 R3', 'Arduino Mega 2560 R3 là phiên bản nâng cấp của Arduino Uno R3 với số chân giao tiếp, ngoại vi và bộ nhớ nhiều hơn, tại Hshop.vn phiên bản Mega 2560 là Revision 3 (R3) như hình mô tả dưới đây, các bạn nên lưu ý điểm này rất quan trọng vì ở một số nơi bán loại không phải R3 mà là các phiên bản cũ hoặc sử dụng IC nạp CH340 giá rẻ với cấu trúc phần cứng dễ lỗi, dễ cháy hơn so với phiên bản R3.\r\n\r\n\r\n\r\n\r\n\r\nLưu ý :\r\n\r\nHầu hết các Shield của Arduino Uno R3 đều chạy được với Arduino Mega 2560 R3.\r\nArduino Mega 2560 R3 không dùng được thư viện SoftwareSerial vì đã được tích hợp sẵn 4 cổng Hardware Serial trên board.\r\nThông số kỹ thuật:\r\n\r\nVi điều khiển chính: ATmega2560\r\nIC nạp và giao tiếp UART: ATmega16U2.\r\nNguồn nuôi mạch: 5VDC từ cổng USB hoặc nguồn ngoài cắm từ giắc tròn DC (nếu sử dụng nguồn ngoài từ giắc tròn DC Hshop.vn khuyên bạn nên cấp nguồn từ 6~9VDC để đảm bảo mạch hoạt động tốt, nếu bạn cắm 12VDC thì IC ổn áp rất nóng, dễ cháy và gây hư hỏng mạch).\r\nSố chân Digital I/O: 54 (trong đó 15 chân có khả năng xuất xung PWM)\r\nSố chân Analog Input: 16\r\nDòng điện DC Current trên mỗi chân I/O: 20mA\r\nDòng điện DC Current chân 3.3V: 50mA\r\nFlash Memory: 256 KB trong đó 8 KB sử dụng cho bootloader.\r\nSRAM: 8 KB\r\nEEPROM: 4 KB\r\nClock Speed: 16 MHz\r\nLED_BUILTIN: 13\r\nKích thước: 101.52 x 53.3 mm\r\nTrang chủ Arduino Mega 2560 R3.', 300000, 0, 5, 4, 'img_1641560404.jpg'),
(11, 'Mạch Chuyển USB UART CP2102', 'Mạch chuyển USB UART CP2102 sử dụng IC CP2102 chính hãng SILICON LABS (trên IC có khắc rõ tên, mã hiệu, không bị cà mờ đi so với các loại giá rẻ khác trên thị trường) được dùng để chuyển giao tiếp từ USB sang UART TTL và ngược lại với tốc độ và độ ổn định cao, Driver của mạch có thể nhận trên tất cả các hệ điều hành hiện nay: Windows, Mac, Linux, Android,... \r\n\r\nMạch chuyển USB UART CP2102 có chân tín hiệu DTR giúp kích tín hiệu Reset để nạp chương trình cho Arduino Pro Mini và các mạch nạp cần chân tín hiệu DTR (đa số các mạch giá rẻ khác không có chân này).\r\n\r\nMô tả chân như sau:\r\n\r\nTXD: chân truyền dữ liệu UART TTL (3.3VDC), dùng kết nối đến chân nhận RX của các module sử dụng mức tín hiệu TTL 3.3~5VDC.\r\nRXD: chân nhận dữ liệu UART TTL (3.3VDC), dùng kết nối đến chân nhận TX của các module sử dụng mức tín hiệu TTL 3.3~5VDC.\r\nGND: chân mass hoặc nối đất.\r\n5V: Chân cấp nguồn 5VDC từ cổng USB, tối đa 500mA.\r\nDTR: Chân tín hiệu DTR, thường được dùng để cấp tín hiệu Reset nạp chương trình cho mạch Arduino.\r\n3.3V: Chân nguồn 3.3VDC (dòng cấp rất nhỏ tối đa 100mA), không sử dụng để cấp nguồn, thường chỉ sử dụng để thiết đặt mức tín hiệu Logic.', 75000, 0, 5, 4, 'img_1641560447.jpg'),
(12, 'Cảm Biến Âm Thanh INMP441 I2S Omnidirectional Microphone', 'Cảm biến âm thanh INMP441 I2S Omnidirectional Microphone được sử dụng như một Microphone đa hướng giúp thu âm thanh từ môi trường, chuyển thành tín hiệu số (Digital) và truyền tới Vi điều khiển qua giao tiếp I2S, thích hợp với các ứng dụng nhận dạng, xử lý âm thanh, điều khiển bằng giọng nói,...\r\n\r\nThông số kỹ thuật:\r\n\r\nĐiện áp sử dụng: 1.8~3.3VDC\r\nDigital I²S Interface with\r\nHigh-Precision 24-Bit Data\r\nHigh SNR of 61 dBA\r\nHigh Sensitivity of -26 dBFS\r\nFlat Frequency Response from 60 Hz to 15 kHz\r\nLow Current Consumption of 1.4 mA\r\nHigh PSR of -75 dBFS\r\nSơ đồ chân:\r\n\r\nSCK: serial data clock for I2S interface.\r\nWS: Serial data word selection for the I2S interface.\r\nL/R: Left / Right channel selection (when set to low, the microphone outputs a signal on the left channel of the I2S frame, when set to high level, the microphone outputs signals on the right channel).\r\nSD: Serial data output of the I2S interface.\r\nVCC: Input power 1.8~3.3VDC.\r\nGND: Power ground', 66000, 3, 5, 5, 'img_1641561162.jpg'),
(13, 'Cảm Biến Màu Sắc I2C UART TCS34725 Color Sensor V1', 'Cảm biến màu sắc I2C UART TCS34725 Color Sensor V1 là phiên bản nâng cấp của cảm biến màu TCS3200, được sử dụng để nhận biết màu sắc bằng cách đo phản xạ 3 màu sắc cơ bản từ vật thể là đỏ, xanh lá và xanh dương sau đó xử lý và truyền thông số đo được của các màu này qua giao tiếp I2C hoặc UART, tổng hợp thông tin của 3 màu trên ta có được màu sắc của vật thể cần đo.\r\n\r\nCảm biến màu sắc I2C UART TCS34725 Color Sensor V1 có tích hợp MCU trên mạch để chuyển đổi từ giao tiếp I2C của TCS34725 sang giao tiếp UART hoặc I2C của MCU giúp dể dàng giao tiếp và lập trình, ta có thể dễ dàng lựa chọn giao tiếp muốn sử dụng bằng cách Set các Jumper trên mạch.\r\n\r\nThông số kỹ thuật:\r\n\r\nIC chính: TCS34725\r\nĐiện áp sử dụng: 3~5VDC\r\nDòng tiêu thụ: 15mA\r\nGiải màu sắc đo: RGB 0~255\r\nTích hợp MCU xử lý và chuyển đổi giao tiếp.\r\nGiao tiếp có thể lựa chọn qua Jumper:\r\nI2C của TCS34725.\r\nI2C của MCU.\r\nUART của MCU.\r\nKích thước: 24.3 x 26.7mm\r\nCách thiết lập giao tiếp dựa vào Jumper S0 và S1:\r\n\r\nS1 để trống (default): Disable chân SCL và SDA, hai chân giao tiếp trực tiếp I2C với TCS34725, chỉ có thể giao tiếp qua hai chân CT / DR của MCU.\r\nS1 nối với G: Enable chân SCL và SDA, sử dụng để giao tiếp trực tiếp với I2C của TCS34725 không thông qua MCU.\r\nS0 để trống (default): Lựa chọn giao tiếp của MCU trên hai chân CT / DR là UART, CT là UART_TX, DR là UART_RX, baudrate mặc định 9600bps / Parity: N / Data bits: 8 / Stop bits: 1\r\nS0 nối với G: Lựa chọn giao tiếp của MCU trên hai chân CT / DR là I2C, CT là I2C_SCL, DR là I2C_SDA.', 145000, 0, 5, 5, 'img_1641561207.jpg');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `manufactors`
--
ALTER TABLE `manufactors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifi`
--
ALTER TABLE `notifi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
