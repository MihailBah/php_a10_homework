#!/bin/bash

for param in $@
do
	NAME_PARAM=$(echo "$param" | cut -f1 -d"=");
	CONTENT_PARAM=$(echo "$param" | cut -f2 -d"=");
	case "$NAME_PARAM" in
		--url) MY_URL=$CONTENT_PARAM;;
		--word) SEARCH_WORD=$CONTENT_PARAM;;
		--file) FILE_PATH=$CONTENT_PARAM;;
	esac
done

if [ -z $MY_URL ] || [ -z $SEARCH_WORD ]
	then
		echo "ERROR, check parameters!";
	else
		#RES_URL=$(curl $MY_URL); # if need use curl more then one time, use this.
		#COUNT_WORD=$(echo "$RES_URL" | grep -o "$SEARCH_WORD" | wc -l);
		# Words cnt. Add to grep -i, register off. Uncomment RES_URL to use this.

		arr_num_str=( $(curl "$MY_URL" | grep -in "$SEARCH_WORD" | cut -f1 -d":") );
		# chenge "curl $MY_URL" to "echo $RES_URL" and uncomment RES_URL if need use curl more then one time.

		arr_num_str_lenght=${#arr_num_str[@]}; # Lines cnt

		CONCAT_NUM=$(echo ${arr_num_str[@]} | sed "s/ /, /g");

		if [ -z $FILE_PATH ]
			then
				echo "$SEARCH_WORD: $arr_num_str_lenght [$CONCAT_NUM]";
			else
				echo "$SEARCH_WORD: $arr_num_str_lenght [$CONCAT_NUM]" >> $FILE_PATH;
				# to skeep error(add this "2>/dev/null" before ">>")
		fi
fi
