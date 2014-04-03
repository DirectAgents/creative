<?php

    new Themater_AboutUs();
    
    class Themater_AboutUs
    {
        var $theme;
        
        var $defaults = array(
            'enabled' => 'true',
            'hook' => 'main_before',
            'title' => 'Welcome to our website. Neque porro quisquam est qui dolorem ipsum dolor.',
            'image' => 'about-image.jpg',
            'content' => 'Lorem ipsum eu usu assum liberavisse, ut munere praesent complectitur mea. Sit an option maiorum principes. Ne per probo magna idque, est veniam exerci appareat no. Sit at amet propriae intellegebat, natum iusto forensibus duo ut. Pro hinc aperiri fabulas ut, probo tractatos euripidis an vis, ignota oblique. <br /> <br />Ad ius munere soluta deterruisset, quot veri id vim, te vel bonorum ornatus persequeris. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla nonummy. Mauris a ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus.'
        );
        
        function Themater_AboutUs()
        {
            global $theme;
            $this->theme = $theme;
            
            if(is_array($this->theme->options['plugins_options']['aboutus']) ) {
                $this->defaults = array_merge($this->defaults, $this->theme->options['plugins_options']['aboutus']);
            }
            
            if($this->theme->display('aboutus_enabled') ) { 
                $this->theme->add_hook($this->defaults['hook'], array(&$this, 'display_aboutus'));
            }
            
  
            if(is_admin()) {
                $this->aboutus_options();
            }
        }

        
        function display_aboutus()
        {
            if(is_home()) {
                ?><div class="span-24 aboutusbox">
                
                <?php 
                
                if($this->theme->display('aboutus_image')) {
                    echo '<img class="aboutusbox-image" src="' . $this->theme->get_option('aboutus_image') . '" />';
                }
                
                if($this->theme->display('aboutus_title')) {
                    echo '<h2 class="aboutusbox-title">' . $this->theme->get_option('aboutus_title') . '</h2>';
                }
                
                if($this->theme->display('aboutus_content')) {
                    echo '<div class="aboutusbox-content">' . $this->theme->get_option('aboutus_content') . '</div>';
                }
                ?></div><?php
            }
        }
        
        function aboutus_options()
        {
            $this->theme->admin_option(array('About Us', 14), 
                '"About Us" section enabled?', 'aboutus_enabled', 
                'checkbox', $this->defaults['enabled'], 
                array('display'=>'inline')
            );
            
            $this->theme->admin_option('About Us', 
                'Title', 'aboutus_title', 
                'text', $this->defaults['title']
            );
       
            $this->theme->admin_option('About Us', 
                'Image', 'aboutus_image', 
                'imageupload', get_bloginfo('template_directory') . "/images/" . $this->defaults['image'], 
                array('help' => "Enter the full url. Leave it blank if you don't want to use an image.")
            );
            
            $this->theme->admin_option('About Us', 
                'Content', 'aboutus_content', 
                'textarea', $this->defaults['content'],
                array('style'=>'height: 250px;')
            );
        }
    }
?>