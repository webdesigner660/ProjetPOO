-- Active: 1731490564042@@127.0.0.1@3307@airbnb
CREATE TABLE `user` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `email` varchar(100),
    `password` varchar(255),
    `firstname` varchar(50),
    `lastname` varchar(50),
    `phone` varchar(15),
    `role` varchar(20)
);

CREATE TABLE `announcement` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `id_owner` int,
    `id_adress` int,
    `size` int,
    `price` decimal,
    `description` text,
    `sleeping` int,
    `accommodation_id` int
);

CREATE TABLE `Reservation` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `date_start` date,
    `date_end` date,
    `user_id` int,
    `announcement_id` int,
);

CREATE TABLE `Equipment` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `Label` VARCHAR(255)
);

CREATE TABLE `Adress` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `city` varchar(50),
    `country` varchar(50),
    `street` text
);

CREATE TABLE `TypeAccommodation` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `private_room` varchar(255),
    `public_room` varchar(255),
    `entire_dwelling` varchar(255)
);

CREATE TABLE `AnnouncementEquipment` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `id_announcement` int,
    `id_equipment` int
);

ALTER TABLE `AnnouncementEquipment`
ADD FOREIGN KEY (`id_announcement`) REFERENCES `announcement` (`id`);

ALTER TABLE `AnnouncementEquipment`
ADD FOREIGN KEY (`id_equipment`) REFERENCES `Equipment` (`id`);

ALTER TABLE `Reservation`
ADD FOREIGN KEY (`accommodation_id`) REFERENCES `TypeAccommodation` (`id`);

ALTER TABLE `announcement`
ADD FOREIGN KEY (`accommodation_id`) REFERENCES `TypeAccommodation` (`id`);

ALTER TABLE `Reservation`
ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `announcement`
ADD FOREIGN KEY (`id_adress`) REFERENCES `Adress` (`id`);

ALTER TABLE `Reservation`
ADD FOREIGN KEY (`announcement_id`) REFERENCES `announcement` (`id`);

ALTER TABLE `Reservation`
ADD FOREIGN KEY (`equipment_id`) REFERENCES `Equipment` (`id`);

ALTER TABLE `announcement`
ADD FOREIGN KEY (`id_owner`) REFERENCES `user` (`id`);