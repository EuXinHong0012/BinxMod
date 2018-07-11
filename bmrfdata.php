<!DOCTYPE html>
<?php
//create database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bmrf";

//connect
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

//insert data (After POST from form)
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

	//delete
	if(isset($_GET['id'])){
	
	$deleteid=$_GET['id'];
	$sql="delete from formlist where username='$deleteid'";
	$result=$conn->query($sql);
	
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
	if(isset($_POST['edit'])){


	  	$username=$_POST['username']; 
		$realname=$_POST['realname']; 
		$gender=$_POST['gender']; 
		$age=$_POST['age'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		$discord=$_POST['discord'];
		$social_id=$_POST['social_id'];
		

  $sql="UPDATE formlist SET realname='$realname' ,gender='$gender' ,age='$age', email='$email' ,message='$message' ,discord='$discord', social_id='$social_id' WHERE username='$username'"; 

  $result = $conn->query($sql);
}


//out
$sql = "SELECT a.username,a.realname, a.gender, a.age, a.email, a.message, a.discord, b.socialname FROM formlist AS a LEFT JOIN socialmedia as b ON a.social_id=b.social_id";

$result = $conn->query($sql);

print '<h3>Request List</h3>';

print '<table border="1">';
print '<th>Binx User</th><th>Real Name</th><th>Gender</th><th>Age</th><th>Email</th><th>Message</th><th>Discord</th><th colspan="2">Social active</th>';

//ERROR
if ($result->num_rows > 0) {
	
    while($row = $result->fetch_assoc()) {
		print '<tr>';
        print '<td>'. $row["username"]. '</td><td>'. $row["realname"]. '</td><td>' . $row["gender"] .'</td><td>'.$row["age"].'</td><td>'.$row["email"].'</td><td>'.$row["message"].'</td><td>'.$row["discord"].'</td><td>'.$row["socialname"]."</td><td><a href='bmrfdata.php?id=".$row["username"]."'>Delete</a></td><td><a href='bmrfform.php?edit=".$row["username"]."'>Edit</a></td>";
		print '</tr>';
	}
	print '</table>';
} else {
    echo "0 results";
}
$conn->close();
?> 


<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>