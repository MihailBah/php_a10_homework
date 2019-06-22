<?php

echo "Enter Fizz, Buzz end EndLine digits with a space: ";

sscanf(fgets(STDIN), "%d %d %d\n", $fizz, $buzz, $end_line);

for ($x = 1; $x <= $end_line; $x++) {
    echo ($x % $fizz && $x % $buzz ? "$x " : ($x % $fizz ? "B " : ($x % $buzz ? "F ": "FB ")));
};