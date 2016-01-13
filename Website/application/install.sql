CREATE TABLE `articles` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(100) NOT NULL,
    `barcode` int(13) NOT NULL,
    `description` text,
    `data` text,
    `price` int(11) NOT NULL,
    `disponibility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;