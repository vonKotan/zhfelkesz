select takarito.nev as nev , count(epulet.id)as count, sum(epulet.emelet)as sum 
from takarito 
inner join epulet on epulet.id=takarito.epulet_id
where takarito.kor>40
group by takarito .nev
; 