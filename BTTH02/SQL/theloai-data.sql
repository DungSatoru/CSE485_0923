CREATE TABLE theloai (
    ma_tloai INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ten_tloai VARCHAR(50) NOT NULL
);

SELECT * FROM theloai

INSERT INTO theloai (ten_tloai) VALUES
('Nhạc trữ tình'),
('Nhạc trẻ'),
('Nhạc EDM'),
('Nhạc Rap')