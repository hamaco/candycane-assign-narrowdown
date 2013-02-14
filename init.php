<?php

$pluginContainer = ClassRegistry::getObject('PluginContainer');
$pluginContainer->installed('cc_assign_narrowdown','0.1.0');

$hookContainer = ClassRegistry::getObject('HookContainer');
$hookContainer->registerElementHook(
  'issues/edit',
  '../../Plugin/CcAssignNarrowdown/View/Element/comment_only',
  false
);
