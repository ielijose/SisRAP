<?php
return array(
	/*'driver' => 'mail',
	'host' => 'smtp.gmail.com',
	'port' => 465,
	'from' => array('address' => 'viviana.uribe@papayote.com', 'name' => 'Papayote Cotiza '),
	'encryption' => 'ssl',
	'username' => 'mailerservice2015@gmail.com',
	'password' => '24436525',
	'sendmail' => '/usr/sbin/sendmail -bs',
	'pretend' => false,*/

	'driver' => 'smtp',

	'host' => 'relay-hosting.secureserver.net',

	'port' => 25,

	'from' => array('address' => 'viviana.uribe@papayote.com', 'name' => 'Papayote Cotiza '),

	//'encryption' => 'tls',

	'username' => '70179140',

	'password' => 'Papayote07*+',

	'sendmail' => '/usr/lib/sendmail -t',

	'pretend' => false,
);

