<?php
	//kiểm tra edit
	if(isset($_GET['edit'])){
		//lấy dữ liệu (nếu có)
		$sql = "select * from student_register_topics
				where id = '".$_GET['edit']."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$profile=$stmt->fetch(PDO::FETCH_ASSOC);

		include_once 'editDB/student_register_topics_editDP.php';
		include_once 'editDB/student_register_topics_editDB.php';
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
		$sql = "DELETE from student_register_topics
				where id = '".$_GET['del']."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		setcookie("success","xóa thành công",time()+1,"/","");
		header("location:manageDatabase.php?page=student_register_topics");
	}
	//kiểm tra insert
	else if(isset($_GET['insert'])){
 		include_once 'insertDB/student_register_topics_insertDP.php';
		include_once 'insertDB/student_register_topics_insertDB.php';
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
							<th>topic exercises id</th>
							<th>student code</th>
							<th>enroll time</th>
							<th>batch exercises id</th>
                        </tr>
                      </thead>

                      <tbody>
                        
<?php
	$sql = "select * from student_register_topics";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo '<tr><td>'.$row['id'].'</td>';
		echo '<td>'.$row['topic_exercises_id'].'</td>';
		echo '<td>'.$row['student_code'].'</td>';
		echo '<td>'.$row['enroll_time'].'</td>';
		echo '<td>'.$row['batch_exercises_id'].'</td>';
?>
		<td>
			<a href="manageDatabase.php?page=student_register_topics&&edit=<?php echo $row['id'];?>" class=" btn-outline-dark ">Sửa</a>
			<a href="manageDatabase.php?page=student_register_topics&&del=<?php echo $row['id'];?>" class=" btn-outline-dark ">Xóa</a>
		</td>
		</tr>
<?php
	}
?>

                      </tbody>
					</table>
					<a href="manageDatabase.php?page=student_register_topics&&insert" class="btn btn-outline-dark" >Thêm</a>
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