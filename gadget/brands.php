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

<?php
//@include ("subnav.php");
?>

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
            <th>#ID</th>
            <th>Brand</th>
            <th>slug</th>
            <th>Type</th>
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
            <td>iPhone</td>
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
      <form>
        <div class="control-group">
          <label class="control-label" for="name">Brand Name</label>
          <div class="controls">
            <input type="text" id="name" placeholder="Brand Name">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="company">Company</label>
          <div class="controls">
            <select id="company">
              <option>Samsung</option>
              <option>HTC</option>
              <option>Apple</option>
            </select>
            <span class="help-inline"><a href="#windowTitleDialog" data-toggle="modal"> <i class="icon-plus-sign"></i></a></span>
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