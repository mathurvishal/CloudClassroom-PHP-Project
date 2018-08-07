	<?php
session_start();

if ( $_SESSION[ "sidx" ] == "" || $_SESSION[ "sidx" ] == NULL ) {
	header( 'Location:studentlogin' );
}

$userid = $_SESSION[ "sidx" ];
$userfname = $_SESSION[ "fname" ];
$userlname = $_SESSION[ "lname" ];
?>

<?php include('studenthead.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
				<h3> Welcome <a href="welcomestudent.php" <?php echo "<span style='color:red'>".				$userfname." ".$userlname."</span>";?> </a></h3>
				
			<?php 
				
				include('database.php');
				$video_id= $_GET['viewid'];
				$sql="SELECT * FROM video WHERE V_id=$video_id";
				$rs=mysqli_query($connect,$sql);?>			
				<?php
				while($row=mysqli_fetch_array($rs))
					{
					?>
						<tr>
							<td>
								<h2>Title: <?PHP echo $row['V_Title'];?></h2>
							</td>
							<br>
							
							<td>
								<?PHP echo $row['V_Url'];?>
							</td>
							<br>
							<td>
								<p> Video Description <?PHP echo $row['V_Remarks'];?> </p>
							</td>
							<br>
							<td><a href="viewvideos.php"> <input type=	"button" Value="Back"  class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal"></a>
							</td>
						</tr>
					<?php
					}
					?>
			
		</div>
	</div>
	<?php include('allfoot.php');  ?>