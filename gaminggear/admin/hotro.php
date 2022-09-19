<link rel="stylesheet" href="css/hienthi_sp.css">
<script type="text/javascript" src="js/checkbox.js"></script>
<?php
include('../include/connect.php');

$select = "select * from hotro where trangthai=0 ";
$query = mysqli_query($link, $select);
$dem = mysqli_num_rows($query);
?>
<div class="quanlysp">
	<h3>QUẢN LÝ HỖ TRỢ</h3>
	<div id="check" style = "position:relative; left:-570px; top:50px;">
	<p>
	<a href='admin.php?admin=htdadoc'><input style="width:200px; margin-left:5px;" type="submit" name="giaohang" value="YÊU CẦU ĐÃ XỬ LÝ" /></a>
	</p>
</div>
	<p>Có tổng <font color=red><b><?php echo $dem ?></b></font> tin</p>
	<form action="admin.php?admin=xulyht" method="post">
		<div id="check">
			<p>
				<input type="submit" name="giaohang" value="Đã xử lý" />
				<input type="submit" name="xoa" value="Xóa" />

			</p>
		</div>
</div>
<table>

	<tr class='tieude_hienthi_sp'>

		<td width="30"><input type="checkbox" name="check" class="checkbox" onclick="checkall('item', this)"></td>
		<td>ID</td>
		<td>Chủ đề</td>
		<td>Nội dung</td>
		<td>Tên</td>
		<td>Email và SDT</td>
		<td>Trạng thái</td>
	</tr>

	<?php

	/*------------Phan trang------------- */
	// Nếu đã có sẵn số thứ tự của trang thì giữ nguyên (ở đây tôi dùng biến $page) 
	// nếu chưa có, đặt mặc định là 1!   

	if (!isset($_GET['page'])) {
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	// Chọn số kết quả trả về trong mỗi trang mặc định là 10 
	$max_results = 10;

	// Tính số thứ tự giá trị trả về của đầu trang hiện tại 
	$from = (($page * $max_results) - $max_results);

	// Chạy 1 MySQL query để hiện thị kết quả trên trang hiện tại  

	$sql = mysqli_query($link, "SELECT * FROM hotro LIMIT $from, $max_results");




	if ($dem > 0)
		while ($bien = mysqli_fetch_array($sql)) {
	?>
		<tr class='noidung_hienthi_sp'>
			<td class="masp_hienthi_sp"><input type="checkbox" name="id[]" class="item" class="checkbox" value="<?= $bien['idht'] ?>" /></td>
			<td class="masp_hienthi_sp"><?php echo $bien['idht'] ?></td>
			<td class="stt_hienthi_sp"><?php echo $bien['chude'] ?></td>
			<td class="img_hienthi_sp"> <?php echo $bien['noidung'] ?> </td>
			<td class="sl_hienthi_sp"><?php echo $bien['hoten'] ?></td>
			<td class="sl_hienthi_sp"><?php echo"".$bien['email']." <br> 0".$bien['dienthoai']."" ?></td>
			<td class="sl_hienthi_sp"><?php if ($bien['trangthai'] == 0) echo "Chưa xử lý";
										else  echo "Đã xử lý"; ?></td>
		</tr>
	<?php
		}

	else echo "<tr><td colspan='7'>Không có đơn gửi hỗ trợ nào</td></tr>";

	?>
</table>
</form>
<div id="phantrang_sp">

	<?php
	// Tính tổng kết quả trong toàn DB:  
	$total_results = mysqli_result(mysqli_query($link, "SELECT COUNT(*) as Num FROM hotro"), 0);
	function mysqli_result($res, $row, $field = 0)
	{
		$res->data_seek($row);
		$datarow = $res->fetch_array();
		return $datarow[$field];
	}

	// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
	$total_pages = ceil($total_results / $max_results);


	// Tạo liên kết đến trang trước trang đang xem 
	if ($page > 1) {
		$prev = ($page - 1);
		echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?admin=hienthiht&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";
	}

	for ($i = 1; $i <= $total_pages; $i++) {
		if (($page) == $i) {
			echo "$i&nbsp;";
		} else {
			echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?admin=hienthiht&page=$i\"><button class='so'>$i</button></a>&nbsp;";
		}
	}

	// Tạo liên kết đến trang tiếp theo  
	if ($page < $total_pages) {
		$next = ($page + 1);
		echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?admin=hienthiht&page=$next\"><button class='trang'>Trang sau</button></a>";
	}
	echo "</center>";

	?>
</div>
<script language="JavaScript">
	function checkdel(idht) {
		var idht = idht;
		if (confirm("Bạn có chắc chắn muốn xóa tin này?") == true)
			window.open(link, "_self", 1);
	}
</script>