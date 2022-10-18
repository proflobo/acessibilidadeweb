<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die;

class cenerefreeInstallerScript
{

    function preflight( $type ) // Ran before moving the template folder from /tmp
    {

        if( $type === 'update' ){

            $db = JFactory::getDbo();
    		$db->setQuery('SELECT manifest_cache FROM #__extensions WHERE name = "cenere-free"');
    		$manifest = json_decode( $db->loadResult(), true );
    
            if( isset($manifest) && isset($manifest['version']) ){
    
                if( substr($manifest['version'], 0, 1) === '2' ){
                    require dirname(__FILE__).'/2xx-migration.php';
                }
                
            }

        }

    }

    function postflight( $type ) // Ran after a succesful installation/update
    {

        if( $type === 'update' ){
    		JFactory::getApplication()->enqueueMessage( "Attention: to complete the update, access the template administration page and click the save button.", 'warning' );
    	}

	}

}