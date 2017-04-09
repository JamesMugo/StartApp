<!-- right side bar column-->
<div class="col-md-2" id="rightSidebar">
	<!-- searh-->
	<h4>Filter by: </h4>
	<form class="form-horizontal" role="form" name="searchForm" onsubmit="return validateSearchForm()" action="">

		<div class="form-group">
			<label class="col-lg-3 control-label">Name:</label>
			<div class="col-lg-10">
				<input class="form-control" placeholder="StartupName" type="text" name="name">
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-3 control-label">Nationality: </label>
			<div class="col-lg-10">
				<input class="form-control" placeholder="Choose Country" type="text" name="nationality">
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-3 control-label">Interest:</label>
			<div class="col-lg-10">
				<input class="form-control" placeholder="Choose interest" type="text" name="interest">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label"></label>
			<span style="color: red;" id="searhSpan"></span>
			<div class="col-md-10">
				<input class="btn btn-primary" value="Search" type="submit">
			</div>
		</div>

	</form>
</div>