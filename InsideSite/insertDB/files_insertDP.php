<div class="container body">
	<div class="main_container">
		<!-- page content -->
		<div class="right_col" role="main">
			<div class="">
				<div class="x_panel">
					<div class="x_content">
									<!-- start form for validation -->
						<form id="demo-form" data-parsley-validate class="form-horizontal form-label-left" action="upload.php" method="post" enctype="multipart/form-data">
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Upload</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="file" name="uploaded_file" class="form-control" />
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<a href="manageDatabase.php?page=files" class="btn btn-primary ">Back</a>
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