<link rel="stylesheet" href="css/hienthi_sp.css">
<script type="text/javascript" src="js/checkbox.js"></script>
<?php
include('../include/connect.php');

$select = "select * from sanpham order by idsp DESC";
$query = mysqli_query($link, $select);
$dem = mysqli_num_rows($query);
?>
<div class="quanlysp">
	<h3>THỐNG KÊ SẢN PHẨM</h3>
</div>
<table>

	<tr class='tieude_hienthi_sp'>
		<td>STT</td>
		<td>IDSP</td>
		<td>Tên SP</td>
		<td>Số lượng</td>
		<td>Đã bán</td>
		<td>Còn lại</td>
		<td>Giá</td>
	</tr>
	<?php
	$stt=0;
	if ($dem > 0) {
		while ($bien = mysqli_fetch_array($query)) {
			$conlai = $bien['soluong'] - $bien['daban'];
			$stt+=1;
	?>
			<tr class='noidung_hienthi_sp'>
				<td class="masp_hienthi_sp" style="color:red; font-weight:bold;"><?php echo $stt?></td>
				<td class="stt_hienthi_sp"><?php echo $bien['idsp'] ?></td>
				<td class="stt_hienthi_sp"><?php echo $bien['tensp'] ?></td>
				<td class="stt_hienthi_sp" style=" font-weight:bold;"><?php echo $bien['soluong'] ?></td>
				<td class="sl_hienthi_sp" ><?php echo $bien['daban'] ?></td>
				<td class="sl_hienthi_sp" style="color:red; font-weight:bold;"><?php echo $conlai ?></td>
				<td class="sl_hienthi_sp"><?php echo number_format($bien['gia'], 0, ",", ".") ?></td>
			</tr>
	<?php
		}
	} else echo "<tr><td colspan='7'>Không có sản phẩm trong CSDL</td></tr>";

	?>
</table>
<style>
	tr:nth-child(even) {
  background-color: pink;
}
</style>