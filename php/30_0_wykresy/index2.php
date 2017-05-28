define("PIE", 1);
define("PIE_3D", 2);
define("COL", 3);
define("COL_3D", 4);
define("LINE", 5);
define("BAR", 6);
define("BAR_3D", 7);


define("KOLOWY", 1);
define("KOLOWY_3D", 2);
define("KOLUMNOWY", 3);
define("KOLUMNOWY_3D", 4);
define("LINIOWY", 5);
define("SLUPKOWY", 6);
define("SLUPKOWY_3D", 7);


define("RED", 0);
define("YELLOW", 1);
define("GREEN", 2);
define("BLUE", 3);
define("NAVY", 4);
define("PINK", 5);
define("L_YELLOW", 6);
define("L_GREEN", 7);
define("L_BLUE", 8);
define("L_NAVY", 9);
define("ORANGE", 10);
define("GREY", 11);
define("WHITE", 12);
define("BLACK", 13);




function wykres($tab, $rodzaj=4, $szerokosc=230, $wysokosc=230, $kolor_wyk=4) {


  //ilosc elementow tablicy
  $ilosc_elem = count($tab);

  if ($ilosc_elem <= 12 || $rodzaj >2) {

    $suma = 0;

    //obliczenie sumy - potrzebne do zamiany wartosci na procenty
    foreach($tab as $klucz => $wart)
        $suma += $wart;

    //zamiana wartosci z tablicy na wartosci procentowe
    foreach($tab as $klucz => $wart) {
        $procenty[$klucz] = ($wart/$suma)*100;
        $stopnie[$klucz] = (360*$procenty[$klucz])/100; }



    //przygotowanie do utworzenia obrazka
    if ($rodzaj == 1 || $rodzaj == 2) {
        
        $na_legende = 18*$ilosc_elem+10;
        $wys_wyk = $wysokosc - $na_legende;
        $szer_wyk = $wys_wyk;
        if ($szer_wyk > $szerokosc) { $szer_wyk = $szerokosc; $wys_wyk = $szer_wyk;}
        $luka = ($szerokosc - $szer_wyk)/2;
        $polowa_szerokosci = round($szerokosc/2);
        $polowa_wysokosci = round($wys_wyk/2);

    }

    if ($rodzaj == 3 || $rodzaj == 4 || $rodzaj == 5) {

        //pobranie maksymalnej wartosci z tablicy w celu okreslenia wysokosci slupkow
        $max = max($tab);

        if ($max >=1)   $odl_od_krawedzi = 25;
        if ($max >=100)   $odl_od_krawedzi = 30;
        if ($max >=1000)  $odl_od_krawedzi = 38;
        if ($max >=10000) $odl_od_krawedzi = 48;
        if ($max >=100000) $odl_od_krawedzi = 55;
        
        $w = ($szerokosc - $odl_od_krawedzi - 10) / $ilosc_elem;


        if ($rodzaj == 3 || $rodzaj == 4) {
            $szer_slupka = 0.75 * $w;
            $odstepy = 0.25 * $w;
        }

        if ($rodzaj == 5) {
            $odstepy = $w;
            $odstep_etykiet = $odstepy;
            $pokaz_wszystkie = TRUE;
            if ($odstep_etykiet < 19) {

                $stara_ilosc_elem = $ilosc_elem;               
                $ilosc_elem = ceil(($szerokosc - $odl_od_krawedzi - 10) / 40);
                $odstep_etykiet = floor($stara_ilosc_elem / $ilosc_elem)*$odstepy;
                $co_ile_elem = floor($stara_ilosc_elem / $ilosc_elem);
                $pokaz_wszystkie = FALSE;

            }
        }
    }


    


    if ($rodzaj == 6 || $rodzaj == 7) {

        //pobranie maksymalnej wartosci z tablicy w celu okreslenia wysokosci slupkow
        $max = max($tab);

        $dlug_max_etyk = 0;
        foreach ($tab as $klucz => $wart)       
            if (strlen($klucz)>$dlug_max_etyk) $dlug_max_etyk = strlen($klucz);

        $odl_od_krawedzi = $dlug_max_etyk*6+4;

        $w = ($wysokosc - 22) / $ilosc_elem;

        $wys_slupka = 0.75 * $w;
        $odstepy = 0.25 * $w;
    }

    //tworzenie obrazka
    $image = imagecreate($szerokosc, $wysokosc);

    //tlo
    $background = imagecolorallocate($image, 253, 254, 255);

    //tablica kolorow
    $kolor[0] = imagecolorallocate($image, 255,0,0);
    $kolor[1] = imagecolorallocate($image, 255, 255, 0);
    $kolor[2] = imagecolorallocate($image, 0, 255, 0);
    $kolor[3] = imagecolorallocate($image, 0, 255, 255);
    $kolor[4] = imagecolorallocate($image, 0, 0, 255);
    $kolor[5] = imagecolorallocate($image, 255, 0, 255);
    $kolor[6] = imagecolorallocate($image, 255, 255, 128);
    $kolor[7] = imagecolorallocate($image, 0, 255, 128);
    $kolor[8] = imagecolorallocate($image, 128, 255, 255);
    $kolor[9] = imagecolorallocate($image, 128, 128, 255);
    $kolor[10] = imagecolorallocate($image, 255, 128, 64);
    $kolor[11] = imagecolorallocate($image, 192, 192, 192);
    $kolor[12] = imagecolorallocate($image, 255, 255, 255);
    $kolor[13] = imagecolorallocate($image, 0, 0, 0);

    $kolor_c[0] = imagecolorallocate($image, 128,0,0);
    $kolor_c[1] = imagecolorallocate($image, 128, 128, 0);
    $kolor_c[2] = imagecolorallocate($image, 0, 128, 0);
    $kolor_c[3] = imagecolorallocate($image, 0, 128, 128);
    $kolor_c[4] = imagecolorallocate($image, 0, 0, 128);
    $kolor_c[5] = imagecolorallocate($image, 128, 0, 128);
    $kolor_c[6] = imagecolorallocate($image, 128, 128, 64);
    $kolor_c[7] = imagecolorallocate($image, 0, 64, 64);
    $kolor_c[8] = imagecolorallocate($image, 0, 128, 255);
    $kolor_c[9] = imagecolorallocate($image, 0, 64, 128);
    $kolor_c[10] = imagecolorallocate($image, 128, 64, 0);
    $kolor_c[11] = imagecolorallocate($image, 128, 128, 128);
    $kolor_c[12] = imagecolorallocate($image, 255, 255, 255);
    $kolor_c[13] = imagecolorallocate($image, 0, 0, 0);

    $grey     = imagecolorallocate($image, 128, 128, 128);
    $red      = imagecolorallocate($image, 255, 0, 0);
    $black       = imagecolorallocate($image, 0, 0, 0);
    $navy     = imagecolorallocate($image, 0, 0, 255);
    $darknavy = imagecolorallocate($image, 0x00, 0x00, 0x50);
    $white       = imagecolorallocate($image, 255, 255, 255);


    $styl = array($white,$white,$white,$white,$white,$grey,$grey,$grey,$grey,$grey);



    //********************************************
    // Wykres slupkowy (poziomy)
    // *******************************************

    if ($rodzaj == 6 || $rodzaj == 7) {

        //ustawienie szerokosci roboczej - nieco nizszej niz szerokosc obrazka
        $szerokosc_rob = $szerokosc - $odl_od_krawedzi;

        //ustawienie szerokosci wykresu - nieco nizszej niz szerokosc robocza
        $szerokosc_wyk = $szerokosc_rob - 10;


        //obliczenia potrzebne do ustalenia liczby dziesiatek       
        $wyn = floor($max / 10);

        if ($wyn<=10) $skok = 1;

        $y=10;
        while ($wyn>100) {
            $wyn = floor($wyn / 10);
            $y*=10;

        }

        //ilosc dziesiatek w najwiekszej wartosci tablicy
        $ilosc_dzies = $wyn;

        //wartosc gorna progowa wykresu wieksza od najwiekszej wartosci tablicy
        $gorny_prog = $wyn*$y+$y;


        //obliczanie kroku o jaki nastepuje skok
        if ($ilosc_dzies<10) {   
            if ($ilosc_dzies<=2)     $skok = 2;
            elseif ($ilosc_dzies<=5) $skok = 5;
            elseif ($ilosc_dzies<10) $skok = 10;
        }

        elseif ($ilosc_dzies<=20)  $skok = 2*$y;
        elseif ($ilosc_dzies<=50)  $skok = 5*$y;
        elseif ($ilosc_dzies<=100) $skok = 10*$y;

        
        //ilosc linii pionowych (jako siatka wykresu)
        $ilosc_linii = ceil($gorny_prog / $skok);

        //odstep miedzy liniami (w pikselach)
        $odstep_linii = ($szerokosc_wyk * $skok) / $max;

        //zmienna uzywana do obliczania kolejnych wspolrzednych linii pionowych
        $odstep = $odstep_linii;

        //zmienna uzwyana do obliczania kolejnych wartosci przy liniach pionowych
        $skok_string = $skok;

        $podnies_napisy=22;
        for ($j=0; $j<=$ilosc_linii; $j++) {

            //linie pionowe
            imageline($image, $odl_od_krawedzi+$odstep, 0, $odl_od_krawedzi+$odstep, $wysokosc-21, $grey);

            //liczby pod liniami pionowymi
            imagestring($image, 2, $odl_od_krawedzi+$odstep-strlen($skok_string)*3, $wysokosc-$podnies_napisy, $skok_string, $black);     
            
            $skok_string+=$skok;
            $odstep+=$odstep_linii;
            
            //jesli etykiety sa za dlugie ustawiane sa na zmiane wyzej i nizej
            if ($odstep_linii < (strlen($max)*7))
                if ($podnies_napisy == 22) $podnies_napisy=13; else $podnies_napisy=22;
        }



        //rysowanie slupkow - efekt 3D
        if ($rodzaj == 7)
        for ($j=1; $j<=floor($odstepy*0.5); $j++) {
            $yy=0;
            foreach($tab as $klucz => $wart) {
                $szer_slupka = ($szerokosc_wyk * $wart) / $max;
        
                //slupek
                imagefilledrectangle($image, $odl_od_krawedzi+$j, $yy+$j, $odl_od_krawedzi+$szer_slupka+$j, $yy+$wys_slupka+$j, $kolor_c[$kolor_wyk]);

                $yy+=($odstepy+$wys_slupka);       
            }
        }


        //rysowanie slupkow
        $yy=0;
        foreach($tab as $klucz => $wart) {
            $szer_slupka = ($szerokosc_wyk * $wart) / $max;
    
            //slupek
            imagefilledrectangle($image, $odl_od_krawedzi, $yy, $odl_od_krawedzi+$szer_slupka, $yy+$wys_slupka, $kolor[$kolor_wyk]);

            //podpis slupka
            imagestring($image, 2, 0, $yy, $klucz, $black);     

            $yy+=($odstepy+$wys_slupka);   
        }


        //linia pionowa
        imageline($image, $odl_od_krawedzi, 0, $odl_od_krawedzi, $wysokosc, $black);

        //linia pozioma
        imageline($image, $odl_od_krawedzi-10, $wysokosc-22, $szerokosc, $wysokosc-22, $black);



    } //IF rodzaj=6 or rodzaj=7





    
    // *******************************************
    // Wykres kolumnowy i liniowy - czesc wspolna
    // *******************************************

    if ($rodzaj == 3 || $rodzaj == 4 || $rodzaj == 5) {

        //ustawienie wysokosci roboczej - nieco nizszej niz wysokosc obrazka
        $wysokosc_rob = $wysokosc - 30;

        //ustawienie wysokosci wykresu - nieco nizszej niz wysokosc robocza
        $wysokosc_wyk = $wysokosc_rob - 10;

        //obliczenia potrzebne do ustalenia liczby dziesiatek       
        $wyn = floor($max / 10);

        if ($wyn<=10) $skok = 1;

        $y=10;
        while ($wyn>100) {
            $wyn = floor($wyn / 10);
            $y*=10;

        }

        //ilosc dziesiatek w najwiekszej wartosci tablicy
        $ilosc_dzies = $wyn;

        //wartosc gorna progowa wykresu wieksza od najwiekszej wartosci tablicy
        $gorny_prog = $wyn*$y+$y;


        //obliczanie kroku o jaki nastepuje skok
        if ($ilosc_dzies<10) {   
            if ($ilosc_dzies<=2) $skok = 2;
            elseif ($ilosc_dzies<=5) $skok = 5;
            elseif ($ilosc_dzies<10) $skok = 10;
        }

        elseif ($ilosc_dzies<=20) $skok = 2*$y;
        elseif ($ilosc_dzies<=50) $skok = 5*$y;
        elseif ($ilosc_dzies<=100) $skok = 10*$y;

        
        //ilosc linii poziomych (jako siatka wykresu)
        $ilosc_linii = ceil($gorny_prog / $skok);

        //odstep miedzy liniami (w pikselach)
        $odstep_linii = ($wysokosc_wyk * $skok) / $max;

        //zmienna uzywana do obliczania kolejnych wysokosci linii poziomych
        $odstep = $odstep_linii;

        //zmienna uzwyana do obliczania kolejnych wartosci przy liniach poziomych
        $skok_string = $skok;


        for ($j=0; $j<=$ilosc_linii; $j++) {

            //linie poziomwe
            imageline($image, $odl_od_krawedzi-12, $wysokosc_rob-round($odstep), $szerokosc, $wysokosc_rob-round($odstep), $grey);

            //liczby przy liniach poziomych
            imagestring($image, 2, 0, $wysokosc_rob-round($odstep)-7, $skok_string, $black);     
            
            $skok_string+=$skok;
            $odstep+=$odstep_linii;
        }



    
        // **********************
        // Wykres liniowy
        // **********************

        if ($rodzaj == 5) {
        $x=0;
        $y=0;
        $pierwszy_przebieg = TRUE;
        $podnies_napisy = 0;
        $wyswietlany_elem = 1;
        imagesetstyle($image, $styl);

        foreach($tab as $klucz => $wart) {

            if ($pierwszy_przebieg) {
                $start = $wart;
                $pierwszy_przebieg = FALSE;

                //podpisy wykresu
                $dlug_podp = strlen($klucz)*3;
                imagestring($image, 2, $odl_od_krawedzi+$y-$dlug_podp, $wysokosc_rob+$podnies_napisy, $klucz, $black);

                //linie pionowe
                imageline($image, $odl_od_krawedzi+$y, 10, $odl_od_krawedzi+$y, $wysokosc_rob, IMG_COLOR_STYLED);

                if ($podnies_napisy == 0) $podnies_napisy = 12; else $podnies_napisy = 0;

                $x+=$odstepy;   
                $wyswietlany_elem++;
                continue;
            } else {

                $end = $wart;

                $start_px = ($wysokosc_wyk * $start) / $max;
                $end_px = ($wysokosc_wyk * $end) / $max;

                //linia wykresu
                imageline($image, $odl_od_krawedzi+$x-$odstepy, $wysokosc_rob - $start_px, $odl_od_krawedzi+$x, $wysokosc_rob - $end_px, $kolor[$kolor_wyk]);

                imagefilledrectangle($image, $odl_od_krawedzi+$x-$odstepy-2, $wysokosc_rob-$start_px-2, $odl_od_krawedzi+$x-$odstepy+2, $wysokosc_rob-$start_px+2, $kolor[$kolor_wyk]);

                if ((($wyswietlany_elem-1)%$co_ile_elem == 0) || ($pokaz_wszystkie)) {

                    $y+=$odstep_etykiet;               

                    //podpisy wykresu
                    $dlug_podp = strlen($klucz)*3;
                    imagestring($image, 2, $odl_od_krawedzi+$y-$dlug_podp, $wysokosc_rob+$podnies_napisy, $klucz, $black);

                    //linie pionowe
                    imageline($image, $odl_od_krawedzi+$y, 10, $odl_od_krawedzi+$y, $wysokosc_rob, IMG_COLOR_STYLED);

                    if ($podnies_napisy == 0) $podnies_napisy = 12; else $podnies_napisy = 0;

                }

                $x+=$odstepy;   
                $wyswietlany_elem++;
                $start = $end;
            }   
        } // foreach

        //linia pozioma
        imageline($image, 0, $wysokosc_rob, $szerokosc, $wysokosc_rob, $black);

        //linia pionowa
        imageline($image, $odl_od_krawedzi-10, 0, $odl_od_krawedzi-10, $wysokosc_rob, $black);


        } // IF rodzaj=5





        // **********************
        // Wykres kolumnowy
        // **********************

        //rysowanie slupkow - efekt 3D
        if ($rodzaj == 4)
        for ($j=1; $j<=floor($odstepy*0.5); $j++) {
            $x=0;
            foreach($tab as $klucz => $wart) {
                $wys_slupka = ($wysokosc_wyk * $wart) / $max;
        
                //slupek
                imagefilledrectangle($image, $odl_od_krawedzi+$x+$j, $wysokosc_rob-$wys_slupka-$j, $odl_od_krawedzi+$szer_slupka+$x+$j, $wysokosc_rob-$j, $kolor_c[$kolor_wyk]);

                $x+=($odstepy+$szer_slupka);       
            }
        }


        //rysowanie slupkow
        if ($rodzaj == 3 || $rodzaj == 4) {
        $x=0;
        $podnies_napisy = 0;

        foreach($tab as $klucz => $wart) {
            $wys_slupka = ($wysokosc_wyk * $wart) / $max;
    
            //slupek
            imagefilledrectangle($image, $odl_od_krawedzi+$x, $wysokosc_rob-$wys_slupka, $odl_od_krawedzi+$szer_slupka+$x, $wysokosc_rob, $kolor[$kolor_wyk]);

            //podpis slupka
            imagestring($image, 2, $odl_od_krawedzi+$x-5, $wysokosc_rob+$podnies_napisy, $klucz, $black);
        
            $x+=($odstepy+$szer_slupka);   

            if ($podnies_napisy == 0) $podnies_napisy = 12; else $podnies_napisy = 0;
        }

        //linia pozioma
        imageline($image, 0, $wysokosc_rob, $szerokosc, $wysokosc_rob, $black);

        //linia pionowa
        imageline($image, $odl_od_krawedzi-10, 0, $odl_od_krawedzi-10, $wysokosc_rob, $black);


        }

    }  //IF rodzaj=3 or rodzaj=4 or rodzaj=5




    // **********************
    // Wykres kolowy 3D
    // **********************
    if ($rodzaj == 2) {

         for ($i = $polowa_wysokosci; $i > ($polowa_wysokosci-10); $i--) {
            $start = 0;
            $nr_koloru = 0;
            foreach($stopnie as $klucz => $wart) {
            
                if ($wart==0) continue;
                $end = $wart + $start;
            
                //Luk
                imagefilledarc($image, $polowa_szerokosci, $i, $szerokosc, $wys_wyk*0.6, $start, $end, $kolor_c[$nr_koloru], IMG_ARC_PIE);
                $start = $end;
                $nr_koloru++;
            }
        }

        $x=0;
        $start = 0;
        $nr_koloru = 0;
        foreach($stopnie as $klucz => $wart) {

            //Legenda
            imagefilledrectangle($image, 10, $wys_wyk+5+$x, 20, $wys_wyk+15+$x, $kolor[$nr_koloru]);
            imagestring($image, 2, 35, $wys_wyk+3+$x, $klucz." (". round($procenty[$klucz],2) ."%)"   , $black);     
            $x+=20;

            if ($wart==0) continue;
            $end = $wart + $start;
        
            //Luk
            imagefilledarc($image, $polowa_szerokosci, $polowa_wysokosci-10, $szerokosc, $wys_wyk*0.6, $start, $end, $kolor[$nr_koloru], IMG_ARC_PIE);

            $nr_koloru++;
        
            $start = $end;

        }
    } // IF Rodzaj=2




    // **********************
    // Wykres kolowy plaski
    // **********************
    if ($rodzaj == 1) {

        $x=0;
        $start = 0;
        $nr_koloru = 0;
        foreach($stopnie as $klucz => $wart) {

            //Legenda
            imagefilledrectangle($image, 10, $wys_wyk+5+$x, 20, $wys_wyk+15+$x, $kolor[$nr_koloru]);
            imagestring($image, 2, 35, $wys_wyk+3+$x, $klucz, $black);     
            $x+=20;
    
            if ($wart==0) continue;           

            $end = $wart + $start;
        
            //Luk
            imagefilledarc($image, $polowa_szerokosci, $polowa_wysokosci, $szer_wyk*0.9, $wys_wyk*0.9, $start, $end, $kolor[$nr_koloru], IMG_ARC_PIE);

            //liczby wokol wykresu
            $kat = ($end - $start)/2 + $start;
            $kat_suma = $end - ($end - $start)/2;

            if ($kat_suma >=0 && $kat_suma <=90) $r = ($szer_wyk)/2-10;
            if ($kat_suma >90 && $kat_suma <=270)  $r = ($szer_wyk)/2;
            if ($kat_suma >270 && $kat_suma <=360)  $r = ($szer_wyk)/2-20;
            $x_ = $r * cos(deg2rad($kat))+ $polowa_szerokosci;
            $y_ = $r * sin(deg2rad($kat)) + $polowa_wysokosci;
            imagestring($image, 2, $x_, $y_-3, round($procenty[$klucz],1)."%", $black);

            $nr_koloru++;
            $start = $end;

        }
    } // Rodzaj 1


    
    

    // flush image
    header('Content-type: image/png');

    imagepng($image);
    imagedestroy($image,300);

  } else {

    print("Wykres kolowy (3D) mozna wygenerowac tylko dla tablicy nie wiekszej niz 12 elementow");
    
  }

} //END OF FUNCTION wykres



//Skladnia
//wykres(array zestaw_danych, int rodzaj_wykresu, int szerokosc, int wysokosc, [int kolor])

//Przykladowe dane
$dane = array('pon' => 45, 'wto' => 78, 'sro ' => 121, 'czw' => 16, 'pia' => 125, 'sob' => 86, 'nie' => 10);


//Przykladowe uzycie
wykres($dane,LINE,300,180,NAVY);
//wykres($dane,BAR,300,120,YELLOW);
//wykres($dane,COL_3D,200,160,RED);
//wykres($dane,KOLOWY,400,460);
//wykres($dane,PIE_3D,350,300);