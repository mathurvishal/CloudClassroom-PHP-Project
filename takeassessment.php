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
			<h3> Welcome <a href="welcomestudent.php" <?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?> </a></h3>
			<?php 

				include('database.php');
				
				//below query will print the existing record of Assessment
				$sql="SELECT * FROM examdetails";
				$rs=mysqli_query($connect,$sql);
				echo "<h2 class='page-header'>Take Assessment</h2>";
				echo "<table class='table table-striped' style='width:100%'>
				<tr>
				<th>Exam ID</th>
				<th>Exam Name</th>
				<th>Take</th>					
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
					<a href="takeassessment2.php?exid=<?php echo $row['ExamID']; ?>"> <button type="submit" class="btn btn-primary">Take</button></a>
				</td>
			</tr>
			<?php
			}
			?>
			</table>
			
		</div>
	</div>
	<?php include('allfoot.php'); ?>