<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

echo"enter the amount to be issued: ";
$sum = (int)fgets(STDIN);

while (true) {
    while ($sum >= 5){
        if ($sum >= 500){
            $to_issue .= (intdiv($sum, 500)) . " bills of 500\n";
            $cnt_bills += intdiv($sum, 500);
            $sum = $sum % 500;
        } elseif ($sum >= 200){
            $to_issue .= (intdiv($sum, 200)) . " bills of 200\n";
            $cnt_bills += intdiv($sum, 200);
            $sum = $sum % 200;
        } elseif ($sum >= 100){
            $to_issue .= (intdiv($sum, 100)) . " bills of 100\n";
            $cnt_bills += intdiv($sum, 100);
            $sum = $sum % 100;
        } elseif ($sum >= 50){
            $to_issue .= (intdiv($sum, 50)) . " bills of 50\n";
            $cnt_bills += intdiv($sum, 50);
            $sum = $sum % 50;
        } elseif ($sum >= 20){
            $to_issue .= (intdiv($sum, 20)) . " bills of 20\n";
            $cnt_bills += intdiv($sum, 20);
            $sum = $sum % 20;
        } elseif ($sum >= 10){
            $to_issue .= (intdiv($sum, 10)) . " bills of 10\n";
            $cnt_bills += intdiv($sum, 10);
            $sum = $sum % 10;
        } elseif ($sum >= 5){
            $to_issue .= (intdiv($sum, 5)) . " bills of 5\n";
            $cnt_bills += intdiv($sum, 5);
            $sum = $sum % 5;
        }
    }
    if ($cnt_bills <= 40){
        echo"To issue:\n\n$to_issue\nfor issuing $sum no bills\n";
        break;
    } else {
        echo "too many bills, enter a different amount: ";
        $cnt_bills = 0;
        $to_issue = '';
        $sum = (int)fgets(STDIN);
    }
}

