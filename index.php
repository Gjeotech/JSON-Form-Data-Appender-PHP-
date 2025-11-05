<?php
$measage = "";
$error = "";

if(isset($_POST["submit"])){
	
	if(empty($_POST["name"]))
	{
		$error = "<label clas='text-danger'>Enter Name</label>";
	}
	
	else if(empty($_POST["gender"]))
	{
		
		$error = "<label clas='text-danger'>Enter Gender</label>";
	}
	else if(empty($_POST["designation"]))
	{
		
		$error = "<label clas='text-danger'>Enter Designation</label>";
	}
	else
	{
		if(file_exists('aployee_data.json'))
		{
			$current_data = file_get_contents('aployee_data.json');
			$array_data = json_decode($current_data, true);
			$extrat = array(
				'name' =>   $_POST["name"],
				'gender' =>  $_POST["gender"],
				'designation' =>  $_POST["designation"]
			
			);
			$array_data [] = $extrat;
			$final_data = json_encode($array_data);
			if(file_put_contents('aployee_data.json',$final_data))
			{
				$measage = "<label class='text-success'>Append Successfully</label>";
			}
			
		}else{
			$error = "JSON File not Exist";
		}
	}
	
}

?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewpoint" content="width-device-width, inital-scale=1">

<title>INSERT DATA INTO DB USING  PDO</title>
   <!-- Bootstrap CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript" src="asset/js/lib/jquery.js"></script>

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 mt-5">
				<div class="card">
					<div class="caed-header align-center">
						<h3>WRITE/APPEND DATA TO A JSON FILE USING PHP 
							<!--<a href="index.php" class="btn btn-warning float-end">Back</a></h3>-->
					</div>
					<div class="card-body">
					
					<h5 class="alert text-danger alert-light">
										
					<?php
					
					if(isset($error))
					{
						echo $error;
					}						
					
					
					?>
					
					
					</h5>
			
						<form action="#" method="post">
						<div class="mb-3">
							<label>Full name</label>
							<input type="text" name="name" class="form-control" >
						</div>

						<div class="mb-3">
							<label>Gender</label>
							<input type="text" name="gender" class="form-control" >
						</div>

						<div class="mb-3">
							<label>Designation</label>
							<input type="text" name="designation" class="form-control" >
						</div>

						<div class="mb-3">
							<button type="submit" name="submit" class="btn btn-success">Append</button>
						</div>
						
						
						<?php
					
							if(isset($measage))
							{
								echo $measage;
							}						
							
							
						?>
						</form>
					
					</div>
			</div>
							
			</div>
		</div>
	</div>


</body>
</html>