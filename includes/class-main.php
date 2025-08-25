<?php
namespace MHImon\VTBT;

use Pablo_Pacheco\WP_Namespace_Autoloader\WP_Namespace_Autoloader;

/**
 * Main Theme Class
 */
class Main {

    /**
     * Load dependencies and hooks.
     */
    protected function setup_hooks() {
        $autoloader = new WP_Namespace_Autoloader( array(    
			'directory'          => __DIR__,       // Directory of your project. It can be your theme or plugin. Defaults to __DIR__ (probably your best bet). 	
			'namespace_prefix'   => 'My_Project',  // Main namespace of your project. E.g My_Project\Admin\Tests should be My_Project. Defaults to the namespace of the instantiating file.	
			'classes_dir'        => '',         // (optional). It is where your namespaced classes are located inside your project. If your classes are in the root level, leave this empty. If they are located on 'src' folder, write 'src' here 
			'prepend_class'      => true,          // (optional). Default true, prepends class- before the final class name 
			'prepend_interface'  => true,          // (optional). Default false, prepends interface- before the final interface name 
			'prepend_trait'      => true,          // (optional). Default false, prepends trait- before the final trait name 
		) );
		$autoloader->init();
    }

	
}