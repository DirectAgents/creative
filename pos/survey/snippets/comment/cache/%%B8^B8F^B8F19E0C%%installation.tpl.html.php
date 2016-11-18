<?php /* Smarty version 2.6.13, created on 2016-08-17 23:19:42
         compiled from admin/installation.tpl.html */ ?>
    
    <h3><?php echo $this->_tpl_vars['txt_installation']; ?>
</h3>
    
    <p><?php echo $this->_tpl_vars['txt_installation_text']; ?>
</p>
    
    
    <div class="c5t_error_message">
      <?php $_from = $this->_tpl_vars['message']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <div class="c5t_error_message_item"><?php echo $this->_tpl_vars['item']; ?>
</div>
      <?php endforeach; endif; unset($_from); ?>              
    </div>
    
    
    <?php if ($this->_tpl_vars['show_form']): ?>
    <form <?php echo $this->_tpl_vars['form']['attributes']; ?>
>
    <?php echo $this->_tpl_vars['form']['hidden']; ?>

    
    <fieldset class="c5t_installation_form">
      <legend><?php echo $this->_tpl_vars['txt_information']; ?>
</legend>
        <table>
               
          <!--
          Deprecated     
          <tr>
            <td class="c5t_installation_form_label"><?php echo $this->_tpl_vars['txt_script_folder_writable']; ?>
</td>
            <td><?php echo $this->_tpl_vars['script_folder_writable_status']; ?>
</td>
          </tr>
           -->
          
          <tr>
            <td class="c5t_installation_form_label"><?php echo $this->_tpl_vars['txt_cache_folder_writable']; ?>
</td>
            <td><?php echo $this->_tpl_vars['cache_folder_writable_status']; ?>
</td>
          </tr>
          
        </table>
        <p><?php echo $this->_tpl_vars['txt_installation_requirement_text']; ?>
</p>
    </fieldset>    
    
    
    <fieldset class="c5t_installation_form">
      <legend><?php echo $this->_tpl_vars['txt_step_one']; ?>
 - <?php echo $this->_tpl_vars['txt_database_access_data']; ?>
</legend>
        <table class="c5t_installation">
                  
          <tr>
            <td class="c5t_installation_form_label"><?php echo $this->_tpl_vars['form']['hostname']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['hostname']['html']; ?>
 <?php if ($this->_tpl_vars['form']['hostname']['error']): ?> <span class="c5t_error_message"><?php echo $this->_tpl_vars['form']['hostname']['error']; ?>
</span> <?php endif; ?></td>
          </tr>
          
          <tr>
            <td class="c5t_installation_form_label"><?php echo $this->_tpl_vars['form']['database']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['database']['html']; ?>
 <?php if ($this->_tpl_vars['form']['database']['error']): ?> <span class="c5t_error_message"><?php echo $this->_tpl_vars['form']['database']['error']; ?>
</span> <?php endif; ?></td>
          </tr>
          
          <tr>
            <td class="c5t_installation_form_label"><?php echo $this->_tpl_vars['form']['username']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['username']['html']; ?>
 <?php if ($this->_tpl_vars['form']['username']['error']): ?> <span class="c5t_error_message"><?php echo $this->_tpl_vars['form']['username']['error']; ?>
</span> <?php endif; ?></td>
          </tr>
          
          <tr>
            <td class="c5t_installation_form_label"><?php echo $this->_tpl_vars['form']['dbpassword']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['dbpassword']['html']; ?>
 <?php if ($this->_tpl_vars['form']['dbpassword']['error']): ?> <span class="c5t_error_message"><?php echo $this->_tpl_vars['form']['dbpassword']['error']; ?>
</span> <?php endif; ?></td>
          </tr>
          
          <tr>
            <td class="c5t_installation_form_label"><?php echo $this->_tpl_vars['form']['prefix']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['prefix']['html']; ?>
 <?php if ($this->_tpl_vars['form']['prefix']['error']): ?> <span class="c5t_error_message"><?php echo $this->_tpl_vars['form']['prefix']['error']; ?>
</span> <?php endif; ?></td>
          </tr>
          
        </table>
    </fieldset>
    
    <fieldset class="c5t_installation_form">
      <legend><?php echo $this->_tpl_vars['txt_step_two']; ?>
 - <?php echo $this->_tpl_vars['txt_admin_account']; ?>
</legend>
        <table class="c5t_installation">        
          
          <tr>
            <td class="c5t_installation_form_label"><?php echo $this->_tpl_vars['form']['login_name']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['login_name']['html']; ?>
 <?php if ($this->_tpl_vars['form']['login_name']['error']): ?> <span class="c5t_error_message"><?php echo $this->_tpl_vars['form']['login_name']['error']; ?>
</span> <?php endif; ?></td>
          </tr>
          
          <tr>
            <td class="c5t_installation_form_label"><?php echo $this->_tpl_vars['form']['email']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['email']['html']; ?>
 <?php if ($this->_tpl_vars['form']['email']['error']): ?> <span class="c5t_error_message"><?php echo $this->_tpl_vars['form']['email']['error']; ?>
</span> <?php endif; ?></td>
          </tr>
          
          <tr>
            <td class="c5t_installation_form_label"><?php echo $this->_tpl_vars['form']['password']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['password']['html']; ?>
 <?php if ($this->_tpl_vars['form']['password']['error']): ?> <span class="c5t_error_message"><?php echo $this->_tpl_vars['form']['password']['error']; ?>
</span> <?php endif; ?></td>
          </tr>
          
          <tr>
            <td class="c5t_installation_form_label"><?php echo $this->_tpl_vars['form']['repeat']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['repeat']['html']; ?>
 <?php if ($this->_tpl_vars['form']['repeat']['error']): ?> <span class="c5t_error_message"><?php echo $this->_tpl_vars['form']['repeat']['error']; ?>
</span> <?php endif; ?></td>
          </tr>
          
        </table>
    </fieldset>
    
    <fieldset class="c5t_installation_form">
      <legend><?php echo $this->_tpl_vars['txt_step_three']; ?>
 - <?php echo $this->_tpl_vars['txt_finish_installation']; ?>
</legend>
        <table class="c5t_installation">        
          <tr>
            <td class="c5t_installation_form_label"></td>
            <td><?php echo $this->_tpl_vars['form']['install']['html']; ?>
</td>
          </tr>
        </table>
    </fieldset>
    
    </form>
    <?php else: ?>      
      <a href="./"><?php echo $this->_tpl_vars['txt_login_form']; ?>
</a>  
    <?php endif; ?>