<?php
 	 include('../unsecure/unsecureProcessing.php');
 	 require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/MeetYourInvestor/controller/searchController1.php');
 ?>
<!-- right side bar column-->
<div class="col-md-2" id="rightSidebar">
	<!-- searh-->
	<h4>Filter by: </h4>
	<form class="form-horizontal" role="form" name="searchForm" onsubmit="return validateSearchForm()" action="" 
	method="post">

		<div class="form-group">
			<label class="col-lg-3 control-label">Name:</label>
			<div class="col-lg-10">
				<input class="form-control" placeholder="name" type="text" name="name"
				style="border-color: <?php echo $nameColor;?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-3 control-label">Nationality: </label>
			<div class="col-lg-10">
				<input class="form-control" placeholder="Choose Country" type="text" name="nationality"
				 style="border-color: <?php echo $nationalityColor;?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-3 control-label">Interest:</label>
			<div class="col-lg-10">
				<input class="form-control" placeholder="Choose interest" type="text" name="interest"
				style="border-color: <?php echo $interestColor;?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label"></label>
			<span style="color: red;" id="searhSpan"><?php echo $errorMessage;?></span>
			<div class="col-md-10">
				<button type="submit" class="btn btn-primary" name="searchButton" 
				style="width:100%; margin-top:-1%;">Search</button>
			</div>
		</div>

	</form>
</div>
