<?php
echo "before connect";
include_once("inc/db_connect.php");
echo "after connect";
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/../src/SimpleXLSX.php';

//echo '<h1>Rows with header values as keys</h1>';
if ( $xlsx = SimpleXLSX::parse('khateeb_data_web_app.xlsx')) {

	// Produce array keys from the array values of 1st array element
	$header_values = $rows = [];
    $index=0;
	foreach ( $xlsx->rows() as $k => $developer ) {
		if ( $k === 0 ) {

		}
		else{

           //print_r($developer);exit;
            $name =$developer[1];
            $area =$developer[0];
            $khateeb_name =$developer[2];
            $city =$developer[3];
            $index = $index +1;
            $sqlQuery="INSERT INTO `topics`(`title_ar`, `date`, `status`,`visits`, `webmaster_id`, `section_id`, `row_no`, `seo_title_ar`, `created_by`) VALUES ('$khateeb_name','2021-06-18','1','0','10','0','$index','$khateeb_name','1')";
          //  $sqlQuery = "SELECT Inps_clean_new.auto_, insp_actv.insp_name, Inps_clean_new.mosque_name, Inps_clean_new.clean_desc, Inps_clean_new.area_name, Inps_clean_new.clean_date, Inps_clean_new.clean_status FROM Inps_clean_new INNER JOIN insp_actv ON Inps_clean_new.`app_no` = insp_actv.`no` where (Inps_clean_new.flg_company=0) and (Inps_clean_new.clean_date > '2021-01-01') order by Inps_clean_new.clean_date desc";
            $resultSet = mysqli_query($conn, $sqlQuery) or die("database error:" . mysqli_error($conn));
            $last_id= mysqli_insert_id($conn);
            //Add sub filds values
            $sqlQuery="INSERT INTO `topic_fields`(`topic_id`, `field_id`, `field_value`) VALUES ('$last_id','3','$name')";
            $resultSet = mysqli_query($conn, $sqlQuery) or die("database error:" . mysqli_error($conn));
            $sqlQuery="INSERT INTO `topic_fields`(`topic_id`, `field_id`, `field_value`) VALUES ('$last_id','4','$area')";
            $resultSet = mysqli_query($conn, $sqlQuery) or die("database error:" . mysqli_error($conn));
            $sqlQuery="INSERT INTO `topic_fields`(`topic_id`, `field_id`, `field_value`) VALUES ('$last_id','13','$city')";
            $resultSet = mysqli_query($conn, $sqlQuery) or die("database error:" . mysqli_error($conn));
        }

		//$rows[] = array_combine( $header_values, $r );
	}
	
}
