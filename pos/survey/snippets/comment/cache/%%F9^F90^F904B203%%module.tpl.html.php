<?php /* Smarty version 2.6.13, created on 2016-12-08 21:46:05
         compiled from admin/module.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'call_module', 'admin/module.tpl.html', 49, false),)), $this); ?>
<img src="../template/admin/image/icon/configuration_large.png" width="32" height="32" align="left" style="margin-right:20px;" />
<h3><?php echo $this->_tpl_vars['txt_module_installation']; ?>
</h3>


<?php if ($this->_tpl_vars['display_form']): ?>
<fieldset class="c5t_setting_form">
  <legend><?php echo $this->_tpl_vars['module_title']; ?>
</legend>
  
        <div><?php echo $this->_tpl_vars['module_description']; ?>
</div>
    
        <div class="c5t_error_message" style="margin-top:20px;">
          <?php $_from = $this->_tpl_vars['module_message']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="c5t_error_message_item"><?php echo $this->_tpl_vars['item']['message']; ?>
</div>
          <?php endforeach; endif; unset($_from); ?>              
        </div>  
  
        <form <?php echo $this->_tpl_vars['form_attributes']; ?>
>
        
        <table class="c5t_setting">
        <?php $_from = $this->_tpl_vars['administration_form']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <tr>
          <td class="c5t_setting_form_label"><?php echo $this->_tpl_vars['item']['label']; ?>
</td>
          <td>
            <?php if ($this->_tpl_vars['item']['description']): ?>
                <?php echo $this->_tpl_vars['item']['description']; ?>

            
                <br />
                <br />
            <?php endif; ?>
            
            <?php if ($this->_tpl_vars['item']['type'] == 'group'): ?>            
                <?php $_from = $this->_tpl_vars['item']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subitem']):
?>
                    <?php echo $this->_tpl_vars['subitem']['html']; ?>
 <?php echo $this->_tpl_vars['item']['separator']; ?>

                <?php endforeach; endif; unset($_from); ?>
            <?php else: ?>            
                <div style="white-space:nowrap;">
                <?php echo $this->_tpl_vars['item']['html']; ?>
            
                <?php echo $this->_tpl_vars['item']['add_html']; ?>

                </div>            
            <?php endif; ?>
            <?php if ($this->_tpl_vars['item']['error']): ?> <br /><span class="c5t_error_message"><?php echo $this->_tpl_vars['item']['error']; ?>
<span> <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        </table>
        </form>
        
        
        <?php echo c5t_module::call_module_output(array('trigger' => 'module_demo','module' => $this->_tpl_vars['module_name']), $this);?>

        
</fieldset>

<?php else: ?>

<p>
  <img src="../template/admin/image/icon/apply.png" width="22" height="22" border="0" alt="<?php echo $this->_tpl_vars['txt_install_module']; ?>
" title="<?php echo $this->_tpl_vars['txt_install_module']; ?>
" /> = <?php echo $this->_tpl_vars['txt_installed_modules']; ?>
<br />
  <img src="../template/admin/image/icon/cancel.png" width="22" height="22" border="0" alt="<?php echo $this->_tpl_vars['txt_uninstall_module']; ?>
" title="<?php echo $this->_tpl_vars['txt_uninstall_module']; ?>
" /> = <?php echo $this->_tpl_vars['txt_not_installed_modules']; ?>

</p>


<div class="c5t_error_message" style="margin-top:20px;">
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
      <?php echo $this->_tpl_vars['txt_sure_uninstall_module']; ?>

    </div>
    <div class="c5t_confirmation_buttons">
      <a href="./module.php?u=<?php echo $this->_tpl_vars['delete_confirmation']['module']; ?>
&amp;c=y"><?php echo $this->_tpl_vars['txt_yes_sure']; ?>
</a>
      <a href="./module.php"><?php echo $this->_tpl_vars['txt_cancel']; ?>
</a>
    </div>
</div>
<?php endif; ?>

<table class="c5t_configuration_list">
<?php $_from = $this->_tpl_vars['available_modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr>
  <td class="c5t_configuration_list_label"><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
  <td>
    <?php if ($this->_tpl_vars['item']['installed'] == false): ?>
    <img src="../template/admin/image/icon/cancel.png" width="22" height="22" border="0" alt=""/>
    <?php else: ?>
    <img src="../template/admin/image/icon/apply.png" width="22" height="22" border="0" alt="" />  
    <?php endif; ?>
  </td> 
  <td><?php echo $this->_tpl_vars['item']['description']; ?>
</td>
  <td style="padding-right:50px;">

    <?php if ($this->_tpl_vars['item']['installed'] == true): ?>
      <a href="./module.php?u=<?php echo $this->_tpl_vars['item']['module']; ?>
"><?php echo $this->_tpl_vars['txt_uninstall_module']; ?>
</a>
    <?php else: ?>
      <a href="./module.php?i=<?php echo $this->_tpl_vars['item']['module']; ?>
"><?php echo $this->_tpl_vars['txt_install_module']; ?>
</a>
    <?php endif; ?>  
    
  </td>
  <?php if ($this->_tpl_vars['item']['installed'] == true): ?>
    <td><a href="./module.php?o=<?php echo $this->_tpl_vars['item']['module']; ?>
&amp;d=up" title="<?php echo $this->_tpl_vars['txt_move_up']; ?>
"><img src="../template/admin/image/icon/1uparrow.png" width="22" height="22" border="0" alt="<?php echo $this->_tpl_vars['txt_move_up']; ?>
" title="<?php echo $this->_tpl_vars['txt_move_up']; ?>
" /></a></td>
    <td><a href="./module.php?o=<?php echo $this->_tpl_vars['item']['module']; ?>
&amp;d=down" title="<?php echo $this->_tpl_vars['txt_move_down']; ?>
"><img src="../template/admin/image/icon/1downarrow.png" width="22" height="22" border="0" alt="<?php echo $this->_tpl_vars['txt_move_down']; ?>
" title="<?php echo $this->_tpl_vars['txt_move_down']; ?>
" /></a></td>
  <?php else: ?>
    <td></td>
    <td></td>
  <?php endif; ?>  
</tr>
<?php endforeach; endif; unset($_from); ?>    
</table>

<?php endif; ?>
