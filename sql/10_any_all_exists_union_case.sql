1.~~~
	SELECT IMIE
	FROM `uPRACOWNICY` 
	WHERE PLACA_POD > ALL(
	  SELECT PLACA_POD
	  FROM `uPRACOWNICY`
	  WHERE `ID_ZESP` = 30
	)

2.krajw weikesze od któregokolwiek z poland, Romania i cos jeszcze
SELECT *
FROM `world`
WHERE area > any(
  SELECT area
  FROM world 
  WHERE name in ('poland', 'romania')
)

3.ludzie kturzy nie maja szefa
SELECT *
FROM `uPRACOWNICY` p
WHERE EXISTS(
  SELECT 1
  FROM uPRACOWNICY
  WHERE `ID_PRAC` = p.`ID_SZEFA`
)

4.CASE
SELECT
  IMIE AS Imie,
  CASE WHEN RIGHT(IMIE ,1) = 'A'
    THEN 'Kobieta'
    ELSE 'Mężczyzna'
  END AS Płec
FROM `samPRACOWNICY`

4.1
SELECT
  concat(UPPER(left(IMIE,1)),lower(substring(IMIE,2))) AS Imie,
  CASE WHEN RIGHT(IMIE ,1) = 'A'
    THEN 'Kobieta'
    ELSE 'Mężczyzna'
  END AS Płec,
  'Nie' as Tak
FROM `samPRACOWNICY`