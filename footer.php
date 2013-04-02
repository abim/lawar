<?php
/**
* @package      Lawar 1.0
* @version      Beta : 1.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @author       Uray Irvan Prasetya <urayirvan@gmail.com>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2013 underlegal Throne, Inc.
* @since        File available since Release 1.0
* @category     template-footer
*/
?>
  <hr>

  <footer>
    <p>&copy;2013 Lawar <span class="badge badge-warning"><?php echo x_APPVER;?></span></p>
  </footer>

</div> <!-- /container -->
    <script src="<?php echo x_BASE;?>/static/js/bootstrap.min.js"></script>
    <!--<script src="<?php echo x_BASE;?>/static/js/apps.js"></script>-->
  </body>
</html>
<?php 
if(isset($sql)) { $sql->db_Close();}
if(isset($sql2)) { $sql2->db_Close();}
if(isset($xsql)) { $xsql->db_Close();}
?>