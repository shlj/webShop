<?php
return array(
	'logs'=>array(
		'path'=>'backup/logs',
		'type'=>'file'
	),
	'DB'=>array(
		'type'=>'mysqli',
        'tablePre'=>'shop_',
		'read'=>array(
			array('host'=>'localhost:3306','user'=>'root','passwd'=>'jiaojiao','name'=>'shop'),
		),

		'write'=>array(
			'host'=>'localhost:3306','user'=>'root','passwd'=>'jiaojiao','name'=>'shop',
		),
	),
	'interceptor' => array('themeroute@onCreateController','layoutroute@onCreateView','plugin'),
	'langPath' => 'language',
	'viewPath' => 'views',
	'skinPath' => 'skin',
    'classes' => 'classes.*',
    'rewriteRule' =>'url',
	'theme' => array('pc' => array('default' => 'default','sysdefault' => 'green','sysseller' => 'green'),'mobile' => array('mobile' => 'default','sysdefault' => 'default','sysseller' => 'default')),
	'timezone'	=> 'Etc/GMT-8',
	'upload' => 'upload',
	'dbbackup' => 'backup/database',
	'safe' => 'cookie',
	'lang' => 'zh_sc',
	'debug'=> '0',
	'configExt'=> array('site_config'=>'config/site_config.php'),
	'encryptKey'=>'0e6d0d4b79bbaee764d20704f220e433',
	'authorizeCode' => '',
);
?>