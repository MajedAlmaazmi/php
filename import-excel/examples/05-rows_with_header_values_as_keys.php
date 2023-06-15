<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/../src/SimpleXLSX.php';

//echo '<h1>Rows with header values as keys</h1>';
if ( $xlsx = SimpleXLSX::parse('masjid-our-mosques.xlsx')) {

	// Produce array keys from the array values of 1st array element
	$header_values = $rows = [];

	foreach ( $xlsx->rows() as $k => $developer ) {
		if ( $k === 0 ) {

		}
		else{
            //continue;
           // print_r($developer);exit;
            $code =$developer[0];
            $name =$developer[1];
            $city_code ='0';
            $area_code ='0';
            $lat =$developer[8];
            $lang =$developer[9];
            ///Priviate masjid
            //$mosque_type=1;
           // $mosque_mosque_kind=3;
            ///
            $mosque_type=1;
            $mosque_mosque_kind=0;
            $area_name=$developer[3];
            $city_name=$developer[2];
            $pry_no=$developer[6];
            echo "INSERT INTO `mosques_coords`(`mosque_code`, `mosque_name`, `city_code`, `area_code`, `lat`, `lang`, `insp_no`, `insp_name`, `mosque_type`, `pry_no`, `mosque_kind`, `ad_mnl`, `area_name`, `city_name`, `under_pers`, `test_`) VALUES ('$code','$name','$city_code','$area_code','$lat','$lang','0','0','$mosque_type','$pry_no','$mosque_mosque_kind','0','$area_name','$city_name','0','0');";

            echo '<br>';
        }

		//$rows[] = array_combine( $header_values, $r );
	}
	//print_r( $rows );
/*
Array
(
    [0] => Array
        (
            [ISBN] => 618260307
            [title] => The Hobbit
            [author] => J. R. R. Tolkien
            [publisher] => Houghton Mifflin
            [ctry] => USA
        )

    [1] => Array
        (
            [ISBN] => 908606664
            [title] => Slinky Malinki
            [author] => Lynley Dodd
            [publisher] => Mallinson Rendel
            [ctry] => NZ
        )

)
 */
}
