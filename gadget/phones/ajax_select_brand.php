<?php
include ("../../x0x/db_class.php");
$sqlx = new db;
$sqlx -> db_SetErrorReporting(FALSE);
$sqlx -> db_Connect($MySQLHost, $MySQLUser, $MySQLPasswd, $MySQLDb);

if(isset($_GET['id_brand'])) {
	$sqlx -> db_Select("gadget_series", "id_series,name", "WHERE id_brand='{$_GET['id_brand']}' ORDER BY id_series DESC");
	if ($sqlx-> db_Rows()) {
		echo "
			<div class=\"control-group\">
	          <label class=\"control-label\" for=\"id_series\">Series</label>
	          <div class=\"controls\">
	            <select id=\"id_series\" name=\"id_series\">";
	    $sqlx -> db_Select("gadget_series", "id_series,name", "WHERE id_brand='{$_GET['id_brand']}'");
		  while($rowx = $sqlx-> db_Fetch()){
		    echo "<option value=\"{$rowx['id_series']}\">{$rowx['name']}</option>";
		}          
	    echo"
	            </select>
	          </div>
	        </div>
		";
	}
}
?>