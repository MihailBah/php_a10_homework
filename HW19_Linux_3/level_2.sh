#!/bin/bash

for param in $@
do
	IN_PARAM=$(echo "$param" | cut -f1 -d"=")
	CONTENT_PARAM=$(echo "$param" | cut -f2 -d"=")
	case "$IN_PARAM" in
		--host) MY_HOST=$CONTENT_PARAM;;
		#--file) FILE=$CONTENT_PARAM;;
	esac
done

FILE_NAME=$(date +"%F_%H_%M_%S_%N").png

xfce4-screenshooter -f -o cat > $FILE_NAME
scp -p $FILE_NAME $MY_HOST:~/public_html/screenshots/;
sleep 30;
rm $FILE_NAME;


#echo $FILE_NAME
#echo "screenshots.mihailbahmut.php.a-level.com.ua/$FILE_NAME"
#http://screenshots.mihailbahmut.php.a-level.com.ua/1.jpg
