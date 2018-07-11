<!DOCTYPE html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bmrf";

$conn = new mysqli($servername, $username, $password, $dbname);

//insert
if(isset($_POST['submit'])){
		$username=$_POST['username']; 
		$realname=$_POST['realname']; 
		$gender=$_POST['gender']; 
		$age=$_POST['age'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		$discord=$_POST['discord'];
		$social_id=$_POST['social_id'];

		$sql= "INSERT INTO formlist VALUES('$username','$realname','$gender','$age','$email','$message','$discord','$social_id')";
		$result = $conn->query($sql);
}

	$username="";
	$realname="";
	$gender="";
	$age="";
	$email="";
	$message="";
	$discord="";
	$social_id="";


	//edit
	if(isset($_GET['edit'])){
		$username=$_GET['edit'];


	$sql="SELECT a.username, a.realname, a.gender, a.age, a.email, a.message, a.discord, b.social_name, FROM formlist AS a LEFT JOIN socialmedia as b ON a.social_id=b.social_id WHERE username='$username'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    
		while($row = $result->fetch_assoc()) {

			$username=$row["username"];
			$realname=$row['realname'];
			$gender=$row['gender'];
			$age=$row['age'];
			$email=$row['email'];
			$message=$row['message'];
			$discord=$row['discord'];
			$social_id=$row['social_name'];
			
    
		}
	}
}


?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Binx Moderator Recruitment Form</title>
	<style type="text/css">
		

	</style>
</head>
<body class="container">
	<header>
		<h1>.</h1>
	</header>
	<div>
	<form name="form" method="POST" action="bmrfdata.php" class="form">
		<input name="username" type="text" placeholder="username" value="<?php echo $username; ?>"><br>
		<input name="realname" type="text" placeholder="realname" value="<?php echo $realname; ?>"><br>
		<select name="gender" id="gender">
					<option value="M">Male</option>
					<option value="F">Female</option>
					<option value="L">Lesbian</option>
					<option value="G">Ghey</option>
					<option value="B">Bisexual</option>
					<option value="T">Transgender</option>
		</select>
		<br>
		<select name="age" id="age">
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
					<option value="32">32</option>
					<option value="33">33</option>
					<option value="34">34</option>
					<option value="35">35</option>
					<option value="36">36</option>
		</select>
		<input name="email" type="email" placeholder="email" value="<?php echo $email; ?>"><br>
		<input name="message" type="text" placeholder="message" value="<?php echo $message; ?>"><br>
		<input name="discord" type="text" placeholder="discord" value="<?php echo $discord; ?>"><br>
		<select name="social_id" id="social_id">
					<option value="1">Youtube</option>
					<option value="2">Twitch</option>
					<option value="3">Mixer</option>
					
		</select>

		<input name="submit" type="submit" value="Submit"/>
		<input name="edit" type="submit" value="Edit"/>
	</form>
</div>
<footer>
	
</footer>
</body>
</html>