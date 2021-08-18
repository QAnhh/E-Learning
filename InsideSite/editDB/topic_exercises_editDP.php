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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">name </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="name" class="form-control" value="<?php echo $profile['name'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">description </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="description" class="form-control" value="<?php echo $profile['description'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">limit student </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="limitStudent" class="form-control" value="<?php echo $profile['limit_student'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">file id </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="fileID" class="form-control" value="<?php echo $profile['file_id'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">batch exercise id </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="batchExerciseID" class="form-control" value="<?php echo $profile['batch_exercise_id'] ?>">
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="manageDatabase.php?page=topic_exercises" class="btn btn-primary ">Back</a>
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