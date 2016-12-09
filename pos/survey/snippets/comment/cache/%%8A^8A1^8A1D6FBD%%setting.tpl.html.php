<?php /* Smarty version 2.6.13, created on 2016-12-08 21:45:10
         compiled from admin/setting.tpl.html */ ?>
    <img src="../template/admin/image/icon/configuration_large.png" width="32" height="32" align="left" style="margin-right:20px;" />
    <h3><?php echo $this->_tpl_vars['txt_configuration']; ?>
</h3>
    
    
    
    
    <form <?php echo $this->_tpl_vars['form']['attributes']; ?>
>
    <?php echo $this->_tpl_vars['form']['hidden']; ?>

    

    <fieldset class="c5t_setting_form">
      <legend><?php echo $this->_tpl_vars['txt_general_settings']; ?>
</legend>
      
      
        <div class="c5t_error_message">
          <?php $_from = $this->_tpl_vars['message']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="c5t_error_message_item"><?php echo $this->_tpl_vars['item']; ?>
</div>
          <?php endforeach; endif; unset($_from); ?>              
        </div>
      
      
        <table class="c5t_setting">
          
          <tr>
            <td class="c5t_setting_form_label"><?php echo $this->_tpl_vars['form']['default_language']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['default_language']['html']; ?>
</td>
          </tr>        
          
          <tr>
            <td class="c5t_setting_form_label"><?php echo $this->_tpl_vars['form']['display_comments']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['display_comments']['html']; ?>
</td>
          </tr>
          
          <tr>
            <td class="c5t_setting_form_label"><?php echo $this->_tpl_vars['form']['display_comment_form']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['display_comment_form']['html']; ?>
</td>
          </tr>
          
          <tr>
            <td class="c5t_setting_form_label"><?php echo $this->_tpl_vars['form']['display_turn_off_messages']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['display_turn_off_messages']['html']; ?>
</td>
          </tr>
          
          <tr>
            <td class="c5t_setting_form_label"><?php echo $this->_tpl_vars['form']['page_registration']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['page_registration']['html']; ?>
</td>
          </tr>
          
          <tr>
            <td class="c5t_setting_form_label"><?php echo $this->_tpl_vars['form']['script_url']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['script_url']['html']; ?>
</td>
          </tr>
          
          <tr>
            <td class="c5t_setting_form_label"><?php echo $this->_tpl_vars['form']['frontend_result_number']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['frontend_result_number']['html']; ?>
 <?php echo $this->_tpl_vars['txt_frontend_result_help']; ?>

               <br /><span class="c5t_error_message"><?php if ($this->_tpl_vars['form']['frontend_result_number']['error']): ?> <?php echo $this->_tpl_vars['form']['frontend_result_number']['error']; ?>
</span><?php endif; ?>
            </td>
          </tr>
          
          <tr>
            <td class="c5t_setting_form_label"><?php echo $this->_tpl_vars['form']['frontend_order']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['frontend_order']['html']; ?>
</td>
          </tr>  
          
          <tr>
            <td class="c5t_setting_form_label"><?php echo $this->_tpl_vars['form']['enable_moderation']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['enable_moderation']['html']; ?>
</td>
          </tr> 
          
          <tr>
            <td class="c5t_setting_form_label"><?php echo $this->_tpl_vars['form']['publish_delay']['label']; ?>
</td>
            <td>
            <?php echo $this->_tpl_vars['txt_publish_delay_help']; ?>
<br /><br />
            <?php echo $this->_tpl_vars['form']['publish_delay']['html']; ?>

            <br /><span class="c5t_error_message"><?php if ($this->_tpl_vars['form']['publish_delay']['error']): ?> <?php echo $this->_tpl_vars['form']['publish_delay']['error']; ?>
</span><?php endif; ?>
            </td>
          </tr> 
                            
          <tr>
            <td class="c5t_setting_form_label"></td>
            <td><?php echo $this->_tpl_vars['form']['save']['html']; ?>
</td>
          </tr>
          
        </table>
    </fieldset>
    
    
    <fieldset class="c5t_setting_form">
      <legend><?php echo $this->_tpl_vars['txt_miscellaneous']; ?>
</legend>
        <table class="c5t_setting">
                 
          <tr>
            <td colspan="2"><?php echo $this->_tpl_vars['txt_c5t_root_note']; ?>
</td>
          </tr> 
                  
          <tr>
            <td class="c5t_setting_form_label">C5T_ROOT</td>
            <td><?php echo $this->_tpl_vars['script_server_path']; ?>
</td>
          </tr>
                  
            
        </table>
    </fieldset>
    
    
    </form>