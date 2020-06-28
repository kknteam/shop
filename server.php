<?php
	session_start();
	//Create var
	$username = "";
	$email = "";
	$errors = array();
	DEFINE('DB_USERNAME', 'root');
  	DEFINE('DB_PASSWORD', 'admin123');
  	DEFINE('DB_HOST', 'localhost');
  	DEFINE('DB_DATABASE', 'store');
	//connect to database
	$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	if (mysqli_connect_error()) {
    	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  	}
	mysqli_set_charset($db,'utf8');
	if (mysqli_connect_errno())
	{
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	//SIGN UP
	if(isset($_POST['sig_user']))
	{
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		//Check var
		if(empty($username))
		{
			array_push($errors, "Tài khoản trông");
		}
		if(empty($email))
		{
			array_push($errors, "Email trống");
		}
		if(empty($password_1))
		{
			array_push($errors, "Mật khẩu trống");
		}
		if($password_2 != $password_1)
		{
			array_push($errors, "Mật khẩu lặp lại không khớp");
		}


		//Check username hop le
		$user_check = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
		$result = mysqli_query($db, $user_check);
		$user = mysqli_fetch_assoc($result); //Tra ve mang KQ cua result/ null neu khong ton tai
		if($user) //Da ton tai user
		{
			if($user['username'] === $username)
			{
				array_push($errors, "Tài khoản đã tồn tại");
			}
			if($user['email'] === $email)
			{
				array_push($errors, "Email đã tồn tại");
			}
		}

		//If no error -> push to database
		if(count($errors)== 0)
		{
			//Set day du thong tin
			$password = $password_1;

			// Doan nay tu nghi ra (Can cai thien)
			$query = "SELECT * FROM user";
			$result = mysqli_query($db, $query);
			$id = 0;
			while($row = mysqli_fetch_array($result)) {
				if($id == $row["id"])
				{
					$id++;
				}
				else
				{
					break;
				}
    		}
			echo "<script>alert(".$id.");</script>";
    		//Upload to database
			$sql = "INSERT INTO user(id,username,email,password,loai)
					VALUES ('$id','$username','$email','$password','U')";
			mysqli_query($db,$sql);
			header('location: index.php?a=login.php');
		}
	}

	//LOG IN
	if(isset($_POST['log_user']))
	{
		// DESTROY LAST USER'S CART
		if(isset($_SESSION['cart']))
		{
			unset($_SESSION['cart']);
		}
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if(empty($username))
		{
			array_push($errors, "Tài khoản trống");
		}
		if(empty($password))
		{
			array_push($errors, "Mật khẩu trống");
		}

		if(count($errors)==0)
		{			
		//Find from database
			
			$user = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
			$result = mysqli_query($db, $user);	//Lay KQ

			if(mysqli_num_rows($result)==1)	//Tra ve 1 KQ
			{
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "Đăng nhập thành công";
				header('location: index.php');
			}
			else //FAIL
			{
				array_push($errors, "Tài khoản hoặc mật khẩu chưa chính xác");
			}

		}
	}

	//CART

	if (isset($_POST['shopping_cart']))
	{
		if(isset($_SESSION['username']))
		{
			$quantity = 1;		
			// KT session cart co duoc tao hay chua
			if(isset($_SESSION['cart']))
			{
				$item_array_id = array_column($_SESSION["cart"], "id");	//return 1 dong tu database voi id = $id
				//Them moi
				if(!in_array($_GET["id"], $item_array_id))	//Check if that id exists
				{
					$count = count($_SESSION['cart']); //Basically n in an array	
					$item_list = array(
						'id' => $_GET["id"],
						'productname' => $_POST["hidden_name"],
						'price' => $_POST["hidden_price"],		
						'quantity' => $quantity 
					);
					// Add element to array(array.push())
					$_SESSION["cart"][$count] = $item_list;
				}
				else
				{
					foreach ($_SESSION["cart"] as $key => $value) 
					{				
						if($value["id"] == $_GET["id"])
						{
							$value['quantity'] = $value['quantity'] + 1;
							$_SESSION["cart"][$key] = $value;
						}
					}
				}
				
			}
			else
			{
				// Chua thi tao
					
				$item_list = array(
					'id' => $_GET["id"],
					'productname' => $_POST["hidden_name"],
					'price' => $_POST["hidden_price"],		
					'quantity' => $quantity 
				);
				$_SESSION['cart'][0] = $item_list;
			}
		}
		else
		{
			echo '<script>
					alert("Bạn phải đăng nhập để mua hàng");
					window.location.replace("index.php?a=login.php");
					</script>';
		}
		
	}
	//REMOVE ITEM
	if(isset($_GET["action"]))
	{
		if($_GET["action"] == "delete")
		{
			$n = count($_SESSION["cart"]);
			foreach ($_SESSION["cart"] as $key => $value) 
			{
				if($value["id"] == $_GET["id"])
				{
					for($i = $key; $i < $n-1; $i++)
					{
						$_SESSION["cart"][$i] = $_SESSION["cart"][$i+1];
					}
					unset($_SESSION["cart"][$n-1]);
				}
			}
		}	
		//SORT ITEM AS PAGES

		if($_GET["action"] == "Sort")
		{
			$item = $_GET["id"]; echo $item;
			$item_check = "SELECT * FROM product WHERE id like '$item%'";
			$result = mysqli_query($db, $item_check);
			$listItem = mysqli_fetch_assoc($result); 
		}
		//XOÁ NGƯỜI DÙNG
		if($_GET["action"] == "u_del")
		{
			$id = $_GET["id"];
			if($id == 0)
			{
				echo "<script>alert('Không thể xoá admin');</script>";
			}
			else{			
				//GET id user
				$seek = "SELECT * FROM hoa_don WHERE id_user = '$id'";
				$id_hd = "id_hoadon = ";
				$c = 0;
				$result = mysqli_query($db,$seek);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
					
						if($c != 0)
						{
							$id_hd .= " or id_hoadon = " . $row["id"];
						}	
						else
						{
							$id_hd .= $row["id"];
						}
						$c++;
					}	
					$query_ctHD = "DELETE FROM ct_hoadon WHERE $id_hd";
				    mysqli_query($db,$query_ctHD);
				}

				//QUERY DELETE
				$query = "DELETE FROM user WHERE id = '$id'";
				$query1 = "DELETE FROM thong_tin_user WHERE id = '$id'";				
				$query3 = "DELETE FROM hoa_don WHERE id_user = '$id'";
				//QUERY
				
				mysqli_query($db,$query3);
				mysqli_query($db,$query1);
				mysqli_query($db,$query);
				echo "<script>alert('Xoá thành công');</script>";
			}				
		}
	}

	//CHECK OUT
	$fail = array();
	if(isset($_POST['checkout']))
	{

		$name = $_POST['txtFullname'];
		$email = $_POST['txtEmail'];
		$phone = $_POST['txtPhone'];
		$address = $_POST['txtAddress'];
		//Check var
		if(empty($name))
		{
			array_push($fail, "Full name is empty");
		}
		if(empty($email))
		{
			array_push($fail, "Email is empty");
		}
		if(empty($phone))
		{
			array_push($fail, "Your phonenumber is empty");
		}
		if(empty($address))
		{
			array_push($fail, "Please type in your address");
		}
		if(count($fail)==0)
		{
			if(!isset($_SESSION['cart']))
			{
				echo '<script>alert("There are no item in your shopping cart");</script>';
			}
			else{
				unset($_SESSION['cart']);
				echo '<script>alert("Your order(s) have been placed successfully");</script>';
				echo '<script>window.location="index.php"</script>';

			}

		}

	}

	//CART SUBMIT
	if(isset($_POST["cart_submit"]))
	{	
		echo $_POST["id"];
			foreach ($_SESSION["cart"] as $key => $value) 
			{				
					$item = $_SESSION["cart"][$key];
					$item['quantity'] = $value['quantity'];
					$_SESSION["cart"][$key] = $item;
			}
	}
	//SAN PHAM MOI
	if(isset($_POST["pSubmit"]))
	{
		
		$ID = $_POST["pID"];
		$Name = $_POST["pName"];
		$NSX = $_POST["pNSX"];
		$Price = $_POST["pPrice"];
		$Img1 = $_POST["pImg1"];
		$Img2 = $_POST["pImg2"];
		$Img3 = $_POST["pImg3"];
		$slt = $_POST["slt"];
		$loai = $_POST["loai"];
		$NNhan =  date('y-m-d');

		//Upload to database
		$sql = "INSERT INTO product(id,productname,hang,price,img,img_1,img_2,ngay_nhan,sl_ton,loai)
				VALUES ('$ID','$Name','$NSX','$Price','$Img1','$Img2','$Img3','$NNhan','$slt','$loai')";
		mysqli_query($db,$sql);
		echo "<script>alert('Thêm thành công sản phẩm'); </script>";
		echo '<script>window.location="index.php?a=ql_sanPham.php"</script>';
	}
	//UPDATE SẢN PHẨM
	if(isset($_POST["ctSubmit"]))
	{
		$CT_ID = $_POST["ctIDCT"];
		$ID = $_POST["ctID"];
		$GGia = $_POST["ctGGia"];
		$BHanh = $_POST["ctBaoHanh"];
		$THieu = $_POST["ctThuongHieu"];
		$Nhan = $_POST["ctNhan"];
		$Mau = $_POST["ctMau"];
		$Loai = $_POST["ctLoai"];
		$TThich = $_POST["ctTuongThich"];

		$MoTa = $_POST["ctMoTa"];
		$GThieu = $_POST["ctGThieu"];
		$CTA = $_POST["ctCTA"];
		$CTB = $_POST["ctCTB"];

		//Upload to database
		$sql = "INSERT INTO ctsanpham(id_sp,id,giam_gia,mo_ta,gioi_thieu,chi_tiet,chi_tiet_1,bao_hanh,thuong_hieu,label,mau_sac,loai,tuong_thich)
				VALUES ('$CT_ID','$ID','$GGia','$MoTa','$GThieu','$CTA','$CTB','$BHanh','$THieu','$Nhan','$Mau','$Loai','$TThich')";
		mysqli_query($db,$sql);
		echo "<script>alert('Thành công')</script>;";
		echo '<script>window.location="index.php?a=ql_sanPham.php"</script>';
	}
	// Set luot xem
	if(isset($_GET["i_id"]))
	{
		$id = $_GET["i_id"];

		$query = "SELECT * FROM product WHERE id = '$id'";
		$result = mysqli_query($db, $query);
		if(mysqli_num_rows($result)>0)
		{
			$row = mysqli_fetch_array($result);
			$luotXem = $row["luot_xem"]+1;
		}
		$query_1 = "UPDATE product SET luot_xem = '$luotXem' WHERE id = '$id'";
		mysqli_query($db, $query_1);
	}
	//Set TT cá nhân
	if(isset($_POST["tt_submit"]))
	{
		$ten = $_POST["tt_ten"];
		$gt =  $_POST["gender"];
		$email = $_POST["tt_email"];
		$sdt = $_POST["tt_sdt"];
		$diaChi = $_POST["tt_diachi"];
		$id = $_POST["tt_id"];
		$name = $_SESSION["username"];

		$seek = "SELECT * FROM user u, thong_tin_user tt WHERE username = '$name' and u.id = tt.id";
		$result = mysqli_query($db, $seek);
				//NEU  DA TON TAI THI UPDATE
		if(mysqli_num_rows($result) >0)
		{
					$query = "UPDATE thong_tin_user 
							SET ten = '$ten', gioi_tinh = '$gt', email = '$email',sdt = '$sdt',dia_chi = '$diaChi'
							WHERE id = '$id'";
	
		}
		//CHUA THI INSERT
		else 
		{
			$query = "INSERT INTO thong_tin_user VALUES('$id','$ten','$sdt','$email','$gt','$diaChi')";
		}
		mysqli_query($db,$query);		
	}
	//THEM NV
	if(isset($_POST["tnv_submit"]))
	{	
		$ten = $_POST["nv_ten"];
		$gt =  $_POST["nv_gender"];
		$email = $_POST["nv_email"];
		$sdt = $_POST["nv_sdt"];
		$diaChi = $_POST["nv_diachi"];
		//GENERATE NAME
		$query_2 = "SELECT * FROM user WHERE username like 'employ%' ORDER BY username ASC ";
		$result = mysqli_query($db,$query_2);
		$num = 1;
		while($row1 = mysqli_fetch_array($result))
		{
			$name = substr($row1['username'],-2);
			if($num == $name)
			{
				$num++;
			}
		}
		if($num<10)
		{
			$nv_name = 'employ0'.$num;
		}
		else
		{
			$nv_name = 'employ'.$num;
		}
		//GENERATE ID
		$query_3 = "SELECT * FROM user";
		$result = mysqli_query($db,$query_3);
		$id = 0;
		while($row = mysqli_fetch_array($result))
		{
			if($id == $row["id"])
			{
				$id++;
			}
			else{break;}
		}

		//ADD user	
		$query_1 = "INSERT INTO user VALUES('$id','A','$nv_name','123123','$email')";
		//ADD INFO
		$query = "INSERT INTO thong_tin_user VALUES('$id','$ten','$sdt','$email','$gt','$diaChi')";

		mysqli_query($db,$query_1);	
		mysqli_query($db,$query);	
		echo "<script>alert('Thêm thành công '+'".$nv_name."');</script>";
	}
	// CHECK OUT - HOA DON
	if(isset($_POST["c_submit_a"]))
	{
		$id_u = $_POST["txtID"];
		$query_check = "SELECT DISTINCT tt.ten
		FROM user u,thong_tin_user tt
		WHERE u.id = tt.id and u.id = '$id_u'";
		$result_check = mysqli_query($db,$query_check);
		if(mysqli_num_rows($result_check)>0)
		{
			if(empty($_SESSION["cart"]))
			{
				echo "<script>alert('Không có sản phẩm nào trong giỏ hàng')</script>;";
				echo '<script>window.location="index.php"</script>';
			}
			else
			{
				$query = "SELECT MAX(id) + 1 as id from hoa_don";
				$result = mysqli_query($db,$query);
				$row = mysqli_fetch_array($result);
				$id_hoadon = $row["id"];
				$tong_tien = 0;
				//TẠO HOÁ ĐƠN
				$query_hdi = "INSERT INTO hoa_don(id) VALUES($id_hoadon)";
				mysqli_query($db,$query_hdi);
				//NHẬP CHI TIẾT HĐ
				foreach ($_SESSION["cart"] as $key => $item_list)
				{
					//VALUES				
					$id_sp = $item_list["id"];
					$so_luong = $item_list["quantity"];
					$don_gia = $item_list["price"];
					//TỔNG TIỀN = SỐ LƯỢNG X ĐƠN GIÁ
					$tien = $don_gia * $so_luong;
					$tong_tien += $tien;
					//QUERY
					$query_ct = "INSERT INTO ct_hoadon VALUES($id_hoadon,'$id_sp',$tien,$so_luong,$don_gia)";
					mysqli_query($db,$query_ct);
					
					//CẬP NHẬT LẠI SLT TRONG DATABASE
					$q = "SELECT * FROM product WHERE id = '$id_sp'";
					$res = mysqli_query($db,$q);
					$r = mysqli_fetch_array($res);
					$sl = $r["sl_ton"];
					$slt = $sl - $so_luong;
					$q1 = "UPDATE product SET sl_ton = '$slt' WHERE id = '$id_sp'";
					mysqli_query($db,$q1);
				}
				
				// XUẤT HOÁ ĐƠN	
				//VALUES
				$ngay_xuat = date('Y-m-d');
				
				$username = $_SESSION["username"];
				$query_1 = "SELECT * FROM user WHERE username = '$username'";
				$result_1 = mysqli_query($db, $query_1);
				$row_1 = mysqli_fetch_array($result_1);
				$id_user = $row_1["id"];
				
				//QUERY		 
				$query_hd = "UPDATE hoa_don 
						SET ngay_xuat = '$ngay_xuat', tong_tien = $tong_tien, id_user = $id_user
						WHERE id = $id_hoadon";
				mysqli_query($db,$query_hd);
				
				unset($_SESSION["cart"]);
				echo "<script>alert('Đặt hàng thành công')</script>;";
				echo '<script>window.location="index.php"</script>';
			}
		}
		else
		{
			echo "<script>alert('Bạn phải điền thông tin giao hàng');</script>";
		}
		
	}
	if(isset($_POST["c_submit_b"]))
	{
		$name = $_SESSION["username"];
		$findUser = "SELECT * FROM user WHERE username = '$name'";
		$result = mysqli_query($db, $findUser);
		if(mysqli_num_rows($result) >0)
		{
			$row = mysqli_fetch_array($result);
			$id = $row["id"];
		}
		$ten = $_POST["txtFullname"];
		$email = $_POST["txtEmail"];
		$sdt = $_POST["txtPhone"];
		$diaChi = $_POST["txtAddress"];
		if($ten == "" or $diaChi == "" or $sdt == "" or $email == "")
		{
			echo "<script>alert('Hãy nhập đầy đủ thông tin giao hàng.');</script>";
		}
		else
		{
			$query = "INSERT INTO thong_tin_user(id,ten,sdt,email,dia_chi) VALUES('$id','$ten','$sdt','$email','$diaChi')";
			mysqli_query($db,$query);	
		}
	}
	//UPDATE
	if(isset ($_POST["prd_submit"]))
	{
		$ar = array();
		foreach($_POST["Quantity"] as $quan)
		{	
			array_push($ar,$quan);
		}
		foreach ($_SESSION["cart"] as $key => $value) 
		{
			$_SESSION["cart"][$key]["quantity"] = $ar[$key];
		}
	}
	//REPASS
	if(isset($_POST["repass_submit"]))
	{
		$user =	$_SESSION["username"];
		$pass1 = $_POST["pass_1"];
		$pass2 = $_POST["pass_2"];
		$repass2 = $_POST["repass_2"];
		$query= "SELECT * FROM user WHERE username = '$user'";
		$result = mysqli_query($db,$query);
		$row = mysqli_fetch_array($result);

		if($row["password"] == $pass1)
		{
			if($pass2 == $repass2)
			{
				$query= "UPDATE user SET password = '$pass2' WHERE username = '$user'";
				mysqli_query($db,$query);
				unset($errors);
				echo "<script>alert('Thành công');</script>";
				echo "<script>location.replace('index.php?a=thong_tin_CN.php');</script>";				
			}
			else
			{
				array_push($errors,"Hai mật khẩu không khớp");
			}
		}
		else
		{
			array_push($errors,"Mật khẩu không chính xác");
		}
	}
	//LOG OUT
	if(isset($_GET['logout']))
	{
		session_destroy();
		unset($_SESSION['username']);
		header('location: index.php?a=login.php');
	}
?>