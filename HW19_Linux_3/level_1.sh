#!/bin/bash

for param in $@
do
	IN_PARAM=$(echo "$param" | cut -f1 -d"=")
	CONTENT_PARAM=$(echo "$param" | cut -f2 -d"=")
	case "$IN_PARAM" in
		--host) MY_HOST=$CONTENT_PARAM;;
		--file) FILE=$CONTENT_PARAM;;
	esac
done

if [ -z $MY_HOST ] || [ -z $FILE ]
	then
		echo "ERROR, check parameters!";
	else
		scp -p $FILE $MY_HOST:~;
fi