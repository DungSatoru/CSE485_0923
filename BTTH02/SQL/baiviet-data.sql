CREATE TABLE baiviet (
   ma_bviet INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   tieude VARCHAR(200) NOT NULL,
   ten_bhat VARCHAR(100) NOT NULL,
   ma_tloai INT UNSIGNED NOT NULL,
   tomtat TEXT NOT NULL,
   noidung TEXT,
   ma_tgia INT UNSIGNED NOT NULL,
   ngayviet DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   hinhanh VARCHAR(200),
   FOREIGN KEY (ma_tloai) REFERENCES theloai(ma_tloai),
   FOREIGN KEY (ma_tgia) REFERENCES tacgia(ma_tgia)
);

DROP TABLE baiviet

SELECT * FROM baiviet


INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) VALUES
('Lời bài hát Phố không mùa', 'Phố không mùa', 2, 'Tóm tắt bài Phố không mùa', 'Nội dung bài hát Phố không mùa', 1, '2016/05/09', 'https://nhaccuthienphuc.com/wp-content/uploads/2016/09/pho-khong-mua.jpg'),
('Lời bài hát Người có thương', 'Người có thương', 2, 'Tóm tắt bài Người có thương', 'Nội dung bài hát Người có thương', 1, '2021/12/09', 'https://i.ytimg.com/vi/xb9-oaSdbDs/maxresdefault.jpg'),
('Lời bài hát Anh sẽ cho mình', 'Anh sẽ cho mình', 2, 'Tóm tắt Anh sẽ cho mình', 'Nội dung bài hát Anh sẽ cho mình', 1, '2019/08/09', 'https://i.ytimg.com/vi/2Squv4QFpYU/sddefault.jpg'),
('Lời bài hát Tháng mấy em nhớ anh', 'Tháng mấy em nhớ anh', 2, 'Tóm tắt Tháng mấy em nhớ anh', 'Nội dung Tháng mấy em nhớ anh', 2, '2016/10/19', 'https://avatar-ex-swe.nixcdn.com/song/share/2021/04/01/2/9/0/f/1617248290828.jpg'),
("'Tháng tư là lời nói dối của em' - bản hòa ca buồn của tình yêu", 'Tháng tư là lời nói dối của em', 2, 'Ngày quốc tế nói dối, cư dân mạng lựa chọn bản nhạc hit một thời của Hà Anh Tuấn để nói lên tiếng lòng của mình. Hiện ca khúc đang nhận được nhiều tương tác tích cực từ cư dân mạng.', 'Vào ngày Cá tháng tư (1/4) mọi người trên thế giới có thể nói dối nhau mà không sợ đối phương giận. Bên cạnh ý nghĩa mua vui và mang lại tiếng cười sảng khoái, ở mỗi một quốc gia, trò đùa trong ngày Cá tháng tư lại mang một ý nghĩa riêng biệt. Ở Việt Nam, nhiều người vẫn thường cho rằng đây là ngày thích hợp để tỏ tình bởi nếu có bị từ chối thì sẽ không bị "quê".

Cũng trong ngày này, vô tình những ca khúc của nhiều ca sĩ nổi tiếng ở showbiz Việt lại rất phù hợp để "nói dối". Và "Tháng tư là lời nói dối của em" được hầu hết cư dân mạng lựa chọn lắng nghe và chia sẻ rộng rãi.', 2, '2017/02/24', 'https://i.ytimg.com/vi/UCXao7aTDQM/maxresdefault.jpg'),
('Lời bài hát Túp lều lý tưởng', 'Túp lều lý tưởng', 1, 'Tóm tắt bài Túp lều lý tưởng', 'Nội dung bài hát Túp lều lý tưởng', 5, '2012/10/10', 'https://photo-resize-zmp3.zmdcdn.me/w600_r1x1_jpeg/covers/e/b/eb0786f1793299f9589468408e0ffa9f_1289838145.jpg'),
('Lời bài hát Thị Mầu', 'Thị Mầu', 2, 'Tóm tắt bài Thị Mầu', 'Nội dung bài hát Thị Mầu', 4, '2012/10/10', 'https://i.ytimg.com/vi/0yHtYPeK2Jg/maxresdefault.jpg'),
('Lời bài hát Lửng lơ', 'Lửng lơ', 3, 'Tóm tắt bài Lửng lơ', 'Nội dung bài hát Lửng lơ', 7, '2012/10/10', 'https://i.ytimg.com/vi/HehotFZ8BGo/maxresdefault.jpg'),
('Lời bài hát À Lôi', 'À Lôi', 4, 'Tóm tắt bài À Lôi', 'Nội dung bài hát À Lôi', 6, '2012/10/10', 'https://photo-cms-tpo.epicdn.me/w1000/Uploaded/2023/ofh-yuztztmf/2023_07_31/a-loi-la-gi-01-5778.jpeg'),
('Lời bài hát Người miền núi chất', 'Người miền núi chất', 4, 'Tóm tắt bài Người miền núi chất', 'Nội dung bài hát Người miền núi chất', 6, '2012/10/10', 'https://i.ytimg.com/vi/xVtkkHfrqPs/maxresdefault.jpg'),
('Lời bài hát Anh ba khía', 'Anh ba khía', 1, 'Tóm tắt bài Anh ba khía', 'Nội dung bài hát Anh ba khía', 5, '2012/10/10', 'https://i.ytimg.com/vi/bujtjkN_C64/maxresdefault.jpg'),
('Lời bài hát Bật tình yêu lên', 'Bật tình yêu lên', 2, 'Tóm tắt bài Bật tình yêu lên', 'Nội dung bài hát Bật tình yêu lên', 4, '2012/10/10', 'https://i.ytimg.com/vi/VHjMJeLsI0o/maxresdefault.jpg')



SELECT count(*) FROM users
