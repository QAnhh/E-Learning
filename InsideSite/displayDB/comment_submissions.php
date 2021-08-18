<?php
	//kiểm tra edit
	if(isset($_GET['edit'])){
		//lấy dữ liệu (nếu có)
		$sql = "select * from comment_submissions
				where id = '".$_GET['edit']."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$profile=$stmt->fetch(PDO::FETCH_ASSOC);
		include_once 'editDB/comment_submissions_editDP.php';
		include_once 'editDB/comment_submissions_editDB.php';
		
		if(isset($error))
        {
            foreach($error as $err)
            {
                ?>
                <div class="right_col" role="main">
                	<div class="alert alert-danger">
                    	<i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $err; ?>
                    </div>
                </div>
                <?php
            }
        }	
	}
	//kiểm tra delete
	else if(isset($_GET['del'])){
		$sql = "DELETE from comment_submissions
				where id = '".$_GET['del']."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		setcookie("success","xóa thành công",time()+1,"/","");
		header("location:manageDatabase.php?page=comment_submissions");
	}
	//kiểm tra insert
	else if(isset($_GET['insert'])){
		include_once 'insertDB/comment_submissions_insertDP.php';
		include_once 'insertDB/comment_submissions_insertDB.php';

		
		if(isset($error))
        {
            foreach($error as $err)
            {
                ?>
                <div class="right_col" role="main">
                	<div class="alert alert-danger">
                    	<i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $err; ?>
                    </div>
                </div>
                <?php
            }
        }
	}
	else{
		if(isset($_COOKIE['success'])){
			echo '<div class="right_col">';
			echo $_COOKIE['success'];
			echo '</div>';
		}
?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          	<th>id</th>
							<th>user id</th>
							<th>student code</th>
							<th>content</th>
							<th>created at</th>
							<th>updated at</th>
							<th>deleted at</th>
							<th>student exercises submissions id</th>
                        </tr>
                      </thead>

                      <tbody>
                        
<?php
	$sql = "select * from comment_submissions";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo '<tr><td>'.$row['id'].'</td>';
		echo '<td>'.$row['user_id'].'</td>';
		echo '<td>'.$row['student_code'].'</td>';
		echo '<td>'.$row['content'].'</td>';
		echo '<td>'.$row['created_at'].'</td>';
		echo '<td>'.$row['updated_at'].'</td>';
		echo '<td>'.$row['deleted_at'].'</td>';
		echo '<td>'.$row['student_exercises_submissions_id'].'</td>';
?>
		<td>
			<a href="manageDatabase.php?page=comment_submissions&&edit=<?php echo $row['id'];?>" class=" btn-outline-dark ">Sửa</a>
			<a href="manageDatabase.php?page=comment_submissions&&del=<?php echo $row['id'];?>" class=" btn-outline-dark ">Xóa</a>
		</td>
		</tr>
<?php
	}
?>

                      </tbody>
					</table>
					<a href="manageDatabase.php?page=comment_submissions&&insert" class="btn btn-outline-dark" >Thêm</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	</div>
  </body>
</html>


<?php
	}
?>