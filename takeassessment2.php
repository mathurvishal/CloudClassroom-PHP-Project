<?php
session_start();

if ( $_SESSION[ "sidx" ] == "" || $_SESSION[ "sidx" ] == NULL ) {
	header( 'Location:studentlogin' );
}
$userid = $_SESSION[ "sidx" ];
$userfname = $_SESSION[ "fname" ];
$userlname = $_SESSION[ "lname" ];
$sEno = $_SESSION[ "seno" ];
?>
<?php include('studenthead.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<h3> Welcome <a href="welcomestudent"><?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?></a></h3>
			<?php
			$exid = $_GET[ 'exid' ];
			include( 'database.php' );
			$sql = "select * from  studenttable where Eno='$sEno'";
			$sql2 = "select * from  examdetails where ExamID='$exid'";
			
			$result = mysqli_query( $connect, $sql );
			$result2 = mysqli_query( $connect, $sql2 );

			while ( $row = mysqli_fetch_array( $result ) ) {
				?>
			<!--exam question with student detalis-->
			<fieldset>
				<legend>Assessment Details</legend>
				<form action="" method="POST" name="update">
					<div class="col-md-4">
						<table>
							<tr>
								<td><strong>Enrolment number :</strong>
								</td>
								<td>
									<?php $eno=$row['Eno'];
						echo $eno; ?>
								</td>
							</tr>
							<tr>
								<td><strong>Name :</strong>
								</td>
								<td>
									<?php $name=$row['FName']." ".$row['LName'];
									echo $name; ?>
								</td>
							</tr>
						</table>
					</div>

					<div class="col-md-4">
						<table>
							<tr>
								<td><strong>Course :</strong>
								</td>
								<td>
									<?PHP $cc=$row['Course']; echo $cc; ?>
								</td>
							</tr>
							<tr>
								<td><strong>Applied For :</strong>
								</td>
								<td>
									<?PHP echo $exid; ?><br>
								</td>
							</tr>
						</table>
					</div>
					<br>
					<br>
					<hr>
					<?php while ( $row = mysqli_fetch_array( $result2 ) ) {
				?>
					<div class="col-md-12">
						<span style="color: red;"><h3>Answer The Following Questions..</h3></span>

						<br>
						<div>
							<h4> <strong>Q1. <?php $Q_1=$row['Q1']; echo $Q_1; ?></strong></h4>
							<div><textarea name="Q1" rows="5" cols="150" required ></textarea></div>
						</div>
						<br>
						<div>
							<h4> <strong>Q2. <?php $Q_2=$row['Q2']; echo $Q_2; ?></strong></h4>
							<div><textarea name="Q2" rows="5" cols="150" required ></textarea></div>
						</div>
						<br>
						<div>
							<h4> <strong>Q3. <?php $Q_3=$row['Q3']; echo $Q_3; ?></strong></h4>
							<div><textarea name="Q3" rows="5" cols="150" required ></textarea></div>
						</div>
						<br>
						<div>
							<h4> <strong>Q4. <?php $Q_4=$row['Q4']; echo $Q_4; ?></strong></h4>
							<div><textarea name="Q4" rows="5" cols="150" required ></textarea></div>
						</div>
						<br>
						<div>
							<h4> <strong>Q5. <?php $Q_5=$row['Q5']; echo $Q_5; ?></strong></h4>
							<div><textarea name="Q5" rows="5" cols="150" required ></textarea></div>
						</div>
						<br>
						
						<?php 
					}
					?>
							
						<br><br>
						<button type="submit" name="done" class="btn btn-primary">I am Done!</button>
					</div>
					
				</form>
			</fieldset>
			<?php
			}
			if ( isset( $_POST[ 'done' ] ) ) {
				$Ex_id = $exid;
				$sEno = $sEno;
				$tempsname = $name;
				$tempq1 = $_POST[ 'Q1' ];
				$tempq2 = $_POST[ 'Q2' ];
				$tempq3 = $_POST[ 'Q3' ];
				$tempq4 = $_POST[ 'Q4' ];
				$tempq5 = $_POST[ 'Q5' ];
				$sql = "INSERT INTO `examans`(ExamID, Senrl, Sname, Ans1, Ans2, Ans3, 	Ans4, Ans5) VALUES ($Ex_id,'$sEno','$tempsname','$tempq1','$tempq2','$tempq3','$tempq4','$tempq5')";
				if ( mysqli_query( $connect, $sql ) ) {
					echo "<br>
					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Assessment Have Submited.
					</div>";
				} else {
					//error message if SQL query fails
					echo "<br><Strong>Assessment Submitting Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
				} //close the connection
				mysqli_close( $connect );
			}
			?>
		</div>
	</div>
	<?php include('allfoot.php'); ?>