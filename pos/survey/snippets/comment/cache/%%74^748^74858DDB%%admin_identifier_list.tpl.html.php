<?php /* Smarty version 2.6.13, created on 2016-12-08 21:45:50
         compiled from admin/admin_identifier_list.tpl.html */ ?>
    <img src="../template/admin/image/icon/pagelist_large.png" width="32" height="32" align="left" style="margin-right:20px;" />
    <h3><?php echo $this->_tpl_vars['txt_identifier_list']; ?>
</h3>
    
    <div class="c5t_link_button">
      <a href="javascript:display('c5t_advanced');"><?php echo $this->_tpl_vars['txt_advanced_options']; ?>
</a>        
    </div>
    
    <div id="c5t_advanced" style="display:<?php if ($this->_tpl_vars['display_advanced']): ?>block<?php else: ?>none<?php endif; ?>;">
            
        <div class="c5t_search_form_background">
        <div class="c5t_search_form">
            <form <?php echo $this->_tpl_vars['form']['attributes']; ?>
>
            <?php echo $this->_tpl_vars['form']['search_field']['label']; ?>
 <?php echo $this->_tpl_vars['form']['search_field']['html']; ?>

            <?php echo $this->_tpl_vars['form']['search_query']['label']; ?>
 <?php echo $this->_tpl_vars['form']['search_query']['html']; ?>

            <?php echo $this->_tpl_vars['form']['search']['html']; ?>

            <?php echo $this->_tpl_vars['form']['search_delete']['html']; ?>

            </form>
        </div>
        </div>
    
        
        <br />
        <br />
    
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
    <div class="c5t_confirmation_background">
    <div class="c5t_confirmation">
        <div class="c5t_confirmation_text">
          <?php echo $this->_tpl_vars['txt_sure_delete_identifier']; ?>

        </div>
        <div class="c5t_confirmation_buttons">
          <a href="./pagelist.php?do=dc&amp;i=<?php echo $this->_tpl_vars['delete_confirmation']['identifier_id']; ?>
"><?php echo $this->_tpl_vars['txt_yes_sure']; ?>
</a>
          <a href="./pagelist.php?i=<?php echo $this->_tpl_vars['delete_confirmation']['identifier_id']; ?>
"><?php echo $this->_tpl_vars['txt_cancel']; ?>
</a>
        </div>
    </div>
    </div>
    <?php endif; ?>



    <?php if ($this->_tpl_vars['display_pagination']): ?>
    <div class="c5t_pagination">
      <?php if ($this->_tpl_vars['browse_previous'] == 2): ?>
        <a href="./pagelist.php?page=1"><?php echo $this->_tpl_vars['txt_start']; ?>
</a>
        <a href="./pagelist.php?<?php echo $this->_tpl_vars['query_previous']; ?>
">&laquo;&nbsp;<?php echo $this->_tpl_vars['txt_previous_page']; ?>
</a>
      <?php else: ?>
        <span><?php echo $this->_tpl_vars['txt_start']; ?>
</span>
        <span>&laquo;&nbsp;<?php echo $this->_tpl_vars['txt_previous_page']; ?>
</span>
      <?php endif; ?>
      
      <?php if ($this->_tpl_vars['browse_next'] == 2): ?>
        <a href="./pagelist.php?<?php echo $this->_tpl_vars['query_next']; ?>
"><?php echo $this->_tpl_vars['txt_next_page']; ?>
&nbsp;&raquo;</a>
        <a href="./pagelist.php?page=<?php echo $this->_tpl_vars['result_pages']; ?>
"><?php echo $this->_tpl_vars['txt_end']; ?>
</a>
      <?php else: ?>
        <span><?php echo $this->_tpl_vars['txt_next_page']; ?>
&nbsp;&raquo;</span>
        <span><?php echo $this->_tpl_vars['txt_end']; ?>
</span>
      <?php endif; ?>
    </div>
    <?php endif; ?>

    
    <table class="c5t_identifier_list">
    <tr>
      <th></th>
      <th></th>
      <th><!-- Label: id -->
        <a href="./pagelist.php?o=id&amp;<?php echo $this->_tpl_vars['query_id']; ?>
"><?php echo $this->_tpl_vars['txt_id']; ?>
</a><?php if ($this->_tpl_vars['order_id'] == 1): ?>&nbsp;<img src="../template/default/image/desc.gif" width="7" height="10" border="0" alt="">&nbsp;<?php elseif ($this->_tpl_vars['order_id'] == 2): ?>&nbsp;<img src="../template/default/image/asc.gif" width="7" height="10" border="0" alt="">&nbsp;<?php endif; ?> 
      </th>
      <th style="width:70%;"><!-- Label: identifier -->
        <a href="./pagelist.php?o=identifier&amp;<?php echo $this->_tpl_vars['query_identifier']; ?>
"><?php echo $this->_tpl_vars['txt_identifier']; ?>
</a><?php if ($this->_tpl_vars['order_identifier'] == 1): ?>&nbsp;<img src="../template/default/image/desc.gif" width="7" height="10" border="0" alt="">&nbsp;<?php elseif ($this->_tpl_vars['order_identifier'] == 2): ?>&nbsp;<img src="../template/default/image/asc.gif" width="7" height="10" border="0" alt="">&nbsp;<?php endif; ?> 
      </th>
    </tr>
    <?php $_from = $this->_tpl_vars['identifier_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <tr>
      <td><a href="./pagelist.php?do=d&amp;i=<?php echo $this->_tpl_vars['item']['identifier_id']; ?>
"><?php echo $this->_tpl_vars['txt_delete']; ?>
</a></td>
      <td><a href="./commentlist.php?i=<?php echo $this->_tpl_vars['item']['identifier_id']; ?>
" title="<?php echo $this->_tpl_vars['item']['identifier_value']; ?>
"><?php echo $this->_tpl_vars['txt_comments']; ?>
</a></td>
      <td><?php echo $this->_tpl_vars['item']['identifier_id']; ?>
</td>
      <td><a href="./commentlist.php?i=<?php echo $this->_tpl_vars['item']['identifier_id']; ?>
" title="<?php echo $this->_tpl_vars['item']['identifier_value']; ?>
"><?php echo $this->_tpl_vars['item']['identifier_output']; ?>
</a></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>    
    </table>
    


    <?php if ($this->_tpl_vars['display_pagination']): ?>
    <div class="c5t_pagination">
      <?php if ($this->_tpl_vars['browse_previous'] == 2): ?>
        <a href="./pagelist.php?page=1"><?php echo $this->_tpl_vars['txt_start']; ?>
</a>
        <a href="./pagelist.php?<?php echo $this->_tpl_vars['query_previous']; ?>
">&laquo;&nbsp;<?php echo $this->_tpl_vars['txt_previous_page']; ?>
</a>
      <?php else: ?>
        <span><?php echo $this->_tpl_vars['txt_start']; ?>
</span>
        <span>&laquo;&nbsp;<?php echo $this->_tpl_vars['txt_previous_page']; ?>
</span>
      <?php endif; ?>
      
      <?php if ($this->_tpl_vars['browse_next'] == 2): ?>
        <a href="./pagelist.php?<?php echo $this->_tpl_vars['query_next']; ?>
"><?php echo $this->_tpl_vars['txt_next_page']; ?>
&nbsp;&raquo;</a>
        <a href="./pagelist.php?page=<?php echo $this->_tpl_vars['result_pages']; ?>
"><?php echo $this->_tpl_vars['txt_end']; ?>
</a>
      <?php else: ?>
        <span><?php echo $this->_tpl_vars['txt_next_page']; ?>
&nbsp;&raquo;</span>
        <span><?php echo $this->_tpl_vars['txt_end']; ?>
</span>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    

    <div class="c5t_results_per_page">
      <?php echo $this->_tpl_vars['txt_results_per_page']; ?>
 
      <a href="./pagelist.php?limit=10">10</a>
      <a href="./pagelist.php?limit=20">20</a>
      <a href="./pagelist.php?limit=30">30</a>
      <a href="./pagelist.php?limit=40">40</a>
      <a href="./pagelist.php?limit=50">50</a>
      <a href="./pagelist.php?limit=60">60</a>
      <a href="./pagelist.php?limit=70">70</a>
      <a href="./pagelist.php?limit=80">80</a>
      <a href="./pagelist.php?limit=90">90</a>
      <a href="./pagelist.php?limit=100">100</a>
      <a href="./pagelist.php?limit=150">150</a>
    </div>