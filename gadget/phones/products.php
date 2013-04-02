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
$NODE = "Products";
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
  <li><a href="./"><i class="icon-signal"></i> Dashboard</a></li>
  <li class="dropdown active">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-fire"></i> <?php echo $NODE;?> <b class="caret"></b></a>
    <ul class="dropdown-menu">
      <li class="active"><a href="products"><i class="icon-list-alt"></i> List</a></li>
      <li><a href="#"><i class="icon-star"></i> Prioritas</a></li>
    </ul>
  </li>
  <li><a href="model"><i class="icon-th-list"></i> Model</a></li>
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
  "gadget_product", 
  "id_product, name, code, c_model", 
  "GROUP BY release_date LIMIT {$HALAMAN},{$TOTAL_VIEW_PER_HALAMAN}");

$sql2 = new db;
$sql2 -> db_Select("gadget_product", "code");
$TOTAL_DATA_TERQUERY = $sql2-> db_Rows();
$mulai_hitung = 1;  
while($row = $sql-> db_Fetch()){
  $hitung_baris = $mulai_hitung++;
  echo "
  <tr>
    <td>{$hitung_baris}</td>
    <td>{$row['name']}</td>
    <td>{$row['model']}</td>
    <td>0</td>
    <td>0</td>
    <td><span class=\"label\">{$row['id_product']}</span> <span class=\"label\">{$row['code']}</span></td>
    <td>
      <a href=\"#edit={$row['id_product']}\" class=\"btn btn-mini btn-info\"><i class=\"icon-edit\"></i> Edit</a>
    </td>
  </tr>
  ";
}
echo "</tbody></table>";

include_once (x_PATH."/x0x/np_class.php");
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
      <h3 id="pager">New <?php echo $NODE;?></h3>
<?php
if(isset($_POST['FormSubmit']) && !empty($_POST['name'])) {
  $release_date = date("Y-m-d", strtotime(trim($_POST['release'])));
  $code = createCode();
  $slug = createSlug(trim($_POST['name']));

  $sql -> db_Insert("gadget_product", "'0', '".$code."', '".$_POST['c_series']."', '".$_POST['c_brand']."', '".trim($_POST['c_model'])."', '".trim($_POST['name'])."', '".$slug."', '".$_POST['desc']."', '".$release_date."', 'pending', '0', '' ");
  $sql -> db_Insert("users_prioritas", "'0', '".$_POST['users_prioritas']."', '".$code."', 'gadget_product' ");
  $sql -> db_Insert("codebank", "'0', '".$code."', 'gadget_product' ");
  setcookie ("gadget_series_input_cookie", $_POST['name'].", ".$release_date, (time()+100)); //add cookie

  setcookie ("gadget_brands_cookie", $_POST['c_brand'], (time()-900)); //delete cookie
  setcookie ("gadget_brands_cookie", $_POST['c_brand'], (time()+900)); //add cookie
  setcookie ("gadget_series_cookie", $_POST['c_series'], (time()-900)); //delete cookie
  setcookie ("gadget_series_cookie", $_POST['c_series'], (time()+900)); //add cookie
  setcookie ("gadget_model_cookie", $_POST['c_model'], (time()-900)); //delete cookie
  setcookie ("gadget_model_cookie", $_POST['c_model'], (time()+900)); //add cookie

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
              <option selected="selected">Select</option>
              <?php
              $sql -> db_Select("gadget_brand", "code,name", "GROUP BY name");
              while($row = $sql-> db_Fetch()){
                (($_COOKIE['gadget_brands_cookie'] == $row['code']) ? $selected = " selected" : $selected = ""); //cookie
                echo "<option value=\"{$row['code']}\"{$selected}>{$row['name']}</option>\n";
              }
              ?>
            </select>
            <span class="help-inline"><a href="<?php echo x_BASE;?>/gadget/brands" data-toggle="modal"> <i class="icon-plus-sign"></i></a></span>
          </div>
        </div>

        <div id="ajax_select_series"></div>

        <div class="control-group">
          <label class="control-label" for="name">Product</label>
          <div class="controls">
            <input type="text" id="name" name="name" placeholder="ex: Blackberry Z10">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="release">Release Date</label>
          <div class="controls">
            <input type="text" id="release" name="release" placeholder="ex: 2012-12-30">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="desc">Simple Desc</label>
          <div class="controls">
            <textarea type="text" id="desc" name="desc"></textarea>
          </div>
        </div>
        <div class="control-group">
          <label class="radio inline">
            <input type="radio" name="users_prioritas" id="users_prioritas" value="urgent"><span class="label label-important">Urgent</span>
          </label>
          <label class="radio inline">
            <input type="radio" name="users_prioritas" id="users_prioritas" value="normal" checked><span class="label label-success">Normal</span>
          </label>
          <label class="radio inline">
            <input type="radio" name="users_prioritas" id="users_prioritas" value="low"><span class="label">Low</span>
          </label>
        </div>
        <div class="control-group">
          <div class="controls pull-right"><p>&nbsp;</p>
            <button type="submit" name="FormSubmit" value="submit" class="btn btn-large btn-primary">Add New</button>
          </div>
        </div>
      </form>
    </div>

  </div>
</section>

<script type="text/javascript">
$(document).ready(function() {
  $("#c_brand").change(function() { 
    var id=$(this).val();
    var dataString = 'c_brand='+ id;

    $.ajax({
      type: "GET",
      url: "ajax_select_series_model.php",
      data: dataString,
      cache: false,
      async: false,
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

<?php
@include ("../../footer.php");
?> 