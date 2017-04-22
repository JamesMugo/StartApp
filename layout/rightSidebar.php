<?php
 	 include('../unsecure/unsecureProcessing.php');
 ?>
<!-- right side bar column-->
<div class="col-md-2" id="rightSidebar">
	<!-- searh-->
	<h4>Filter by: </h4>
	<form method="get" action="" class="form-horizontal" role="form" name="searchForm" onsubmit="return validateSearchForm()" action="" 
	>

		<div class="form-group">
			<label class="col-lg-3 control-label">Name:</label>
			<div class="col-lg-10">
				<input class="form-control" onkeyup="searchFunction()" id="name" placeholder="StartupName" type="text" name="name"
				style="border-color: <?php echo $nameColor;?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-3 control-label">Nationality: </label>
			<div class="col-lg-10">
				<input onkeyup="searchFunction()" id="nationality" class="form-control" placeholder="Choose Country" type="text" name="nationality"
				 style="border-color: <?php echo $nationalityColor;?>">
			</div>
		</div>

		<div class="form-group">
			<label onchange="searchFunction()" class="col-lg-3 control-label">Interest:</label>
			<div class="col-lg-10">
				<!-- loads form the database -->
				<select class="form-control" id="interest" name="interest" style="border-color: <?php echo $interestColor;?>">
					<option value='placeholder'>Select interest</option>
					<!-- Load from database -->
					<?php loadallinterest();?>
				</select>

			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label"></label>
			<span style="color: red;" id="searhSpan"><?php echo $errorMessage;?></span>
			<div class="col-md-10">
				<button type="submit" class="btn btn-primary" onclick="searchFunction()" name="searchButton">Search</button>
			</div>
		</div>

	</form>
	<!-- <script src="searchAjax.js"></script> -->
</div>