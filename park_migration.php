<?php 
	define("DB_HOST", '127.0.0.1');
	define("DB_NAME", 'national_parks_db');
	define("DB_USER", 'np_user');
	define("DB_PASS", 'password');

	require_once('db_connect.php');

	$query = 'drop table if exists national_parks';

	$dbc -> exec($query);

	$query = 'create table national_parks(
				id int unsigned not null auto_increment,
				name varchar(250) not null,
				location varchar(250) not null,
				date_established date not null,
				area_in_acres double not null,
				description varchar(2000) not null,
				pic varchar(250),
				primary key (id)
			)';

	$dbc -> exec($query);
 ?>