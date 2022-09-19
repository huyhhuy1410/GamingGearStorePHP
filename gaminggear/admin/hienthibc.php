<link rel="stylesheet" href="css/hienthi_sp.css">
<script type="text/javascript" src="js/checkbox.js"></script>
<?php
include('../include/connect.php');

$select = "select * from chitiethoadon inner join sanpham on chitiethoadon.tensp=sanpham.tensp inner join hoadon on chitiethoadon.mahd=hoadon.mahd";
$query = mysqli_query($link, $select);
$dem = mysqli_num_rows($query);
?>
<div class="quanlysp">
	<h3>THỐNG KÊ HÀNG BÁN</h3>
</div>
<table>

	<tr class='tieude_hienthi_sp'>
        <td>Mã HD</td>
		<td>IDSP</td>
		<td>Tên SP</td>
		<td>Số lượng</td>
		<td>Đã bán</td>
		<td>Giá</td>
		<td>Tổng</td>
		<td>Ngày</td>
	</tr>
    <?php
    $tong = 0;
    if ($dem > 0) {
        while ($bien = mysqli_fetch_array($query)) {
            $thanhtien = $bien['gia'] * $bien['daban'];
            $tong += $thanhtien;
    ?>

            <tr class='noidung_hienthi_sp'>
                <td class="masp_hienthi_sp"><?php echo $bien['mahd'] ?></td>
				<td class="stt_hienthi_sp"><?php echo $bien['idsp'] ?></td>
                <td class="stt_hienthi_sp"><?php echo $bien['tensp'] ?></td>
				<td class="stt_hienthi_sp"><?php echo $bien['soluong'] ?></td>
                <td class="sl_hienthi_sp"><?php echo $bien['daban'] ?></td>
                <td class="sl_hienthi_sp"><?php echo number_format($bien['gia'], 0, ",", ".") ?></td>
                <td class="sl_hienthi_sp"><?php echo number_format($thanhtien, 0, ",", ".") ?></td>
                <td class="sl_hienthi_sp"><?php echo $bien['ngaydathang'] ?></td>

            </tr>
	<?php
		}
	}

	else echo "<tr><td colspan='8'>Không có sản phẩm trong CSDL</td></tr>";

	?>
			<tr>
		<td colspan=8 align="right" style="padding:10px 20px 10px 0px; font-size:20px;">Tổng: <font color="red"><?php echo number_format($tong, 0, ",", ".") ?></font> <font color="black">VND</font>
		</td>
	</tr>
</table>
