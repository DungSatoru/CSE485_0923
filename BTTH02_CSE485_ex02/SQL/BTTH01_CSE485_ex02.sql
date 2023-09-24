CREATE DATABASE BTTH01_CSE485;

USE BTTH01_CSE485;

SELECT * FROM tacgia
SELECT * FROM theloai
SELECT * FROM baiviet


-- 3. Thực hiện các yêu cầu truy vấn sau:
-- a. Liệt kê các bài viết về các bài hát thuộc thể loại Nhạc trữ tình (2 đ)
SELECT *
FROM baiviet INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
WHERE theloai.ten_tloai = 'Nhạc trữ tình'

-- b. Liệt kê các bài viết của tác giả “Nhacvietplus” (2 đ)
SELECT ten_bhat, ten_tgia
FROM baiviet INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
WHERE tacgia.ten_tgia = 'Nhacvietplus'

-- c. Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào. (2 đ)
SELECT * FROM theloai
WHERE ma_tloai, ten_tloai NOT IN (
    SELECT DISTINCT ma_tloai
    FROM baiviet
)

-- d. Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên thể loại, ngày viết. (2 đ)
SELECT ma_bviet AS 'Mã bài viết', tieude AS 'Tên bài viết', ten_bhat AS 'Tên bài hát', ten_tgia AS 'Tên tác giả', ten_tloai AS 'Tên thể loại', ngayviet AS 'Ngày viết'
FROM baiviet 
INNER JOIN tacgia ON tacgia.ma_tgia = baiviet.ma_tgia
INNER JOIN theloai ON theloai.ma_tloai = baiviet.ma_tloai

-- e. Tìm thể loại có số bài viết nhiều nhất (2 đ)
SELECT theloai.ten_tloai AS 'Tên thể loại', COUNT(*) AS 'Số bài viết' FROM theloai
INNER JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai
GROUP BY theloai.ma_tloai
HAVING COUNT(*) = (
	SELECT MAX(sobaiviet)
	FROM (
		SELECT COUNT(*) AS sobaiviet FROM theloai
		INNER JOIN baiviet ON baiviet.ma_tloai = theloai.ma_tloai
		GROUP BY theloai.ma_tloai
	) AS counts
)

SELECT theloai.ten_tloai AS 'Tên thể loại', COUNT(*) AS 'Số bài viết'
FROM theloai
INNER JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai
GROUP BY theloai.ma_tloai
ORDER BY COUNT(*) DESC
LIMIT 2;

-- f. Liệt kê 2 tác giả có số bài viết nhiều nhất (2 đ)
SELECT ten_tgia, COUNT(*) AS 'Số bài viết'
FROM tacgia INNER JOIN baiviet ON tacgia.ma_tgia = baiviet.ma_tgia
GROUP BY tacgia.ma_tgia
HAVING COUNT(*) = (
	SELECT MAX(sobaiviet)
	FROM (
		SELECT COUNT(*) AS sobaiviet FROM tacgia
		INNER JOIN baiviet ON baiviet.ma_tgia = tacgia.ma_tgia
		GROUP BY tacgia.ma_tgia
	) AS counts
)

-- g. Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em” (2 đ)
SELECT * FROM baiviet
WHERE LOWER(ten_bhat) LIKE '%yêu%'
   OR LOWER(ten_bhat) LIKE '%thương%'
   OR LOWER(ten_bhat) LIKE '%anh%'
   OR LOWER(ten_bhat) LIKE '%em%';
   
-- h. Liệt kê các bài viết về các bài hát có tiêu đề bài viết hoặc tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em” (2 đ)
SELECT * FROM baiviet
WHERE LOWER(tieude) LIKE '%yêu%'
   OR LOWER(tieude) LIKE '%thương%'
   OR LOWER(tieude) LIKE '%anh%'
   OR LOWER(tieude) LIKE '%em%'
   OR LOWER(ten_bhat) LIKE '%yêu%'
   OR LOWER(ten_bhat) LIKE '%thương%'
   OR LOWER(ten_bhat) LIKE '%anh%'
   OR LOWER(ten_bhat) LIKE '%em%';
   
-- i. Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên thể loại và tên tác giả (2 đ)
CREATE VIEW vw_Music AS
	SELECT baiviet.ma_bviet AS 'Mã bài viết', baiviet.tieude AS 'Tên bài viết', theloai.ten_tloai AS 'Tên thể loại', tacgia.ten_tgia AS 'Tên tác giả'
	FROM baiviet
	INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
	INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia;

DROP VIEW vw_Music
SELECT * FROM vw_Music;

-- j. Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách Bài viết của thể loại đó. Nếu thể loại không tồn tại thì hiển thị thông báo lỗi. (2 đ)

-- k. Thêm mới cột SLBaiViet vào trong bảng theloai. Tạo 1 trigger có tên tg_CapNhatTheLoai để khi thêm/sửa/xóa bài viết thì số lượng bài viết trong bảng theloai được cập nhật theo. (2 đ)

-- l. Bổ sung thêm bảng Users để lưu thông tin Tài khoản đăng nhập và sử dụng cho chức năng Đăng nhập/Quản trị trang web. (5 đ)
CREATE TABLE Users (
id int UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
username TEXT UNIQUE NOT NULL,
PASSWORD TEXT NOT null
);

SELECT * FROM users

insert into users (username, password) values ('kschoales0', 'wN2{W3Rmucu70wJd');
insert into users (username, password) values ('whilhouse1', 'nF6{"j~!Q""ioO');
insert into users (username, password) values ('jwreakes2', 'gP2?9Di8o9?i=r$');
insert into users (username, password) values ('bseabrocke3', 'bE9|jw<%');
insert into users (username, password) values ('gpeete4', 'oW3{oEA!(');
insert into users (username, password) values ('ckibble5', 'rA1(bt@j/');
insert into users (username, password) values ('ttracy6', 'kO3!Oy3=O>GU');
insert into users (username, password) values ('mzmitrovich7', 'sL3*x4y\s');
insert into users (username, password) values ('gwollers8', 'aU2`KHReYdd');
insert into users (username, password) values ('mmilch9', 'xL9>Pfyx!*(36');
insert into users (username, password) values ('mprewera', 'xX7,S~Bjx<a');
insert into users (username, password) values ('aviveashb', 'fD9_R7$5mH9<.s');
insert into users (username, password) values ('dtussainec', 'jB6|26HA{|');
insert into users (username, password) values ('skellerd', 'dS9,g.QbTO9)');
insert into users (username, password) values ('broskellye', 'kW2/lHIIdy');
insert into users (username, password) values ('amcvittyf', 'oP7_qATOZSu');
insert into users (username, password) values ('afalkinderg', 'aM4*m0=d');
insert into users (username, password) values ('ckitcatth', 'aA6<v"''Sb<}37N');
insert into users (username, password) values ('mwiltshieri', 'xC4&"!qJM');
insert into users (username, password) values ('dwarehamj', 'cU3(l8_,o7l08');
insert into users (username, password) values ('rodeak', 'kN2`}yYj6&)|$');
insert into users (username, password) values ('pwatfordl', 'cV0<T!L&');
insert into users (username, password) values ('frotchellm', 'xH7)oEtuh~');
insert into users (username, password) values ('daltoftn', 'oJ6,bCgY<');
insert into users (username, password) values ('tokendeno', 'bE6@/I''6');
insert into users (username, password) values ('alaurentinp', 'fD7''Lpn34_@');
insert into users (username, password) values ('ewhimperq', 'tQ9)pwyuP9OslfkI');
insert into users (username, password) values ('qvalenter', 'mS4/7oLq.x<Thc');
insert into users (username, password) values ('ebernadons', 'nZ8"Dt)V=Xw5|');
insert into users (username, password) values ('ajestyt', 'lD3{1jnqC6M?rD{');
insert into users (username, password) values ('swarrillowu', 'oC8{lmO''''W$tTBw*');
insert into users (username, password) values ('mpiggensv', 'pH7{ju&)"');
insert into users (username, password) values ('sbalazotw', 'oL1)CY%Au!#f');
insert into users (username, password) values ('rfranklandx', 'aM9"dSEqaQ');
insert into users (username, password) values ('scowndleyy', 'zT5*)+2beWRoQtl');
insert into users (username, password) values ('oginniz', 'qN5.fW3!(v');
insert into users (username, password) values ('nwardhaw10', 'yO6,JU7}"qzjaKE');
insert into users (username, password) values ('hhuckerby11', 'zE9|id=Ib');
insert into users (username, password) values ('achingedehals12', 'yT7_\oScI''FYq~');
insert into users (username, password) values ('csheeran13', 'kW3!HFS*{3t');
insert into users (username, password) values ('wchillingsworth14', 'dX7?XD~8bk|');
insert into users (username, password) values ('vthacker15', 'hN9{3#da');
insert into users (username, password) values ('jmahomet16', 'tN8/~qJF$)C');
insert into users (username, password) values ('vvancassel17', 'qD6`ZFG(KSijs_');
insert into users (username, password) values ('tbuckner18', 'dL8)bT`,de');
insert into users (username, password) values ('cchapleo19', 'cS7?=+YT%ae');
insert into users (username, password) values ('hmewitt1a', 'pX2$juotGy');
insert into users (username, password) values ('wheadings1b', 'hG0%U1N>z@26');
insert into users (username, password) values ('ljamot1c', 'iV4{}`~M(y');
insert into users (username, password) values ('khyne1d', 'tI8*Sr@"Px_sv3J_');
