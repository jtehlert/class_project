<?php

function sqlSetup() {
  require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
  $sql = mysqli_connect($_DB_HOST_, $_DB_USER_, $_DB_PASS_) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));
  mysqli_select_db($sql, $_DB_NAME_);
  return $sql;
}