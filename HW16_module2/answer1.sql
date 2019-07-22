select 
	concat('We have ',
	 count(gender), if(gender = 'm', ' boys!', ' girls!')) as 
	 `Gender information:`
from persons group by gender;
