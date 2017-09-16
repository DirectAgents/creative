<?php /* Smarty version 2.6.13, created on 2016-12-24 04:56:16
         compiled from admin/navigation.tpl.html */ ?>
<div class="c5t_navigation_background">
<div class="c5t_navigation">

<!-- <p><strong><?php echo $this->_tpl_vars['txt_navigation']; ?>
</strong></p> -->
<ul>
  <li><a href="./"><img src="../template/admin/image/icon/homepage.png" width="22" height="22" align="absmiddle" /><?php echo $this->_tpl_vars['txt_homepage']; ?>
</a></li>
  <li><a href="./commentlistall.php"><img src="../template/admin/image/icon/latestcomments.png" width="22" height="22" align="absmiddle" /><?php echo $this->_tpl_vars['txt_latest_comments']; ?>
</a></li>
  <li><a href="./pagelist.php"><img src="../template/admin/image/icon/pagelist.png" width="22" height="22" align="absmiddle" /><?php echo $this->_tpl_vars['txt_identifier_list']; ?>
</a></li>
  <li><a href="./account.php"><img src="../template/admin/image/icon/adminaccount.png" width="22" height="22" align="absmiddle" /><?php echo $this->_tpl_vars['txt_admin_account']; ?>
</a></li>
  <li><a href="./configuration.php"><img src="../template/admin/image/icon/configuration.png" width="22" height="22" align="absmiddle" /><?php echo $this->_tpl_vars['txt_configuration']; ?>
</a></li>
  
  <?php if ($this->_tpl_vars['display_setting_navigation']): ?>
  <li class="c5t_sub_navigation"><a href="./setting.php"><?php echo $this->_tpl_vars['txt_general_settings']; ?>
</a></li>
  <li class="c5t_sub_navigation"><a href="./module.php"><?php echo $this->_tpl_vars['txt_module_installation']; ?>
</a></li>
  <?php $_from = $this->_tpl_vars['module_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
  <li class="c5t_sub_navigation"><a href="./module.php?m=<?php echo $this->_tpl_vars['item']['module']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></li>
  <?php endforeach; endif; unset($_from); ?>
  <?php endif; ?>
  
  <li><a href="./include.php"><img src="../template/admin/image/icon/include.png" width="22" height="22" align="absmiddle" /><?php echo $this->_tpl_vars['txt_include']; ?>
</a></li>
  <li><a href="./backup.php"><img src="../template/admin/image/icon/backup.png" width="22" height="22" align="absmiddle" /><?php echo $this->_tpl_vars['txt_backup']; ?>
</a></li>
  <li><a href="<?php echo $this->_tpl_vars['txt_documentation_link']; ?>
" target="_blank"><img src="../template/admin/image/icon/documentation.png" width="22" height="22" align="absmiddle" /><?php echo $this->_tpl_vars['txt_documentation']; ?>
</a></li>
  <li><a href="./?l=o"><img src="../template/admin/image/icon/logout.png" width="22" height="22" align="absmiddle" /><?php echo $this->_tpl_vars['txt_log_out']; ?>
</a></li>
</ul>

</div>
</div>