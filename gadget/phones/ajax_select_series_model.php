<?php
include ("../../x0x/db_class.php");
$sqlx = new db;
$sqlx -> db_SetErrorReporting(FALSE);
$sqlx -> db_Connect($MySQLHost, $MySQLUser, $MySQLPasswd, $MySQLDb);

if(isset($_GET['c_brand'])) {
	$sqlx -> db_Select("gadget_model_series", "name,code", "WHERE c_brand='{$_GET['c_brand']}' AND type='series' ORDER BY release_date DESC");
	if ($sqlx-> db_Rows()) {
		echo "
			<div class=\"control-group\">
	          <label class=\"control-label\" for=\"c_series\">Series</label>
	          <div class=\"controls\">
	            <select id=\"c_series\" name=\"c_series\">";
		  while($rowx = $sqlx-> db_Fetch()){
		    (($_COOKIE['gadget_series_cookie'] == $rowx['code']) ? $selected = " selected" : $selected = ""); //cookie
		    echo "<option value=\"{$rowx['code']}\"{$selected}>{$rowx['name']}</option>";
		}
	    echo"
	            </select>
	          </div>
	        </div>
	        <div id=\"ajax_select_model\"></div>
		";
	}
}
?>

<script type="text/javascript">
$(document).ready(function() {
  $("#c_series").change(function() { 
    var code=$("#c_series").val();
    var dataString = 'c_series='+ code;

    $.ajax({
      type: "GET",
      url: "ajax_select_model.php",
      data: dataString,
      cache: false,
      success: function(html){
        $("#ajax_select_model").html(html);
      } 
    });
  });
});

$(document).ready(function() {  
    $('#c_series').change();
});
</script>