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


		<?php
		include( "database.php" );
		if ( isset( $_REQUEST[ 'deleteid' ] ) ) {

			//getting data from another page
			$deleteid = $_GET[ 'deleteid' ];
			$sql = "DELETE FROM `exam` WHERE ExId = $deleteid";
			if ( mysqli_query( $connect, $sql ) ) {
				echo "
						<br><br>
						<div class='alert alert-success fade in'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Success!</strong> Exam details deleted.
						</div>
						";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Exam Details Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
		}
		//close the connection
		mysqli_close( $connect );
		?>
	</div>
	<div class="row">
		<div class="col-md-8">
			<h3> Welcome Faculty : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>

			<?php 
				
				include('database.php');
				$sql="SELECT * FROM examans";
				$rs=mysqli_query($connect,$sql);
				echo "<h2 class='page-header'>Assessment Details</h2>";
				echo "<table class='table table-striped' style='width:100%'>
				<tr>
					<th>Exam ID</th>
					<th>Enrolment Number</th>
					<th>Ans1</th>
					<th>Ans2</th>
					<th>Ans3</th>
					<th>Ans4</th>
					<th>Ans5</th>
					<th>Delete</th>		
					<th>Make Result</th>		
				</tr>";
				while($row=mysqli_fetch_array($rs))
				{
				?>
			<tr>
				<td>
					<?PHP echo $row['ExamID'];?>
				</td>
				<td>
					<?PHP echo $row['Senrl'];?>
				</td>
				<td>
					<?PHP echo $row['Ans1'];?>
				</td>
				<td>
					<?PHP echo $row['Ans2'];?>
				</td>
				<td>
					<?PHP echo $row['Ans3'];?>
				</td>
				<td>
					<?PHP echo $row['Ans4'];?>
				</td>
				<td>
					<?PHP echo $row['Ans5'];?>
				</td>
				<td><a href="examDetails.php?deleteid=<?php echo $row['ExamID']; ?>"> <input type="button" Value="Delete"  class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal"></a>
				</td>
				<td><a href="makeresult.php?makeid=<?php echo $row['ExamID']; ?>"> <input type="button" Value="Make"  class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal"></a>
				</td>
			</tr>
			<?php
			}
			?>	
			</table>
			
		</div>
	</div>
	<?php include('allfoot.php');  ?>