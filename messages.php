<?php 
  session_start();
  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
  } else {
    header('location:index.php');
  }
?>


<!DOCTYPE html>
<html class=''>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex">
	<meta name="description" content="FriendLine" />
	<meta name="keywords" content="Social Network, FriendLine" />
	<title>Friendline | Social Network Page</title>
	<script src="https://kit.fontawesome.com/2dc40a8c2b.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
	<!-- <script src="https://use.typekit.net/hoy3lrg.js"></script> -->
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/messages.css">
	<link rel="shortcut icon" type="image/png" href="images/fav2.png"/>
	<style>
		.menu form{
			margin: 8px 0;
		}
	</style>
</head>
<body>

	<header id="header" class="lazy-load">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container searchdiv">

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
              <li class="dropdown"><a href="timeline.php"><?php print_r($user['name']) ?></a></li>
              <li class="dropdown"><a href="newsfeed.php">Գլխավոր էջ</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Նորություններ <span><img src="images/down-arrow.png" alt="" /></span></a>
                  <ul class="dropdown-menu newsfeed-home">
                    <li><a href="newsfeed.php">Նորություններ</a></li>
                    <li><a href="">Ընկերներ մոտակայքում</a></li>
                    <li><a href="">Ընկերներ</a></li>
                    <li><a href="">Չատ</a></li>
                    <li><a href="timeline-album.php">Նկարներ</a></li>
                    <li><a href="timeline-album.php">Վիդեոներ</a></li>
                  </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Լրահոս <span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu login">
                  
                </ul>
              </li>
              <li class="dropdown"><a href="contact.php">Կապ</a></li>
              <li class="dropdown"><a href="index.php">Ելք</a></li>
            </ul>
            <form class="navbar-form navbar-right hidden-sm">
              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control Search_some" placeholder="Փնտրել ընկեր, նկար, վիդեո" oninput = "Search_something()">
              </div>
            </form>
          </div>
        </div>
      </nav>
    </header>

<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
				<img id="profile-img" src="users/<?php 
                  if($user['avatar']!='avatar.png'){
                    print_r($user['id'].'/');
                  }?><?php print_r($user['avatar']) ?>" class="online take_url" alt="" />
				<p><?php print_r($user['name']." ".$user['surname']) ?></p>
				<!-- <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i> -->
				<div id="status-options">
					<ul>
						<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
						<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
						<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
						<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
					</ul>
				</div>
				<!-- <div id="expanded">
					<label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mikeross" />
					<label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="ross81" />
					<label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mike.ross" />
				</div> -->
			</div>
		</div>
		<div id="search">
			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
			<input type="text" placeholder="Փնտրել..." />
		</div>
		<div id="contacts">
			<ul>
				
			</ul>
		</div>
		<div id="bottom-bar">
			<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Ավելացնել ընկեր</span></button>
			<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Կարգավորումներ</span></button>
		</div>
	</div>
	<div class="content">
		<div class="contact-profile">
			<img src="" alt="" />
			<p></p>
			<div class="social-media">
				<i class="fa fa-facebook" aria-hidden="true"></i>
				<i class="fa fa-twitter" aria-hidden="true"></i>
				<i class="fa fa-instagram" aria-hidden="true"></i>
				<i class="fa fa-chevron-down" aria-hidden="true"></i>
			</div>
		</div>
		<div class="messages">
			<ul id="messages_ul"></ul>
		</div>
		<div class="message-input">
			<div class="wrap">
			<input type="text" placeholder="Գրեք Ձեր նամակը..." />
			<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
			<button class="submit send_mess"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<script src="js/messages.js"></script>
<script src="js/messages2.js"></script>