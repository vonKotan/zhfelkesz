select arufeltolto.nev as nev ,count(kisbolt_id)as count,sum(kisbolt.terulet) as sum
from arufeltolto
inner join kisbolt on kisbolt.id=arufeltolto.kisbolt_id
where arufeltolto.fizetes>250000
group by arufeltolto.nev
;
ALTER TABLE arufeltolto ADD COLUMN kor int;
ALTER TABLE arufeltolto MODIFY COLUMN  kisbolt_id int NULL;



