<div class="container body">
	<div class="main_container">			
			<!-- page content -->
		<div class="right_col" role="main">
			<div class="">
				<div class="row">
					<div class="col-md-12 col-sm-12 ">
						<div class="x_panel">
							<div class="x_title">
								<h2>Edit</h2>
								</div>
									<div class="x_content">
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="#" method="post">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="className">Class Name </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="className" class="form-control" value="<?php echo $profile['class_name'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="numberStudent">Number Student </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="numberStudent" class="form-control" value="<?php echo $profile['number_student'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="numberWeek">Number Week </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="numberWeek" class="form-control" value="<?php echo $profile['number_week'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Start Date </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="date" name="startDate" class="form-control" value="<?php echo $profile['start_date'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="address" class="col-form-label col-md-3 col-sm-3 label-align">End Date</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="date" name="endDate" class="form-control" value="<?php echo $profile['end_date'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="address" class="col-form-label col-md-3 col-sm-3 label-align">User ID</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="userId" class="form-control" value="<?php echo $profile['user_id'] ?>">
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="manageDatabase.php?page=class_rooms" class="btn btn-primary ">Back</a>
												<button type="submit" name="saveProfile" class="btn btn-success pull-right">Submit</button>
											</div>
										</div>
									</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>