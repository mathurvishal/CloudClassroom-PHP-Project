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
			include( 'database.php' );
			$make = $_GET[ 'editassid' ];
			//selecting data form assessment details table form database
			$sql = "SELECT * FROM examdetails WHERE ExamID=$make";
			$rs = mysqli_query( $connect, $sql );
			while ( $row = mysqli_fetch_array( $rs ) ) {
				?>
			<fieldset>
				<legend><a href="manageassessment.php" >Edit Assessment</a></legend>
				<form action="" method="POST" name="UpdateAssessment">
					<table class="table table-hover">

						<tr>
							<td><strong>Exam ID</strong>
							</td>
							<td>
								<?php $ExamID=$row['ExamID']; echo $ExamID; ?>
							</td>

						</tr>
						<tr>
						<td><strong>Exam Name</strong>
							</td>
							<td>
							<textarea name="ExamName" rows="1" cols="50"><?php $ExamName=$row['ExamName']; echo $ExamName; ?></textarea>
							</td>
							
						</tr>	
						<tr>
							<td><strong>Q1</strong>
							</td>
							<td>
							<textarea name="Q1" rows="5" cols="150"><?php $Q1=$row['Q1']; echo $Q1; ?></textarea>
							</td>
						</tr>	
							<tr>
							<td><strong>Q2</strong>
							</td>
							<td>
							<textarea name="Q2" rows="5" cols="150"><?php $Q2=$row['Q2']; echo $Q2; ?></textarea>
							</td>
						</tr>	
							<tr>
							<td><strong>Q3</strong>
							</td>
							<td>
							<textarea name="Q3" rows="5" cols="150"><?php $Q3=$row['Q3']; echo $Q3; ?></textarea>
							</td>
						</tr>	
							<tr>
							<td><strong>Q4</strong>
							</td>
							<td>
							<textarea name="Q4" rows="5" cols="150"><?php $Q4=$row['Q4']; echo $Q4; ?></textarea>
							</td>
						</tr>	
							<tr>
							<td><strong>Q5</strong>
							</td>
							<td>
							<textarea name="Q5" rows="5" cols="150"><?php $Q5=$row['Q5']; echo $Q5; ?></textarea>
							</td>
						</tr>	
							
						<td><button type="submit" name="update" class="btn btn-primary">Update</button>
						</td>
						<?php
						}
						?>
						<?php 

							if(isset($_POST['update']))
							{
							
							$E_name= $_POST['ExamName'];
							$Q_1= $_POST['Q1'];
							$Q_2= $_POST['Q2'];
							$Q_3= $_POST['Q3'];
							$Q_4= $_POST['Q4'];
							$Q_5= $_POST['Q5'];

							$sql = "UPDATE `examdetails` SET ExamName='$E_name' , Q1='$Q_1' , Q2='$Q_2' , Q3='$Q_3', Q4='$Q_4', Q5='$Q_5' WHERE ExamID=$make";

							if (mysqli_query($connect, $sql)) {
								echo "
								<br><br>
								<div class='alert alert-success fade in'>
								<a href='manageassessment.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<strong>Success!</strong> Assessment Updated.
								</div>
								";
								} else {
								//error message if SQL query fails
								echo "<br><Strong>Assessment Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error($connect);

								//close the connection
								mysqli_close($connect);
								}
							}
							?> 
					</table>
				</form>
			</fieldset>
		</div>
	</div>
	<?php include('allfoot.php');  ?>