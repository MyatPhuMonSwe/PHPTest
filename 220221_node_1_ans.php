<?php

// クレジットカード総数の入力を受け入れる
do {
    print_r('クレジットカードの総数を入力してください :');
    $count = intval(fgets(STDIN));
} while ($count <= 0 || $count > 100);

$X = [];
for ($i = 0; $i < $count; $i++) {

    // クレジットカード番号の入力をn回受け入れる
    do {
        print_r($i + 1 . '番目のクレジットカード番号を入力してください :');
        $card_number = trim(fgets(STDIN));
        $card_number = str_split($card_number);
    } while (sizeof($card_number) != 16 || end($card_number) != 'X');

    // 操作確認
    $total = 0;
    for ($j = 0; $j < 15; $j++) {
        $N = $card_number[$j];
        if ($j % 2 == 0) {
            $N = $N * 2;
            if ($N > 9) {
                $N1 = $N - 10;
                $N2 = (int)($N / 10);
                $N = $N1 + $N2;
            }
        }
        $total += $N;
    }
    $result = (10 - $total % 10) % 10;
    $X[$i] = $result;
}

// 出力を表示
for ($i = 0; $i < sizeof($X); $i++) {
    echo "\n" . $X[$i];
}
?>

