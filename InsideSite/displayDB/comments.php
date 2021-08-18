<?php
	//kiểm tra edit
	if(isset($_GET['edit'])){
		//lấy dữ liệu (nếu có)
		$sql = "select * from comments
				where id = '".$_GET['edit']."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$profile=$stmt->fetch(PDO::FETCH_ASSOC);
		include_once 'editDB/comments_editDP.php';
		include_once 'editDB/comments_editDB.php';
		
		
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
		$sql = "DELETE from comments
				where id = '".$_GET['del']."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		setcookie("success","xóa thành công",time()+1,"/","");
		header("location:manageDatabase.php?page=comments");
	}
	//kiểm tra insert
	else if(isset($_GET['insert'])){
		include_once 'insertDB/comments_insertDP.php';
		include_once 'insertDB/comments_insertDB.php';

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
							<th>content</th>
							<th>student code</th>
							<th>status</th>
							<th>post id</th>
							<th>created at</th>
							<th>updated at</th>
							<th>deleted at</th>
							<th>created by</th>
							<th>updated by</th>
							<th>deleted by</th>
                        </tr>
                      </thead>

                      <tbody>
                        
<?php
	$sql = "select * from comments";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo '<tr><td>'.$row['id'].'</td>';
		echo '<td>'.$row['user_id'].'</td>';
		echo '<td>'.$row['content'].'</td>';
		echo '<td>'.$row['student_code'].'</td>';
		echo '<td>'.$row['status'].'</td>';
		echo '<td>'.$row['post_id'].'</td>';
		echo '<td>'.$row['created_at'].'</td>';
		echo '<td>'.$row['updated_at'].'</td>';
		echo '<td>'.$row['deleted_at'].'</td>';
		echo '<td>'.$row['created_by'].'</td>';
		echo '<td>'.$row['updated_by'].'</td>';
		echo '<td>'.$row['deleted_by'].'</td>';
?>
		<td>
			<a href="manageDatabase.php?page=comments&&edit=<?php echo $row['id'];?>" class=" btn-outline-dark ">Sửa</a>
			<a href="manageDatabase.php?page=comments&&del=<?php echo $row['id'];?>" class=" btn-outline-dark ">Xóa</a>
		</td>
		</tr>
<?php
	}
?>

                      </tbody>
					</table>
					<a href="manageDatabase.php?page=comments&&insert" class="btn btn-outline-dark" >Thêm</a>
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