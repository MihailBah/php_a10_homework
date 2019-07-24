select concat(
	p.name, ' -> ', 
	p1.name, ' -> ', 
	p2.name, ' -> ', 
	p3.name) Tree 
from persons p 
	inner join persons p1 on(p.id=p1.parent_id) 
	inner join persons p2 on (p1.id=p2.parent_id) 
	inner join persons p3 on(p2.id=p3.parent_id);
