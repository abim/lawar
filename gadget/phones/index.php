<?php
/**
* @package      Lawar 1.0
* @version      Beta : 1.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @author       Uray Irvan Prasetya <urayirvan@gmail.com>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2013 underlegal Throne, Inc.
* @since        File available since Release 1.0
* @category     index-landing
*/
@include ("../../x0x/render.php");
$NODE = "Phones";
@include ("../con.php");
@include_once ("../../header.php");
@include_once ("../../nav.php");
?>
<div class="page-header">
  <h1><?php echo $NODE;?> <small>Dashboard</small></h1>
</div>

<!-- breadcrumb -->
<ul class="breadcrumb">
  <li class="active"><i class="icon-home"></i> <a href="../../">Home</a> <span class="divider">/</span></li>
  <li class="active"><a href="../">Gadget</a> <span class="divider">/</span></li>
  <li class="active"><?php echo $NODE;?></li>
</ul>

<!-- tabs -->
<ul class="nav nav-tabs">
  <li class="dropdown active">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-signal"></i> Dashboard <b class="caret"></b></a>
    <ul class="dropdown-menu">
      <li class="active"><a href="./"><i class="icon-signal"></i> Phones</a></li>
      <li><a href="./"><i class="icon-signal"></i> Tablet</a></li>
    </ul>
  </li>
  <li><a href="products"><i class="icon-fire"></i> Products</a></li>
  <li><a href="model"><i class="icon-th-list"></i> Model</a></li>
  <li><a href="series"><i class="icon-tags"></i> Series</a></li>
</ul>

<!-- columns -->
<div class="row">
 <div id="columns">
    <?php
    $sql2 = new db;
    $sql -> db_Select("gadget_brand", "code,name", "GROUP BY name");
    while($row = $sql-> db_Fetch()){
        echo "
    <div class=\"span100\"><span class=\"btn btn-small btn-info\">".$row['name']."</span>
      <ul class=\"unstyled\">";
      $sql2 -> db_Select("gadget_model_series", "name", "WHERE c_brand='".$row['code']."' AND type='series' ORDER BY release_date DESC");
      while($row2 = $sql2-> db_Fetch()){
        echo "
        <li>├ <span class=\"label label-success\">".$row2['name']."</span></li>";
      }
      echo "
      </ul>
    </div>
        ";
    }

    ?>
  </div>
</div>
<?php
@include ("../../footer.php");
?> 