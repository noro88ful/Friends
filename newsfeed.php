<?php 
  session_start();
  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
  } else {
    header('location:index.php');
  }
?>

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
    <link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/Search.css" />
    <link rel="stylesheet" href="css/ionicons.min.css" />
    <script src="https://kit.fontawesome.com/2dc40a8c2b.js" crossorigin="anonymous"></script>
    <link href="css/emoji.css" rel="stylesheet">
		
    <link rel="shortcut icon" type="image/png" href="images/fav2.png"/>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

    <style>
      ul.nav-news-feed li div{
        margin-top: 7px;
      }
      /*header{
        display: none;
      }*/
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
              <li class="dropdown"><a href="newsfeed.php">?????????????? ????</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">?????????????????????????? <span><img src="images/down-arrow.png" alt="" /></span></a>
                  <ul class="dropdown-menu newsfeed-home">
                    <li><a href="newsfeed.php">??????????????????????????</a></li>
                    <li><a href="">???????????????? ??????????????????????</a></li>
                    <li><a href="">????????????????</a></li>
                    <li><a href="messages.php">??????</a></li>
                    <li><a href="timeline-album.php">??????????????</a></li>
                    <li><a href="timeline-album.php">????????????????</a></li>
                  </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">???????????? <span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu login">
                  
                </ul>
              </li>
              <li class="dropdown"><a href="contact.php">??????</a></li>
              <li class="dropdown swal"><a href="#">??????</a></li>
            </ul>
            <form class="navbar-form navbar-right hidden-sm">
              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control Search_some" placeholder="???????????? ??????????, ????????, ??????????" oninput = "Search_something()">
              </div>
            </form>
          </div>
        </div>
      </nav>
    </header>

    <div id="page-contents">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-3 static" style="z-index: 200">
            <div id="profilee-card">
            <div class="profile-card">
            	<img src="users/<?php 
                  if($user['avatar']!='avatar.png'){
                    print_r($user['id'].'/');
                  }?><?php print_r($user['avatar']) ?>" alt="user" class="profile-photo" />
            	<h5><a href="timeline.php" class="text-white sesname"><?php print_r($user['name']." ".$user['surname']) ?></a></h5>
            	<a href="#" class="text-white friend__count"><i class="ion ion-android-person-add"></i> 1,299 ????????????????</a>
            </div>
            <ul class="nav-news-feed">
              <li><i class="icon ion-ios-paper"></i><div><a href="timeline.php">???? ??????????????????????????????</a></div></li>
              <li><i class="icon ion-ios-people"></i><div><a href="">???????????????? ??????????????????????</a></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="timeline-friends.php">????????????????</a><sup class="reqcount"></sup></div></li>
              <div class="req_peoples req_hidden"></div>
              <li><i class="icon ion-chatboxes"></i><div><a href="messages.php">????????????????</a></div></li>
              <li><i class="icon ion-images"></i><div><a href="timeline-album.php">??????????????</a></div></li>
              <li><i class="icon ion-ios-videocam"></i><div><a href="timeline-album.php">????????????????</a></div></li>
              <li><i class="icon ion-ios-settings"></i><div><a href="settings.php">????????????????????????????</a></div></li>
            </ul>
            <div id="chat-block">
              <div class="title">???????????? ??????</div>
              <ul class="online-users list-inline">
                <li><a href="" title="????????????"><img src="users/38/1596549670user-4.jpg" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
              </ul>
            </div>
          </div>
          </div>
    			<div class="col-md-7 addfrpost">

            <div class="create-post">
            	<div class="row">
                <form action="server.php" method="post" enctype="multipart/form-data">
              		<div class="col-md-12 col-sm-7 text_area">
                      <div class="form-group">
                        <img src="users/<?php 
                            if($user['avatar']!='avatar.png'){
                              print_r($user['id'].'/');
                            }?><?php print_r($user['avatar']) ?>" alt="" class="profile-photo-md" />
                        <textarea name="texts" id="exampleTextarea" cols="100%" rows="5" class="form-control" placeholder="???????? ??????-???? ??????"></textarea>
                      </div>
                  </div>
              		<div class="col-md-12 col-sm-5 form_text">
                    <div class="tools">
                      <ul class="publishing-tools list-inline">
                        <li><a href="#"><i class="ion-compose"></i></a></li>
                        <li><a href="#"><i class="ion-ios-videocam"></i></a></li>
                        <li class="inp_lio">
                            <div class="img_divv">
                              <i class="ion-images"></i>
                              <input type="file" name="image" class="img_inp" title="???????????? ??????????` ?????????????????????? ??????????" accept="image/*, image/heic, image/heif" autofocus="1" id="">
                            </div>
                        </li>
                        <li><a href="#"><i class="ion-map"></i></a></li>
                      </ul>
                      <button class="btn btn-primary pull-right btn__tar" name="addpost">??????????????</button>
                  </div>
                </form>
                </div>
            	</div>
            </div>
          </div>


    			<div class="col-md-2 static">
            <div class="suggestions" id="sticky-sidebar">
              <h4 class="grey">?????????? ?????????? ???? ???????????? ??????</h4>
              <div class="follow-user">
                <img src="users/37/1596549021user-14.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">??????????</a></h5>
                  <a href="#" class="text-green">???????????????? ????????</a>
                </div>
              </div>
            </div>
          </div>
    		</div>
    	</div>
    </div>

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
              <h6>????????????????</h6>
              <ul class="footer-links">
                <li><a href="">????????????????</a></li>
                <li><a href="">?????????? ????????????</a></li>
                <li><a href="">??????????????????</a></li>
                <li><a href="">Finder ????????????</a></li>
                <li><a href="">??????????????????</a></li>
                <li><a href="">?????????? ??????????</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h6>???????????? ????????????????</h6>
              <ul class="footer-links">
                <li><a href="">???????????? ????????????????</a></li>
                <li><a href="">???????????? ??????????</a></li>
                <li><a href="">????????????????????</a></li>
                <li><a href="">????????????????????</a></li>
                <li><a href="">??????????</a></li>
                <li><a href="">????????????????????????????</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h6>??????</h6>
              <ul class="footer-links">
                <li><a href="">?????? ??????????</a></li>
                <li><a href="">???????????????? ??????</a></li>
                <li><a href="">????????????????????????????</a></li>
                <li><a href="">????????????????</a></li>
                <li><a href="">????????????????????</a></li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-3">
              <h6>?????????????? ??????</h6>
                <ul class="contact">
                  <li><i class="icon ion-ios-telephone-outline"></i>+(374) 98 98 98 98</li>
                  <li><i class="icon ion-ios-email-outline"></i>Friendline@mail.ru</li>
                  <li><i class="icon ion-ios-location-outline"></i>????????????????,??????????</li>
                </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright">
        <p>@Friendline 2020. ?????????? ???????????????????????? ???????????????????? ????</p>
      </div>
    </footer>

    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none;">
              <span aria-hidden="true" style="font-size: 34px;margin-right: 10px;">&times;</span>
            </button>
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">????????</h5>
          </div>
            <form action="server.php" method="post" enctype="multipart/form-data">
              <div class="modal-body likepeoples">
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">??????????</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none;">
              <span aria-hidden="true" style="font-size: 34px;margin-right: 10px;">&times;</span>
            </button>
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">??????????????</h5>
          </div>
            <form action="server.php" method="post" enctype="multipart/form-data">
              <div class="modal-body dislikepeoples">
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">??????????</button>
              </div>
            </form>
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
    <script src="js/Search.js"></script>
    <script src="js/user.js"></script>
    <script src="js/buttons.js"></script>
    <script src="js/sweet.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
  </body>
</html>
