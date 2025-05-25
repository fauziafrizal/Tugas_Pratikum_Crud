SELECT * FROM pasien;

INSERT INTO pasien (nama,umur,keluhan) VALUES
('Agus Salim',45,'Sakit Kepala');

INSERT INTO pasien (nama,umur,keluhan) VALUES
('Faiz',19,'Sakit Gigi');

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    level TINYINT(1) NOT NULL -- 0: admin, 1: user
);

-- Contoh data
INSERT INTO users (username, password, level) VALUES
('admin', MD5('admin123'), 0),
('user', MD5('user123'), 1);

