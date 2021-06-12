<?php 
  session_start();
  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
  } else {
    header('location:index.php');
  }
?>


<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="wrapper">
		<div class="content">
			<div class="images">
				<div class="container">
					<div class="images__row">
						<div class="images__body">
							<div class="images__title">
								<form action="server.php" method="post" enctype="multipart/form-data">
									<div class="images__title">Ավելացնել նկար!</div>
									<input type="file" name="image" id="">
									<button name="addimage">Ավելացնել</button>
								</form>
							</div>
						</div>
						<div class="image__img">
							
							<img src="" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>