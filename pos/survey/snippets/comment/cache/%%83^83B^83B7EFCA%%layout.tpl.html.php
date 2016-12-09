<?php /* Smarty version 2.6.13, created on 2016-12-08 21:45:10
         compiled from admin/layout.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'call_module', 'admin/layout.tpl.html', 63, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<!doctype html public "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo $this->_tpl_vars['txt_content_direction']; ?>
">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['txt_charset']; ?>
" />
    <title><?php echo $this->_tpl_vars['txt_comment_script']; ?>
 <?php echo $this->_tpl_vars['txt_admin_area']; ?>
</title>
    <link rel="stylesheet" href="../template/default/style.css" type="text/css">
    <link rel="stylesheet" href="../template/admin/style.css" type="text/css">
    
    <?php echo '
    <script type="text/javascript">
        <!--
    '; ?>

    
            var c5t_sure_delete_comment = '<?php echo $this->_tpl_vars['txt_sure_delete_comment']; ?>
';
            
            
    <?php echo '
        
        
        function display(blockid) {
            if (document.getElementById(blockid).style.display==\'block\'){
                document.getElementById(blockid).style.display=\'none\';
            } else {
                document.getElementById(blockid).style.display=\'block\';
            }
        }  
    
        function delete_comment(c5t_url) {
            var answer = confirm(c5t_sure_delete_comment)
            if (answer){
                window.location = c5t_url;
                return false;
            }
            return answer;
        }
        
        function check_all(name, ctl) {
            for (i = 0; i < name.length; i++)
            {
                if (name[i].type == \'checkbox\') {
                    name[i].checked = ctl.checked? true:false
                }
            }
        }
        
        //-->
    </script>
    

    
    '; ?>

    
    


    
    <script language="javascript" src="../template/javascript/ColorPicker2.js"></script>
    
    <?php echo c5t_module::call_module_output(array('trigger' => 'backend_source_head'), $this);?>

    
  </head>
  <body>
    
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
  
    
    <?php if ($this->_tpl_vars['login_status']): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/navigation.tpl.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    
  <div class="c5t_admin_content_background">
  <div class="c5t_admin_content">
  
	<!-- Language selection (link list or dropdown menu) -->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/language.tpl.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['detail_template'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    
  </div>
  </div>
  
  
    
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
  
  </body>  
</html>