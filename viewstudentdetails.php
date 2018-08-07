<?php
session_start();

if ( $_SESSION[ "fidx" ] == "" || $_SESSION[ "fidx" ] == NULL ) {
	header( 'Location:facultylogin' );
}

$userid = $_SESSION[ "fidx" ];
$fname = $_SESSION[ "fname" ];
?>
<?php include('fhead.php');  ?>
<div class="container">
	<div class="row">
		<div class="col-md-5">

			<h3> Welcome Faculty : <a href="welcomefaculty.php"><span style="color:#FF0004"> <?php echo $fname; ?></span></a></h3>
			<?php
			include( "database.php" );
			$sql = "select * from  studenttable";
			$result = mysqli_query( $connect, $sql );
			echo "<h2 class='page-header'>Student Details</h2>";
			//below will print all student details to admin
			echo "<table class='table table-striped' style='width:100%'>
<tr>
<th>Enrolment Number</th>
<th>First Name</th>
<th>Last Name</th>
<th>Father Name</th>
<th>Address</th>
<th>Gender</th>
<th>Course</th>
<th>DOB</th>
<th>Phone Number</th>
<th>Email</th>
</tr>";
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>

			<tr>
				<td>
					<?PHP echo $row['Eno'];?>
				</td>
				<td>
					<?PHP echo $row['FName'];?>
				</td>
				<td>
					<?PHP echo $row['LName'];?>
				</td>
				<td>
					<?PHP echo $row['FaName'];?>
				</td>
				<td>
					<?PHP echo $row['Addrs'];?>
				</td>
				<td>
					<?PHP echo $row['Gender'];?>
				</td>
				<td>
					<?PHP echo $row['Course'];?>
				</td>
				<td>
					<?PHP echo $row['DOB'];?>
				</td>
				<td>
					<?PHP echo $row['PhNo'];?>
				</td>
				<td>
					<?PHP echo $row['Eid'];?>
				</td>
			</tr>
			<?php } ?>
			</table>
		</div>
	</div>
	<?php include('allfoot.php'); ?>