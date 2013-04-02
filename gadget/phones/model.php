<?php
/**
* @package      Lawar 1.0
* @version      Beta : 1.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @author       Uray Irvan Prasetya <urayirvan@gmail.com>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2013 underlegal Throne, Inc.
* @since        File available since Release 1.0
* @category     template-landing
*/
@include ("../../x0x/render.php");
$NODE = "Model";
@include ("../con.php");
@include ("../../header.php");
@include ("../../nav.php");
?>

<div class="page-header">
  <h1>Phones <small><?php echo $NODE;?></small></h1>
</div>

<!-- breadcrumb -->
<ul class="breadcrumb">
  <li><i class="icon-home"></i> <a href="../../">Home</a> <span class="divider">/</span></li>
  <li><a href="../">Gadget</a> <span class="divider">/</span></li>
  <li><a href="./">Phones</a> <span class="divider">/</span></li>
  <li class="active"><?php echo $NODE;?></li>
</ul>

<!-- tabs -->
<ul class="nav nav-tabs">
  <li><a href="./"><i class="icon-signal"></i>  Dashboard</a></li>
  <li><a href="products"><i class="icon-fire"></i> Products</a></li>
  <li class="active"><a href="model"><i class="icon-th-list"></i> <?php echo $NODE;?></a></li>
  <li><a href="series"><i class="icon-tags"></i> Series</a></li>
</ul>

<section id="tables">

  <div class="row">
    <div class="span8">
      <h3 id="pager"><?php echo $NODE;?></h3>

      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Series</th>
            <th>Brand</th>
            <th>Type</th>
            <th>Product</th>
            <th>#ID / SIC</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
<?php
$TOTAL_VIEW_PER_HALAMAN = 10;
if(!empty($_GET['p'])) { 
  if($_GET['p']) {
    $CURRENT_PAGE= $_GET['p'];
    if($_GET['p'] == "1") {
      $HALAMAN = 0;
    }else {
      $HALAMAN = $_GET['p'] * $TOTAL_VIEW_PER_HALAMAN;
    }
  }
}else {$HALAMAN = 0; $CURRENT_PAGE=1;}

$sql -> db_Select(
  "gadget_model_series INNER JOIN gadget_brand AS b ON gadget_model_series.c_brand = b.code", 
  "gadget_model_series.id_ms, gadget_model_series.code, gadget_model_series.name, gadget_model_series.c_brand, b.name AS brand", 
  "WHERE gadget_model_series.type='model' GROUP BY gadget_model_series.name LIMIT ".$HALAMAN.",".$TOTAL_VIEW_PER_HALAMAN."");

$sql2 = new db;
$sql2 -> db_Select("gadget_model_series", "id_ms", "WHERE type='model'");
$TOTAL_DATA_TERQUERY = $sql2-> db_Rows();
$mulai_hitung = 1 + ($TOTAL_VIEW_PER_HALAMAN * ($CURRENT_PAGE -1));  
while($row = $sql-> db_Fetch()){
  $hitung_baris = $mulai_hitung++;
  echo "
  <tr>
    <td>{$hitung_baris}</td>
    <td>{$row['name']}</td>
    <td>{$row['brand']}</td>
    <td>0</td>
    <td>0</td>
    <td><span class=\"label\">{$row['id_ms']}</span> <span class=\"label\">{$row['code']}</span></td>
    <td>
      <a href=\"#edit={$row['id_ms']}\" class=\"btn btn-mini btn-info\"><i class=\"icon-edit\"></i> Edit</a>
    </td>
  </tr>
  ";
}
echo "</tbody></table>";

include_once (x_PATH."/x0x/np_class.php");
$page = new nextprev;
$self = preg_replace ('/\?p\=(([0-9])*)/','', $_SERVER['REQUEST_URI']);
$HITUNG_HALAMAN_WEB = $page->PENGATURAN_HALAMAN($self."?p=", $CURRENT_PAGE, $TOTAL_VIEW_PER_HALAMAN, $TOTAL_DATA_TERQUERY);
if ($HITUNG_HALAMAN_WEB){
  echo "
  <div class=\"pagination pull-right\">
    <ul>
      ".$HITUNG_HALAMAN_WEB."
    </ul>
  </div>
  ";
}
?>
      <ul>
        <li>[=] pagination</li>
        <li>[+] edit</li>
        <li>[+] delete</li>
      </ul>
    </div>

    <div class="span4">
      <h3 id="pager">New</h3>
<?php
if(isset($_POST['FormSubmit']) && !empty($_POST['name'])) {
  $release_date = date("Y-m-d", strtotime(trim($_POST['release'])));
  $code = createCode();
  $slug = createSlug(trim($_POST['name']));
  $sql -> db_Insert("gadget_model_series", "'0', '".$code."', '".$_POST['name']."', '".$slug."', 'model', '".$_POST['c_series']."', '".$_POST['c_brand']."', '".$release_date."', '' ");
  $sql -> db_Insert("codebank", "'0', '".$code."', 'gadget_model' ");
  setcookie ("gadget_series_input_cookie", $_POST['name'].", ".$release_date, (time()+100)); //add cookie

  setcookie ("gadget_brands_cookie", $_POST['c_brand'], (time()-900)); //delete cookie
  setcookie ("gadget_brands_cookie", $_POST['c_brand'], (time()+900)); //add cookie
  setcookie ("gadget_series_cookie", $_POST['c_series'], (time()-900)); //delete cookie
  setcookie ("gadget_series_cookie", $_POST['c_series'], (time()+900)); //add cookie
  return _redirect ( "?sip" );
}
if(x_QUERY == "sip"){
  echo "
    <div class=\"alert alert-success\">
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
      <strong>Success</strong>. <span class=\"label label-success\">{$_COOKIE['gadget_series_input_cookie']}</span>
    </div>
    ";
    setcookie ("gadget_series_input_cookie", $_POST['name'], (time()-100)); //delete cookie
}
?>
      <form method='post' action='<?php echo x_SELF;?>'>
        <div class="control-group">
          <label class="control-label" for="c_brand">Brand</label>
          <div class="controls">
            <select id="c_brand" name="c_brand">
              <?php
              $sql -> db_Select("gadget_brand", "code,name", "GROUP BY name");
              while($row = $sql-> db_Fetch()){
                (($_COOKIE['gadget_brands_cookie'] == $row['code']) ? $selected = " selected" : $selected = ""); //cookie
                echo "<option value=\"{$row['code']}\"{$selected}>{$row['name']}</option>\n";
              }
              ?>
            </select>
            <span class="help-inline"><a href="#windowTitleDialog" data-toggle="modal"> <i class="icon-plus-sign"></i></a></span>
          </div>
        </div>
        <div id="ajax_select_series"></div>
        <div class="control-group">
          <label class="control-label" for="name">Model</label>
          <div class="controls">
            <input type="text" id="name" name="name" placeholder="ex: Z10">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="release">Release Date</label>
          <div class="controls">
            <input type="text" id="release" name="release" placeholder="ex: 2012-12-30">
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="submit" name="FormSubmit" value="submit" class="btn">Add New</button>
          </div>
        </div>
      </form>
    </div>

  </div>
</section>

<div id="windowTitleDialog" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="windowTitleLabel" aria-hidden="true">
  <div class="modal-header">
    <a href="#" class="close" data-dismiss="modal">&times;</a>
    <h3>test Ganti title</h3>
  </div>
  <div class="modal-body">
    <div class="divDialogElements">
      <input class="xlarge" id="xlInput" name="xlInput" type="text" />
    </div>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</a>
    <a href="#" class="btn btn-primary" onclick="okClicked ();">OK</a>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $("#c_brand").change(function() { 
    var id=$(this).val();
    var dataString = 'c_brand='+ id;

    $.ajax({
      type: "GET",
      url: "ajax_select_series.php",
      data: dataString,
      cache: false,
      success: function(html){
        $("#ajax_select_series").html(html);
      } 

    });
  });
});

$(document).ready(function() {  
    $('#c_brand').change();
});
</script>

<script type="text/javascript">
$(document).ready(function() {
  $('#windowTitleDialog').bind('show', function () {
    document.getElementById ("xlInput").value = document.title;
    });
  });
function closeDialog () {
  $('#windowTitleDialog').modal('hide'); 
  };
function okClicked () {
  document.title = document.getElementById ("xlInput").value;
  closeDialog ();
  };
</script>

<?php
@include ("../../footer.php");
?> 