CREATE DATABASE IF NOT EXISTS `QLGAME` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `QLGAME`;

CREATE TABLE IF NOT EXISTS `NHA_PHAT_TRIEN` (
    `MA_NPT` VARCHAR(8) COLLATE utf8_general_ci NOT NULL PRIMARY KEY,
    `TEN_NPT` VARCHAR(50) COLLATE utf8_general_ci NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `GAME` (
    `MA_GAME` VARCHAR(8) COLLATE utf8_general_ci NOT NULL PRIMARY KEY,
    `TEN_GAME` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
	`MA_NPT` VARCHAR(8) COLLATE utf8_general_ci NOT NULL,
    `DON_GIA` INT(11) NOT NULL,
    `HINH` VARCHAR(200) COLLATE utf8_general_ci NOT NULL,
    CONSTRAINT `GAME_IBFK_1` FOREIGN KEY (`MA_NPT`) REFERENCES `NHA_PHAT_TRIEN`(`MA_NPT`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `USER` (
    `MA_USER` VARCHAR(8) COLLATE utf8_general_ci NOT NULL PRIMARY KEY,
    `TEN_USER` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
    `SDT` VARCHAR(12) COLLATE utf8_general_ci NOT NULL,
    `EMAIL` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
    `DIA_CHI` VARCHAR(200) COLLATE utf8_general_ci NOT NULL,
    `TEN_DN` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
    `MAT_KHAU` VARCHAR(28) COLLATE utf8_general_ci NOT NULL,
    `PHAN_QUYEN` VARCHAR(1) COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `HOA_DON` (
    `MA_HD` VARCHAR(8) COLLATE utf8_general_ci NOT NULL PRIMARY KEY,
    `MA_USER` VARCHAR(8) COLLATE utf8_general_ci NOT NULL,
    `NGAY_BAN` DATE NOT NULL,
    `TRI_GIA` INT(11) NOT NULL,
    CONSTRAINT `HD_IBFK_1` FOREIGN KEY (`MA_USER`) REFERENCES `USER`(`MA_USER`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `CTHD` (
    `MA_HD` VARCHAR(8) COLLATE utf8_general_ci NOT NULL,
    `MA_GAME` VARCHAR(8) COLLATE utf8_general_ci NOT NULL,
    `GIA` INT(11) NOT NULL,
    `SO_LUONG` INT(11) NOT NULL,
    PRIMARY KEY(`MA_HD`,`MA_GAME`),
    CONSTRAINT `CTHD_IBFK_1` FOREIGN KEY (`MA_HD`) REFERENCES `HOA_DON`(`MA_HD`) ON DELETE CASCADE,
    CONSTRAINT `CTHD_IBFK_2` FOREIGN KEY (`MA_GAME`) REFERENCES `GAME`(`MA_GAME`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `NHA_PHAT_TRIEN`(`MA_NPT`, `TEN_NPT`) VALUES
('NPT01', 'FromSoftware'),
('NPT02', 'Rockstar Games'),
('NPT03', 'Ubisoft'),
('NPT04', 'Valve'),
('NPT05', 'Sony'),
('NPT06', 'Microsoft'),
('NPT07', 'Activision Blizzard'),
('NPT08', 'Electronic Arts'),
('NPT09', 'Bandai Namco'),
('NPT10', 'Square Enix');

INSERT INTO `GAME`(`MA_GAME`, `TEN_GAME`, `MA_NPT`, `DON_GIA`, `HINH`) VALUES
('GA001', 'Grand Theft Auto V - GTA V', 'NPT02', 225000, 'https://images2.alphacoders.com/519/519170.jpg'),
('GA002', 'Left 4 Dead 2', 'NPT04', 120000, 'https://images.alphacoders.com/673/67393.jpg'),
('GA003', '7 Days to Die', 'NPT04', 217000, 'https://images4.alphacoders.com/709/709973.jpg'),
('GA004', 'Elden Ring', 'NPT03', 800000, 'https://images4.alphacoders.com/115/1151249.jpg'),
('GA005', 'Assassins Creed?? Odyssey', 'NPT03', 990000, 'https://images3.alphacoders.com/128/1281618.png'),
('GA006', 'Cities: Skylines - Green Cities', 'NPT08', 192000, 'https://cdn1.epicgames.com/6009be9994c2409099588cde6f3a5ed0/offer/EGS_CitiesSkylinesGreenCities_ColossalOrder_DLC_S1-2560x1440-3728991e81ebdb13fe41b1b41b017fe0.jpg?h=270&resize=1&w=480'),
('GA007', 'Plants vs. Zombies', 'NPT08',69000, 'https://images6.alphacoders.com/671/671912.jpg'),
('GA008', 'Assassin Creed?? Origins', 'NPT03', 936000, 'https://images.alphacoders.com/845/845990.jpg'),
('GA009', 'Assassin Creed 2', 'NPT03', 163000, 'https://images6.alphacoders.com/304/304016.jpg'),
('GA010', 'Shadow Warrior 2', 'NPT10', 306000, 'https://images4.alphacoders.com/835/835754.jpg'),
('GA011', 'DRAGON BALL FighterZ', 'NPT09', 1940000, 'https://images2.alphacoders.com/901/901079.jpg'),
('GA012', 'Sword Art Online Re: Hollow Fragment', 'NPT09', 186000, 'https://images7.alphacoders.com/333/333852.jpg'),
('GA013', 'Call of Duty??: WWII', 'NPT07', 1364000, 'https://images2.alphacoders.com/879/879650.jpg'),
('GA014', 'Resident Evil Village', 'NPT10', 236000, 'https://images7.alphacoders.com/119/1193948.jpg'),
('GA015', 'Euro Truck Simulator 2', 'NPT08', 346000, 'https://images6.alphacoders.com/421/421200.jpg'),
('GA016', 'Call of Duty??: Modern Warfare?? Remastered', 'NPT07', 860000, 'https://images3.alphacoders.com/720/720450.jpg'),
('GA017', 'NieR:Automata???', 'NPT09', 788000, 'https://images7.alphacoders.com/838/838020.png'),
('GA018', 'NARUTO SHIPPUDEN: Ultimate Ninja STORM 4', 'NPT09', 615000, 'https://images3.alphacoders.com/678/678440.jpg'),
('GA019', 'Red Dead Redemption 2', 'NPT02', 946000, 'https://images8.alphacoders.com/958/958091.jpg'),
('GA020', 'The Crew??? 2', 'NPT08', 186000, 'https://images6.alphacoders.com/882/882275.jpg');


/*Ph??n quy???n: 0 l?? kh??ch h??ng, 1 l?? nh??n vi??n, 2 l?? qu???n l??*/
INSERT INTO `USER`(`MA_USER`, `TEN_USER`, `SDT`, `EMAIL`, `DIA_CHI`, `TEN_DN`, `MAT_KHAU`, `PHAN_QUYEN`) VALUES
('US001', 'Nguy???n V??n An', '0912345678', 'NVAn@gmail.com', '150 Ng?? T???t T???','NVAn', '123456','0'),
('US002', 'Nguy???n Th??i H???ng', '0923456789', 'NTHong@gmail.com', '25 H??t Giang','NTHong', '123456','0'),
('US003', 'Nguy???n H???ng T??m', '0934567891', 'NHTam@gmail.com', '15 L???c Thi???n','NHTam', '123456','0'),
('US004', 'Tr???n V??n C?????ng', '0945678912', 'TVCuong@gmail.com', '23 Tr???n Nguy??n H??n','TVCuong', '123456','0'),
('US005', 'Ng?? Th??? Anh', '0956789901', 'NTAnh@gmail.com', '10 Nguy???n Tr??i','NTAnh', '123456','0'),
('US006', 'Ph???m Ng???c ???n', '0911111112', 'PNAn@gmail.com', '12 T??n Th???t T??ng','PNAn', '123456','0'),
('US007', 'Ng?? Thi??n', '0911111113', 'NThien@gmail.com', '100 H???ng L??nh','NThien', '123456','0'),
('US008', 'L??m B??nh', '0911111114', 'LBinh@gmail.com', '120 Ng?? Gia T???','LBinh', '123456','0'),
('US009', 'Th??i V??n Thi??n', '0911111156', 'TVThien@gmail.com', '30 L?? Th??nh T??n','TVThien', '123456','0'),
('US010', 'Cao Th??? Th??i', '0911111117', 'CTThai@gmail.com', '32 L?? Th??nh T??n','CTThai', '123456','0'),
('US011', 'Ng?? Th???c K???', '0922222221', 'NTKy@gmail.com', '20 T??n K??? T??n Qu??', 'NTKy', '123456','1'),
('US012', 'L??u Hoa', '0922222223', 'LHoa@gmail.com', '15 Nguy???n Khuy???n', 'LHoa', '123456','1'),
('US013', 'H???a Thi??n', '0999999999', 'HThien@gmail.com', '24 Ng?? ?????c K???', 'HThien', '123456','1'),
('US014', 'Tr???n V??n To??n', '0899911122', 'TVToan@gmail.com', '10 L?? ?????i H??nh', 'TVToan', '123456','1'),
('US015', 'Tr???n V??n To??n Thi??n', '0899911133', 'TVTThien@gmail.com', '150 Ng?? Quy???n', 'TVTThien', '123456','2');


INSERT INTO `HOA_DON`(`MA_HD`, `MA_USER`, `NGAY_BAN`, `TRI_GIA`) VALUES
('HD001', 'US001', '2022-10-09', 225000),
('HD002', 'US002', '2022-09-11', 120000),
('HD003', 'US003', '2022-08-12', 217000),
('HD004', 'US004', '2022-10-15', 800000),
('HD005', 'US005', '2022-09-22', 990000),
('HD006', 'US006', '2022-07-11', 192000),
('HD007', 'US007', '2022-08-22', 69000),
('HD008', 'US008', '2022-09-12', 936000),
('HD009', 'US009', '2022-09-16', 163000),
('HD010', 'US010', '2022-09-17', 306000),
('HD011', 'US001', '2022-10-01', 1940000),
('HD012', 'US002', '2022-10-02', 186000),
('HD013', 'US003', '2022-10-02', 1364000),
('HD014', 'US004', '2022-10-02', 236000),
('HD015', 'US005', '2022-10-04', 346000),
('HD016', 'US006', '2022-10-05', 860000),
('HD017', 'US007', '2022-10-05', 788000),
('HD018', 'US008', '2022-10-06', 615000),
('HD019', 'US009', '2022-10-06', 946000),
('HD020', 'US010', '2022-10-06', 186000);

INSERT INTO CTHD(`MA_HD`, `MA_GAME`, `GIA`, `SO_LUONG`) VALUES
('HD001', 'GA001', 225000, 1),
('HD002', 'GA002', 120000, 1),
('HD003', 'GA003', 217000, 1),
('HD004', 'GA004', 800000, 1),
('HD005', 'GA005', 990000, 1),
('HD006', 'GA006', 192000, 1),
('HD007', 'GA007', 69000, 1),
('HD008', 'GA008', 936000, 1),
('HD009', 'GA009', 163000, 1),
('HD010', 'GA010', 306000, 1),
('HD011', 'GA011', 1940000, 1),
('HD012', 'GA012', 186000, 1),
('HD013', 'GA013', 1364000, 1),
('HD014', 'GA014', 236000, 1),
('HD015', 'GA015', 346000, 1),
('HD016', 'GA016', 860000, 1),
('HD017', 'GA017', 788000, 1),
('HD018', 'GA018', 615000, 1),
('HD019', 'GA019', 946000, 1),
('HD020', 'GA020', 186000, 1);