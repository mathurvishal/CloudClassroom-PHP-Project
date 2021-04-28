<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Payment</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
		<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.css">
		<style>
			label{
				font-weight: bold;
			}
		</style>
	</head>
	<body class="bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-md-12 p-5 display-4 text-capitalize text-center">
					<h3 class="text-white">Payment Gateway Using PHP</h3>
				</div>
			</div>
			<div class="row justify-content-center mt-4">
				<div class="col-md-5">
					<div class="card border-0">
						<div class="card-header bg-white">
							<h4 class="card-title">
								Payment Checkout
							</h4>
						</div>
						<div class="card-body">
							<form action="pay.php" method="post">
								<label for="">Name:</label>
								<div class="form-group">
									<input type="text" name="name" id="name" class="form-control" placeholder="Enter the name..." required>
								</div>
								<label for="">Email:</label>
								<div class="form-group">
									<input type="email" name="email" id="email" class="form-control" placeholder="Enter the email..." required>
								</div>
								<label for="">Phone No:</label>
								<div class="form-group">
									<input type="text" name="phone" id="phone" class="form-control" placeholder="Enter the phone..." required>
								</div>
								<label for="">Amount:(Rs.99)</label>
								<div class="form-group">
									<input type="text" name="amt" id="amt" class="form-control" placeholder="Enter the Amount..." required>
								</div>
								<div class="form-group">
									<button type="submit" name="payment" class="btn btn-dark btn-block font-weight-bold" onclick="validate()">Proccess</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
