<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale = 1.0,maximum-scale = 1.0,user-scalable = 0">
		<meta name="description" content="FriendLine" />
		<meta name="keywords" content="Social Network, FriendLine" />
		<meta name="robots" content="index, follow" />
		<title>Friendline | Social Network Page</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/ionicons.min.css" />
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700' rel='stylesheet' type='text/css'>
    	<link rel="shortcut icon" type="image/png" href="images/fav2.png"/>
	</head>
	<body>

		<header id="header" class="lazy-load">
	      <nav class="navbar navbar-default navbar-fixed-top menu">
	        <div class="container">

	          <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	              <span class="sr-only">Toggle navigation</span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" style="margin-top: -15px;" href="index.php"><img src="images/FriendLine.png" width="150" alt="logo" /></a>
	            <ul class="nav navbar-nav navbar-right main-menu">
	              <li class="dropdown"><a href="contact.php">Կապ</a></li>
	            </ul>
	            
	          </div>

	          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	          </div>
	        </div>
	      </nav>
	    </header>
			<section id="banner">
				<div class="container">

	        <div class="sign-up-form">
				<a href="index.php" class="logo"><img src="images/FriendLine.png" width="200" alt="Friend Finder"/></a>
				<h2 class="text-white">Գտիր ընկերներիդ</h2>
				<div class="form-wrapper alr1">
				<div class="line-divider"></div>
					<p class="signup-text">Գրանցվիր հիմա,գտիր ընկերներիդ և ծանոթացիր աշխարհին:</p>
					<form action="server.php" method="post">
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error'])) {
									if (isset($_SESSION['error']['name_error'])) {
										print $_SESSION['error']['name_error'];
									}
								}
							 ?>
						</span>
						<fieldset class="form-group">
							<input type="text" class="form-control" name="name" id="example-name" placeholder="Անուն" value=
							"<?php 
								if (isset($_SESSION['value'])) {
									if (isset($_SESSION['value']['name'])) {
										print $_SESSION['value']['name'];
									}
								}
							 ?>">
						</fieldset>
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error'])) {
									if (isset($_SESSION['error']['surname_error'])) {
										print $_SESSION['error']['surname_error'];
									}
								}
							 ?>
						</span>
						<fieldset class="form-group">
							<input type="text" class="form-control" id="example-name" name="surname" placeholder="Ազգանուն" value=
							"<?php 
								if (isset($_SESSION['value'])) {
									if (isset($_SESSION['value']['surname'])) {
										print $_SESSION['value']['surname'];
									}
								}
							 ?>">
						</fieldset>
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error'])) {
									if (isset($_SESSION['error']['age_error'])) {
										print $_SESSION['error']['age_error'];
									}
								}
							 ?>
						</span>
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error'])) {
									if (isset($_SESSION['error']['age'])) {
										print $_SESSION['error']['age'];
									}
								}
							 ?>
						</span>
						<fieldset class="form-group">
							<input type="number" class="form-control" id="example-name" name="age" placeholder="Տարիք" value=
							"<?php 
								if (isset($_SESSION['value'])) {
									if (isset($_SESSION['value']['age'])) {
										print $_SESSION['value']['age'];
									}
								}
							 ?>">
						</fieldset>
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error'])) {
									if (isset($_SESSION['error']['email_error'])) {
										print $_SESSION['error']['email_error'];
									}
								}
							 ?>
						</span>
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error'])) {
									if (isset($_SESSION['error']['email'])) {
										print $_SESSION['error']['email'];
									}
								}
							 ?>
						</span>
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error'])) {
									if (isset($_SESSION['error']['emaill'])) {
										print $_SESSION['error']['emaill'];
									}
								}
							 ?>
						</span>
						<fieldset class="form-group">
							<input type="text" class="form-control" id="example-email" name="email" placeholder="Email" value=
							"<?php 
								if (isset($_SESSION['value'])) {
									if (isset($_SESSION['value']['email'])) {
										print $_SESSION['value']['email'];
									}
								}
							 ?>">
						</fieldset>
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error'])) {
									if (isset($_SESSION['error']['password_error'])) {
										print $_SESSION['error']['password_error'];
									}
								}
							 ?>
						</span>
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error'])) {
									if (isset($_SESSION['error']['password2'])) {
										print $_SESSION['error']['password2'];
									}
								}
							 ?>
						</span>
						<fieldset class="form-group">
							<div id="password_strength"><div class="bar"></div></div>
							<div id="score_percent"></div>
							<input type="password" class="form-control" id="example-password" name="password" placeholder="Գաղնտաբառ" value=
							"<?php 
								if (isset($_SESSION['value'])) {
									if (isset($_SESSION['value']['password'])) {
										print $_SESSION['value']['password'];
									}
								}
							 ?>">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon2 toggle-password2"></span>
						</fieldset>
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error'])) {
									if (isset($_SESSION['error']['passwordc_error'])) {
										print $_SESSION['error']['passwordc_error'];
									}
								}
							 ?>
						</span>
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error'])) {
									if (isset($_SESSION['error']['passwordc'])) {
										print $_SESSION['error']['passwordc'];
									}
								}
							 ?>
						</span>
						<fieldset class="form-group">
							<input type="password" class="form-control" id="example-password" name="passwordc" placeholder="Գաղնտաբառի կրկնում"  value=
							"<?php 
								if (isset($_SESSION['value'])) {
									if (isset($_SESSION['value']['passwordc'])) {
										print $_SESSION['value']['passwordc'];
									}
								}
							 ?>">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon2 toggle-password2"></span>
						</fieldset>
					<p>Սեղմելով գրանցվել Դուք համաձայնվում եք բոլոր կանոնների հետ:</p>
					<button class="btn-secondary" name="sign_up">Գրանցվել</button>
					</form>
				</div>
				<div class="form-wrapper alr2">
				<div class="line-divider"></div>
					
					<p class="signup-text">Մուտք գործիր կայք</p>
					<form action="server.php" method="post">
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error2'])) {
									if (isset($_SESSION['error2']['email_error'])) {
										print $_SESSION['error2']['email_error'];
									}
								}
							 ?>
						</span>
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error2'])) {
									if (isset($_SESSION['error2']['email'])) {
										print $_SESSION['error2']['email'];
									}
								}
							 ?>
						</span>
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error2'])) {
									if (isset($_SESSION['error2']['email2'])) {
										print $_SESSION['error2']['email2'];
									}
								}
							 ?>
						</span>
						<fieldset class="form-group">
							<input type="text" class="form-control" name="email2" id="example-email1" placeholder="Email" value=
							"<?php 
								if (isset($_SESSION['value2'])) {
									if (isset($_SESSION['value2']['email_true'])) {
										print $_SESSION['value2']['email_true'];
									}
								}
							 ?>">
						</fieldset>
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error2'])) {
									if (isset($_SESSION['error2']['password_error'])) {
										print $_SESSION['error2']['password_error'];
									}
								}
							 ?>
						</span>
						<fieldset class="form-group">
							<input type="password" class="form-control" name="password2" id="example-password1" placeholder="Գաղնտաբառ" value=
							"<?php 
								if (isset($_SESSION['value2'])) {
									if (isset($_SESSION['value2']['password_true'])) {
										print $_SESSION['value2']['password_true'];
									}
								}
							 ?>">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon2 toggle-password2"></span>
						</fieldset>
						<span class="spancheck">
							<?php 
								if (isset($_SESSION['error2'])) {
									if (isset($_SESSION['error2']['password_error2'])) {
										print $_SESSION['error2']['password_error2'];
									}
								}
							 ?>
						</span>
					<button class="btn-secondary siglog" name="login">Մուտք</button>
					</form>
				</div>
				<a href="#" class="already active">Արդեն ունեք էջ?</a>
				<img class="form-shadow" src="images/bottom-shadow.png" alt="" />
			</div>

	        <svg class="arrows hidden-xs hidden-sm">
	          <path class="a1" d="M0 0 L30 32 L60 0"></path>
	          <path class="a2" d="M0 20 L30 52 L60 20"></path>
	          <path class="a3" d="M0 40 L30 72 L60 40"></path>
	        </svg>
				</div>
			</section>

			<section id="features">
				<div class="container wrapper">
					<h1 class="section-title slideDown">Ս Ո Ց</h1>
					<div class="row slideUp">
						<div class="feature-item col-md-2 col-sm-6 col-xs-6 col-md-offset-2">
							<div class="feature-icon"><i class="icon ion-person-add"></i></div>
							<h3>Ընկերացիր</h3>
						</div>
						<div class="feature-item col-md-2 col-sm-6 col-xs-6">
							<div class="feature-icon"><i class="icon ion-images"></i></div>
							<h3>Կատարիր գրառումներ</h3>
						</div>
						<div class="feature-item col-md-2 col-sm-6 col-xs-6">
							<div class="feature-icon"><i class="icon ion-chatbox-working"></i></div>
							<h3>Անձնական չատ</h3>
						</div>
						<div class="feature-item col-md-2 col-sm-6 col-xs-6">
							<div class="feature-icon"><i class="icon ion-compose"></i></div>
							<h3>Ստեղծիր հարցումներ</h3>
						</div>
					</div>
					<h2 class="sub-title">Փնտրիր քեզ նման տարբերվող մարդկանց</h2>
					<div id="incremental-counter" data-value="101242"></div>
					<p>Արդեն իսկ գրանցված մարդիկ</p>
					<img src="images/face-map.png" alt="" class="img-responsive face-map slideUp hidden-sm hidden-xs" />
				</div>

			</section>

			<section id="app-download">
				<div class="container wrapper">
					<h1 class="section-title slideDown">Ներբեռնել</h1>
					<ul class="app-btn list-inline slideUp">
						<li><button class="btn-secondary"><img src="images/app-store.png" alt="App Store" /></button></li>
						<li><button class="btn-secondary"><img src="images/google-play.png" alt="Google Play" /></button></li>
					</ul>
					<h2 class="sub-title">Եղիր կապի մեջ ամենուրեք</h2>
					<img src="images/iPhone.png" alt="iPhone" class="img-responsive" />
				</div>
			</section>

	    <div class="img-divider hidden-sm hidden-xs"></div>

			<section id="site-facts">
				<div class="container wrapper">
					<div class="circle">
						<ul class="facts-list">
							<li>
								<div class="fact-icon"><i class="icon ion-ios-people-outline"></i></div>
								<h3 class="text-white">1,01,242</h3>
								<p>Գրանցված մարդիկ</p>
							</li>
							<li>
								<div class="fact-icon"><i class="icon ion-images"></i></div>
								<h3 class="text-white">21,01,242</h3>
								<p>Գրառումների քանակը</p>
							</li>
							<li>
								<div class="fact-icon"><i class="icon ion-checkmark-round"></i></div>
								<h3 class="text-white">41,242</h3>
								<p>Օնլայն մարդիկ</p>
							</li>
						</ul>
					</div>
				</div>
			</section>

			<section id="live-feed">
				<div class="container wrapper">
					<h1 class="section-title slideDown">Այժմ օնլայն</h1>
					<ul class="online-users list-inline slideUp">
						<li><a href="#" title="Alexis Clark"><img src="images/users/avatar.png" alt="" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
				          
					</ul>
					<h2 class="sub-title">Տես թե ինչ է կատարվում հենց հիմա</h2>
					<div class="row">
						<div class="col-md-4 col-sm-6 col-md-offset-2">
							<div class="feed-item">
								<img src="images/users/avatar.png" alt="user" class="img-responsive profile-photo-sm" />
								<div class="live-activity">
									<p><a href="#" class="profile-link">Անի</a> just posted a photo from Մոսկվա</p>
									<p class="text-muted">20 Secs ago</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="feed-item">
								<img src="images/users/avatar.png" alt="user" class="img-responsive profile-photo-sm" />
								<div class="live-activity">
									<p><a href="#" class="profile-link">Նորայր</a> Shared an article from Մադրիդ</p>
									<p class="text-muted">22 mins ago</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<footer id="footer">
	      <div class="container">
	      	<div class="row">
	          <div class="footer-wrapper">
	            <div class="col-md-3 col-sm-3">
	              <a href=""><img src="images/FriendLine.png" alt="" width="200" class="footer-logo" /></a>
	              <ul class="list-inline social-icons">
	              	<li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
	              	<li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
	              	<li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
	              	<li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
	              	<li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
	              </ul>
	            </div>
	            <div class="col-md-2 col-sm-2">
	              <h6>Տվյալներ</h6>
	              <ul class="footer-links">
	                <li><a href="">Գրանցվել</a></li>
	                <li><a href="">Մուտք գործել</a></li>
	                <li><a href="">Հետազոտել</a></li>
	                <li><a href="">Finder ծրագիր</a></li>
	                <li><a href="">Բնութագիր</a></li>
	                <li><a href="">Կայքի լեզու</a></li>
	              </ul>
	            </div>
	            <div class="col-md-2 col-sm-2">
	              <h6>Բիզնես տվյալներ</h6>
	              <ul class="footer-links">
	                <li><a href="">Բիզնես գրանցում</a></li>
	                <li><a href="">Բիզնես մուտք</a></li>
	                <li><a href="">Բենեֆիսներ</a></li>
	                <li><a href="">Ռեսուրսներ</a></li>
	                <li><a href="">Աֆիշա</a></li>
	                <li><a href="">Կարգավորումներ</a></li>
	              </ul>
	            </div>
	            <div class="col-md-2 col-sm-2">
	              <h6>Կապ</h6>
	              <ul class="footer-links">
	                <li><a href="">Մեր մասին</a></li>
	                <li><a href="">Հետադարձ կապ</a></li>
	                <li><a href="">Անվտանգություն</a></li>
	                <li><a href="">Կանոններ</a></li>
	                <li><a href="">Օգնություն</a></li>
	              </ul>
	            </div>
	            <div class="col-md-3 col-sm-3">
	              <h6>Հետդարձ կապ</h6>
	                <ul class="contact">
	                	<li><i class="icon ion-ios-telephone-outline"></i>+(374) 98 98 98 98</li>
	                	<li><i class="icon ion-ios-email-outline"></i>Friendline@mail.ru</li>
	                  <li><i class="icon ion-ios-location-outline"></i>Հայաստան,Երևան</li>
	                </ul>
	            </div>
	          </div>
	      	</div>
	      </div>
	      <div class="copyright">
	        <p>@Friendline 2020. Բոլոր իրավունքները պաշտպանված են</p>
	      </div>
		</footer>

    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.appear.min.js"></script>
	<script src="js/jquery.incremental-counter.js"></script>
    <script src="js/script.js"></script>
    <script src="js/buttons.js"></script>
    
	<?php session_destroy() ?>

	</body>
</html>
