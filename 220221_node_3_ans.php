<?php

//ある時刻の入力を受け入れる
do {
    print_r('0時から23時までのある時刻を数字のみで指定してください :');
    $specific_time = intval(fgets(STDIN));
} while ($specific_time < 0 || $specific_time > 23);

// 開始時刻の入力を受け入れる
do {
    print_r('開始時刻を0時から23時までの数字のみで指定してください :');
    $start_time = intval(fgets(STDIN));
} while ($start_time < 0 || $start_time > 23);

// 終了時刻の入力を受け入れる
do {
    print_r('終了時刻を0時から23時までの数字のみで指定してください :');
    $end_time = intval(fgets(STDIN));
} while ($end_time < 0 || $end_time > 23);

//  操作確認
$result = '';
if ($end_time >= $start_time) {
    if (($start_time <= $specific_time && $specific_time <= $end_time) || ($start_time == $end_time && $end_time == $specific_time))
        $result = 'true';
} else {
    if ($end_time >= $specific_time)
            $result = 'true';
}

// 出力を表示
if ($result == true)
    echo($specific_time . "時は" . $start_time . "時から" . $end_time . "時までに含まれます。");
else
    echo("{$specific_time}時は{$start_time}時から{$end_time}時までに含まれません。");
?>
