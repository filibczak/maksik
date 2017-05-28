1. imiona i nzawiska bramkazy, tak jak się pisze
	SELECT 
	 concat(left(nazwisko,1),lower(substring(nazwisko,2))) AS Nazwisko,
	 concat(left(imie,1),lower(substring(imie,2))) AS Imie
	FROM `pPilkarze`
	WHERE funkcja = 'BRAMKARZ'
2. wszyscy zawodnicy legi warszawa zarabiaja lacznie:
	SELECT  round(sum(placa)) as "Łączne zarobki"
	FROM `pPilkarze`
	where klub = 8
3. ile zarabiaja zawodnicy poszczegulnych klubow
	SELECT
	 DISTINCT(nazwa) AS NazwaKlubu,
	 round(sum(placa),-3) AS LaczeZarobki,
	 round(avg(placa),-3) AS SrednieZarobki,
	count(imie) AS IlePilkarzy
	FROM `pPilkarze`
	join pKluby on pPilkarze.klub = pKluby.id_klubu 
	GROUP BY NazwaKlubu
	ORDER BY LaczeZarobki DESC, SrednieZarobki DESC, IlePilkarzy DESC
4. bramkaz nie pomiedzy 500 - 8200
	SELECT * 
	FROM `pPilkarze`
	WHERE funkcja = 'BRAMKARZ'
	AND PLACA NOT BETWEEN 5000 AND 8500
5. kto zarabia wiecej niz szczenzny
	SELECT *
	FROM `pPilkarze`
	WHERE placa >  (select placa from pPilkarze where nazwisko = 'SZCZESNY')
4. wszystkie dane o najstarszym zawodniku
	SELECT *
	FROM `pPilkarze`
	WHERE data_urodzenia = 
	(
	select 
	min(data_urodzenia)
	from pPilkarze
	)
	limit 1