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
			//selecting data form Video details table form database
			$sql = "SELECT * FROM video WHERE V_id=$make";
			$rs = mysqli_query( $connect, $sql );
			while ( $row = mysqli_fetch_array( $rs ) ) {
				?>
			<fieldset>
				<legend><a href="managevideos.php" >Update Videos</a></legend>
				<form action="" method="POST" name="UpdateVideo">
					<table class="table table-hover">

						<tr>
							<td><strong>Video ID</strong>
							</td>
							<td>
								<?php $V_id=$row['V_id']; echo $V_id; ?>
							</td>

						</tr>
						<tr>
						<td><strong>Video Title</strong>
							</td>
							<td>
							<textarea name="V_Title" rows="1" cols="50"><?php $V_Title=$row['V_Title']; echo $V_Title; ?></textarea>
							</td>
							
						</tr>	
						<tr>
							<td><strong>Video URL</strong>
							</td>
							<td>
							<textarea name="V_Url" rows="5" cols="150"><?php $V_Url=$row['V_Url']; echo $V_Url; ?></textarea>
							</td>
						</tr>
						<tr>
							<td><strong>Video Description</strong>
							</td>
							<td>
							<textarea name="V_Remarks" rows="5" cols="150"><?php $V_Remarks=$row['V_Remarks']; echo $V_Remarks; ?></textarea>
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
							
							$V_Title= $_POST['V_Title'];
							$V_Url= $_POST['V_Url'];
							$V_Remarks= $_POST['V_Remarks'];
							
							$sql = "UPDATE `video` SET V_Title='$V_Title' , V_Url='$V_Url' , V_Remarks='$V_Remarks' WHERE V_id=$make";

							if (mysqli_query($connect, $sql)) {
								echo "
								<br><br>
								<div class='alert alert-success fade in'>
								<a href='manageassessment.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<strong>Success!</strong> Videos Updated.
								</div>
								";
								} else {
								//error message if SQL query fails
								echo "<br><Strong>Video Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error($connect);

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