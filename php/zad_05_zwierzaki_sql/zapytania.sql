#1. Stwórz listę wszystkich ras, posortowaną alfabetycznie bez powtórzeń.
SELECT 
  DISTINCT(rasa) as rasy
FROM `psPsy`
ORDER BY rasy ASC


#2. Podaj imię, nazwisko i nr telefonu właścicieli psów 1-rocznych
SELECT 
  `imię`,
  `nazwisko`,
  `nr telefonu`
FROM `psOsoby`
NATURAL JOIN psPsy
WHERE wiek = 1

#3. Podaj liczbę samców oraz liczbę samic wśród psów.
SELECT
  (SELECT COUNT(`płeć`) FROM psPsy WHERE `płeć` = 'samica') AS samice,
  (SELECT COUNT(`płeć`) FROM psPsy WHERE `płeć` = 'samiec') AS samce
FROM `psPsy`
LIMIT 1

#4. Utwórz zestawienie podające nazwiska i imiona osób, które mają więcej niż 8 psów. Zestawienie powinno być uporządkowane alfabetycznie według nazwisk.
SELECT
  DISTINCT(id_osoby) AS kto,
  imię, nazwisko,
  COUNT(id_psa) AS ile
FROM `psPsy`
NATURAL JOIN psOsoby
GROUP BY id_osoby
HAVING ile > 8

#5. Podaj imię i nazwisko osoby, której psy zdobyły łącznie najwięcej medali, oraz podaj liczbę tych medali.
SELECT
  DISTINCT(CONCAT_WS(' ', imie, nazwisko)) AS kto,
  SUM(`liczba zdobytych medali`) AS ile
FROM `psPsy`
NATURAL JOIN psOsoby
GROUP BY CONCAT_WS(' ', imie, nazwisko)
ORDER BY ile DESC
LIMIT 1

#6. Podaj liczbę osób posiadających owczarki. Zwróć uwagę na to, że nazwa rasy może składać się z kilku wyrazów oraz że jedna osoba może posiadać kilka owczarków tej samej rasy lub różnych ras.
SELECT
  COUNT(DISTINCT(id_osoby)) AS ile
FROM `psPsy`
WHERE rasa LIKE '%owczarek%'
ORDER BY id_osoby ASC