<?php
session_start();
if (isset($_SESSION['username'])) {


    if ($_SESSION['phanquyen'] == 1) {
        header("location:../index.php");
    }
    if ($_SESSION['phanquyen'] == 0) {
        header("location:admin.php");
    }
}
?>
<link rel="stylesheet" href="css/login.css" type="text/css">
<div class="body" style="background:url(../img/theme.jpg);">
    <div class="tieude1">
        <div class="quantri" style="background:rgba(0,0,0,0.22);">
            <h2>Đăng nhập quản trị</h2>
        </div>
    </div>
    <?php
    include("../include/connect.php");

    if (isset($_POST['login'])) {
        $username = $_POST['user'];
        $password = MD5($_POST['pass']);
        $sql_check = mysqli_query($link, "select * from nguoidung where username = '$username'");
        $dem = mysqli_num_rows($sql_check);
        if ($dem == 0) {
            echo "<p class='thongbao1'>Tài khoản không tồn tại</p>";
        } else {
            $sql_check2 = mysqli_query($link, "select * from nguoidung where username = '$username' and password = '$password'");
            $dem2 = mysqli_num_rows($sql_check2);
            if ($dem2 == 0)
                echo "<p class='thongbao1'>Mật khẩu không chính xác</p>";
            else {

                $row = mysqli_fetch_array($sql_check2);

                $_SESSION['username'] = $username;
                $_SESSION['phanquyen'] = $row['phanquyen'];
                $_SESSION['idnd'] = $row['idnd'];

                if ($_SESSION['phanquyen'] == 0) {

                    echo "
							<script language='javascript'>
								alert('Đăng nhập quản trị thành công');
								window.open('admin.php','_self', 1);
							</script>
						";
                } else {

                    header('location:../index.php');
                }
            }
        }
    }
    ?>
    <div class="admin_login" style="background:rgba(0,0,0,0.22);">
        <form action="" method="post">
            <label>Tên tài khoản:</label><input style="font-family: 'Roboto', sans-serif;
  outline: 0;
  background: #f2f2f2;" type="text" name="user" placeholder=" Username"><br>
            <br>
            <label>Mật khẩu:</label><input style="font-family: 'Roboto', sans-serif;
  outline: 0;
  background: #f2f2f2;" type="password" name="pass" placeholder=" Password"><br>
            <button name="login" class="dangnhap" style="background-color: #ea4c88;
  color: white;">Đăng nhập</button><button class="thoat" style="background-color: #ea4c88;"><a href="../index.php" style="color: white;">Thoát</a></button>
        </form>
    </div>
</div>