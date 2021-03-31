<?php

//変数の初期化

//前月、次月ボタンが押された時、GETで来る
if(empty($_GET['m'])){
	//現在の年月を取得
	$year=date('Y');
	$month=date('n');
}else{
	$m=$_GET['m'];
	$year=substr($m,0,4);
	$month=substr($m,5,6);

}

//投稿ボタンが押された時
if(!empty($_POST['post_year'] 
	&& $_POST['post_month'] 
	&& $_POST['post_day'])){

	$p_year=$_POST['post_year'];
	$p_month=$_POST['post_month'];
	$p_day=$_POST['post_day'];
	
}else{
	$p_year=$year;
	$p_month=$month;
	$p_day=date('d');
}

//投稿記録ボタンが押された時
//ここで、データベースに登録する
if(!empty($_POST['postComment'])){
	$text=$_POST['postComment'];
	//echo $text;
	
	$post_year=$_POST['post_year'];
	$post_month=$_POST['post_month'];
	$post_day=$_POST['post_day'];
	
	//データベースへの登録
	$mysqli=new mysqli('localhost','root','','calendar');
	
	if($mysqli->connect_errno){
		echo $mysqli->connect_errno.':'.$mysqli->connect_error;
	}
	
	$mysqli->set_charset('utf8');
	
	$sql="INSERT INTO post(year,month,day,comment,delFlag)
					VALUES('$post_year','$post_month','$post_day','$text',1);";
	$res=$mysqli->query($sql);
	
	$mysqli->close();

}else{
	$text=null;
}


//修正ボタンがされた時
if(!empty($_POST['update'])){
	
	$post_year=$_POST['post_year'];
	$post_month=$_POST['post_month'];
	$post_day=$_POST['post_day'];
	$comment=$_POST['postComment'];
	
	db_update($post_year,$post_month,$post_day,$comment);
	
}

//削除ボタンが押された時
if(!empty($_POST['delete'])){
	$post_year=$_POST['post_year'];
	$post_month=$_POST['post_month'];
	$post_day=$_POST['post_day'];
	$comment=$_POST['postComment'];
	
	db_delete($post_year,$post_month,$post_day);
}

	
	//月末日を取得
	$last_day=date('j',mktime(0,0,0,$month+1,0,$year));
	
	$calendar=array();
	$j=0;
	
	//月末日までループ
	for($i=1;$i<$last_day;$i++){
		
		//曜日を取得
		$week=date('w',mktime(0,0,0,$month,$i,$year));
		
		//1日の場合
		if($i==1){
			//1日目の曜日までループ
			for($s=1;$s<=$week;$s++){
				//前半に空文字をセット
				$calendar[$j]['day']='';
				$j++;
			}
		}
		
		//配列に日付をセット
		$calendar[$j]['day']=$i;
		$j++;
		
		//月末日の場合
		if($i==$last_day){
			//月末日から残りをループ
			for($e=1;$e<=6-$week;$e++){
				//後半に空文字をセット
				$calendar[$j]['day']='';
				$j++;
			}
		}
	}
	
	//DBのCRUDを関数化しておく
	function db_insert($year,$month,$day,$comment){
		//データベースへの登録
		$mysqli=new mysqli('localhost','root','','calendar');
	
		if($mysqli->connect_errno){
			echo $mysqli->connect_errno.':'.$mysqli->connect_error;
		}
	
		$mysqli->set_charset('utf8');
		
		$sql="INSERT INTO post(year,month,day,comment)
							VALUES('$year','$month','$day','$comment');";
		$res=$mysqli->query($sql);
		
		$mysqli->close();
		
		return $res;
		
	}
	
	function db_update($year,$month,$day,$comment){
		$mysqli=new mysqli('localhost','root','','calendar');
	
		if($mysqli->connect_errno){
			echo $mysqli->connect_errno.':'.$mysqli->connect_error;
		}
	
		$mysqli->set_charset('utf8');
		
		$sql="UPDATE post SET comment='$comment' 
						WHERE year='$year'AND month='$month'AND day='$day';";
		$res=$mysqli->query($sql);
		
		$mysqli->close();
		
	}
	
	
	function db_select($year,$month,$day){
		
		
		$mysqli=new mysqli('localhost','root','','calendar');
	
		if($mysqli->connect_errno){
			echo $mysqli->connect_errno.':'.$mysqli->connect_error;
		}
	
		$mysqli->set_charset('utf8');
		
		$sql="SELECT * FROM post WHERE year='$year'AND month='$month'AND day='$day';";
		
		$res=$mysqli->query($sql);
		
		$mysqli->close();
		
		//var_dump($res);
		
		foreach($res as $value){
			echo $value['comment'];
		}
		
	}
	
	function db_delete($year,$month,$day){
		$mysqli=new mysqli('localhost','root','','calendar');
	
		if($mysqli->connect_errno){
			echo $mysqli->connect_errno.':'.$mysqli->connect_error;
		}
	
		$mysqli->set_charset('utf8');
		
		$sql="DELETE FROM post WHERE year='$year' AND month='$month' AND day='$day';";
		
		$res=$mysqli->query($sql);
		
		$mysqli->close();
		
	}
	
?>

<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<title>PHPカレンダー</title>
	
	<style rel="stylesheet" type="text/css">
		table{
			widht:100%;
		}
		
		table th{
			bakcground:#eeeeee;
		}
		
		table th,
		table td{
			border:1px solid #cccccc;
			text-align:center;
			padding:5px;
		}
	
	</style>
	
</head>
<body>
	
	<p><a href="?m=<?php echo date('Ym',mktime(0,0,0,$month-1,1,$year))?>"><<前の月</a></p>
	<p><?php echo $year; ?>年<?php echo $month; ?>月のカレンダー</p>
	<p><a href="?m=<?php echo date('Ym',mktime(0,0,0,$month+1,1,$year));?>">次の月>></a></p>
<br>
<br>
<table>
    <tr>
        <th>日</th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th>土</th>
    </tr>
 
    <tr>
    <?php $cnt = 0; ?>
    <?php foreach ($calendar as $key => $value): ?>
 
        <td>
		<form method="post" action="">
        <?php $cnt++; ?>
        <?php echo $value['day']; ?>
			<?php if(!empty($value['day'])):?>
			<textarea>
					<?php db_select($year,$month,$value['day']);?>
			</textarea>
					
					
			<input type="submit" value="投稿">
			<input type="hidden" name="post_year" 
						value="<?php echo $year;?>">
			<input type="hidden" name="post_month"
						value="<?php echo $month;?>">
			<input type="hidden" name="post_day"
						value="<?php echo $value['day'];?>">
		<?php endif;?>
		</form>
        </td>
 
    <?php if ($cnt == 7): ?>
    </tr>
    <tr>
    <?php $cnt = 0; ?>
    <?php endif; ?>
 
    <?php endforeach; ?>
    </tr>
</table>

<form method="post" action="">
	<label><?php echo $p_year;?>年<?php echo $p_month;?>月<?php echo $p_day;?>日の投稿</label>
	<br/>
	<textarea name="postComment">
		<?php db_select($p_year,$p_month,$p_day);?>
	</textarea>
	
	<br/>
	<input type="hidden" name="post_year" value="<?php echo $p_year;?>">
	<input type="hidden" name="post_month" value="<?php echo $p_month;?>">
	<input type="hidden" name="post_day" value="<?php echo $p_day;?>">
	
	<input type="submit" name="submit" value="投稿する">
	<input type="submit" name="update" value="修正する">
	<input type="submit" name="delete" value="削除する">
	
	
</form>


	
</body>
</html>
	
	