select
	 concat('This is ',
	 name, if(gender = 'm', ', he', ', she'),
	 ' has email ', email) as info 
from persons;
