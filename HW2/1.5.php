<?php

echo "Neo if you want diskover true, press 1!\n";
$in_line = fopen ("php://stdin","r");
$input = fgets($in_line);

echo ($input == 1) ? "Your choice is to stay in Wonderland, and I will show you how deep the rabbit hole is.\n"
	: "You chose to wake up in a good bed to live as before.\n";