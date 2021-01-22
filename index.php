<?php

	
	$page_title = "Home";
	require_once("header.php");
	require_once("navigation.php");
	
?>

	<article>
		<form action = "calculator.php" method = "GET">
			<fieldset id = "department-fieldset">
				<label for = "department">Department:</label>
				<select name = "department" id = "department">
					<option value="computer_science">Computer Science</option>
					<option value="mathematics">Mathematics</option>
					<option value="chemistry">Chemistry</option>
					<option value="industrial_chemistry">Industrial Chemistry</option>
					<option value="environmental_management_and_toxicology">Environmental Management and Toxicology</option>
					<option value="geology">Geology</option>
					<option value="geophysics">Geophysics</option>
					<option value="electrical_and_electronics_engineering">Electrical and Electronics Engineering</option>
					<option value="chemical_engineering">Chemical Engineering</option>
					<option value="marine_engineering">Marine Engineering</option>
					<option value="mechanical_engineering">Mechanical Engineering</option>
					<option value="petroleum_engineering">Petroleum Engineering</option>
				</select>
			</fieldset>

			<div id = "semesters-fieldsets-container">
				<fieldset class = "threes">
					<legend>100 Level</legend>
					<input type = "checkbox" name = "11" value = "100 1st" checked = "checked"><label>1st Semester</label><br>
					<input type = "checkbox" name = "12" value = "100 2nd"><label>2nd Semester</label>
				</fieldset>

				<fieldset class = "threes">
					<legend>200 Level</legend>
					<input type = "checkbox" name = "21" value = "200 1st"><label>1st Semester</label><br>
					<input type = "checkbox" name = "22" value = "200 2nd"><label>2nd Semester</label>
				</fieldset>

				<fieldset class = "threes">
					<legend>300 Level</legend>
					<input type = "checkbox" name = "31" value = "300 1st"><label>1st Semester</label><br>
					<input type = "checkbox" name = "32" value = "300 2nd"><label>2nd Semester</label>
				</fieldset>

				<fieldset class = "threes">
					<legend>400 Level</legend>
					<input type = "checkbox" name = "41" value = "400 1st"><label>1st Semester</label><br>
					<input type = "checkbox" name = "42" value = "400 2nd"><label>2nd Semester</label>
				</fieldset>

				<fieldset class = "threes">
					<legend>500 Level</legend>
					<input type = "checkbox" name = "51" value = "500 1st"><label>1st Semester</label><br>
					<input type = "checkbox" name = "52" value = "500 2nd"><label>2nd Semester</label>
				</fieldset>
			</div>

			<button type = "submit" name = "submit">
				Proceed
			</button>
		</form>
	</article>

<?php  
	require_once("footer.php");
?>