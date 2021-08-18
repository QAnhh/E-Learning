<?php
	//kiểm tra edit
	if(isset($_GET['edit'])){
		//lấy dữ liệu (nếu có)
		$sql = "select * from files
				where id = '".$_GET['edit']."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$profile=$stmt->fetch(PDO::FETCH_ASSOC);

		include_once 'editDB/files_editDP.php';
		include_once 'editDB/files_editDB.php';

		if(isset($error))
        {
            foreach($error as $err)
            {
                ?> 
              	<div class="container body">
                  	<div class="main_container">
                      	<div class="right_col" role="main">
                        	<div class="alert alert-danger">
                            <i class="fa fa-warning"></i> &nbsp; <?php echo $err; ?>
                        	</div>
                      	</div>
                  	</div>
              	</div>
	          	<?php
            }
        }	
	}
	//kiểm tra delete
	else if(isset($_GET['del'])){
		$sql = "DELETE from files
				where id = '".$_GET['del']."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		setcookie("success","xóa thành công",time()+1,"/","");
		header("location:manageDatabase.php?page=files");
	}
	//kiểm tra insert
	else if(isset($_GET['insert'])){

		include_once 'insertDB/files_insertDP.php';
		include_once 'insertDB/files_insertDB.php';
		if(isset($error))
        {
            foreach($error as $err)
            {
                ?>              	
              	<div class="right_col" role="main">
                	<div class="alert alert-danger">
                    <i class="fa fa-warning"></i> &nbsp; <?php echo $err; ?>
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
							<th>file name</th>
							<th>file url</th>
							<th>size</th>
							<th>type</th>
							<th>upload time</th>
                        </tr>
                      </thead>

                      <tbody>
                        
<?php
	$sql = "select * from files";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo '<tr><td>'.$row['id'].'</td>';
		echo '<td>'.$row['file_name'].'</td>';
		echo '<td>'.$row['file_url'].'</td>';
		echo '<td>'.$row['size'].'</td>';
		echo '<td>'.$row['type'].'</td>';
		echo '<td>'.$row['upload_time'].'</td>';
?>
		<td>
			<a href="manageDatabase.php?page=files&&edit=<?php echo $row['id'];?>" class=" btn-outline-dark ">Sửa</a>
			<a href="manageDatabase.php?page=files&&del=<?php echo $row['id'];?>" class=" btn-outline-dark ">Xóa</a>
		</td>
		</tr>
<?php
	}
?>

                      </tbody>
					</table>
					<a href="manageDatabase.php?page=files&&insert" class="btn btn-outline-dark" >Thêm</a>
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