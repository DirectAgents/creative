<?php /* Smarty version 2.6.13, created on 2016-12-08 14:59:27
         compiled from default/layout.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'call_module', 'default/layout.tpl.html', 25, false),)), $this); ?>

  <div id="c5t_body">
  <div id="c5t_bodycontent">
  
    <!-- Language selection (link list or dropdown menu) -->
    
    <!--<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/language.tpl.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>-->
  
    

    <?php $_from = $this->_tpl_vars['system_messages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <div class="c5t_system">
      <div class="c5t_index"><?php echo $this->_tpl_vars['item']['title']; ?>
</div>
      <div class="c5t_code"><br /><?php echo $this->_tpl_vars['item']['message']; ?>
</div>
    </div>
    <?php endforeach; endif; unset($_from); ?>

    <?php $_from = $this->_tpl_vars['error_messages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <div class="c5t_system">
      <div class="c5t_index"><?php echo $this->_tpl_vars['item']['title']; ?>
</div>
      <div class="c5t_code"><br /><?php echo $this->_tpl_vars['item']['message']; ?>
</div>
    </div>
    <?php endforeach; endif; unset($_from); ?>
    
    <?php echo c5t_module::call_module_output(array('trigger' => 'frontend_page_header'), $this);?>

  
  
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['detail_template'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>    
    
    
    <?php echo c5t_module::call_module_output(array('trigger' => 'frontend_page_footer'), $this);?>

    
    
    
    
    <?php $_from = $this->_tpl_vars['debug_messages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <div class="c5t_system">
      <div class="c5t_index"><?php echo $this->_tpl_vars['item']['title']; ?>
</div>
      <div class="c5t_code"><br /><?php echo $this->_tpl_vars['item']['message']; ?>
</div>
    </div>
    <?php endforeach; endif; unset($_from); ?>
    
  </div>
  </div>
    