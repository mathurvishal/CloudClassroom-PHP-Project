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
		<div class="col-md-8">
			<h3> Welcome Faculty : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>
			
			<?php
		include( "database.php" );
		if ( isset( $_REQUEST[ 'deleteid' ] ) ) {

			//getting data from another page
			$deleteid = $_GET[ 'deleteid' ];
			$sql = "DELETE FROM `examdetails` WHERE ExamID = $deleteid";
			if ( mysqli_query( $connect, $sql ) ) {
				echo "
						<br><br>
						<div class='alert alert-success fade in'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Success!</strong> Assessment details deleted.
						</div>
						";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Assessment Details Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
		}
		//close the connection
		mysqli_close( $connect );
		?>
			
			<?php 
				
				include('database.php');
				$sql="SELECT * FROM examdetails";
				$rs=mysqli_query($connect,$sql);
				echo "<h2 class='page-header'>Assessment Details</h2>";
				echo "<table class='table table-striped' style='width:100%'>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Q1</th>
					<th>Q2</th>
					<th>Q3</th>
					<th>Q4</th>
					<th>Q5</th>
					<th>Delete</th>		
					<th>Edit</th>		
				</tr>";
				while($row=mysqli_fetch_array($rs))
				{
				?>
			<tr>
				<td>
					<?PHP echo $row['ExamID'];?>
				</td>
				<td>
					<?PHP echo $row['ExamName'];?>
				</td>
				<td>
					<?PHP echo $row['Q1'];?>
				</td>
				<td>
					<?PHP echo $row['Q2'];?>
				</td>
				<td>
					<?PHP echo $row['Q3'];?>
				</td>
				<td>
					<?PHP echo $row['Q4'];?>
				</td>
				<td>
					<?PHP echo $row['Q5'];?>
				</td>
				
				<td><a href="manageassessment.php?deleteid=<?php echo $row['ExamID']; ?>"> <input type="button" Value="Delete"  class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal"></a>
				<td><a href="manageassessment2.php?editassid=<?php echo $row['ExamID']; ?>"> <input type="button" Value="Edit"  class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal"></a>
				</td>
				</td>
			</tr>
			<?php
			}
			?>	
			</table>
			
		</div>
	</div>
	<?php include('allfoot.php');  ?>