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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">number topic </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="numberTopic" class="form-control" value="<?php echo $profile['number_topic'] ?>">
											</div>
										</div>
										<!-- <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Start Date </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="date" name="startDate" class="form-control" value="<?php echo $profile['start_date'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Deadline </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="date" name="deadline" class="form-control" value="<?php echo $profile['deadline'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="address" class="col-form-label col-md-3 col-sm-3 label-align">End Date</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="date" name="endDate" class="form-control" value="<?php echo $profile['end_date'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">methods submit </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="methodsSubmit" class="form-control" value="<?php echo $profile['methods_submit'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">methods mark </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="methodsMark" class="form-control" value="<?php echo $profile['methods_mark'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">status </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="status" class="form-control" value="<?php echo $profile['status'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">limit size</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="limitSize" class="form-control" value="<?php echo $profile['limit_size'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">is notification mark </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="isNotificationMark" class="form-control" value="<?php echo $profile['is_notification_mark'] ?>">
											</div>
										</div> -->
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">classroom id </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="classroomID" class="form-control" value="<?php echo $profile['classroom_id'] ?>">
											</div>
										</div>
										<!-- <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">type </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="type" class="form-control" value="<?php echo $profile['type'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">content </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="content" class="form-control" value="<?php echo $profile['content'] ?>">
											</div>
										</div> -->
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">file id </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="fileID" class="form-control" value="<?php echo $profile['file_id'] ?>">
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="manageDatabase.php?page=batch_exercises" class="btn btn-primary ">Back</a>
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