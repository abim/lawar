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
@include ("../x0x/render.php");
$NODE = "Brands";
@include ("con.php");
@include_once ("../header.php");
@include_once ("../nav.php");
?>
<div class="page-header">
  <h1>Gadget <small><?php echo $NODE;?></small></h1>
</div>

<!-- breadcrumb -->
<ul class="breadcrumb">
  <li><i class="icon-home"></i> <a href="../">Home</a> <span class="divider">/</span></li>
  <li><a href="./">Gadget</a> <span class="divider">/</span></li>
  <li class="active"><?php echo $NODE;?></li>
</ul>

<!-- tabs -->
<ul class="nav nav-tabs">
  <li><a href="./"><i class="icon-signal"></i> Dashboard</a></li>
  <li class="active"><a href="brands"><i class="icon-flag"></i> Brands</a></li>
  <li><a href="#"><i class="icon-certificate"></i> OS</a></li>
</ul>

<section id="tables">

  <div class="row">
    <div class="span8">
      <h3 id="pager"><?php echo $NODE;?></h3>

      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Brand</th>
            <th>Vendor</th>
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
  "gadget_brand INNER JOIN company AS b ON gadget_brand.c_company = b.code", 
  "gadget_brand.id_brand, gadget_brand.code, gadget_brand.name, gadget_brand.c_company, b.name AS company", 
  "GROUP BY gadget_brand.name LIMIT {$HALAMAN},{$TOTAL_VIEW_PER_HALAMAN}");

$sql2 = new db;
$sql2 -> db_Select("gadget_brand", "code");
$TOTAL_DATA_TERQUERY = $sql2-> db_Rows();
$mulai_hitung = 1;  
while($row = $sql-> db_Fetch()){
  $hitung_baris = $mulai_hitung++;
  echo "
  <tr>
    <td>{$hitung_baris}</td>
    <td>{$row['name']}</td>
    <td>{$row['company']}</td>
    <td>0</td>
    <td>0</td>
    <td><span class=\"label\">{$row['id_brand']}</span> <span class=\"label\">{$row['code']}</span></td>
    <td>
      <a href=\"#edit={$row['id_brand']}\" class=\"btn btn-mini btn-info\"><i class=\"icon-edit\"></i> Edit</a>
      <a href=\"#disable\" class=\"btn btn-mini btn-danger disabled\"><i class=\"icon-remove\"></i> Delete</a>
    </td>
  </tr>
  ";
}
echo "</tbody></table>";

include_once ("../x0x/np_class.php");
$page = new nextprev;
$self = preg_replace ('/\/\?p\=(([0-9])*)/','', $_SERVER['REQUEST_URI']);
$HITUNG_HALAMAN_WEB = $page->PENGATURAN_HALAMAN($self."/?pg=", $CURRENT_PAGE, $TOTAL_VIEW_PER_HALAMAN, $TOTAL_DATA_TERQUERY);
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
  $code = createCode();
  $slug = createSlug(trim($_POST['name']));
  $sql -> db_Insert("gadget_brand", "'0', '".$code."', '".$_POST['name']."', '".$slug."', '".$_POST['c_company']."', '', '0', '' ");
  $sql -> db_Insert("codebank", "'0', '".$code."', 'gadget_brand' ");
  setcookie ("gadget_company_cookie", $_POST['c_company'], (time()-900)); //delete cookie
  setcookie ("gadget_company_cookie", $_POST['c_company'], (time()+900)); //add cookie
  return _redirect ( "?sip" );
}
if(x_QUERY == "sip"){
  echo "
    <div class=\"alert alert-success\">
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
      <strong>Sip</strong>.
    </div>
    ";
}
?>
      <form method='post' action='<?php echo x_SELF;?>'>
        <div class="control-group">
          <label class="control-label" for="c_company">Vendor</label>
          <div class="controls">
            <select id="c_company" name="c_company">
              <?php
              $sql -> db_Select("company", "code,name", "GROUP BY name");
              while($row = $sql-> db_Fetch()){
                (($_COOKIE['gadget_company_cookie'] == $row['code']) ? $selected = " selected" : $selected = ""); //cookie

                echo "<option value=\"{$row['code']}\"{$selected}>{$row['name']}</option>\n";
              }
              ?>
            </select>
            <span class="help-inline"><a href="#windowTitleDialog" data-toggle="modal"> <i class="icon-plus-sign"></i></a></span>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="name">Brand Name</label>
          <div class="controls">
            <input type="text" id="name" name="name" placeholder="Brand Name">
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
@include ("../footer.php");
?> 