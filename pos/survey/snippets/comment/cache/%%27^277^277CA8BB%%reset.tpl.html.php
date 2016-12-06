<?php /* Smarty version 2.6.13, created on 2016-12-06 21:00:47
         compiled from admin/reset.tpl.html */ ?>
    <div class="c5t_login_background">
    <form <?php echo $this->_tpl_vars['form']['attributes']; ?>
>
    <?php echo $this->_tpl_vars['form']['hidden']; ?>

    <table class="c5t_login">
      <tr>
        <td colspan="2" style="padding-bottom:15px;">
          <?php echo $this->_tpl_vars['txt_reset_login_text']; ?>
                  
        </td>
      </tr>
      <tr>
        <td colspan="2" class="c5t_error_message">
          <?php $_from = $this->_tpl_vars['message']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="c5t_error_message_item"><?php echo $this->_tpl_vars['item']; ?>
</div>
          <?php endforeach; endif; unset($_from); ?>              
        </td>
      </tr>
      <?php if ($this->_tpl_vars['show_form']): ?>
      <tr>
        <td><?php echo $this->_tpl_vars['form']['login_name']['label']; ?>
</td>
        <td><?php echo $this->_tpl_vars['form']['login_name']['html']; ?>
 <?php if ($this->_tpl_vars['form']['login_name']['error']): ?> <span class="c5t_error_message"><?php echo $this->_tpl_vars['form']['login_name']['error']; ?>
</span> <?php endif; ?></td>
      </tr>
      <tr>
        <td></td>
        <td><?php echo $this->_tpl_vars['form']['send']['html']; ?>
</td>
      </tr>
      <?php endif; ?>
    </table>      
    </form>
    </div>