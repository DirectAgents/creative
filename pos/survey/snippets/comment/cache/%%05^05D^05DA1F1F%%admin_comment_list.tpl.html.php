<?php /* Smarty version 2.6.13, created on 2016-08-24 17:25:08
         compiled from admin/admin_comment_list.tpl.html */ ?>
    
    <h3 title="<?php echo $this->_tpl_vars['identifier_data']['identifier_value']; ?>
"><a href="./commentlist.php?i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
"><?php echo $this->_tpl_vars['identifier_data']['identifier_output']; ?>
</a> (<?php echo $this->_tpl_vars['result_number']; ?>
)
      <span style="font-weight:bold;font-size:80%;"><a href="./commentlist.php?o=date&amp;i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
&amp;do=rename"><?php echo $this->_tpl_vars['txt_rename']; ?>
</a></span>
    </h3>
    
    
    <?php if ($this->_tpl_vars['show_rename_form'] == 'yes'): ?>    
    <div class="c5t_identifier_form">
    <form <?php echo $this->_tpl_vars['identifier_form']['attributes']; ?>
>
      <?php echo $this->_tpl_vars['identifier_form']['hidden']; ?>

      <?php echo $this->_tpl_vars['identifier_form']['identifier']['label']; ?>
 <?php echo $this->_tpl_vars['identifier_form']['identifier']['html']; ?>
 &nbsp;&nbsp;&nbsp;
      <?php echo $this->_tpl_vars['identifier_form']['rename']['html']; ?>

    </form>
    <?php endif; ?>
      
    
    <?php if ($this->_tpl_vars['show_form'] == 'yes'): ?>
    <div class="c5t_identifier_form">
    <form <?php echo $this->_tpl_vars['identifier_form']['attributes']; ?>
>
      <?php echo $this->_tpl_vars['identifier_form']['hidden']; ?>

      <?php echo $this->_tpl_vars['identifier_form']['identifier_name']['label']; ?>
 <?php echo $this->_tpl_vars['identifier_form']['identifier_name']['html']; ?>
 &nbsp;&nbsp;&nbsp;
      <?php echo $this->_tpl_vars['identifier_form']['save']['html']; ?>

      <span style="font-weight:bold;margin-left:30px;"><a href="./commentlist.php?o=date&amp;i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
&amp;<?php echo $this->_tpl_vars['query_date']; ?>
"><?php echo $this->_tpl_vars['txt_order_by']; ?>
 <?php echo $this->_tpl_vars['txt_date']; ?>
</a><?php if ($this->_tpl_vars['order_date'] == 1): ?>&nbsp;<img src="../template/default/image/desc.gif" width="7" height="10" border="0" alt="">&nbsp;<?php elseif ($this->_tpl_vars['order_date'] == 2): ?>&nbsp;<img src="../template/default/image/asc.gif" width="7" height="10" border="0" alt="">&nbsp;<?php endif; ?></span>  
     
    </form>
    </div>
    <?php endif; ?>
    
    <div class="c5t_web_page"><?php echo $this->_tpl_vars['txt_web_page']; ?>
: <a href="<?php echo $this->_tpl_vars['identifier_data']['identifier_url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['identifier_data']['identifier_url']; ?>
</a></div>
    
    <div class="c5t_search_form_background">
    <div class="c5t_search_form">
    <form <?php echo $this->_tpl_vars['form']['attributes']; ?>
>
    <?php echo $this->_tpl_vars['form']['hidden']; ?>

    <?php echo $this->_tpl_vars['form']['search_field']['html']; ?>

    <?php echo $this->_tpl_vars['form']['search_query']['label']; ?>
 <?php echo $this->_tpl_vars['form']['search_query']['html']; ?>

    <?php echo $this->_tpl_vars['form']['search']['html']; ?>

    <?php echo $this->_tpl_vars['form']['search_delete']['html']; ?>

    </form>
    </div>
    </div>
    
    
    
    <div class="c5t_error_message" style="margin-top:20px;">
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
          <?php echo $this->_tpl_vars['txt_sure_delete_comment']; ?>

        </div>
        <div class="c5t_confirmation_buttons">
          <a href="./commentlist.php?do=dc&amp;i=<?php echo $this->_tpl_vars['delete_confirmation']['identifier_id']; ?>
&amp;c=<?php echo $this->_tpl_vars['delete_confirmation']['comment_id']; ?>
#c5t_<?php echo $this->_tpl_vars['delete_confirmation']['anchor']; ?>
"><?php echo $this->_tpl_vars['txt_yes_sure']; ?>
</a>
          <a href="./commentlist.php?i=<?php echo $this->_tpl_vars['delete_confirmation']['identifier_id']; ?>
&amp;c=<?php echo $this->_tpl_vars['delete_confirmation']['comment_id']; ?>
#c5t_<?php echo $this->_tpl_vars['delete_confirmation']['comment_id']; ?>
"><?php echo $this->_tpl_vars['txt_cancel']; ?>
</a>
        </div>
    </div>
    </div>
    <?php endif; ?>
    
    
    <?php if ($this->_tpl_vars['delete_list_confirmation']['dialogue'] == 1): ?>

    <form name="commentlist" action="./commentlist.php?i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
" method="POST">
    
    <?php $_from = $this->_tpl_vars['delete_list_confirmation']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <input type="hidden" name="delete_comment[]" value="<?php echo $this->_tpl_vars['item']; ?>
" />
    <?php endforeach; endif; unset($_from); ?>
    
    <div class="c5t_confirmation_background">
    <div class="c5t_confirmation">
        <div class="c5t_confirmation_text">
          <?php echo $this->_tpl_vars['txt_sure_delete_comments']; ?>

        </div>
    <input type="submit" name="submit_delete_comments_c" value="<?php echo $this->_tpl_vars['txt_yes_sure']; ?>
"/>
    <span class="c5t_link_submit_button"><a href="./commentlist.php"><?php echo $this->_tpl_vars['txt_cancel']; ?>
</a></span>
    
    </div>  
    </div>
    </form>
    <?php endif; ?>
    
    

    <div class="c5t_comment_list_admin">
        <form name="commentlist" action="./commentlist.php?i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
" method="POST">
        <?php $_from = $this->_tpl_vars['comment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <a name="c5t_<?php echo $this->_tpl_vars['item']['comment_id']; ?>
"></a>
            <div class="c5t_comment_item_admin_background">
            <div class="c5t_comment_item_admin">
                <div class="c5t_comment_item_admin_details">
                    <span title="<?php echo $this->_tpl_vars['txt_id']; ?>
: <?php echo $this->_tpl_vars['item']['comment_id']; ?>
">#<?php echo $this->_tpl_vars['item']['comment_number']; ?>
</span> -
                    <a href="<?php echo $this->_tpl_vars['item']['comment_author_homepage']; ?>
"><?php echo $this->_tpl_vars['item']['comment_author_name']; ?>
</a> - <?php echo $this->_tpl_vars['item']['comment_date']; ?>
 - <?php echo $this->_tpl_vars['item']['comment_time']; ?>

                    - <?php echo $this->_tpl_vars['txt_author_ip_address']; ?>
: <?php echo $this->_tpl_vars['item']['comment_author_ip']; ?>

                    - <span title="<?php echo $this->_tpl_vars['item']['comment_author_host']; ?>
"><?php echo $this->_tpl_vars['txt_author_hostname']; ?>
: <?php echo $this->_tpl_vars['item']['hostname_output']; ?>
</title>
                    - <span title="<?php echo $this->_tpl_vars['item']['comment_author_user_agent']; ?>
"><?php echo $this->_tpl_vars['txt_author_user_agent']; ?>
: <?php echo $this->_tpl_vars['item']['user_agent_output']; ?>
</title>
                </div>
                
	            <?php if ($this->_tpl_vars['activate_rating'] == 'Y'): ?>
	            <div class="c5t_comment_item_admin_rating">
			        <?php $_from = $this->_tpl_vars['item']['rating_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rating_item']):
?><img src="<?php echo $this->_tpl_vars['script_url']; ?>
template/admin/image/rating/<?php echo $this->_tpl_vars['rating_item']['type']; ?>
.png" alt="" /><?php endforeach; endif; unset($_from); ?>
				    <?php echo $this->_tpl_vars['item']['comment_rating']; ?>
 <?php echo $this->_tpl_vars['txt_out_of']; ?>
 <?php echo $this->_tpl_vars['rating_top_value']; ?>

	            </div>
	            <?php endif; ?>                
                <div class="c5t_comment_item_admin_title"><?php echo $this->_tpl_vars['item']['comment_title']; ?>
</div>
                <div class="c5t_comment_item_admin_text"><?php echo $this->_tpl_vars['item']['frontend_text']; ?>
</div>
                <div class="c5t_comment_item_admin_buttons">
                  <input type="checkbox" name="delete_comment[]" value="<?php echo $this->_tpl_vars['item']['comment_id']; ?>
" />
                  <a href="./commentlist.php?do=d&amp;i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
&amp;c=<?php echo $this->_tpl_vars['item']['comment_id']; ?>
&amp;p=<?php echo $this->_tpl_vars['item']['previous_id']; ?>
" onclick="return delete_comment('./commentlist.php?do=dc&amp;i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
&amp;c=<?php echo $this->_tpl_vars['item']['comment_id']; ?>
#c5t_<?php echo $this->_tpl_vars['item']['previous_id']; ?>
');"><?php echo $this->_tpl_vars['txt_delete']; ?>
</a> 
                  <a href="./comment.php?do=e&amp;i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
&amp;c=<?php echo $this->_tpl_vars['item']['comment_id']; ?>
"><?php echo $this->_tpl_vars['txt_edit']; ?>
</a>
                  <?php if ($this->_tpl_vars['item']['comment_status'] == $this->_tpl_vars['status_approved']): ?> 
                  <a href="./commentlist.php?do=da&amp;i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
&amp;c=<?php echo $this->_tpl_vars['item']['comment_id']; ?>
#c5t_<?php echo $this->_tpl_vars['item']['comment_id']; ?>
"><?php echo $this->_tpl_vars['txt_disapprove']; ?>
</a>
                  <?php else: ?>
                  <a href="./commentlist.php?do=a&amp;i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
&amp;c=<?php echo $this->_tpl_vars['item']['comment_id']; ?>
#c5t_<?php echo $this->_tpl_vars['item']['comment_id']; ?>
"><?php echo $this->_tpl_vars['txt_approve']; ?>
</a>
                  <?php endif; ?> 
                </div>
            </div>
            </div>
        <?php endforeach; endif; unset($_from); ?>
        
        <div class="c5t_confirmation_background">
        <div class="c5t_confirmation">
        <input type="submit" name="submit_delete_comments" value="<?php echo $this->_tpl_vars['txt_delete_comments']; ?>
"/>
        <input type="checkbox" name="checkall" value="<?php echo $this->_tpl_vars['txt_check_all']; ?>
" onclick="check_all(document.commentlist, this);"/> <?php echo $this->_tpl_vars['txt_check_all']; ?>

        </div>
        </div>

        </form>
    </div>


    <div class="c5t_pagination">
      <?php if ($this->_tpl_vars['browse_previous'] == 2): ?>
        <a href="./commentlist.php?page=1&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
"><?php echo $this->_tpl_vars['txt_start']; ?>
</a>
        <a href="./commentlist.php?<?php echo $this->_tpl_vars['query_previous']; ?>
&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
">&laquo;&nbsp;<?php echo $this->_tpl_vars['txt_previous_page']; ?>
</a>
      <?php else: ?>
        <span><?php echo $this->_tpl_vars['txt_start']; ?>
</span>
        <span>&laquo;&nbsp;<?php echo $this->_tpl_vars['txt_previous_page']; ?>
</span>
      <?php endif; ?>
      
      <?php if ($this->_tpl_vars['browse_next'] == 2): ?>
        <a href="./commentlist.php?<?php echo $this->_tpl_vars['query_next']; ?>
&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
"><?php echo $this->_tpl_vars['txt_next_page']; ?>
&nbsp;&raquo;</a>
        <a href="./commentlist.php?page=<?php echo $this->_tpl_vars['result_pages']; ?>
&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
"><?php echo $this->_tpl_vars['txt_end']; ?>
</a>
      <?php else: ?>
        <span><?php echo $this->_tpl_vars['txt_next_page']; ?>
&nbsp;&raquo;</span>
        <span><?php echo $this->_tpl_vars['txt_end']; ?>
</span>
      <?php endif; ?>
    </div>
    

    <div class="c5t_results_per_page">
      <?php echo $this->_tpl_vars['txt_results_per_page']; ?>
 
      <a href="./commentlist.php?limit=10&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
">10</a>
      <a href="./commentlist.php?limit=20&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
">20</a>
      <a href="./commentlist.php?limit=30&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
">30</a>
      <a href="./commentlist.php?limit=40&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
">40</a>
      <a href="./commentlist.php?limit=50&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
">50</a>
      <a href="./commentlist.php?limit=60&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
">60</a>
      <a href="./commentlist.php?limit=70&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
">70</a>
      <a href="./commentlist.php?limit=80&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
">80</a>
      <a href="./commentlist.php?limit=90&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
">90</a>
      <a href="./commentlist.php?limit=100&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
">100</a>
      <a href="./commentlist.php?limit=150&i=<?php echo $this->_tpl_vars['identifier_data']['identifier_id']; ?>
">150</a>
    </div>