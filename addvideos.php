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
			<?PHP
		include( "database.php" );
		if ( isset( $_POST[ 'submit' ] ) ) {
			$title = $_POST[ 'videotitle' ];
			$v_url = $_POST[ 'VideoURL' ];
			$v_info = $_POST[ 'Videoinfo' ];
			

			$done = "
					<center>
					<div class='alert alert-success fade in __web-inspector-hide-shortcut__'' style='margin-top:10px;'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
					<strong><h3 style='margin-top: 10px;
					margin-bottom: 10px;'> Video added Sucessfully.</h3>
					</strong>
					</div>
					</center>
					";

			$sql = "INSERT INTO `Video` (`V_Title`, `V_Url`, `V_Remarks`) VALUES ('$title','$v_url','$v_info')";
			//close the connection
			mysqli_query( $connect, $sql );

			echo $done;
		}

		?>
		
			<fieldset>
				<legend>Add Videos</legend>
				<form action="" method="POST" name="AddAssessment">
					<table class="table table-hover">

						<tr>
							<td><strong>Video Title  </strong>
							</td>
							<td>
								<input type="text" name="videotitle">
							</td>

						</tr>
						<tr>
							<td><strong>Video URL</strong> </td>
							<td>
								<textarea name="VideoURL" rows="1" cols="150"></textarea>
							</td>
						</tr>
						<tr>
							<td><strong>Video Description</strong> </td>
							<td>
								<textarea name="Videoinfo" rows="5" cols="150"></textarea>
							</td>
						</tr>
						
						<td><button type="submit" name="submit" class="btn btn-primary">Add Video</button>
						</td>
						
					</table>
				</form>
			</fieldset>
		</div>
	</div>
	<?php include('allfoot.php');  ?>