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
$NODE = "Gadget";
@include_once ("con.php");
@include_once ("../header.php");
@include_once ("../nav.php");
?>

<div class="page-header">
  <h1><?php echo $NODE;?> <small>Dashboard</small></h1>
</div>

<!-- breadcrumb -->
<ul class="breadcrumb">
  <li class="active"><i class="icon-home"></i> <a href="../">Home</a> <span class="divider">/</span></li>
  <li class="active"><?php echo $NODE;?></li>
</ul>

<?php
//@include ("subnav.php");
?>

<!-- tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="./"><i class="icon-signal"></i> Dashboard</a></li>
  <li><a href="brands"><i class="icon-flag"></i> Brands</a></li>
  <li><a href="#"><i class="icon-certificate"></i> OS</a></li>
</ul>

<div class="row">
  <div class="span4" id="dashboard">
    <h2>Heading</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class="btn" href="#">View details &raquo;</a></p>
  </div>
  <div class="span4">
    <h2>Heading</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class="btn" href="#">View details &raquo;</a></p>
  </div>
  <div class="span4">
    <h2>Heading</h2>
    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
    <p><a class="btn" href="#">View details &raquo;</a></p>
  </div>
</div>
<?php
@include ("../footer.php");
?> 