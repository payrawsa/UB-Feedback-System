
<html>
<head>
	
</head>
<body>
 	<?php
 	require_once('sql_connection.php');
 	//getting the values for course_id, ubit name and feedback from student_page.php
 
	
	//$sql = "INSERT INTO Feedback_Table (cid,ubit,feedback) VALUES ('$Course_ID','$UBIT','$Feedback')";
 	//prepare statement to prevent sql injection

 	$stmt = $conn->prepare("INSERT INTO Feedback_Table (cid,ubit,feedback,TA_description) VALUES (?,?,?,?)");
 	$stmt -> bind_param("ssss",$Course_ID,$UBIT,$Feedback,$TA_desc);
 	$Course_ID = $_POST['course_id'];
 	$UBIT = $_POST['TA_ubit'];
 	$Feedback = $_POST['feedback']; 
 	$TA_desc = $_POST['TA_descr']; 

 	$stmt->execute();

//executing the query

if ($stmt->affected_rows === 0) {
    echo "Your feedback has not been recorded. Please submit again.";
} else {
    echo "Your feedback has been submitted successfully. Thank You!";
}
$stmt->close();
$conn->close();

	?>

</body>
</html>