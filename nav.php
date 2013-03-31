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
?>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="<?php echo x_BASE;?>/">Product Networks</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li<?php echo ($nav == "ds" ? " class=\"active\"" : "");?>><a href="<?php echo x_BASE;?>/">Dashboard</a></li>
          <li class="dropdown <?php echo ($nav == "g1" ? "active" : "");?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gadget <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo x_BASE;?>/gadget/">Dashboard</a></li>
              <li class="divider"></li>
              <li class="nav-header">Products</li>
              <li><a href="<?php echo x_BASE;?>/gadget/phones/">Phones</a></li>
              <li><a href="#">Tablet</a></li>
              <li><a href="#">Accessories</a></li>
            </ul>
          </li>
          <li><a href="#">Automotive</a></li>
          <li><a href="#">Laptop</a></li>
          <li><a href="#">Camera</a></li>
        </ul>
        <p class="navbar-text pull-right">
          Logged in as <a href="<?php echo x_BASE;?>/login" class="navbar-link">Username</a>
        </p>
        </div><!--/.nav-collapse -->
    </div>
  </div>
</div>

<div class="container">
  <form class="form-search pull-right">
    <input type="text" class="input-medium search-query" placeholder="search">
  </form>
        