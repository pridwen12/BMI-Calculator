<html>

<?php
$page_title = 'BMI Calculator';
include ('includes/header.html');
session_start();
?>

<body>
<form action="" method="post">
<p></p>

	<fieldset>	
	<h3>Let's calculate our BMI!:</h3>
	<p><b>Height(m):</b> <input type="text" name="height" size="20" maxlength="40" /></p>
	<p><b>Weight(kg):</b> <input type="text" name="weight" size="20" maxlength="40" /></p>
	</fieldset>
	
	<p><div align="left"><input type="submit" name="submit" value="Calculate" /></div>

</form>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	

	// Validate height
	if (!empty($_POST['height'])) {
		$height = $_POST['height'];
	} else {
		$height = NULL;
		echo '<p><b>You forgot to enter your height!</b></p>';
	}

	// Validate weight
	if (!empty($_POST['weight'])) {
		$weight = $_POST['weight'];
	} else {
		$weight = NULL;
		echo '<p><b>You forgot to enter your weight!</b></p>';
	}

	// If everything is okay, print the message.
	if ($height && $weight) {

		// Calculate bmi.
		$bmi = $height * $height; // Calculate height^2
		$bmi = ($weight/$bmi); // Calculate bmi.
		$bmi = number_format ($bmi, 2);


		// Print the results.
		echo "<p> Body Mass Index (BMI) = <i>" . $bmi . '</i>';

		if ($bmi < 18.5){
			echo '<h2><p><b>Underweight</b></p></h2>';
		} else if ($bmi > 18.5 && $bmi < 24.9 ){
			echo '<h2><p><b>Normal</b></p></h2>';
		} else if ($bmi > 25.0 && $bmi < 29.9 ){
			echo '<h2><p><b>Overweight</b></p></h2>';
		} else if ($bmi >= 30.0 ){
			echo '<h2><p><b>Obese</b></p></h2>';
		}

	} else { // One form element was not filled out properly.
		echo '<p><font color="red">Please go back and fill out the form again.</font></p>';
	}


}


?>


</body>


</html>