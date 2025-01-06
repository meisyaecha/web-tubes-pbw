

USE gamifikasi;

CREATE TABLE companies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    logo VARCHAR(255) DEFAULT NULL,
    website VARCHAR(255) DEFAULT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO `companies` (`id`, `created_by`, `name`, `description`, `logo`, `website`) VALUES
(1, NULL, 'Mojiken Studio Test', 'Penyedia solusi gamifikasi untuk edukasi dan hiburan.', 'Mojiken-Camp-Featured_1-720x450.jpg', 'https://mojikenstudio.com/'),
(2, NULL, 'Gambir Studio', 'Spesialisasi dalam gamifikasi korporasi dan pelatihan.', 'gambirstudio_cover.jpeg', 'https://www.instagram.com/gambirstudio/'),
(3, NULL, 'From Root Games', 'Membantu perusahaan mencapai engagement tinggi melalui gamifikasi.', 'Group 20_opaque.png', 'https://leveluplabs.com'),
(4, NULL, 'Agate International', 'Lorem Ipsum ', 'agate-logo-col.jpg', 'https://agate.id/'),
(7, NULL, 'Toge Production', 'sfasfafd dfdsfdsg sdgsgsg', '1735908398_3f487d5ccd04b4fcaf1a.png', 'https://www.togeproductions.com/'),
(10, NULL, 'GAMELAB INDONESIA', 'GAMELAB menghadirkan platform lengkap untuk meningkatkan kompetensi lulusan yang siap kerja dan siap wirausaha melalui program pelatihan berbasis proyek (PBL), magang online bersertifikat, dan sertifikasi industri.', '1736083603_f999005607bc0cfe6d0f.png', 'https://www.gamelab.id/');
