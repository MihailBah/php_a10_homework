#!/bin/bash
# Написать скрипт который будет раз в 5 минут делать бэкап на сервер.

# На сервер должен прилетать бэкап в архивированом виде, желательно в tarball формате
# Скрипт должен уметь бэкапить те папки и/или файлы которые указывать будет пользователь.

# PS: Не надо архивировать 100500 гб, чем меньше тем лучше :D

#Так же можно запаковать на локали архив и через ssh прокинуть его на сервер и там уже распаковать

for param in $@
do
	IN_PARAM=$(echo "$param" | cut -f1 -d"=")
	CONTENT_PARAM=$(echo "$param" | cut -f2 -d"=")
	case "$IN_PARAM" in
		--file) MY_PATH=$CONTENT_PARAM;;
	esac
done

#MY_PATH=/home/dell/Documents/php_a10_homework/HW19_Linux_3/test

#FILE_NAME=$(echo "$MY_PATH.tar.gz" | sed "s/\//_/g")
FILE_NAME=$(date +"%F_%H_%M_%S_%N").tar.gz;

tar -cz $MY_PATH | ssh mihailbahmut@students.a-level.com.ua "cd ~/public_html/backup && cat > $FILE_NAME"

# tar -czvf -c TAR -z GZ -v VISUAL -f FILE
# tar -zxvf -x UNPACK, -C dir to unpack
# tar -tvf show content
