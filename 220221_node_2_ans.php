<?php

//ボード横の長さの入力を受け入れる
do {
    print_r('ボードの横の長さを入力してください :');
    $number = intval(fgets(STDIN));
} while ($number <= 0 || $number > 100);

// コインの並びを表す文字列の入力を受け入れる
do {
    print_r('コインの並びを表す文字列を入力してください :');
    $input_string = trim(fgets(STDIN));
    $input_string = str_split($input_string);

    //「w」または「b」のみの入力をチェック
    $flag = true;
    for ($j = 0; $j < sizeof($input_string); $j++) {
        if ($input_string[$j] != "w" && $input_string[$j] != "b")
            $flag = false;
    }
} while ($flag == false || sizeof($input_string) != $number);

$omote = "b";
$ura = "w";

//1文字目と最後の文字がwなら全部ｗになるので
if ($input_string[0] == $ura && $input_string[$number - 1] == $ura)
    $black_count_result = 0;

//1文字目と最後の文字がbなら全部bなので
else if ($input_string[0] == $omote && $input_string[$number - 1] == $omote)
    $black_count_result = $number;

else {
    echo $input_string[0];
    echo $ura;
    //一文字目がｗなら最初のｂのインデックから反転させていく
    if ($input_string[0] == $ura) {
        echo "inside ura";
        $start = array_search($omote, $input_string, true);
        $last = rightSearch($input_string, $ura);
        echo "start" . $start;
        echo "last" . $last;
        turn($input_string, $ura, $omote, $start, $last);
        $black_count_result = getSize($input_string, $omote);
        echo "inside ura";
    } //一文字目がｂなら最初のｗのインデックスから反転させていく
    else {
        echo "inside omote";
        $start = array_search($ura, $input_string, true);
        $last = rightSearch($input_string, $omote);
        turn($input_string, $ura, $omote, $start, $last);
        $black_count_result = getSize($input_string, $omote);
    }
}
echo "\n$black_count_result\n";

function turn($input_string, $u, $o, $start, $last)
{
    echo "\n start, last". $start . ',' . $last;
    if ($start > $last)
        return true;
    else {
        for ($i = 0; $i < sizeof($input_string); $i++) {
            if ($input_string[$i] == "b") //表なら裏に
                $input_string[$i] = "w";
            else
                $input_string[$i] = "b";//裏なら表に
        }
//        $start = array_search($o, $input_string, true);
//        $last = rightSearch($input_string, $u);
//        turn($input_string, $u, $o, $start, $last);
    }
}

function getSize($input_string, $omote)
{
    $count = 0;
    for ($i = 0; $i < sizeof($input_string); $i++) {
        if ($input_string[$i] == $omote)
            $count += 1;
        echo "count: " . $input_string[$i];
    }
    return $count;
}

function rightSearch($input_string, $value)
{
    echo "Start!!";
    $count = sizeof($input_string);
    while($count > 0)
    {
        if ($input_string[$count - 1] == $value)
            return $count - 1;
        $count--;
    }
}
?>
