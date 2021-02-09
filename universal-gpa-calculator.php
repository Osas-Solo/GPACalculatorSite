<?php

	$page_title = "Universal GPA Calculator";
	require_once("header.php");
	require_once("navigation.php");
	
?>

	<article>
		<form action = "universal-gpa-calculator-calculator.php" method = "GET">
			<fieldset id = "school-fieldset">
				<label for = "institution">Institution:</label>

				<select name = "institution" id = "institution" onchange = "showLevels()">
					<option value = ""></option>
					<option value = "University">University</option>
					<option value = "Polytechnic">Polytechnic</option>
					<option value = "College of Education">College of Education</option>
				</select>
			</fieldset>

			<div id = "semesters-fieldsets-container">
				<fieldset class = "levels">
					<legend class = "level-names">100 Level</legend>
					<input type = "checkbox" name = "11" value = "100 1st" checked = "checked"><label>1st Semester</label><br>
					<input type = "checkbox" name = "12" value = "100 2nd"><label>2nd Semester</label>
				</fieldset>

				<fieldset class = "levels">
					<legend class = "level-names">200 Level</legend>
					<input type = "checkbox" name = "21" value = "200 1st"><label>1st Semester</label><br>
					<input type = "checkbox" name = "22" value = "200 2nd"><label>2nd Semester</label>
				</fieldset>

				<fieldset class = "levels">
					<legend class = "level-names">300 Level</legend>
					<input type = "checkbox" name = "31" value = "300 1st"><label>1st Semester</label><br>
					<input type = "checkbox" name = "32" value = "300 2nd"><label>2nd Semester</label>
				</fieldset>

				<fieldset class = "levels">
					<legend class = "level-names">400 Level</legend>
					<input type = "checkbox" name = "41" value = "400 1st"><label>1st Semester</label><br>
					<input type = "checkbox" name = "42" value = "400 2nd"><label>2nd Semester</label>
				</fieldset>

				<fieldset class = "levels">
					<legend class = "level-names">500 Level</legend>
					<input type = "checkbox" name = "51" value = "500 1st"><label>1st Semester</label><br>
					<input type = "checkbox" name = "52" value = "500 2nd"><label>2nd Semester</label>
				</fieldset>

				<fieldset class = "levels">
					<legend class = "level-names">600 Level</legend>
					<input type = "checkbox" name = "61" value = "600 1st"><label>1st Semester</label><br>
					<input type = "checkbox" name = "62" value = "600 2nd"><label>2nd Semester</label>
				</fieldset>
			</div>

			<script src = "js/select_institution.js"></script>

			<button type = "submit" name = "submit">
				Proceed
			</button>
		</form>
	</article>

<?php  
	require_once("footer.php");
?>