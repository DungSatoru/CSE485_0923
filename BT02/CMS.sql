CREATE DATABASE CMS
USE CMS

DROP TABLE users

CREATE TABLE users (
   id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   fullname VARCHAR(30) NOT NULL ,
   email VARCHAR(50) NOT NULL UNIQUE,
   gender VARCHAR(10),
   job VARCHAR(30),
   mobile VARCHAR(12),
   dob DATE,
   stt BIT DEFAULT 0,
	image NVARCHAR(250)
);
insert into users (fullname, email, gender, job, mobile, dob, stt, image) values ('Hạ Quang Dũng', 'haquangdung18092003@gmail.com', 'Male', 'Admin', '0393049255', '2003/09/18', 1, './assets/images/HaQuangDung.jpg');
insert into users (fullname, email, gender, job, mobile, dob, stt, image) VALUES ('Hạ Quốc Cường', 'haquoccuong28112014@gmail.com', 'Male', 'Customer', '0393042014', '2014/11/28', 1, './assets/images/HaQuocCuong.jpg');
insert into users (fullname, email, gender, job, mobile, dob, stt, image) VALUES ('Hạ Thị Thúy Loan', 'hathithuyloan13032000@gmail.com', 'Female', 'Manager', '0393042000', '2003/03/13', 0, './assets/images/HaThiThuyLoan.jpg');
insert into users (fullname, email, gender, job, mobile, dob, stt, image) values ('Hạ Tuệ Nhi', 'hatuenhi20032021@gmail.com', 'Female', 'Customer', '0393042021', '2021/03/20', 0, './assets/images/HaTueNhi.jpg');
insert into users (fullname, email, gender, job, mobile, dob, stt, image) values ('Phạm Quỳnh Anh', 'phamquynhanh15092003@gmail.com', 'Female', 'Customer', '0393042003', '2003/09/15', 0, './assets/images/PhamQuynhAnh.jpg');

DELETE FROM users WHERE id = 5

SELECT * FROM USERS

DROP TABLE notifications
CREATE TABLE notifications (
    id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    color VARCHAR(20),
    noti_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    title VARCHAR(255) NOT NULL,  -- Đặt độ dài tối đa cho cột title (ví dụ: 255)
    des TEXT  -- Sử dụng kiểu dữ liệu TEXT cho cột des nếu bạn muốn lưu trữ nội dung dài hơn
);

insert into notifications (color, title, des) VALUES ('orange', 'Youtube, a video-sharing website, goes live <span>$500</span>', '');
insert into notifications (color, title, des) VALUES ('blue', 'New order placed <span>#XF-2356</span>', 'Quisque a consequat ante Sit amet magna at volutapt...');
insert into notifications (color, title, des) VALUES ('green', 'StumbleUpon is acquired by Ebay.', '');
insert into notifications (color, title, des) VALUES ('yellow', 'Mashable, a news website and blog, goes live', '');
insert into notifications (color, title, des) VALUES ('grey', 'StumbleUpon is acquired by Ebay.', '');
insert into notifications (color, title, des) VALUES ('orange', 'StumbleUpon is acquired by Ebay.', '');
insert into notifications (color, title, des) VALUES ('blue', 'StumbleUpon is acquired by Ebay.', '');
SELECT * FROM notifications
information_schema

