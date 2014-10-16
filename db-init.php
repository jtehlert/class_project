<?php
require 'config.php';

// Connect to the MYSQL server.
$sql = mysqli_connect($_DB_HOST_, $_DB_USER_, $_DB_PASS_) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));

// Create the database and select it.
$query = 'CREATE DATABASE IF NOT EXISTS ' . $_DB_NAME_;
mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));
mysqli_select_db($sql, $_DB_NAME_);

// Create the users table.
$query = 'CREATE TABLE IF NOT EXISTS ' . $_DB_USERS_TABLE_ . '(
  ID int(11) AUTO_INCREMENT,
  EMAIL varchar(255) UNIQUE NOT NULL,
  PASSWORD varchar(255) NOT NULL,
  FNAME varchar(255) NOT NULL,
  LNAME varchar(255) NOT NULL,
  NOTEBOOKS longtext,
  NOTES longtext,
  FILES longtext,
  PRIMARY KEY (ID)
  )';
mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));

// Create the notebooks table.
$query = 'CREATE TABLE IF NOT EXISTS ' . $_DB_NOTEBOOKS_TABLE_ . '(
  ID int(11) AUTO_INCREMENT,
  NAME varchar(255),
  CREATED int(11) NOT NULL,
  ACCESSED int(11) NOT NULL,
  NOTES longtext,
  COLOR varchar(255),
  PRIMARY KEY (ID)
  )';
mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));

// Create the notes table.
$query = 'CREATE TABLE IF NOT EXISTS ' . $_DB_NOTES_TABLE_ . '(
  ID int(11) AUTO_INCREMENT,
  NAME varchar(255),
  CREATED int(11) NOT NULL,
  ACCESSED int(11) NOT NULL,
  TYPE varchar(255) NOT NULL,
  CONTENT longtext,
  FILE varchar(255),
  CLIPPING longtext,
  PRIMARY KEY (ID)
  )';
mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));

// Create the files table.
$query = 'CREATE TABLE IF NOT EXISTS ' . $_DB_FILES_TABLE_ . '(
  ID int(11) AUTO_INCREMENT,
  NAME varchar(255) UNIQUE NOT NULL,
  UPLOADED int(11) NOT NULL,
  ACCESSED int(11) NOT NULL,
  FILETYPE varchar(255) NOT NULL,
  PRIMARY KEY (ID)
  )';
mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));

// Create the clippings table.
$query = 'CREATE TABLE IF NOT EXISTS ' . $_DB_CLIPPINGS_TABLE_ . '(
  ID int(11) AUTO_INCREMENT,
  CREATED int(11) NOT NULL,
  ACCESSED int(11) NOT NULL,
  ORIGFILE varchar(255) NOT NULL,
  CONTENT longtext NOT NULL,
  PRIMARY KEY (ID)
  )';
mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));

echo('
  /$$$$$$  /$$      /$$  /$$$$$$   /$$$$$$<br />
 /$$__  $$| $$  /$ | $$ /$$__  $$ /$$__  $$<br />
| $$  \__/| $$ /$$$| $$| $$  \ $$| $$  \__/<br />
|  $$$$$$ | $$/$$ $$ $$| $$$$$$$$| $$ /$$$$<br />
 \____  $$| $$$$_  $$$$| $$__  $$| $$|_  $$<br />
 /$$  \ $$| $$$/ \  $$$| $$  | $$| $$  \ $$<br />
|  $$$$$$/| $$/   \  $$| $$  | $$|  $$$$$$/<br />
 \______/ |__/     \__/|__/  |__/ \______/<br />
 ');
