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


// 年月を取得する
$ym_now = date("Ym");
$y = substr($ym_now, 0, 4);
$m = substr($ym_now, 4, 2);
?>
<table border="1">
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
<?php
//$y = 2012;
//$m = 2;

// 1日の曜日を取得
$wd1 = date("w", mktime(0, 0, 0, $m, 1, $y));
 
// その数だけ空白を表示
for ($i = 1; $i <= $wd1; $i++) {
    echo "<td>　</td>";
}
 
$d = 1;
var_dump($day);
while (checkdate($m, $d, $y)) {

   if(in_array($d,$day)){
       echo $d;
   }

    echo "<td>$d</td>";
    
    


    // 今日が土曜日の場合は…
if (date("w", mktime(0, 0, 0, $m, $d, $y)) == 6) {
    // 週を終了
    echo "</tr>";
 
    // 次の週がある場合は新たな行を準備
    if (checkdate($m, $d + 1, $y)) {
        echo "<tr>";
    }
}


    $d++;
}

// 最後の週の土曜日まで移動
$wdx = date("w", mktime(0, 0, 0, $m + 1, 0, $y));
for ($i = 1; $i < 7 - $wdx; $i++) {
    echo "<td>　</td>";
}
?>
</tr>
</table>