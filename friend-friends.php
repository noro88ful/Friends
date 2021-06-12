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
                      <li><a href="friend.php?id=<?php echo $id ?>">Տարեգիրք</a></li>
                      <li><a href="friend-about.php?id=<?php echo $id ?>">Տեղեկություն</a></li>
                      <li><a href="friend-album.php?id=<?php echo $id ?>">Նկարներ</a></li>
                      <li><a href="friend-friends.php?id=<?php echo $id ?>" class="active">Ընկերներ </a></li>
                    </ul>
                    <ul class="follow-me list-inline">
                      <li>1,299 հետևորդ</li>
                      <li><a href="settings.php" class="btn-primary edit_prof_but">Ուղարկել նամակ</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="navbar-mobile hidden-lg hidden-md">
                <div class="profile-info">
                  <div class="profile-info__div img__zoom">
                    <img src="" alt="" data-toggle="modal" data-target=".photo-3" class="img-responsive profile-photo open_avatar" />
                  </div>
                  <h4 class="fr__name"></h4>
                </div>
                <div class="mobile-menu">
                  <ul class="list-inline">
                      <li><a href="friend.php?id=<?php echo $id ?>">Տարեգիրք</a></li>
                      <li><a href="friend-about.php?id=<?php echo $id ?>">Տեղեկություն</a></li>
                      <li><a href="friend-album.php?id=<?php echo $id ?>">Նկարներ</a></li>
                      <li><a href="friend-friends.php?id=<?php echo $id ?>" class="active">Ընկերներ </a></li>
                  </ul>
                  <a href="settings.php" class="btn-primary edit_prof_but">Ուղարկել նամակ</a>
                </div>
              </div>

        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">

              <!-- Friend List
              ================================================= -->
              <div class="friend-list">
                <div class="row friendshow">
                  
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
    
        <!-- Avatar Upload -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Փոխել անձնական էջի լուսանկարը</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="server.php" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                  <div class="add__body">
                    <div class="b_a">
                      <i class="c_a">+</i>
                      <span class="sp_a">Վերբեռնել լուսանկար</span>
                      <div class="d_a" id="" tabindex="-1">
                        <a class="e_a" aria-label="Վերբեռնել լուսանկար" data-action-type="upload_photo" rel="ignore" role="button" id="">
                          <div class="f_a">
                            <input type="file" name="image" class="g_a" title="Ընտրել ֆայլը` վերբեռնելու համար" accept="image/*, image/heic, image/heif" autofocus="1" id="">
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Փակել</button>
                <button type="submit" class="btn btn-primary" name="change_avatar">Փոխել</button>
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
            <h5 class="modal-title" id="exampleModalLabel">Փոխել ետնանկարը</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="server.php" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                  <div class="add__body">
                    <div class="b_a">
                      <i class="c_a">+</i>
                      <span class="sp_a">Վերբեռնել լուսանկար</span>
                      <div class="d_a" id="" tabindex="-1">
                        <a class="e_a" aria-label="Վերբեռնել լուսանկար" data-action-type="upload_photo" rel="ignore" role="button" id="">
                          <div class="f_a">
                            <input type="file" name="image" class="g_a" title="Ընտրել ֆայլը` վերբեռնելու համար" accept="image/*, image/heic, image/heif" autofocus="1" id="">
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Փակել</button>
                <button type="submit" class="btn btn-primary" name="change_cover">Փոխել</button>
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
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky-kit.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/friends.js"></script>
    <script src="js/Search.js"></script>
    <script src="js/frpage.js"></script>
    <script src="js/img.js"></script>
    
  </body>
</html>