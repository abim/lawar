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
$NODE = "Dashboard";
@include ("header.php");
@include ("nav.php");
?>
<div class="page-header">
  <h1>Dashboard</h1>
</div>

<!-- columns -->
<div class="row">
  <div class="span2">
    <a href="./company"><img src="<?php echo x_IMG."/desktop-company.png";?>" class="img-circle"></a>
  </div>
  <div class="span2"></div>
  <div class="span2"></div>
  <div class="span2"></div>
  <div class="span2"></div>
  <div class="span2"></div>
</div>

<?php
@include ("footer.php");
?> 