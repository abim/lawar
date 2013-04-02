<?php
include ("../../x0x/db_class.php");
$sqlx = new db;
$sqlx -> db_SetErrorReporting(FALSE);
$sqlx -> db_Connect($MySQLHost, $MySQLUser, $MySQLPasswd, $MySQLDb);

if(isset($_GET['c_series'])) {
	$sqlx -> db_Select("gadget_model_series", "name,code", "WHERE c_parent='{$_GET['c_series']}' AND type='model' ORDER BY release_date DESC");
	if ($sqlx-> db_Rows()) {
		echo "
			<div class=\"control-group\">
	          <label class=\"control-label\" for=\"c_model\">Model</label>
	          <div class=\"controls\">
	            <select id=\"c_model\" name=\"c_model\">";
		  while($rowx = $sqlx-> db_Fetch()){
		    (($_COOKIE['gadget_model_cookie'] == $rowx['code']) ? $selected = " selected" : $selected = ""); //cookie
		    echo "<option value=\"{$rowx['code']}\"{$selected}>{$rowx['name']}</option>";
		}
	    echo"
	            </select>
	          </div>
	        </div>
		";
	}
}
?>