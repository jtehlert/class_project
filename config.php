<?php
include 'private_config.php';
$_PROD_ = FALSE;
$_IWP_ = FALSE;

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

// Global Variables //
$_TITLE_ = 'Class Notebook';
$_DESCRIPTION_ = 'The note taking application for CS 4352 at UT Dallas';

// IWP Specific Configs
$_IWP_DIR_ = $_IWP_ ? '/wordpress' : '';
?>
