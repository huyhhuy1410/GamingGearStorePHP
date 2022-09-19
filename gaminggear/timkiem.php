<?php
if (isset($_GET['timkiem'])) {
	$tim = $_GET['timkiem'];
	switch ($_GET['gia']) {
		case "1":
			$sql = "select * FROM sanpham WHERE tensp like '%" . $tim . "%' and (gia between '0' and '1000000')";
			break;
		case "2":
			$sql = "select * FROM sanpham WHERE tensp like '%" . $tim . "%'  and (gia between '1000000' and '3000000')";
			break;
		case "3":
			$sql = "select * FROM sanpham WHERE tensp like '%" . $tim . "%'  and (gia between '3000000' and '5000000')";
			break;
		case "4":
			$sql = "select * FROM sanpham WHERE tensp like '%" . $tim . "%'  and (gia between '5000000' and '8000000')";
			break;
		case "5":
			$sql = "select * FROM sanpham WHERE tensp like '%" . $tim . "%'  and (gia between '8000000' and '10000000')";
			break;
		case "6":
			$sql = "select * FROM sanpham WHERE tensp like '%" . $tim . "%'  and (gia >= '10000000')";
			break;
		default:
			$sql = "select * FROM sanpham WHERE tensp like '%" . $tim . "%' ";
			break;
	}


	$rows = mysqli_query($link, $sql);
	$tong = mysqli_num_rows($rows);
	if ($tong < 0)
		echo "Không tìm được sản phẩm nào";
	else {
?>
		<div class="sanpham">
			<h2>Từ khóa <font color="yellow"><b><?php echo $tim ?></b></font> : có <?php echo $tong ?> kết quả </h2>
			<div class="sanphamcon">
				<?php

				while ($row = mysqli_fetch_array($rows)) {
				?>

					<div class="thietbi">
						<a href="index.php?content=chitietsp&idsp=<?php echo $row['idsp'] ?>"><img src="img/uploads/<?php echo $row['hinhanh']; ?>"></a>
						<p><a href="index.php?content=chitietsp&idsp=<?php echo $row['idsp'] ?>"><?php echo $row['tensp']; ?></a></p>
						<h4><?php echo number_format(($row['gia']), 0, ",", "."); ?></h4>
						<div class="button">
							<ul>
								<li>
									<h1><a href="index.php?content=chitietsp&idsp=<?php echo $row['idsp'] ?>" class="chitiet"><button>Chi tiết</button></a></h1>
								</li>
								<li>
								<?php $dem = $row['soluong'] - $row['daban'];
							if ($dem > 0) echo"
							<h5><a href='index.php?content=cart&action=add&idsp=" . $row['idsp'] . "'><button>Cho vào giỏ</button></a></h5>";
							else echo "
							<h5><a style='pointer-events: none;' href='index.php?content=cart&action=add&idsp=" . $row['idsp'] . "'><button style='pointer-events: none;' disabled>Cho vào giỏ</button></a></h5>";
										?>								</li>
							</ul>
						</div><!-- End .button-->
					</div><!-- End .thietbi-->
				<?php } ?>
			</div><!-- End .sanphamcon-->
		</div><!-- End .sanpham-->

<?php
	}
}
?>