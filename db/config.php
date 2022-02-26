<?php
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
define('HOST', $cleardb_url["host"]);
define('USERNAME', $cleardb_url["user"]);
define('PASSWORD', $cleardb_url["pass"]);
define('DATABASE', substr($cleardb_url["path"],1));

