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
            <th>slug</th>
            <th>Brand</th>
            <th>Product</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Samsung</td>
            <td>samsung</td>
            <td>5</td>
            <td>854</td>
            <td>
              <a href="#disable" class="btn btn-mini btn-info"><i class="icon-edit"></i> Edit</a>
              <a href="#disable" class="btn btn-mini btn-danger disabled"><i class="icon-remove"></i> Delete</a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>HTC</td>
            <td>htc</td>
            <td>3</td>
            <td>155</td>
            <td>
              <a href="#disable" class="btn btn-mini btn-info"><i class="icon-edit"></i> Edit</a>
              <a href="#disable" class="btn btn-mini btn-danger disabled"><i class="icon-remove"></i> Delete</a>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>Apple</td>
            <td>iphone</td>
            <td>9</td>
            <td>45</td>
            <td>
              <a href="#disable" class="btn btn-mini btn-info"><i class="icon-edit"></i> Edit</a>
              <a href="#disable" class="btn btn-mini btn-danger disabled"><i class="icon-remove"></i> Delete</a>
            </td>
          </tr>
        </tbody>
      </table>
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
      </div>
    </div>

    <div class="span4">
      <h3 id="pager">New</h3>
      
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Sip</strong>.
      </div>

      <form>
        <div class="control-group">
          <label class="control-label" for="name">Company Name</label>
          <div class="controls">
            <input type="text" id="name" placeholder="Company Name">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="weblink">Website</label>
          <div class="controls">
            <input type="text" id="weblink" placeholder="tanpa http://">
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn">Add New</button>
          </div>
        </div>
      </form>
    </div>

  </div>
</section>

<?php
@include ("footer.php");
?>