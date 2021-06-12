<?php 
include 'data.php';

session_start();

// print "<pre>";

class Controller extends Database{
	function __construct(){
		parent::__construct();
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			date_default_timezone_set('Asia/Yerevan');
			if (isset($_POST['sign_up'])){
				$this->valid();
			}	
			elseif (isset($_POST['login'])){
				$this->login();
			}
			elseif (isset($_POST['update'])) {
				$this->Updatedata();
			}
			elseif (isset($_POST['change_avatar'])) {
				$this->Avatarchange();
			}
			elseif (isset($_POST['change_cover'])) {
				$this->Coverchange();
			}
			elseif (isset($_POST['adding_image'])) {
				$this->Addimage();
			}
			elseif (isset($_POST['addpost'])) {
				$this->addpost();
			}
			if(isset($_POST['action'])){
			 	$a = $_POST['action'];  	
			 	call_user_func([$this, $a]); 
			}
		}
	}
	function valid(){
		$sname = $_POST['name'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$age = $_POST['age'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$paslen = strval($password);
		$passwordc = $_POST['passwordc'];
		$avatar = 'avatar.png';
		$cover = 'cover.jpg';
		$value = [];
		$arr = [];

		if (empty($name)) {
			$arr['name_error'] = "Անվան դաշտը լրացված չէ";
		} else {
			$value['name'] = $name;
		}
		if (empty($surname)) {
			$arr['surname_error'] = "Ազգանվան դաշտը լրացված չէ";
		} else {
			$value['surname'] = $surname;
		}
		if (empty($age)) {
			$arr['age_error'] = "Տարիք դաշտը լրացված չէ";
		}
		else if (!filter_var($age, FILTER_VALIDATE_INT)){
			$arr['age'] = "Խնդրում ենք ներմուծել միայն թիվ";
		} else {
			$value['age'] = $age;
		}
		if (empty($email)) {
			$arr['email_error'] = "Email դաշտը լրացված չէ";
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$arr['email'] = "Սխալ Email";
		}
		else if ($this->likedata('email',$email)) {
			$arr['emaill'] = "Տվյալ Email արդեն գրանցված է այլ օգտատերի կողմից";
		}
		else {
			$value['email'] = $email;
		}
		if (empty($password)) {
			$arr['password_error'] = "Գաղնտաբառ դաշտը լրացված չէ";
		}
		else if(strlen($paslen)<8 || strlen($paslen)>15){
			$arr['password2'] = "Գաղտնաբառը [8-15] սիմվոլ";
		} 
		else {
			$value['password'] = $password;
		}
		if (empty($passwordc)) {
			$arr['passwordc_error'] = "Կրկնում դաշտը լրացված չէ";
		}else if($password!=$passwordc){
			$arr['passwordc'] = "Գաղտնաբառերը չեն համընկնում";
		}
		else {
			$value['passwordc'] = $passwordc;
		}
		if (!empty($arr)) {
			$_SESSION['error'] = $arr;
			$_SESSION['value'] = $value;
			$_SESSION['name'] = $name;
			header('location:index.php');
		} else {
			$password = password_hash($password, PASSWORD_DEFAULT);
			$this->Insert('datasoc',['name'=>$name,'surname'=>$surname,'age'=>$age,
									     'email'=>$email,'password'=>$password,'avatar'=>$avatar,'cover'=>$cover]);
			header('location:index.php');
		}
		// $this->Insert('status',['user_id'=>$sssid,'status'=>'offline']);
	}
	function login(){
		$email = $_POST['email2'];
		$password = $_POST['password2'];
		$value = [];
		$arr = [];
		$avatar = $this->take('avatar','datasoc');
		$cover = $this->take('cover','datasoc');
		$hash = $this->likedata('password',$email)[0][0];
		if (empty($email)) {
			$arr['email_error'] = "Email դաշտը լրացված չէ";
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$arr['email'] = "Սխալ Email";
		}
		else if (!$this->likedata('email',$email)){
			$arr['email2'] = "նման Email-ով գրանցված օգտագեր չկա";
		}
		else {
			$value['email_true'] = $email;
		}
		if (empty($password)) {
			$arr['password_error'] = "Գաղնտաբառ դաշտը լրացված չէ";
		}
		else if(!password_verify($password,$hash)) {
			$arr['password_error2'] = "Սխալ գաղտնաբառ";
		}
		else {
			$value['password_true'] = $password;
		}
		if (!empty($arr)) {
			$_SESSION['error2'] = $arr;
			$_SESSION['value2'] = $value;
			header('location:index.php');
		}
		else {
		 	$arre = $this->like2($email);
			$_SESSION['user'] = $arre[0];
			$statid = $this->take2('id','datasoc','email',$email);
			$this->Update2('status',['status'=>'online'],'user_id',$statid[0][0]);
			header('location:newsfeed.php');
		}
	}

	function Updatedata(){
		$id_ses = $_SESSION['user']['id'];
		$name_ses = $_SESSION['user']['name'];
		$surname_ses = $_SESSION['user']['surname'];
		$age_ses = $_SESSION['user']['age'];
		$email_ses = $_SESSION['user']['email'];
		$password_ses = $_SESSION['user']['password'];

		$name_post = $_POST['name'];
		$surname_post = $_POST['surname'];
		$age_post = $_POST['age'];
		$email_post_old = $_POST['oldemail'];
		$email_post_new = $_POST['newemail'];
		$password_post_old = $_POST['oldpassword'];
		$password_post_new = $_POST['newpassword'];
		$password_post_new_conf = $_POST['newpassword2'];
		$hash = $password_ses;

		if (empty($name_post)) {
			$arr['name_error'] = "Անվան դաշտը լրացված չէ";
		} else {
			$value['name'] = $name_post;
		}
		if (empty($surname_post)) {
			$arr['surname_error'] = "Ազգանվան դաշտը լրացված չէ";
		} else {
			$value['surname'] = $surname_post;
		}
		if (empty($age_post)) {
			$arr['age_error'] = "Տարիք դաշտը լրացված չէ";
		}
		else if (!filter_var($age_post, FILTER_VALIDATE_INT)){
			$arr['age'] = "Խնդրում ենք ներմուծել միայն թիվ";
		} else {
			$value['age'] = $age_post;
		}

		if (!empty($email_post_new)) {
			if (!filter_var($email_post_new, FILTER_VALIDATE_EMAIL)) {
				$arr['email_error1'] = "Սխալ Email";
			}
			else if ($email==$email_post_new) {
				$arr['email_error2'] = "Նշեք այլ Email";
			}
			else if($this->like2($email_post_new)){
				$arr['email_error3'] = "նման Email-ով գրանցված օգտատեր արդեն կա";
			}
			else {
				if (empty($email_post_old)) {
					$arr['email_error4'] = "Հին Email դաշտը լրացված չէ";
				}
				else if (!filter_var($email_post_old, FILTER_VALIDATE_EMAIL)) {
					$arr['email_error5'] = "Սխալ Email";
				}
				else if (!$email_post_old==$email_ses) {
					$arr['email_error6'] = "Նշված Email-ը օգտատերի Email-ին չի համապատասխանում";
				}
				else{
					$value['email'] = $email_post_new;
				}
			}
		} else {
			$email_post_new = $email_ses;
		}

		if (!empty($password_post_new)) {
			if (empty($password_post_old)) {
				$arr['password_error1'] = "Հին գաղնտաբառ դաշտը լրացված չէ";
			}
			else if(!password_verify($password_post_old,$hash)) {
				$arr['password_error2'] = "Հին գաղնտաբառը ճիշտ չէ";
			}
			else if(strlen(strval($password_post_new))<8 || strlen(strval($password_post_new))>15){
				$arr['password_error5'] = "Գաղտնաբառը [8-15] սիմվոլ";
			} 
			else if (empty($password_post_new_conf)) {
				$arr['password_error3'] = "Գաղտնաբառի կրկնում դաշտը լրացված չէ";
			}
			else if($password_post_new!=$password_post_new_conf){
				$arr['password_error4'] = "Գաղտնաբառերը չեն համընկնում";
			}
			else {
				$password_post_new = password_hash($password_post_new, PASSWORD_DEFAULT);
				$value['password'] = $password_post_new;
			}
		} else {
			$password_post_new = $password_ses;
		}
		if (!empty($arr)) {
			$_SESSION['error3'] = $arr;
			$_SESSION['value3'] = $value;
			header('location:settings.php');
		} else {
			$this->Update2('datasoc',['name'=>$name_post,'surname'=>$surname_post,
				            'age'=>$age_post,'email'=>$email_post_new,'password'=>$password_post_new],'id',$id_ses);
			$_SESSION['user']['name'] = $name_post;
			$_SESSION['user']['surname'] = $surname_post;
			$_SESSION['user']['age'] = $age_post;
			$_SESSION['user']['email'] = $email_post_new;
			$_SESSION['user']['password'] = $password_post_new;
			header('location:settings.php');
		}

	}
	// function showmyinfo(){
	// 	$id = $_SESSION['user']['id'];
	// 	$print = $this->take2('*','datasoc','id',$id);
	// 	$print = json_encode($print);
	// 	print $print;
	// }
	function Avatarchange(){
		$id = $_SESSION['user']['id'];
		$image = $_FILES['image'];
		if (!file_exists('users/'.$id)) mkdir('users/'.$id);
		$hasce = time().$image['name'];
		$hasce2 = 'users'.'/'.$id.'/'.$hasce;
		move_uploaded_file($image['tmp_name'],$hasce2);
		if ($image['type']!='image/png' && $image['type']!='image/jpeg' || (count($image['name']))==0) {
			header('location:timeline.php');
		} else {
			$this->Update2('datasoc',['avatar'=>$hasce],'id',$id);
			$this->Insert('image_url',['url'=>$hasce,'user_id'=>$id]);
			$_SESSION['user']['avatar'] = $hasce;
			header('location:timeline.php');
		}
	}
	function Coverchange(){
		$id = $_SESSION['user']['id'];
		$image = $_FILES['image'];
		if (!file_exists('users/'.$id)) mkdir('users/'.$id);
		$hasce = $image['name'];
		$hasce2 = 'users'.'/'.$id.'/'.$hasce;
		move_uploaded_file($image['tmp_name'],$hasce2);
		if ($image['type']!='image/png' && $image['type']!='image/jpeg' || (count($image['name']))==0) {
			header('location:timeline.php');
		} else {
			$this->Update2('datasoc',['cover'=>$hasce],'id',$id);
			$this->Insert('image_url',['url'=>$hasce,'user_id'=>$id]);
			$_SESSION['user']['cover'] = $hasce;
			header('location:timeline.php');
		}
	}
	function Addimage(){
		$id = $_SESSION['user']['id'];
		$image = $_FILES['add_image'];
		if (!file_exists('users/'.$id)) mkdir('users/'.$id);
		$hasce = time().$image['name'];
		$hasce2 = 'users'.'/'.$id.'/'.$hasce;
		move_uploaded_file($image['tmp_name'],$hasce2);
		if ($image['type']!='image/png' && $image['type']!='image/jpeg' || (count($image['name']))==0) {
			print 'ok';
			header('location:timeline-album.php');
		} else {
			$this->Insert('image_url',['url'=>$hasce,'user_id'=>$id]);
			header('location:timeline-album.php');
		}
	}

	function show_user_image(){
		if (!empty($_POST['fid'])) {
			$id = $_POST['fid'];
		} else {
			$id = $_SESSION['user']['id'];
		}
		$print = $this->take2('url','image_url','user_id',$id);
		if (!empty($print)) {
			$print[0][] = $id;
			$print = json_encode($print);
			print $print;
		}
	}
	function change_av_this(){
		$id = $_SESSION['user']['id'];
		$imgurl = $_POST['imgurl'];
		$this->Update2('datasoc',['avatar'=>$imgurl],'id',$id);
		$_SESSION['user']['avatar'] = $imgurl;
		print $imgurl;
	}

	function delete_av_this(){
		$imgurl = $_POST['imgurl'];
		$id = $this->take2('id','image_url','url',$imgurl);
		if ($this->take2('id','datasoc','avatar',$imgurl)) {
			$this->Update2('datasoc',['avatar'=>'avatar.png'],'avatar',$imgurl);
			$_SESSION['user']['avatar'] = 'avatar.png';
		}
		if ($this->take2('id','datasoc','cover',$imgurl)) {
			$this->Update2('datasoc',['cover'=>'cover.jpg'],'cover',$imgurl);
			$_SESSION['user']['cover'] = 'cover.jpg';
		}
		$this->deleteitem('image_url','id',$id[0][0]);
		print $imgurl;
	}
	function change_co_this(){
		$id = $_SESSION['user']['id'];
		$imgurl = $_POST['imgurl'];
		$this->Update2('datasoc',['cover'=>$imgurl],'id',$id);
		$_SESSION['user']['cover'] = $imgurl;
		print $imgurl;
	}

	function peopcount(){
		$id = $_SESSION['user']['id'];
		$print = $this->requestcount($id);
		$print = json_encode($print);
		print $print;
	}

	function peoples(){
		$id = $_SESSION['user']['id'];
		$print = $this->requestpeoples($id);
		$print = json_encode($print);
		print_r($print);
	}

	function accreq(){
		$id = $_SESSION['user']['id'];
		$pid = $_POST['pid'];
		$print = $this->selpeop($id,$pid);
		$this->Insert('friend',['user1_id'=>$print[0][0],'user2_id'=>$print[0][1]]);
		$this->deletereq('request',$id,$pid);
	}
	function decreq(){
		$id = $_SESSION['user']['id'];
		$pid = $_POST['pid'];
		$this->deletereq('request',$id,$pid);
	}
	function searchpeoples(){
		$x = $_POST['x'];
		$print = $this->likedata2('id,name,surname,avatar','datasoc',['name'=>$x,'surname'=>$x]);
		$arr = [];
		for ($i=0; $i < count($print); $i++) { 
			if ($print[$i][0]==$_SESSION['user']['id']) {
			 	array_splice($print, $i, 1);
			}
		}
		for ($i=0; $i < count($print); $i++) { 
			if ($this->take2('user2_id','request','user2_id',$print[$i][0])) {
				array_push($arr,'Ուղարկված է');
			} 
			else if ($this->take2('user1_id','request','user1_id',$print[$i][0])){
				array_push($arr,'Ընդունել');
			}
			else if ($this->take2('user1_id','friend','user1_id',$print[$i][0]) ||
					 $this->take2('user2_id','friend','user2_id',$print[$i][0])){
				array_push($arr,'Ընկերներ');
			} else {
				array_push($arr,'Ուղարկել');
			}
		}
		for ($i=0; $i < count($print); $i++) {
			array_push($print[$i],$arr[$i]);
		}
		$arr = json_encode($arr);
		$print = json_encode($print);
		print_r($print);
	}
	function showfriends(){
		if (!empty($_POST['fid'])) {
			$id = $_POST['fid'];
		} else {
			$id = $_SESSION['user']['id'];
		}
		$print = $this->showfrn('id,name,surname,avatar,cover',$id);
		$print = json_encode($print);
		print_r($print);
	}
	function delfriend(){
		$id = $_SESSION['user']['id'];
		$pid = $_POST['pid'];
		$this->deletereq('friend',$id,$pid);
		print 'ok';
	}
	function sendreq(){
		$id = $_SESSION['user']['id'];
		$pid = $_POST['pid'];
		$this->Insert('request',['user1_id'=>$id,'user2_id'=>$pid]);
		print 'ok';
	}
	function case1() {
		$this->accreq();
		print 'ok';
	}
	function case11() {
		$this->decreq();
		print 'ok';
	}
	function case2() {
		$this->decreq();
		print 'ok';
	}
	function case3() {
		$this->delfriend();
		print 'ok';
	}
	function case4() {
		$this->sendreq();
		print 'ok';
	}
	function addpost(){
		$id = $_SESSION['user']['id'];
		$image = $_FILES['image'];
		$text = $_POST['texts'];
		$date=time();
		if (!file_exists('users/'.$id)) mkdir('users/'.$id);
		$hasce = time().$image['name'];
		$hasce2 = 'users'.'/'.$id.'/'.$hasce;
		move_uploaded_file($image['tmp_name'],$hasce2);
		if ($image['type']!='image/png' && $image['type']!='image/jpeg' || (count($image['name']))==0) {
			if (!empty($text)) {
				$this->Insert('posts',['user_id'=>$id,'img_url'=>"",'post'=>$text,'date'=>$date],$id);
			}
		} else if(empty($text)){
			if (!($image['type']!='image/png' && $image['type']!='image/jpeg' || (count($image['name']))==0)){
				$this->Insert('posts',['user_id'=>$id,'img_url'=>$hasce,'post'=>"",'date'=>$date],$id);
			}
		} else {
			$this->Insert('posts',['user_id'=>$id,'img_url'=>$hasce,'post'=>$text,'date'=>$date],$id);
		}
		header('location:newsfeed.php');
	}
	function showposts(){
		if (!empty($_POST['fid'])) {
			$id = $_POST['fid'];
		} else {
			$id = $_SESSION['user']['id'];
		}
		// $name = $_SESSION['user']['name'];
		// $surname = $_SESSION['user']['surname'];
		// $avatar = $_SESSION['user']['avatar'];
		// $id = $_POST['ptid'];
		if ($id!=0) {
			$info = $this->take2('name,surname,avatar','datasoc','id',$id);
			$info = $info[0];
			$print = $this->take3('post,img_url,date,id','posts','user_id',$id);
			for ($i=0; $i < count($print); $i++) { 
				$print[$i][2] = $this->postime($print[$i][2]);
				array_push($print[$i],$info[0],$info[1],$info[2]);
				$print[$i][7] = $this->count_mypost_like($print[$i][3]);
				$print[$i][8] = $this->count_mypost_dislike($print[$i][3]);
				if($this->find('likes', ['user_id'=>$id,'post_id'=>$print[$i][3]])){
					$print[$i][9] = 'yes';
				} else {
					$print[$i][9] = 'no';
				}
				if($this->find('dislikes', ['user_id'=>$id,'post_id'=>$print[$i][3]])){
					$print[$i][10] = 'yes';
				} else {
					$print[$i][10] = 'no';
				}
				$print[$i][11] = $this->like_peoples_l($print[$i][3]);
				$print[$i][12] = $this->dislike_peoples_l($print[$i][3]);
				$print[$i][13] = $this->show_po_com($print[$i][3],3);
				$print[$i][14] = $id;
				$print[$i][15] = $this->pstcomcnt($print[$i][3]);
			}
			$print = json_encode($print);
			print_r($print);
		}
	}
	function showfrposts(){
		$id = $_SESSION['user']['id'];
		$print = $this->showfrndpost($id,10);
		for ($i=0; $i < count($print); $i++) { 
			if($this->find('likes', ['user_id'=>$id,'post_id'=>$print[$i][7]])){
				$print[$i][10] = 'yes';
			} else {
				$print[$i][10] = 'no';
			}
			if($this->find('dislikes', ['user_id'=>$id,'post_id'=>$print[$i][7]])){
				$print[$i][11] = 'yes';
			} else {
				$print[$i][11] = 'no';
			}
			$print[$i][6] = $this->postime($print[$i][6]);
			$print[$i][8] = $this->count_post_like($print[$i][7])[0][0];
			$print[$i][9] = $this->count_post_dislike($print[$i][7])[0][0];
			$print[$i][12] = $this->like_peoples_l($print[$i][7]);
			$print[$i][13] = $this->dislike_peoples_l($print[$i][7]);
			$print[$i][14] = $id;
			$print[$i][15] = $this->show_po_com($print[$i][7],3);
			$print[$i][16] = $_SESSION['user']['avatar'];
			$print[$i][17] = $this->pstcomcnt($print[$i][7])[0][0];
		}
		$print = json_encode($print);
		print_r($print);
	}
	function likethispost(){
		$id = $_SESSION['user']['id'];
		$idpost = $_POST['idpost'];
		$this->Insert('likes',['user_id'=>$id,'post_id'=>$idpost]);
		if ($this->selectldl('dislikes',$id,$idpost)) {
			$this->deleteldl('dislikes',$id,$idpost);
		}
		print 'ok';
	}
	function likethispost_undo(){
		$id = $_SESSION['user']['id'];
		$idpost = $_POST['idpost'];
		$this->deleteldl('likes',$id,$idpost);
		print 'ok';
	}
	function dislikethispost(){
		$id = $_SESSION['user']['id'];
		$idpost = $_POST['idpost'];
		$this->Insert('dislikes',['user_id'=>$id,'post_id'=>$idpost]);
		if ($this->selectldl('likes',$id,$idpost)) {
			$this->deleteldl('likes',$id,$idpost);
		}
		print 'ok';
	}
	function dislikethispost_undo(){
		$id = $_SESSION['user']['id'];
		$idpost = $_POST['idpost'];
		$this->deleteldl('dislikes',$id,$idpost);
		print 'ok';
	}
	function chechklikespost(){
		$id = $_SESSION['user']['id'];
		$print = $this->take2('post_id','likes','user_id',$id);
		$print = json_encode($print);
		print_r($print);
	}
	function openmoreposts(){
		$id = $_SESSION['user']['id'];
		$ava = $_SESSION['user']['avatar'];
		$count = $_POST['count_post'];
		$print = $this->showfrndpost($id,$count);
		for ($i=0; $i < count($print); $i++) { 
			if($this->find('likes', ['user_id'=>$id,'post_id'=>$print[$i][7]])){
				$print[$i][10] = 'yes';
			} else {
				$print[$i][10] = 'no';
			}
			if($this->find('dislikes', ['user_id'=>$id,'post_id'=>$print[$i][7]])){
				$print[$i][11] = 'yes';
			} else {
				$print[$i][11] = 'no';
			}
			$print[$i][6] = $this->postime($print[$i][6]);
			$print[$i][8] = $this->count_post_like($print[$i][7])[0][0];
			$print[$i][9] = $this->count_post_dislike($print[$i][7])[0][0];
			$print[$i][12] = $this->show_po_com($print[$i][7],3);
			$print[$i][13][0] = $id;
			$print[$i][13][1] = $ava;
			$print[$i][14] = $this->pstcomcnt($print[$i][7])[0][0];
			$print[$i][15] = $this->pstcomcnt($print[$i][7])[0][0];
		}
		$print = json_encode($print);
		print_r($print);
	}
	function openmorecomm(){
		$pid = $_POST['pid'];
		$count = $_POST['count_com'];
		$print = $this->show_po_com($pid,$count+3);
		$print[0][5] = $this->pstcomcnt($pid)[0][0];
		$print = json_encode($print);
		print_r($print);
	}
	function showmessages(){
		$id = $_SESSION['user']['id'];
		$print = $this->showfrn('id,name,surname,avatar,cover',$id);
		$print = json_encode($print);
		print_r($print);
	}
	function commentpost(){
		$id = $_SESSION['user']['id'];
		$name = $_SESSION['user']['name'];
		$surname = $_SESSION['user']['surname'];
		$avatar = $_SESSION['user']['avatar'];
		$pid = $_POST['pid'];
		$com = $_POST['com'];
		$this->Insert('comments',['user_id'=>$id,'post_id'=>$pid,'comment'=>$com]);
		$print = [];
		$print[] = [$id,$name,$surname,$avatar];
		$print = json_encode($print);
		print_r($print);
	}
	function showmessages_with_p(){
		$id = $_SESSION['user']['id'];
		$pid = $_POST['pid'];
		$print = $this->showmes_with_p($id,$pid);
		$print[0][4] = $_SESSION['user']['id'];
		$print = json_encode($print);
		print_r($print);
	}
	function send_mess_p(){
		$id = $_SESSION['user']['id'];
		$pid = $_POST['pid'];
		$mess = $_POST['message'];
		$name = $_SESSION['user']['name'];
		$surname = $_SESSION['user']['surname'];
		$avatar = $_SESSION['user']['avatar'];
		// $date = date("l")." | ".date("G:i:sa");
		$this->Insert('messages',['user1_id'=>$id,'user2_id'=>$pid,'message'=>$mess]);
		$print[] = [$name,$surname,$avatar];
		$print = json_encode($print[0]);
		print_r($print);
	}
	function take_friend_info(){
		$id = $_SESSION['user']['id'];
		$fid = $_POST['fid'];
		$print = $this->showfrn('*',$id);
		$print = json_encode($print);
		print_r($print);
	}
	function fr_page_info(){
		$id = $_SESSION['friendid'];
		// $fid = $_SESSION['friendid'];
		// $print = $this->take2('*','datasoc','id',$_SESSION['userf']['id']);
		$print = $this->take2('id,name,surname,avatar,cover','datasoc','id',$id);
		$print = json_encode($print);
		print_r($print);
		// $_SESSION['userf']['id'] = $print[0][0];
		// $_SESSION['userf']['name'] = $print[0][1];
		// $_SESSION['userf']['surname'] = $print[0][2];
		// $_SESSION['userf']['avatar'] = $print[0][6];
		// $_SESSION['userf']['cover'] = $print[0][7];
		// $print = json_encode($print);
		// print_r($print);
	}
	function myfrcount(){
		$id = $_SESSION['user']['id'];
		$print = $this->myfrc($id);
		$print = json_encode($print);
		print_r($print);
	}
	function del_this_post(){
		$pid = $_POST['pid'];
		$this->deleteitem('posts','id',$pid);
	}
	function edit_this_post(){
		$pid = $_POST['pid'];
	}
	

}

$x = new Controller;

?>