
 <div id="danhmucsp">
					<div class="center">
					<h4>MÁY CHƠI GAME</h4>
					<?php 
					   $sql="select * from danhmuc where dequi=26";
					   $result=mysqli_query($link,$sql);
					?>
						<ul>
						<?php 
						   while($row=mysqli_fetch_array($result))
						   {
						?>
							<li><a href="index.php?madm=<?php echo $row['madm'] ?>"><?php echo $row["tendm"];?></a></li>
							<?php } ?>
						</ul>
					</div><!-- End .center -->
				</div>	<!-- End .menu-left -->
				
				<div id="phukien">
					<div class="center">
						<h4> GAMING GEAR</h4>
						<?php 
					   $sql="select * from danhmuc where dequi=25";
					   $result=mysqli_query($link,$sql);
					?>
						<ul>
						<?php 
						   while($row=mysqli_fetch_array($result))
						   {
						?>
							<li><a href="index.php?madm=<?php echo $row['madm'] ?>"><?php echo $row["tendm"];?></a></li>
							<?php } ?>
						</ul>
					</div><!-- End .center -->
				</div><!-- End .phukien -->	
				
				<div id="quangcao1">
					<div class="center">
						<a href="https://www.youtube.com/watch?v=0tUqIHwHDEc" target="_blank"> <img src="img/quangcao.png" alt="quangcao" title="quangcao" style="width:188px;height:296px"> </a>
					
						<a href="https://www.youtube.com/watch?v=cxXvYJyBlc4" target="_blank"> <img src="img/quangcao2.png" alt="quangcao2" title="quangcao2" style="width:188px;height:296px"> </a>
					</div><!-- End .center -->
				</div><!-- End .quangcao1 -->