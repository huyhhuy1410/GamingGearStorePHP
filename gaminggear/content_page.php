	<?php
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	} else $action = "";
	if (isset($_GET['content'])) {
		switch ($_GET['content']) {
			case "gioithieu":
				include('gioithieu.php');
				break;
			case "timkiem":
				include('timkiem.php');
				break;
			case "dangky":
				include('dangky.php');
				break;
			case "dangnhap":
				include('dangnhap.php');
				break;
			case "chitietsp":
				include('chitietsp.php');
				break;
			case "cart":
				include('cart/index.php');
				break;
			case "hotro":
				include('hotro.php');
				break;
			case "sanpham":
				include('sanpham.php');
				break;
			case "phukien":
				include('phukien.php');
				break;
			case "tintuc":
				include('tintuc.php');
				break;
			case "chitiettintuc":
				include('chitiettintuc.php');
				break;
			case "hethang":
				include('hethang.php');
				break;
		}
	} else if (isset($_GET['madm'])) {
		$sql = "SELECT * FROM sanpham  WHERE madm='{$_GET['madm']}'";
		if (isset($GET['madm'])) {
			$sql .= "where madm='" . $_GET['madm'] . "'";
		}
		/*------------Phan trang------------- */
		// Nếu đã có sẵn số thứ tự của trang thì giữ nguyên (ở đây tôi dùng biến $page) 
		// nếu chưa có, đặt mặc định là 1!   

		if (!isset($_GET['page'])) {
			$page = 1;
		} else {
			$page = $_GET['page'];
		}

		// Chọn số kết quả trả về trong mỗi trang mặc định là 10 
		$max_results = 12;

		// Tính số thứ tự giá trị trả về của đầu trang hiện tại 
		$from = (($page * $max_results) - $max_results);

		// Chạy 1 mysqli query để hiện thị kết quả trên trang hiện tại  

		$sql .=  "LIMIT $from, $max_results";


		$query = mysqli_query($link, $sql);
		$total = mysqli_num_rows($query);
		if ($total > 0) {
	?>

			<div class="sanpham">
				<?php
				$sql1 = "select tendm from danhmuc where madm='{$_GET['madm']}'";
				$query1 = mysqli_query($link, $sql1);
				$row = mysqli_fetch_array($query1);
				?>
				<h2><?php echo $row['tendm'] ?></h2>
				<div class="sanphamcon">

					<?php
					while ($result = mysqli_fetch_array($query)) { ?>

						<div class="thietbi">
							<a href="index.php?content=chitietsp&idsp=<?php echo $result['idsp'] ?>"><img src="img/uploads/<?php echo $result['hinhanh']; ?>"></a>
							<p><a href="index.php?content=chitietsp&idsp=<?php echo $result['idsp'] ?>"><?php echo $result['tensp']; ?></a></p>
							<h4><?php echo number_format(($result['gia']), 0, ",", "."); ?></h4>
							<div class="button">
								<ul>
									<li>
										<h1><a href="index.php?content=chitietsp&idsp=<?php echo $result['idsp'] ?>" class="chitiet"><button>Chi tiết</button></a></h1>
									</li>
									<li>
									<?php $dem = $result['soluong'] - $result['daban'];
							if ($dem > 0) echo"
							<h5><a href='index.php?content=cart&action=add&idsp=" . $result['idsp'] . "'><button>Cho vào giỏ</button></a></h5>";
							else echo "
							<h5><a style='pointer-events: none;' href='index.php?content=cart&action=add&idsp=" . $result['idsp'] . "'><button style='pointer-events: none;' disabled>Cho vào giỏ</button></a></h5>";
										?>
									</li>
								</ul>
							</div><!-- End .button-->
						</div><!-- End .thietbi-->
					<?php } ?>

				</div><!-- End .sanphamcon-->

			</div><!-- End .sanpham-->
			<div class="phantrang">
				<?php

				// Tính tổng kết quả trong toàn DB:  
				function mysqli_result($res, $row, $field = 0)
				{
					$res->data_seek($row);
					$datarow = $res->fetch_array();
					return $datarow[$field];
				}
				$total_results = mysqli_result(mysqli_query($link, "SELECT COUNT(*) as Num FROM sanpham where madm='{$_GET['madm']}'"), 0);


				// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
				$total_pages = ceil($total_results / $max_results);


				// Tạo liên kết đến trang trước trang đang xem 
				if ($page > 1) {
					$prev = ($page - 1);
					echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?madm=" . $_GET['madm'] . "&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";
				}

				for ($i = 1; $i <= $total_pages; $i++) {
					if (($page) == $i) {

						echo "$i&nbsp;";
					} else {
						echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?madm=" . $_GET['madm'] . "&page=$i\"><button class='so'>$i</button></a>&nbsp;";
					}
				}

				// Tạo liên kết đến trang tiếp theo  
				if ($page < $total_pages) {
					$next = ($page + 1);
					echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?madm=" . $_GET['madm'] . "&page=$next\"><button class='trang'>Trang sau</button></a>";
				}
				echo "</center>";
				?>
			</div> <?php
				} else {
					echo "Không có sản phẩm nào";
				}
			} else {

					?>
					<br>
		<div class="sanpham">
			<h2>SẢN PHẨM BÁN CHẠY</h2>
			<div class="sanphamcon">
				<?php
				$sql1 = "select * from sanpham inner join danhmuc on sanpham.madm = danhmuc.madm order by daban  DESC limit 6 ";
				$result1 = mysqli_query($link, $sql1);
				?>
				<?php
				while ($row = mysqli_fetch_array($result1)) { ?>

					<div class="thietbi">
						<h1><a href="index.php?content=chitietsp&idsp=<?php echo $row['idsp'] ?>"><img src="img/uploads/<?php echo $row['hinhanh']; ?>"></a></h1>
						<p><a href="index.php?content=chitietsp&idsp=<?php echo $row['idsp'] ?>"><?php echo $row['tensp']; ?></a></p>
						<h4>Giá: <?php echo number_format(($row['gia']), 0, ",", "."); ?></h4>
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
										?>
								</li>
							</ul>
						</div><!-- End .button-->
					</div><!-- End .thietbi-->
				<?php } ?>

			</div><!-- End .sanphamcon-->

		</div><!-- End .sanpham-->

		<!------------------------------------------------------------------------------------------------------------------->
		<div class="sanpham">
			<h2>SẢM PHẨM MỚI</h2>
			<div class="sanphamcon">
				<?php
				$sql1 = "select * from sanpham inner join danhmuc on sanpham.madm = danhmuc.madm order by idsp  DESC limit 6 ";
				$result1 = mysqli_query($link, $sql1);
				?>
				<?php
				while ($row = mysqli_fetch_array($result1)) { ?>

					<div class="thietbi">
						<h1><a href="index.php?content=chitietsp&idsp=<?php echo $row['idsp'] ?>"><img src="img/uploads/<?php echo $row['hinhanh']; ?>"></a></h1>
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
										?>
								</li>
							</ul>
						</div><!-- End .button-->
					</div><!-- End .thietbi-->
				<?php } ?>

			</div><!-- End .sanphamcon-->

		</div><!-- End .sanpham-->
	<?php } ?>