<div class="container body">
	<div class="main_container">
		<!-- page content -->
		<div class="right_col" role="main">
			<div class="">
				<div class="x_panel">
					<div class="x_content">
									<!-- start form for validation -->
						<form id="demo-form" data-parsley-validate class="form-horizontal form-label-left" action="#" method="post">
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">unit name </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="unitName" class="form-control">
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">status </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="status" class="form-control">
								</div>
							</div> 
							<!-- <div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">learn time </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="datetime-local" name="learnTime" class="form-control">
								</div>
							</div> -->
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">Learn Time </label>
								<div class="col-form-label col-md-6 col-sm-6">
									<select name="selectTime">
										<option value="c1">Ca 01</option>
										<option value="c2">Ca 02</option>
										<option value="c3">Ca 03</option>
										<option value="c4">Ca 04</option>
										<option value="c5">Ca 05</option>
									</select>
									<select name="selectDay">
										<option value="Monday">Mon</option>
										<option value="Tuesday">Tue</option>
										<option value="Wednesday">Wed</option>
										<option value="Thursday">Thu</option>
										<option value="Friday">Fri</option>
										<option value="Saturday">Sat</option>
										<option value="Sunday">Sun</option>
									</select>
								</div>
							</div>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">classroom id </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="classroomId" class="form-control">
								</div>
							</div>					
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<a href="manageDatabase.php?page=classroom_units" class="btn btn-primary ">Back</a>
									<button type="submit" name="btn-signup" class="btn btn-success pull-right">Submit</button>
								</div>
							</div>
						</form>
							<!-- end form for validations -->
					</div>
				</div>
			</div>				
		</div>
	</div>
</div>