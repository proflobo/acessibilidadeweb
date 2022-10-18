<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die;

class JZhong2xxMigration
{

    public function __construct()
    {

        $db = JFactory::getDbo();

        $db->setQuery('SHOW ENGINES');

        try{ $results = $db->loadObjectList(); }
        catch (Exception $e) {
            echo JText::sprintf('JLIB_DATABASE_ERROR_FUNCTION_FAILED', $e->getCode(), $e->getMessage()) . '<br />';
            return;
        }

        // --------- Old positions migration --------- //

        $positions = array(

            'custom-1-A' =>  'aside-top-A',
            'custom-1-B1' => 'aside-top-B1',
            'custom-1-B2' => 'aside-top-B2',
            'custom-1-C1' => 'aside-top-C1',
            'custom-1-C2' => 'aside-top-C2',
            'custom-1-C3' => 'aside-top-C3',
            'custom-1-D1' => 'aside-top-D1',
            'custom-1-D2' => 'aside-top-D2',
            'custom-1-D3' => 'aside-top-D3',
            'custom-1-D4' => 'aside-top-D4',

            'custom-2-A' =>  'main-top-A',
            'custom-2-B1' => 'main-top-B1',
            'custom-2-B2' => 'main-top-B2',
            'custom-2-C1' => 'main-top-C1',
            'custom-2-C2' => 'main-top-C2',
            'custom-2-C3' => 'main-top-C3',
            'custom-2-D1' => 'main-top-D1',
            'custom-2-D2' => 'main-top-D2',
            'custom-2-D3' => 'main-top-D3',
            'custom-2-D4' => 'main-top-D4',

            'custom-3-A' =>  'aside-bottom-A',
            'custom-3-B1' => 'aside-bottom-B1',
            'custom-3-B2' => 'aside-bottom-B2',
            'custom-3-C1' => 'aside-bottom-C1',
            'custom-3-C2' => 'aside-bottom-C2',
            'custom-3-C3' => 'aside-bottom-C3',
            'custom-3-D1' => 'aside-bottom-D1',
            'custom-3-D2' => 'aside-bottom-D2',
            'custom-3-D3' => 'aside-bottom-D3',
            'custom-3-D4' => 'aside-bottom-D4',

            'custom-4-A' =>  'footer-top-A',
            'custom-4-B1' => 'footer-top-B1',
            'custom-4-B2' => 'footer-top-B2',
            'custom-4-C1' => 'footer-top-C1',
            'custom-4-C2' => 'footer-top-C2',
            'custom-4-C3' => 'footer-top-C3',
            'custom-4-D1' => 'footer-top-D1',
            'custom-4-D2' => 'footer-top-D2',
            'custom-4-D3' => 'footer-top-D3',
            'custom-4-D4' => 'footer-top-D4',

            'left-column' => 'aside-left',
            'right-column' => 'aside-right',

        );

        foreach ($positions as $old_position => $new_position) {
            $db->setQuery(
                $db->getQuery(true)
                    ->update('#__modules')
                    ->set('position = "'.$new_position.'"')
                    ->where('position = "'.$old_position.'"')
            )->execute();
        }

        JFactory::getApplication()->enqueueMessage( 'Note: Zhong Framework 2xx migration patch applied.' );

    }

}

$jZhong2xx3xxMigration = new JZhong2xxMigration();
