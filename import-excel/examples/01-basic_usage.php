<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/../src/SimpleXLSX.php';

echo '<h1>Parse books.xslx</h1><pre>';
if ( $xlsx = SimpleXLSX::parse('khateeb_data_web_app.xlsx') ) {
	print_r( $xlsx->rows() );
} else {
	echo SimpleXLSX::parseError();
}
echo '<pre>';