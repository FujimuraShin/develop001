<?php

//◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆
//データベースからデータを取得

 //DBに接続
 $dsn="mysql:dbname=zoom_db;host=localhost";
 $username="root";
 $password="newyork25";

 //SELECT
try{
	$db=new PDO($dsn,$username,$password);

	$sql="SELECT * FROM customers";
	$sth=$db->query($sql);
	$arrayList=$sth->fetchAll(PDO::FETCH_ASSOC);

	foreach($arrayList as $value){
		//echo $value['name'];
		$member_name[]=$value['name'];
		$member_add[]=$value['address'];
		$regi_year[]=$value['year'];
		$regi_month[]=$value['month'];
		$regi_day[]=$value['day'];
		$start_time[]=$value['start_time'];

		//echo $member_name;
		//echo $member_add;
		//echo $year;
		//echo $month;
		//echo $day;
		//echo $start_time;
	}

}catch(PDOException $e){
	echo "失敗;".$e->getMessage()."\n";
	exit();
}

//◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆
//かれんだーｇ
//$year=htmlspecialchars($_POST['post_year'],ENT_QUOTES);
//$month=htmlspecialchars($_POST['post_month'],ENT_QUOTES);
//$day=htmlspecialchars($_POST['post_day'],ENT_QUOTES);


    //タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

//表示させる年月を設定　↓これは現在の月
$year = date('Y');
$month = date('m');

//月末日を取得
$end_month = date('t', strtotime($year.$month.'01'));

//スケジュール設定 日付をキーに
$arySchedule = [];
//$arySchedule[5] = '友達とショッピング';
//$arySchedule[10] = '上司と打ち合わせ';
//$arySchedule[15] = '大阪へ日帰り旅行';
//$arySchedule[20] = '歯医者に行く';
//$arySchedule[25] = '誕生日';

//var_dump($start_time);

for($i=0;$i<=count($regi_day);$i++){
	$arySchedule[$regi_day[$i]]=$start_time[$i]."時から。";
}


$aryCalendar = [];

//1日から月末日までループ
for ($i = 1; $i <= $end_month; $i++){
    $aryCalendar[$i]['day'] = $i;
    $aryCalendar[$i]['week'] = date('w', strtotime($year.$month.sprintf('%02d', $i)));
    if(isset($arySchedule[$i])){
        $aryCalendar[$i]['text'] = $arySchedule[$i];
    }else{
        $aryCalendar[$i]['text'] = '';
    }
}

$aryWeek = ['日', '月', '火', '水', '木', '金', '土'];
?>

<table class="calender_column">
<?php foreach($aryCalendar as $value){ ?>
    <?php if($value['day'] != date('j')){ ?>
    <tr class="week<?php echo $value['week'] ?>">
    <?php }else{ ?>
    <tr class="today">
    <?php } ?>
        <td>
            <?php echo $value['day'] ?>(<?php echo $aryWeek[$value['week']] ?>)
        </td>
        <td>
            <?php echo $value['text'] ?>
        </td>
    </tr>
<?php } ?>
</table>

<style type="text/css">
table.calender_column{
    width: 100%;
}

table.calender_column td{
    padding: 5px;
    border: 1px solid #CCC;
}

/* 日曜日 */
table.calender_column tr.week0{
    background-color: #ffefef;
    color: #FF0000;
}

/* 土曜日 */
table.calender_column tr.week6{
    background-color: #ededff;
    color: #0000FF;
}

/* 今日 */
table.calender_column tr.today{
    background-color: #fbffa3;
    font-weight: bold;
}

table.calender_column td:first-child{
    width: 20%;
    text-align: center;
}

table.calender_column td:last-child{
    width: 80%;
    color: #111111;
}



</style>