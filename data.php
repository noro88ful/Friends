<?php 
class Database{
	protected $db;
	function __construct(){
		$this->db = new mysqli('localhost','cw80790_friends','eVgc3DQ4','cw80790_friends');
		$this->db->set_charset('utf8-general');
	}

	function showData(){
		return $this->db->query("SHOW DATABASES")->fetch_all();
	}
	function showTables(){
		return $this->db->query("SHOW TABLES")->fetch_all();
	}
	function findAll($tbl){
		return $this->db->query("SELECT * FROM $tbl")->fetch_all();
	}
	function requestcount($id){
		return $this->db->query("SELECT count(*) as count from request WHERE user2_id = $id")->fetch_all();
	}
	function requestpeoples($id){
		return $this->db->query("SELECT * from datasoc 
								 WHERE id in (SELECT user1_id from request WHERE user2_id = $id)")->fetch_all();
	}
	function take($data,$tbl){
		return $this->db->query("SELECT $data FROM $tbl")->fetch_all();
	}
	function take2($data,$tbl,$where,$value){
		return $this->db->query("SELECT $data FROM $tbl WHERE $where = '$value'")->fetch_all();
	}
	function take3($data,$tbl,$where,$value){
		return $this->db->query("SELECT $data FROM $tbl WHERE $where = '$value' ORDER BY id DESC")->fetch_all();
	}
	function selpeop($id,$pid){
		return $this->db->query("SELECT * FROM request WHERE user2_id = $id && user1_id = $pid")->fetch_all();
	}
	function deletereq($tbl,$id,$pid){
		return $this->db->query("DELETE FROM $tbl WHERE (user1_id = $id && user2_id = $pid) || (user2_id = $id && user1_id = $pid)");
	}
	function deleteitem($tbl,$where,$data){
		return $this->db->query("DELETE FROM $tbl WHERE $where = '$data'");
	}
	function deleteldl($tbl,$id,$pid){
		return $this->db->query("DELETE FROM $tbl WHERE (user_id = $id && post_id = $pid)");
	}
	function selectldl($tbl,$id,$pid){
		return $this->db->query("SELECT * FROM $tbl WHERE (user_id = $id && post_id = $pid)");
	}

	function find($tbl, $where){
		$query = "SELECT * FROM $tbl WHERE ";
		foreach ($where as $key => $value) {
			$query.= "$key = '$value' && ";
		}
		$query = substr($query,0,strlen($query)-4);
		return $this->db->query($query)->fetch_all(true);
	}

	function Insert($tbl, $data){
		$key = array_keys($data);
		$value = array_values($data);
		$key = implode($key,",");
		$value = implode($value,"','");
		$query = "Insert Into $tbl($key) Values ('$value')";
		$this->db->query($query);
		return $this->db->insert_id;
	}

	function Update($tbl, $data, $where){
		$this->db->query("UPDATE $tbl SET $data=0");
		$this->db->query("UPDATE $tbl SET $data=1 WHERE id = $where");
	}
	function Update2($tbl, $data, $what, $where){
		$query = "UPDATE $tbl SET ";
		$query2 = " WHERE ";
		foreach ($data as $key => $value) {
			$query.= "$key = '$value', ";
		}
		$query = substr($query,0,strlen($query)-2);
		$query2.= "$what = '$where'";
		$query.=$query2;
		return $this->db->query($query);
	}
	function like2($email){
		return $this->db->query("SELECT * FROM datasoc where email LIKE '$email%'")->fetch_all(true);
	}
	function likedata($data,$email){
		return $this->db->query("SELECT $data FROM datasoc where email LIKE '$email%'")->fetch_all();
	}
	function likedata2($sel,$from,$like){
		$query = "SELECT $sel FROM $from WHERE ";
		foreach ($like as $e => $s) {
			$s = $this->db->real_escape_string($s);
			$query.= "$e LIKE '%$s%' || ";
		}
		$query = substr($query,0,strlen($query)-3);
		return $this->db->query("$query")->fetch_all();
	}
	function showfrn($data,$id){
		return $this->db->query("SELECT $data FROM datasoc WHERE id in (SELECT user1_id FROM friend WHERE user2_id = $id) || id in (SELECT user2_id FROM friend WHERE user1_id = $id)")->fetch_all();
	}
	function showfrndpost($id,$lim){
		return $this->db->query("SELECT user_id,img_url,post,name,surname,avatar,date,posts.id FROM posts JOIN datasoc ON user_id = datasoc.id WHERE user_id in (SELECT user1_id FROM friend WHERE user2_id = $id) || user_id in (SELECT user2_id FROM friend WHERE user1_id = $id) ORDER BY id DESC LIMIT $lim ")->fetch_all();
	}
	function postime($time){
		$x = time()-$time;
		$d = $x/86400;
		$s1 = $x-(floor($d)*86400);
		$h = $s1/3600;
		$s2 = $s1-(floor($h)*3600);
		$m = $s2/60;
		$s = $s2-(floor($m)*60);
		$tarr = [];
		if (floor($d)!=0) {
			array_push($tarr,floor($d)."օր ");
		}
		if (floor($h)!=0) {
			array_push($tarr,floor($h)."ժ ");
		}
		if (floor($m)!=0) {
			array_push($tarr,floor($m)."ր ");
		}
		if (floor($s)!=0) {
			array_push($tarr,floor($s)."վ առաջ");
		}
		return $tarr;
	}
	function count_mypost_like($id){
		return $this->db->query("SELECT count(*) FROM likes WHERE post_id in (SELECT id FROM posts WHERE id = $id)")->fetch_all();
	}
	function count_mypost_dislike($id){
		return $this->db->query("SELECT count(*) FROM dislikes WHERE post_id in (SELECT id FROM posts WHERE id = $id)")->fetch_all();
	}
	function count_post_like($post_id){
		return $this->db->query("SELECT count(*) FROM likes WHERE post_id = $post_id")->fetch_all();
	}
	function count_post_dislike($post_id){
		return $this->db->query("SELECT count(*) FROM dislikes WHERE post_id = $post_id")->fetch_all();
	}
	function like_peoples_l($id){
		return $this->db->query("SELECT name,surname,avatar,id FROM datasoc WHERE id in (SELECT user_id FROM likes WHERE post_id = $id)")->fetch_all();
	}
	function dislike_peoples_l($id){
		return $this->db->query("SELECT name,surname,avatar,id FROM datasoc WHERE id in (SELECT user_id FROM dislikes WHERE post_id = $id)")->fetch_all();
	}
	function show_po_com($id,$lim){
		return $this->db->query("SELECT name,surname,avatar,datasoc.id,comment FROM comments JOIN datasoc ON user_id = datasoc.id WHERE post_id = $id ORDER BY comments.id LIMIT $lim")->fetch_all();
	}
	function showmes_with_p($id,$pid){
		return $this->db->query("SELECT id,message,user1_id,user2_id FROM messages WHERE (user1_id = $id && user2_id = $pid) || (user1_id = $pid && user2_id = $id)")->fetch_all();
	}
	function myfrc($id){
		return $this->db->query("SELECT count(*) from friend WHERE (user1_id = $id || user2_id = $id)")->fetch_all();
	}
	function pstcomcnt($pid){
		return $this->db->query("SELECT count(*) from comments WHERE post_id = $pid")->fetch_all();
	}

	// function likepass($email){
	// 	return $this->db->query("SELECT password FROM datasoc where email LIKE '$email%'")->fetch_all();
	// }
}