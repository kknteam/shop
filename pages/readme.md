I. Hướng dẫn setup database
	1. Tạo database bằng câu lệnh "Create database Store;"
	2. Mở database vừa tạo
	3. Mở file mydb.sql, chạy toàn bộ câu lệnh trong file (ghi nhớ là phải tạo các bảng này trong database vừa khởi tạo ở trên)
II. Hướng dẫn setup server
	1. Mở file server.php
	2. Sửa đoạn code trong file này như sau

	DEFINE('DB_USERNAME', <tên tài khoản đăng nhập vào mysql server>);
  	DEFINE('DB_PASSWORD', <Mật khẩu đăng nhập vào mysql>);
  	DEFINE('DB_HOST', 'localhost');
  	DEFINE('DB_DATABASE', 'store'); #đây là tên database sử dụng, nếu làm theo bước 1 thì giữ nguyên, không thì nhập vào tên database sử dụng
  	3. Save lại
  	4. Reload page để kiểm tra
  	Note:
  	 Nếu chạy trên window và có sử dụng Xamp, nhớ bật php và mysql
  	 Nếu chạy trên Mac hoặc ubuntu, nên dùng php 7.4 trở lên
  	 Vì sẽ không sử dụng git để update thay đổi nên hãy lưu lại đoạn này, vì sau này nếu có update sẽ phải download lại và làm lại bước này


