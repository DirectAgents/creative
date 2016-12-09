<?php /* Smarty version 2.6.13, created on 2016-12-08 21:45:47
         compiled from admin/admin_account.tpl.html */ ?>
<img src="../template/admin/image/icon/adminaccount_large.png" width="32" height="32" align="left" style="margin-right:20px;" />
    <h3><?php echo $this->_tpl_vars['txt_admin_account']; ?>
</h3>
    <form <?php echo $this->_tpl_vars['form']['attributes']; ?>
>
    <table class="c5t_admin_account">
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
      <?php if ($this->_tpl_vars['show_form'] == 'yes'): ?>
      <tr>
        <td><?php echo $this->_tpl_vars['form']['login_name']['label']; ?>
</td>
        <td><?php echo $this->_tpl_vars['form']['login_name']['html']; ?>
 <?php if ($this->_tpl_vars['form']['login_name']['error']): ?> <span class="c5t_error_message"><?php echo $this->_tpl_vars['form']['login_name']['error']; ?>
</span> <?php endif; ?></td>
      </tr>
      <tr>
        <td><?php echo $this->_tpl_vars['form']['email']['label']; ?>
</td>
        <td><?php echo $this->_tpl_vars['form']['email']['html']; ?>
 <?php if ($this->_tpl_vars['form']['email']['error']): ?> <span class="c5t_error_message"><?php echo $this->_tpl_vars['form']['email']['error']; ?>
</span> <?php endif; ?></td>
      </tr>
      <tr>
        <td><?php echo $this->_tpl_vars['form']['password']['label']; ?>
</td>
        <td><?php echo $this->_tpl_vars['form']['password']['html']; ?>
 <?php if ($this->_tpl_vars['form']['password']['error']): ?> <span class="c5t_error_message"><?php echo $this->_tpl_vars['form']['password']['error']; ?>
</span> <?php endif; ?></td>
      </tr>
      <tr>
        <td><?php echo $this->_tpl_vars['form']['repeat']['label']; ?>
</td>
        <td><?php echo $this->_tpl_vars['form']['repeat']['html']; ?>
 <?php if ($this->_tpl_vars['form']['repeat']['error']): ?> <span class="c5t_error_message"><?php echo $this->_tpl_vars['form']['repeat']['error']; ?>
</span> <?php endif; ?></td>
      </tr>
      <tr>
        <td></td>
        <td><?php echo $this->_tpl_vars['form']['save']['html']; ?>
</td>
      </tr> 
    <?php endif; ?>
    </table>      
    </form>