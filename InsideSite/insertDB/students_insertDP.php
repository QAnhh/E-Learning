<div class="container body">
	<div class="main_container">
		<!-- page content -->
		<div class="right_col" role="main">
			<div class="">
				<div class="x_panel">
						<div class="x_title">
							<h2>Registration Form <small>Click to validate</small></h2>
						</div>
					<div class="x_content">
									<!-- start form for validation -->
						<form id="demo-form" data-parsley-validate class="form-horizontal form-label-left" action="#" method="post">
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">User Name </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="userName" required="required" class="form-control" />
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Full Name </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="fullName" required="required" class="form-control " />
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="password" name="password" required="required" class="form-control " />
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Confirm password </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="password" name="password2" required="required" class="form-control " />
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">Gender </label>
								<div class="col-form-label col-md-6 col-sm-6">
									<p>
									Male:
									<input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required />
									&nbsp;&nbsp;&nbsp;&nbsp;
									Female: 
									<input type="radio" class="flat" name="gender" id="genderF" value="F" />
									</p>
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="email" required="required" class="form-control " />
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Phone number </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="phoneNumber" required="required" class="form-control " />
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="address" required="required" class="form-control " />
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<a href="manageDatabase.php?page=students" class="btn btn-primary ">Back</a>
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