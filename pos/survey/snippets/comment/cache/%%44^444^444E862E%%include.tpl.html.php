<?php /* Smarty version 2.6.13, created on 2016-08-17 23:36:44
         compiled from admin/include.tpl.html */ ?>
    <img src="../template/admin/image/icon/include_large.png" width="32" height="32" align="left" style="margin-right:20px;" />
    <h3><?php echo $this->_tpl_vars['txt_include']; ?>
</h3>


    <fieldset class="c5t_setting_form">
      <legend><?php echo $this->_tpl_vars['txt_download_include_file']; ?>
</legend>
        <form action="./include.php" method="post">
        <input type="submit" name="download_include" value="<?php echo $this->_tpl_vars['txt_download_include_file']; ?>
" style="margin:15px;" />
        <?php echo $this->_tpl_vars['txt_include_type']; ?>
:
        <input type="radio" name="include_type" value="php" checked="checked" id="php" /> <label for="php"><?php echo $this->_tpl_vars['txt_include_type_php']; ?>
</label>
        <input type="radio" name="include_type" value="ssi" id="ssi" style="margin-left:30px;" /> <label for="ssi"><?php echo $this->_tpl_vars['txt_include_type_ssi']; ?>
</label>
        </form>
    </fieldset>
    <fieldset class="c5t_setting_form">
      <legend><?php echo $this->_tpl_vars['txt_css_file_link']; ?>
</legend>
        <form><textarea style="width:100%;">&lt;link&nbsp;rel=&quot;stylesheet&quot;&nbsp;href=&quot;<?php echo $this->_tpl_vars['script_url']; ?>
template/default/style.css&quot;&nbsp;type=&quot;text/css&quot;&nbsp;/&gt;</textarea></form>
    </fieldset>
    <fieldset class="c5t_setting_form">
      <legend><?php echo $this->_tpl_vars['txt_echo_statement']; ?>
</legend>
        <form><textarea style="width:100%;">&lt;?php echo $c5t_output; ?&gt;</textarea></form>
    </fieldset>
    <fieldset class="c5t_setting_form">
      <legend><?php echo $this->_tpl_vars['txt_ssi_statement']; ?>
</legend>
        <form><textarea style="width:100%;">&lt;!--#include virtual="./include.php?c5t_ssi=1"--&gt;</textarea></form>
    </fieldset>