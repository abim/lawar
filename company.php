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
@include_once ("x0x/render.php");

$nav="ds";
$NODE = "Company";
@include_once ("header.php");
@include_once ("nav.php");
?>
<div class="page-header">
  <h1>Dashboard <small><?php echo $NODE;?></small></h1>
</div>

<!-- breadcrumb -->
<ul class="breadcrumb">
  <li><i class="icon-home"></i> <a href="./">Home</a> <span class="divider">/</span></li>
  <li class="active"><?php echo $NODE;?></li>
</ul>

<!-- tabs -->
<ul class="nav nav-tabs">
  <li><a href="./"><i class="icon-home"></i> Dashboard</a></li>
  <li class="active"><a href="company"><i class="icon-flag"></i> <?php echo $NODE;?></a></li>
</ul>

<section id="tables">

  <div class="row">
    <div class="span8">
      <h3 id="pager"><?php echo $NODE;?></h3>

      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>#ID</th>
            <th>Company</th>
            <th>GSIC</th>
            <th>Brand</th>
            <th>Product</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>

<?php
$TOTAL_VIEW_PER_HALAMAN = 2;
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

$sql -> db_Select("company", "id_company,name,code", "code!='' ORDER BY name LIMIT {$HALAMAN},{$TOTAL_VIEW_PER_HALAMAN}");

$sql2 = new db;
$sql2 -> db_Select("company", "code");
$TOTAL_DATA_TERQUERY = $sql2-> db_Rows();
$mulai_hitung = 1;  
while($row = $sql-> db_Fetch()){
  $hitung_baris = $mulai_hitung++;
  echo "
  <tr>
    <td>{$hitung_baris}</td>
    <td>{$row['name']}</td>
    <td>{$row['code']}</td>
    <td>0</td>
    <td>0</td>
    <td>
      <a href=\"#edit={$row['id_company']}\" class=\"btn btn-mini btn-info\"><i class=\"icon-edit\"></i> Edit</a>
      <a href=\"#disable\" class=\"btn btn-mini btn-danger disabled\"><i class=\"icon-remove\"></i> Delete</a>
    </td>
  </tr>
  ";
}
echo "</tbody></table>";

include_once ("x0x/np.class.php");
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
      <!--
      <div class="pagination pull-right">
        <ul>
          <li><a href="#">Prev</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">Next</a></li>
        </ul>
      </div>-->
      <ul>
        <li>[=] pagination</li>
        <li>[+] edit</li>
        <li>[+] delete</li>
      </ul>

    </div>

    <div class="span4">
      <h3 id="pager">New</h3>
<?php
if(isset($_POST['FormSubmit'])) {
  $code = cekCode(createCode());
  
  if ($sql -> db_Insert("codebank", "'0', '".$code."', 'company' ")) {
    $slug = createSlug($_POST['name']);
    $sql -> db_Insert("company", "'0', '".$code."', '".$_POST['name']."', '".$slug."', '".$_POST['weblink']."' ");
    echo "
      <div class=\"alert alert-success\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
        <strong>Sip</strong>.
      </div>
      ";
  } else {
    echo "
      <div class=\"alert alert-error\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
        <strong>Eror</strong>. Harap di ulang.
      </div>
      ";
  }
}
?>
      <form method='post' action='<?php echo x_SELF;?>'>
        <div class="control-group">
          <label class="control-label" for="name">Company Name</label>
          <div class="controls">
            <input type="text" id="name" name="name" placeholder="Company Name">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="weblink">Website</label>
          <div class="controls">
            <input type="text" id="weblink" name="weblink" placeholder="tanpa http://">
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

<?php
@include ("footer.php");
?>