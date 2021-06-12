<?php 
  session_start();
  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
  } else {
    header('location:index.php');
  }
?>

<html lang="en">
	<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="FriendLine" />
    <meta name="keywords" content="Social Network, FriendLine" />
	<meta name="robots" content="index, follow" />

	<title>Friendline | Social Network Page</title>

	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/Search.css" />
    <link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/settings.css" />

    <script src="https://kit.fontawesome.com/2dc40a8c2b.js" crossorigin="anonymous"></script>
    <link href="css/emoji.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png" href="images/fav2.png"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <style>
      body{
        color: yellow;
        font-size: 25px;
      }
      header{
        display: none;
      }
    </style> -->
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
              <li class="dropdown"><a href="timeline.php?id=<?php print_r($user['id']) ?>"><?php print_r($user['name']) ?></a></li>
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
                <input type="text" class="form-control Search_some" placeholder="Փնտրել ընկեր, նկար, վիդեո" oninput = "Search_something()">
              </div>
            </form>
          </div>
        </div>
      </nav>
    </header>
    
    	<div class="settings__wrapper">
    		<div class="settings__content">
    			<div class="container">
	    			<div class="settings__divs">
              <form action="server.php" method="post">
                <div class="block one">
                  <div class="block__item">
                    <div class="block__title">Անձնական տվյալների խմբագրում</div>
                      <div class="block__text">
                        <div class="settings__input">
                          <label for="">Անուն</label>
                          <span class="spancheck">
                            <?php 
                              if (isset($_SESSION['error3'])) {
                                if (isset($_SESSION['error3']['name_error'])) {
                                  print $_SESSION['error3']['name_error'];
                                }
                              }
                             ?>
                          </span>
                          <input type="text" name="name" id="" value="<?php print $_SESSION['user']['name'] ?>">
                        </div>
                        <div class="settings__input">
                          <label for="">Ազգանուն</label>
                          <span class="spancheck">
                            <?php 
                              if (isset($_SESSION['error3'])) {
                                if (isset($_SESSION['error3']['surname_error'])) {
                                  print $_SESSION['error3']['surname_error'];
                                }
                              }
                             ?>
                          </span>
                          <input type="text" name="surname" id="" value="<?php print $_SESSION['user']['surname'] ?>">
                        </div>
                        <div class="settings__input">
                          <label for="">Տարիք</label>
                          <span class="spancheck">
                            <?php 
                              if (isset($_SESSION['error3'])) {
                                if (isset($_SESSION['error3']['age_error'])) {
                                  print $_SESSION['error3']['age_error'];
                                }
                              }
                             ?>
                          </span>
                          <span class="spancheck">
                            <?php 
                              if (isset($_SESSION['erro3r'])) {
                                if (isset($_SESSION['error3']['age'])) {
                                  print $_SESSION['error3']['age'];
                                }
                              }
                             ?>
                          </span>
                          <input type="text" name="age" id="" value="<?php print $_SESSION['user']['age'] ?>">
                        </div>
                      </div>
                  </div>
                  <div class="block__item">
                    <div class="block__title">Email-ի խմբագրում</div>
                      <div class="block__text">
                        <div class="settings__input">
                          <label for="">Հին Email</label>
                          <span class="spancheck">
                            <?php 
                              if (isset($_SESSION['error3'])) {
                                if (isset($_SESSION['error3']['email_error4'])) {
                                  print $_SESSION['error3']['email_error4'];
                                }
                              }
                             ?>
                          </span>
                          <span class="spancheck">
                            <?php 
                              if (isset($_SESSION['error3'])) {
                                if (isset($_SESSION['error3']['email_error5'])) {
                                  print $_SESSION['error3']['email_error5'];
                                }
                              }
                             ?>
                          </span>
                          <span class="spancheck">
                            <?php 
                              if (isset($_SESSION['error3'])) {
                                if (isset($_SESSION['error3']['email_error6'])) {
                                  print $_SESSION['error3']['email_error6'];
                                }
                              }
                             ?>
                          </span>
                          <input type="text" name="oldemail" id="" value="<?php print $_SESSION['user']['email'] ?>">
                        </div>
                        <div class="settings__input">
                          <label for="">Նոր Email</label>
                          <span class="spancheck">
                            <?php 
                              if (isset($_SESSION['error3'])) {
                                if (isset($_SESSION['error3']['email_error1'])) {
                                  print $_SESSION['error3']['email_error1'];
                                }
                              }
                             ?>
                          </span>
                          <span class="spancheck">
                            <?php 
                              if (isset($_SESSION['error3'])) {
                                if (isset($_SESSION['error3']['email_error2'])) {
                                  print $_SESSION['error3']['email_error2'];
                                }
                              }
                             ?>
                          </span>
                          <span class="spancheck">
                            <?php 
                              if (isset($_SESSION['error3'])) {
                                if (isset($_SESSION['error3']['email_error3'])) {
                                  print $_SESSION['error3']['email_error3'];
                                }
                              }
                             ?>
                          </span>
                          <input type="text" name="newemail" id="">
                        </div>
                      </div>
                    </div>
                  <div class="block__item">
                    <div class="block__title">Գաղտնաբառի խմբագրում</div>
                        <div class="block__text" value="3">
                          <div class="settings__input">
                            <label for="">Հին գաղտնաբառ</label>
                            <span class="spancheck">
                              <?php 
                                if (isset($_SESSION['error3'])) {
                                  if (isset($_SESSION['error3']['password_error1'])) {
                                    print $_SESSION['error3']['password_error1'];
                                  }
                                }
                               ?>
                            </span>
                            <span class="spancheck">
                              <?php 
                                if (isset($_SESSION['error3'])) {
                                  if (isset($_SESSION['error3']['password_error2'])) {
                                    print $_SESSION['error3']['password_error2']."<br>";
                                  }
                                }
                               ?>
                            </span>
                            <input type="password" name="oldpassword" id=""> 
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                          </div>
                          <div class="settings__input">
                            <label for="">Նոր գաղտնաբառ</label>
                            <span class="spancheck">
                              <?php 
                                if (isset($_SESSION['error3'])) {
                                  if (isset($_SESSION['error3']['password_error5'])) {
                                    print $_SESSION['error3']['password_error5'];
                                  }
                                }
                               ?>
                            </span>
                            <input type="password" name="newpassword" id="">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                          </div>
                          <div class="settings__input">
                            <label for="">Գաղտնաբառի կրկնում</label>
                            <span class="spancheck">
                              <?php 
                                if (isset($_SESSION['error3'])) {
                                  if (isset($_SESSION['error3']['password_error3'])) {
                                    print $_SESSION['error3']['password_error3'];
                                  }
                                }
                               ?>
                            </span>
                            <span class="spancheck">
                              <?php 
                                if (isset($_SESSION['error3'])) {
                                  if (isset($_SESSION['error3']['password_error4'])) {
                                    print $_SESSION['error3']['password_error4'];
                                  }
                                }
                               ?>
                            </span>
                            <input type="password" name="newpassword2" id="">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                          </div>
                        </div>
                      </div>
                  </div>
                <div class="settings__input">
                  <button class="wave-btn" name="update">
                    <span class="wave-btn__text">Պահպանել</span>
                    <span class="wave-btn__waves"></span>
                  </button>
                </div>
              </form>
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
    <script src="js/settings.js"></script>
    <script src="js/Search.js"></script>

    <?php unset($_SESSION['error3']) ?>

<body>
	
</body>
</html>