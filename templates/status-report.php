<?php        
        $theme = wp_get_theme();        
        $upload_folder=ABSPATH.'wp-content/uploads';        
        $folder_permission='';
        $folder_permission=0;
        $execution_time=0;
        $allow_url_fopen=0;
        $upload_size=0;
        $required_settings=1;
        if (is_writable($upload_folder)) {
            $folder_permission=1;
        } else {
            $folder_permission=0;
            $required_settings=0;
        } 
        if (ini_get('max_execution_time')<300) {
            $execution_time=0;
            $required_settings=0;
        } else {
            $execution_time=1;
        }  
        if (ini_get('allow_url_fopen')) {
            $allow_url_fopen=1;
        } else {
            $required_settings=0;
        }  
        if ((int)ini_get('upload_max_filesize')<1024) {
            $upload_size=0;
            $required_settings=0;
        } else {
            $upload_size=1;
        }    
?>
<div class="simple_theme_demo_importer-welcome wrap ">
 <table class="redux_status_table widefat" cellspacing="0" id="status">
        <thead>
        <tr>
            <th colspan="4" data-export-label="Server Environment">
                <?php esc_html_e( 'Status Report', 'simple_theme_demo_importer' ); ?>
            </th>
        </tr>
        <tr>
            <th colspan="1" data-export-label="Server Environment">
                <?php esc_html_e( 'Settings', 'simple_theme_demo_importer' ); ?>
            </th>
            <th colspan="1" data-export-label="Server Environment">
                <?php esc_html_e( 'Your Settings', 'simple_theme_demo_importer' ); ?>
            </th>
            <th colspan="1" data-export-label="Server Environment">
                <?php esc_html_e( 'Recomended/Required', 'simple_theme_demo_importer' ); ?>
            </th>
            <th colspan="1" data-export-label="Server Environment">
                <?php esc_html_e( '&nbsp;', 'simple_theme_demo_importer' ); ?>
            </th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td data-export-label="PHP Version">
                <?php esc_html_e( 'PHP Version', 'simple_theme_demo_importer' ); ?>:
            </td>
             <td>
                <?php echo esc_html(PHP_VERSION); ?>
            </td>
            <td class="help">
                <?php esc_html_e('5.2.4 or Above ( Recomended )', 'simple_theme_demo_importer' ); ?>
            </td>
            <td class="icon">
                &nbsp;
            </td>
        </tr>        
        <tr>
            <td data-export-label="WP Version">
                <?php esc_html_e( 'WordPress Version', 'simple_theme_demo_importer' ); ?>:
            </td>
            <td>
                <?php bloginfo( 'version' ); ?>
            </td>
            <td class="help">
                 <?php esc_html_e('4.9.4 or Above ( Recomended )', 'simple_theme_demo_importer' ); ?>
            </td>
            <td class="icon">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td data-export-label="Theme Name">
                <?php esc_html_e( 'Theme name', 'simple_theme_demo_importer' ); ?>:
            </td>
             <td>
                <?php echo esc_html($theme->name); ?>
            </td>
            <td class="help">
                <?php esc_html_e('N/A', 'simple_theme_demo_importer' ); ?>
            </td>
            <td class="icon">
                &nbsp;
            </td>
        </tr>
        <tr class="<?php echo esc_attr($folder_permission==0?'theme_required':'theme_statisfy'); ?>">
            <td data-export-label="Folder Permission">
                <?php esc_html_e( 'Upload Directory Permission', 'simple_theme_demo_importer' ); ?>:
            </td>
             <td>
                <?php 
                    if($folder_permission==0)
                    {
                        esc_html_e('Not Writable','simple_theme_demo_importer');
                    }
                    else
                    {
                        esc_html_e('Writable','simple_theme_demo_importer');
                    }
                ?>
            <td class="help">
                <?php esc_html_e('Writable ( Required )', 'simple_theme_demo_importer' ); ?>
            </td>
            <td class="icon">
                <?php 
                    if($folder_permission==0)
                    {
                ?>  
                     &#10799;
                <?php 
                    }
                    else
                    {
                ?>
                     &#10003;
                <?php 
                    }
                ?>
            </td>
        </tr>
        <tr class="<?php echo esc_attr($allow_url_fopen==0?'theme_required':'theme_statisfy'); ?>">
            <td data-export-label="Execution Time">
                <?php esc_html_e( 'Allow URL Open', 'simple_theme_demo_importer' ); ?>:
            </td>
             <td>
                <?php echo esc_html(ini_get('allow_url_fopen')==1?"True":"False"); ?>
            </td>
            <td class="help">
                <?php esc_html_e('True ( Required )', 'simple_theme_demo_importer' ); ?>
            </td>
            <td class="icon">
                <?php 
                    if($allow_url_fopen==0)
                    {
                ?>  
                     &#10799;
                <?php 
                    }
                    else
                    {
                ?>
                     &#10003;
                <?php 
                    }
                ?>
            </td>
        </tr>
        <tr class="<?php echo esc_attr($execution_time==0?'theme_required':'theme_statisfy'); ?>">
            <td data-export-label="Execution Time">
                <?php esc_html_e( 'Max Execution Time', 'simple_theme_demo_importer' ); ?>:
            </td>
             <td>
                <?php echo esc_html(ini_get('max_execution_time')); ?>
            </td>
            <td class="help">
                <?php esc_html_e('300 ( Required )', 'simple_theme_demo_importer' ); ?>
            </td>
            <td class="icon">
                <?php 
                    if($execution_time==0)
                    {
                ?>  
                     &#10799;
                <?php 
                    }
                    else
                    {
                ?>
                     &#10003;
                <?php 
                    }
                ?>
            </td>
        </tr>
         <tr class="<?php echo esc_attr($upload_size==0?'theme_required':'theme_statisfy'); ?>">
            <td data-export-label="Upload Size">
                <?php esc_html_e( 'Max Upload Size', 'simple_theme_demo_importer' ); ?>:
            </td>
             <td>
                <?php echo esc_html(ini_get('upload_max_filesize')); ?>
            </td>
            <td class="help">
                <?php esc_html_e('512 ( Required )', 'simple_theme_demo_importer' ); ?>
            </td>
            <td class="icon">
                <?php 
                    if($upload_size==0)
                    {
                ?>  
                     &#10799;
                <?php 
                    }
                    else
                    {
                ?>
                     &#10003;
                <?php 
                    }
                ?>
            </td>
        </tr>
        
         <tr>
            <td data-export-label="Permalink Structure">
                <?php esc_html_e( 'Permalink Structure', 'simple_theme_demo_importer' ); ?>:
            </td>
            <td>
                <?php echo esc_html(get_option('permalink_structure')); ?>
            </td>
            <td class="help">
                <?php esc_html_e('/%postname%/ ( Recomended )','simple_theme_demo_importer'); ?>
            </td>
            <td class="icon">
                &nbsp;
            </td>
        </tr>
<?php
        if ( in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ) ))
        {
?>
        <tr>
            <td data-export-label="Localhost Environment">
                <?php esc_html_e( 'Localhost Environment', 'simple_theme_demo_importer' ); ?>:
            </td>
            <td>
            	&#10003;
            </td>
            <td class="help">
                <?php esc_html_e('N/A','simple_theme_demo_importer'); ?>
            </td>
            <td class="icon">
                &#10003;
            </td>
         </tr>
<?php
        }
?>
        </tbody>
    </table>
</div>
