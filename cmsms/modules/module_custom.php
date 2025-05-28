<?php
use \CmsApp;

function module_custom_precompile($params)
{
    $smarty = CmsApp::get_instance()->GetSmarty();
    $smarty->registerPlugin('modifier', 'count', 'count');
}