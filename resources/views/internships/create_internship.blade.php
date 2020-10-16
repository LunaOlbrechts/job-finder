<?php


//Check if values have been sent
if (!empty($_POST['internship'])) {

    //Put $_POST variables into variables
    //Convert the email string to lowercase, case sensitivity does not matter here
    $company_id = "1";
    $bio = "some bio";
    $type = $_POST['type'];
    $expectations = $_POST['expectations'];
    $offers = $_POST['offers'];
    $location = $_POST['location'];

    $db_host = 'localhost';
    $db_username = 'homestead';
    $db_password = 'secret';
    $db_name = 'homestead';
    mysqli_connect( $db_host, $db_username, $db_password);

    $sql = "INSERT INTO internships (company_id, bio, 'type', expectations, offers, 'location') VALUES ($company_id, $bio,  $type, $expectations, $offers, $location  )";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    }
    
    $conn->close();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Internships</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
</head>

<body>


	<div class="d-flex justify-content-center">
		<div class="jumbotron" style="width:600px">
			<form class="registerForm" action="" method="post">
				<h2>Create internship</h2>
				<div class="form-group">
					<label for="fullname">Type of internship</label>
					<input type="text" name="type" id="type" class="form-control" placeholder="Type of internship" required>
					<i class="fas fa-user"></i>
				</div>
				<div class="form-group">
					<label for="expectations">What do you expect from the internship</label>
					<input type="expectations" name="expectations" class="form-control expectations" placeholder="The expectations of the internship" required>
					<span id="availability"></span>
					<i class="fas fa-envelope"></i>
				</div>
				<div class="form-group">
					<label for="offers">What do you offer</label>
					<input type="offers" name="offers" id="offers" class="form-control" placeholder="Your offers" required>
					<i class="fas fa-lock"></i>
                </div>


				<div class="form-group">
					<input type="submit" class="internship" value="submit" name="internship">
				</div>
				<div id="result"> </div>

			</form>
		</div>
		</div>
    </div>
</body>
</html>
