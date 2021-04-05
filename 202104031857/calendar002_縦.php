<?php

    //タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

//表示させる年月を設定　↓これは現在の月
$year = date('Y');
$month = date('m');

//月末日を取得
$end_month = date('t', strtotime($year.$month.'01'));

//スケジュール設定 日付をキーに
$arySchedule = [];
$arySchedule[5] = '友達とショッピング';
$arySchedule[10] = '上司と打ち合わせ';
$arySchedule[15] = '大阪へ日帰り旅行';
$arySchedule[20] = '歯医者に行く';
$arySchedule[25] = '誕生日';

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
