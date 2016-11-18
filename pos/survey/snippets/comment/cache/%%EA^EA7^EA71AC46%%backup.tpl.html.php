<?php /* Smarty version 2.6.13, created on 2016-08-19 18:58:13
         compiled from admin/backup.tpl.html */ ?>
<img src="../template/admin/image/icon/backup_large.png" width="32" height="32" align="left" style="margin-right:20px;" />
<h3><?php echo $this->_tpl_vars['txt_backup']; ?>
</h3>

<div class="c5t_link_button">
    <a href="./backup.php?do=ex">Export Backup</a>
</div>




<div class="c5t_error_message">
  <?php $_from = $this->_tpl_vars['message']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <div class="c5t_error_message_item"><?php echo $this->_tpl_vars['item']; ?>
</div>
  <?php endforeach; endif; unset($_from); ?>              
</div>

<?php if ($this->_tpl_vars['delete_confirmation']['dialogue'] == 1): ?>
<div class="c5t_confirmation">
    <div class="c5t_confirmation_text">
      <?php echo $this->_tpl_vars['txt_sure_delete_file']; ?>

    </div>
    <div class="c5t_confirmation_buttons">
      <a href="./backup.php?do=dec&amp;f=<?php echo $this->_tpl_vars['delete_confirmation']['file']; ?>
"><?php echo $this->_tpl_vars['txt_yes_sure']; ?>
</a>
      <a href="./backup.php"><?php echo $this->_tpl_vars['txt_cancel']; ?>
</a>
    </div>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['import_confirmation']['dialogue'] == 1): ?>
<div class="c5t_confirmation">
    <div class="c5t_confirmation_text">
      <?php echo $this->_tpl_vars['txt_sure_import_backup']; ?>

    </div>
    <div class="c5t_confirmation_buttons">
      <a href="./backup.php?do=imc&amp;f=<?php echo $this->_tpl_vars['import_confirmation']['file']; ?>
"><?php echo $this->_tpl_vars['txt_yes_sure']; ?>
</a>
      <a href="./backup.php"><?php echo $this->_tpl_vars['txt_cancel']; ?>
</a>
    </div>
</div>
<?php endif; ?>


<table class="c5t_file_list">
<tr>
  <th></th>
  <th></th>
  <th></th>
  <th><?php echo $this->_tpl_vars['txt_date']; ?>
</th>
  <th><?php echo $this->_tpl_vars['txt_time']; ?>
</th>
</tr>
<?php $_from = $this->_tpl_vars['backup_files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr>
  <td><a href="./backup.php?do=im&amp;f=<?php echo $this->_tpl_vars['item']['file']; ?>
"><?php echo $this->_tpl_vars['txt_import_backup']; ?>
</a></td>
  <td><a href="./backup.php?do=dl&amp;f=<?php echo $this->_tpl_vars['item']['file']; ?>
"><?php echo $this->_tpl_vars['txt_download_backup']; ?>
</a></td>
  <td><a href="./backup.php?do=de&amp;f=<?php echo $this->_tpl_vars['item']['file']; ?>
"><?php echo $this->_tpl_vars['txt_delete_backup']; ?>
</a></td>
  <td><?php echo $this->_tpl_vars['item']['date']; ?>
</td>
  <td><?php echo $this->_tpl_vars['item']['time']; ?>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>    
</table>
