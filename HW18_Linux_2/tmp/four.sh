#!/bin/bash

for param in $@
do
	IN_PARAM=$(echo "$param" | cut -f1 -d"=")
	CONTENT_PARAM=$(echo "$param" | cut -f2 -d"=")
	case "$IN_PARAM" in
		--url) MY_URL=$CONTENT_PARAM;;
		--word) SEARCH_WORD=$CONTENT_PARAM;;
		--file) FILE_PATH=${CONTENT_PARAM/'~'/'$HOME'};;
	esac
done

RES_URL=$(curl $MY_URL)

COUNT_LINES=$(grep -ic "$SEARCH_WORD" <<< "$RES_URL")

NUMBERS_STR=$(grep -in "$SEARCH_WORD" <<< "$RES_URL" | cut -f1 -d":")


VAR=""
count=1
for ELEMENT in $NUMBERS_STR
do
	if [ $count -lt $COUNT_LINES ]
		then
			VAR+="$ELEMENT, "
			count=$((count + 1))
		else
			VAR+="$ELEMENT"
			count=$((count + 1))
	fi
done

if [ -z $FILE_PATH ]
	then
		echo "$SEARCH_WORD: $COUNT_LINES [$VAR]"
	else
		#FILE_PATH=${$FILE_PATH/'~'/'$HOME'}
		exec echo "$SEARCH_WORD: $COUNT_LINES [$VAR]" >> $FILE_PATH
fi
