<?php

//die(print_r($_POST));
die(print_r($params));


$text = $params['wtext'];
$prefix = $params['wprefix'];
$prefix_lang = $params['wprefix_lang'];
$motors = $params['wmotors'];


$prefix = $this->GetPreference('prefix');
$prefix_lang = ($this->GetPreference('show_prefix_lang', true)?"/{$lang->get('prefix')}":"");
		
$vals['text'] = Motors::process($vals['text'], $prefix, $prefix_lang, $version->get('motor'));


$edit = $this->CreateLink ($id, "edit", $returnid, '', array('title'=>$titleParam, 'lang'=>$langParam), '', true, false, '', '', RouteMaker::getEditRoute($prefix_lang, $titleParam));
$delete = $this->CreateLink ($id, "delete", $returnid, '', array('title'=>$titleParam, 'lang'=>$langParam), 'Sure ?', true, false, '', '', RouteMaker::getDeleteRoute($prefix_lang, $titleParam));


$smarty->assign('version', $vals);
//$smarty->assign('page', $page->getValues());
//$smarty->assign('lang', $lang->getValues());

$smarty->assign('edit', $edit);
$smarty->assign('delete', $delete);

echo $this->ProcessTemplate('viewPage.tpl');

?>