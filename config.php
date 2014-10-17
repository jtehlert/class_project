<?php
require 'private_config.php';
$_PROD_ = FALSE;

// DB Settings //
$_DB_NAME_ = $_PRIVATE_DB_NAME_;
$_DB_USER_ = $_PROD_ ? $_PRIVATE_DB_USER_ : 'root';
$_DB_PASS_ = $_PROD_ ? $_PRIVATE_DB_PASS_ : 'root';
$_DB_HOST_ = $_PROD_ ? $_PRIVATE_DB_HOST_ : 'localhost';
$_DB_USERS_TABLE_ = 'USERS';
$_DB_NOTEBOOKS_TABLE_ = 'NOTEBOOKS';
$_DB_NOTES_TABLE_ = 'NOTES';
$_DB_FILES_TABLE_ = 'FILES';
$_DB_CLIPPINGS_TABLE_ = 'CLIPPINGS';
?>
