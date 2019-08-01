#!/bin/bash

for param in $@
do
	IN_PARAM=$(echo "$param" | cut -f1 -d"=")
	CONTENT_PARAM=$(echo "$param" | cut -f2 -d"=")
	case "$IN_PARAM" in
		--url) MY_URL=$CONTENT_PARAM;;
		--word) SEARCH_WORD=$CONTENT_PARAM;;
		--file) FILE_PATH=$CONTENT_PARAM;;
	esac
done

arr_num_str=( $(curl "$MY_URL" | grep -in "$SEARCH_WORD" | cut -f1 -d":") )

arr_num_str_lenght=${#arr_num_str[@]}

for ELEMENT in ${arr_num_str[@]::(($arr_num_str_lenght-1))}
do
	CONCAT_NUM+="$ELEMENT, "
done

CONCAT_NUM+="${arr_num_str[-1]}"

if [ -z $FILE_PATH ]
	then
		echo "$SEARCH_WORD: $arr_num_str_lenght [$CONCAT_NUM]"
	else
		exec echo "$SEARCH_WORD: $arr_num_str_lenght [$CONCAT_NUM]" >> $FILE_PATH #error > NULL (add first "2>/dev/null")
fi
