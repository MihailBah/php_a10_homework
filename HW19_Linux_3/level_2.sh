#!/bin/bash

MY_HOST=mihailbahmut@students.a-level.com.ua;

for param in $@
do
	IN_PARAM=$(echo "$param" | cut -f1 -d"=")
	CONTENT_PARAM=$(echo "$param" | cut -f2 -d"=")
	case "$IN_PARAM" in
		--host) MY_HOST=$CONTENT_PARAM;;
	esac
done


FILE_NAME=$(date +"%F_%H_%M_%S_%N").png;
DEST_PATH=$(echo "$MY_HOST:~/public_html/screenshots/");

xfce4-screenshooter -w -o cat > /tmp/$FILE_NAME; # -f full screen
scp -p /tmp/$FILE_NAME $DEST_PATH;
echo "screenshots.$MY_HOST/$FILE_NAME" | sed "s/@students/.php/" | xclip -selection clipboard;
rm /tmp/$FILE_NAME;
