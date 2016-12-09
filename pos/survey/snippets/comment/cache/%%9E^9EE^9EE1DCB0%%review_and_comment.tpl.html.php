<?php /* Smarty version 2.6.13, created on 2016-12-08 14:59:27
         compiled from default/review_and_comment.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'call_module', 'default/review_and_comment.tpl.html', 2, false),)), $this); ?>
    
    <?php echo c5t_module::call_module_output(array('trigger' => 'frontend_content_footer','data' => ($this->_tpl_vars['page_data'])), $this);?>



 <!-- Comment Form Start -->
        <a name="c5t_form"></a>
        
        <div class="c5t_comment_form_background">
        <form <?php echo $this->_tpl_vars['form']['attributes']; ?>
>
        
          <table class="c5t_comment_form_table">

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
              <td class="c5t_comment_form_field">
                <?php echo $this->_tpl_vars['form']['name']['html']; ?>

              </td>
            </tr>

            

            <tr>
              <td class="c5t_comment_form_label">
             Write a short review describing how the experience was during the meeting
              </td>
            </tr>

              <tr>
              <td class="c5t_comment_form_submit">&nbsp;</td>
            </tr>
            
            <tr>
              <td>
                <?php echo c5t_module::call_module_output(array('trigger' => 'frontend_textarea','field' => $this->_tpl_vars['comment_field_name']), $this);?>
                
              </td>
            </tr>
            
            <tr>
              <td class="c5t_comment_form_field">
                <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['comment_field_name']]['html']; ?>
                
              </td>
            </tr>
            
            <tr>
              <td class="c5t_comment_form_field">
                <?php echo c5t_module::call_module_output(array('trigger' => 'frontend_comment_form'), $this);?>

              </td>
            </tr>


            <tr>
              <td class="c5t_comment_form_label"></td>
            </tr>
             <tr>
              <td class="c5t_comment_form_submit">&nbsp;</td>
            </tr>
            <tr>
              <td class="c5t_comment_form_submit"><?php echo $this->_tpl_vars['form']['save']['html'];  echo $this->_tpl_vars['form']['hidden']; ?>
</td>
            </tr>
              <tr>
              <td class="c5t_comment_form_submit">&nbsp;</td>
            </tr>

            <?php endif; ?>
          </table>
            
        </form>
        </div>
    <!-- Comment Form End -->








    <!-- Comment List Start -->
    <a name="c5t_comment"></a>
   <div class="thetitle"><?php echo $this->_tpl_vars['txt_comment_headline']; ?>
 (<?php echo $this->_tpl_vars['result_number']; ?>
)</div>
    
    <div class="c5t_comment_list">        
        <?php $_from = $this->_tpl_vars['comment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="c5t_comment_item_background">
            <div class="c5t_comment_item">
                <div class="c5t_comment_item_title"><?php echo $this->_tpl_vars['item']['comment_title']; ?>
</div>
                <div class="c5t_comment_item_text"><?php echo $this->_tpl_vars['item']['frontend_text']; ?>
</div>
                <div class="c5t_comment_item_details">#<?php echo $this->_tpl_vars['item']['comment_number']; ?>
 - <?php if ($this->_tpl_vars['item']['comment_author_homepage'] != '' && $this->_tpl_vars['item']['comment_author_homepage'] != 'http://'): ?><a href="<?php echo $this->_tpl_vars['item']['comment_author_homepage']; ?>
"><?php echo $this->_tpl_vars['item']['comment_author_name']; ?>
</a><?php else:  echo $this->_tpl_vars['item']['comment_author_name'];  endif; ?> - <?php echo $this->_tpl_vars['item']['comment_date']; ?>
 - <?php echo $this->_tpl_vars['item']['comment_time']; ?>
</div>
            </div>
            </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <!-- Comment List End -->
    
    
    
    
    
    
    <!-- Pagination Form Start -->
    <?php if ($this->_tpl_vars['comment_list'] && $this->_tpl_vars['display_pagination']): ?>
        <div class="c5t_frontend_pagination">
          <?php if ($this->_tpl_vars['browse_previous'] == 2): ?>
            <form <?php echo $this->_tpl_vars['startpage']['attributes']; ?>
><?php echo $this->_tpl_vars['startpage']['hidden'];  echo $this->_tpl_vars['startpage']['start']['html']; ?>
</form>
            <form <?php echo $this->_tpl_vars['previouspage']['attributes']; ?>
><?php echo $this->_tpl_vars['previouspage']['hidden'];  echo $this->_tpl_vars['previouspage']['previous']['html']; ?>
</form>
          <?php else: ?>
            <span><?php echo $this->_tpl_vars['txt_start']; ?>
</span>
            <span><?php echo $this->_tpl_vars['txt_previous_page']; ?>
</span>
          <?php endif; ?>
          
          <?php if ($this->_tpl_vars['browse_next'] == 2): ?>
            <form <?php echo $this->_tpl_vars['nextpage']['attributes']; ?>
><?php echo $this->_tpl_vars['nextpage']['hidden'];  echo $this->_tpl_vars['nextpage']['next']['html']; ?>
</form>
            <form <?php echo $this->_tpl_vars['endpage']['attributes']; ?>
><?php echo $this->_tpl_vars['endpage']['hidden'];  echo $this->_tpl_vars['endpage']['end']['html']; ?>
</form>
          <?php else: ?>
            <span><?php echo $this->_tpl_vars['txt_next_page']; ?>
</span>
            <span><?php echo $this->_tpl_vars['txt_end']; ?>
</span>
          <?php endif; ?>
        </div>
    <?php endif; ?>
    <!-- Pagination Form End -->
    
    
    
    
    


 
    
    
    
    
    
    