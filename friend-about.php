<?php 
  session_start();
  $id = $_GET['id'];
  $user = $_SESSION['user'];
  $_SESSION['friendid'] = $id;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>Friendline | Social Network Page</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/Search.css" />
    <link rel="stylesheet" href="css/ionicons.min.css" />
    <script src="https://kit.fontawesome.com/2dc40a8c2b.js" crossorigin="anonymous"></script>
    <link href="css/emoji.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/
    css?family=Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png" href="images/fav2.png"/>

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
              <li class="dropdown"><a href="timeline.php" class="my_id" id_my = <?php print_r($user['id']) ?>><?php print_r($user['name']) ?></a></li>
              <li class="dropdown"><a href="newsfeed.php">?????????????? ????</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">?????????????????????????? <span><img src="images/down-arrow.png" alt="" /></span></a>
                  <ul class="dropdown-menu newsfeed-home">
                    <li><a href="newsfeed.php">??????????????????????????</a></li>
                    <li><a href="">???????????????? ??????????????????????</a></li>
                    <li><a href="">????????????????</a></li>
                    <li><a href="">??????</a></li>
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
              <li class="dropdown"><a href="index.php">??????</a></li>
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

    <div id="overlay__img"></div>

        <div class="container fr__data" fr_id = <?php echo $id ?> >

          <div class="timeline">
            <div class="timeline-cover">
              <div class="hidden__img img__zoom"> 
                <img class="_img" src="">
              </div>
              <div class="timeline-nav-bar hidden-sm hidden-xs">
                <div class="row">
                  <div class="col-md-3">
                    <div class="profile-info">
                      <div class="profile-info__div img__zoom">
                        <img src="" alt="" data-toggle="modal" data-target=".photo-3" class="img-responsive profile-photo open_avatar" />
                      </div>
                      <h4 class="fr__name"></h4>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <ul class="list-inline profile-menu">
                      <li><a href="friend.php?id=<?php echo $id ?>">????????????????</a></li>
                      <li><a href="friend-about.php?id=<?php echo $id ?>" class="active">????????????????????????</a></li>
                      <li><a href="friend-album.php?id=<?php echo $id ?>">??????????????</a></li>
                      <li><a href="friend-friends.php?id=<?php echo $id ?>">???????????????? </a></li>
                    </ul>
                    <ul class="follow-me list-inline">
                      <li>1,299 ??????????????</li>
                      <li><a href="settings.php" class="btn-primary edit_prof_but">???????????????? ??????????</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="navbar-mobile hidden-lg hidden-md">
                <div class="profile-info">
                  <div class="profile-info__div mob_div img__zoom">
                      <img src="" alt="" class="img-responsive profile-photo" />
                  </div>
                  <h4 class="fr__name"></h4>
                </div>
                <div class="mobile-menu">
                  <ul class="list-inline">
                    <li><a href="friend.php?id=<?php echo $id ?>">????????????????</a></li>
                    <li><a href="friend-about.php?id=<?php echo $id ?>" class="active">????????????????????????</a></li>
                    <li><a href="friend-album.php?id=<?php echo $id ?>">??????????????</a></li>
                    <li><a href="friend-friends.php?id=<?php echo $id ?>">???????????????? </a></li>
                  </ul>
                  <a href="settings.php" class="btn-primary edit_prof_but">???????????????? ??????????</a>
                </div>
              </div>

        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">

              <!-- About
              ================================================= -->
              <div class="about-profile">
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Personal Information</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur</p>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Work Experiences</h4>
                  <div class="organization">
                    <img src="images/envato.png" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5>Envato</h5>
                      <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                    </div>
                  </div>
                  <div class="organization">
                    <img src="images/envato.png" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5>Envato</h5>
                      <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                    </div>
                  </div>
                  <div class="organization">
                    <img src="images/envato.png" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5>Envato</h5>
                      <p>Seller - <span class="text-grey">1 February 2013 to present</span></p>
                    </div>
                  </div>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-location-outline icon-in-title"></i>Location</h4>
                  <p>228 Park Eve, New York</p>
                  <div class="google-maps">
                    <div id="map" class="map"></div>
                  </div>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-heart-outline icon-in-title"></i>Interests</h4>
                  <ul class="interests list-inline">
                    <li><span class="int-icons" title="Bycycle riding"><i class="icon ion-android-bicycle"></i></span></li>
                    <li><span class="int-icons" title="Photography"><i class="icon ion-ios-camera"></i></span></li>
                    <li><span class="int-icons" title="Shopping"><i class="icon ion-android-cart"></i></span></li>
                    <li><span class="int-icons" title="Traveling"><i class="icon ion-android-plane"></i></span></li>
                    <li><span class="int-icons" title="Eating"><i class="icon ion-android-restaurant"></i></span></li>
                  </ul>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-chatbubble-outline icon-in-title"></i>Language</h4>
                    <ul>
                      <li><a href="">Russian</a></li>
                      <li><a href="">English</a></li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="col-md-2 static">
              <div id="sticky-sidebar">
                <h4 class="grey">Sarah's activity</h4>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Commended on a Photo</p>
                    <p class="text-muted">5 mins ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Has posted a photo</p>
                    <p class="text-muted">an hour ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Liked her friend's post</p>
                    <p class="text-muted">4 hours ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> has shared an album</p>
                    <p class="text-muted">a day ago</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Footer
    ================================================= -->
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

        <!-- Avatar Upload -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">?????????? ???????????????? ?????? ????????????????????</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="server.php" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                  <div class="add__body">
                    <div class="b_a">
                      <i class="c_a">+</i>
                      <span class="sp_a">?????????????????? ??????????????????</span>
                      <div class="d_a" id="" tabindex="-1">
                        <a class="e_a" aria-label="?????????????????? ??????????????????" data-action-type="upload_photo" rel="ignore" role="button" id="">
                          <div class="f_a">
                            <input type="file" name="image" class="g_a" title="???????????? ??????????` ?????????????????????? ??????????" accept="image/*, image/heic, image/heif" autofocus="1" id="">
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">??????????</button>
                <button type="submit" class="btn btn-primary" name="change_avatar">??????????</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Cover Upload -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">?????????? ??????????????????</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="server.php" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                  <div class="add__body">
                    <div class="b_a">
                      <i class="c_a">+</i>
                      <span class="sp_a">?????????????????? ??????????????????</span>
                      <div class="d_a" id="" tabindex="-1">
                        <a class="e_a" aria-label="?????????????????? ??????????????????" data-action-type="upload_photo" rel="ignore" role="button" id="">
                          <div class="f_a">
                            <input type="file" name="image" class="g_a" title="???????????? ??????????` ?????????????????????? ??????????" accept="image/*, image/heic, image/heif" autofocus="1" id="">
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">??????????</button>
                <button type="submit" class="btn btn-primary" name="change_cover">??????????</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>

    <!-- Scripts
    ================================================= -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&callback=initMap"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky-kit.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/Search.js"></script>
    <script src="js/frpage.js"></script>
    <script src="js/img.js"></script>
    
  </body>
</html>
