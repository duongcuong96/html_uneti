<?php 
	require_once("../inc/lib.php");
	checkLogin();

	
	if( $_SERVER["REQUEST_METHOD"] == "POST" ){
		
		
		

		$title = $_POST["title"];
		$content = $_POST["content"];
		$excerpt = $_POST["excerpt"];
		$cat_id = $_POST["category"];

		$sql = "INSERT INTO posts( title , content , excerpt , user_id , cat_id)
			      VALUES  ( '{$title}' , '{$content}' , '{$excerpt}' , 1, $cat_id ) ";

		$query = mysqli_query( $conn , $sql );

		if( $query ){
			echo " <h1>Cập nhật thành công !</h1>";
		}else{
			echo "<h1>Cập nhật thất bại ! </h1>"  . mysqli_error($conn);
		}




	}
 ?>
 
<?php require_once 'template/head.php'; ?>


	<div id="page-create-post">
		
		<h1>Tạo bài viết </h1>
		<a href="index.php" >Về trang admin</a>
		<form action="" method="post" >
			<label>
				Nhập tên bài viết
				<input type="text" name="title" placeholder="nhập tiêu đề" />
			</label>

			<label>
				Nhập tóm tắt
				<textarea name="excerpt" placeholder="nhập tóm tắt ở đây"></textarea>
			</label>

			<label>
				Nhập nội dung
				<textarea name="content" placeholder="Nhập nội dung "></textarea>
			</label>

			<label>
				<select name="category">
					<option selected> Xin chọn danh mục  </option>
				option
					<?php
						$sql = "SELECT id,title FROM category";
						$rs = mysqli_query($conn, $sql);
						while( $row = mysqli_fetch_array($rs, MYSQLI_ASSOC ) ):?>

				 		<option value="<?php echo $row['id'] ?>"> <?php echo $row["title"];?> </option>}
				 	
				 	<?php endwhile ?>
				</select>
			</label>

			<button type="submit">
				Viết bài mơi !
			</button>

		</form>
	</div>

<?php require_once 'template/footer.php'; ?>