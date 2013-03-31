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
$NODE = "Seri";
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
  <li class="active"><a href="seri"><i class="icon-th"></i> <?php echo $NODE;?></a></li>
</ul>

<section id="tables">

  <div class="row">
    <div class="span5">
      <h3 id="pager">New</h3>
    </div>

    <div class="span7">
      <h3 id="pager"><?php echo $NODE;?></h3>

      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>#ID</th>
            <th>Category</th>
            <th>slug</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td><a href="#"><i class="icon-edit"></i> Edit</a> <a href="#"><i class="icon-remove"></i> Delete</a></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td><a href="#"><i class="icon-edit"></i> Edit</a> <a href="#"><i class="icon-remove"></i> Delete</a></td>
          </tr>
          <tr>
            <td>3</td>
            <td>Larry</td>
            <td>the Bird</td>
            <td><a href="#"><i class="icon-edit"></i> Edit</a> <a href="#"><i class="icon-remove"></i> Delete</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?php
@include ("../../footer.php");
?> 