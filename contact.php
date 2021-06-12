<!DOCTYPE html>
<html lang="en">
	<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="FriendLine" />
    <meta name="keywords" content="Social Network, FriendLine" />
	<meta name="robots" content="index, follow" />

	<title>Friendline | Social Network Page</title>

	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/header.css" />
	<link rel="stylesheet" href="css/contact.css" />
    <link rel="stylesheet" href="css/ionicons.min.css" />

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="css/emoji.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png" href="images/fav2.png"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <a class="navbar-brand" style="margin-top: -15px;" href="newsfeed.php"><img src="images/FriendLine.png" width="150" alt="logo" /></a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              <li class="dropdown"><a href="newsfeed.php">Գլխավոր էջ</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Նորություններ <span><img src="images/down-arrow.png" alt="" /></span></a>
                  <ul class="dropdown-menu newsfeed-home">
                    <li><a href="newsfeed.php">Նորություններ</a></li>
                    <li><a href="">Ընկերներ տարածքում</a></li>
                    <li><a href="">Ընկերներ</a></li>
                    <li><a href="">Չատ</a></li>
                    <li><a href="">Նկարներ</a></li>
                    <li><a href="">Վիդեոներ</a></li>
                  </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Լրահոս <span><img src=" images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu login">
                  
                </ul>
              </li>
              <li class="dropdown"><a href="">Կապ</a></li>
              <li class="dropdown"><a href="index.php">Ելք</a></li>
            </ul>
            <form class="navbar-form navbar-right hidden-sm">
              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control" placeholder="Փնտրել ընկեր, նկար, վիդեո">
              </div>
            </form>
          </div>
        </div>
      </nav>
    </header>


	<div class="wrapper">
		<div class="page">
			<div class="parallax">
				<ul class="parallax__list">
					<li data-depth="0.10">
						<div class="parallax__bg"></div>
					</li>
					<li data-depth="0.15">
						<div class="parallax__rope parallax__rope_1">
							<div class="parallax__element parallax__element_1"><span></span></div>
							<div class="parallax__element parallax__element_2"><span></span></div>
							<div class="parallax__element parallax__element_3"><span></span></div>
							<img src="images/Parallax/rope.png" alt="">
						</div>
					</li>
					<li data-depth="0.30">
						<div class="parallax__rope parallax__rope_2">
							<div class="parallax__element parallax__element_4"><span></span></div>
							<div class="parallax__element parallax__element_5"><span></span></div>
							<img src="images/Parallax/rope.png" alt="">
						</div>
					</li>
					<li data-depth="0.60">
						<div class="parallax__rope parallax__rope_3">
							<div class="parallax__element parallax__element_6"><span></span></div>
							<div class="parallax__element parallax__element_7"><span></span></div>
							<div class="parallax__element parallax__element_8"><span></span></div>
							<img src="images/Parallax/rope.png" alt="">
						</div>
					</li>
					<li data-depth="0.30">
						<div class="parallax__wave parallax__wave_1"></div>
					</li>
					<li data-depth="0.40">
						<div class="parallax__wave parallax__wave_2"></div>
					</li>
					<li data-depth="0.50">
						<div class="parallax__wave parallax__wave_3"></div>
					</li>
					<li data-depth="0.60">
						<div class="parallax__lighthouse"></div>
					</li>
					<li data-depth="0.60">
						<div class="parallax__wave parallax__wave_4"></div>
					</li>
					<li data-depth="0.80">
						<div class="parallax__wave parallax__wave_5"></div>
					</li>
					<li data-depth="1.00">
						<div class="parallax__wave parallax__wave_6"></div>
					</li>
				</ul>
			</div>
			<div class="content">
				
			</div>
		</div>
	</div>
	<div class="contact__wrapper">
		<div class="contact__content">
			<div class="hi">
				<div class="container">
					<div class="hi__row">
						<div class="hi__body">
							CONTACTS
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>
    
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky-kit.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/script.js"></script>
	<script src="js/jquery.parallax.js"></script>
	<script src="js/contact.js"></script>

</body>
</html>
