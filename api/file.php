<?php

/**
 * Fetches a file by its ID.
 *
 * @param int $id
 *  The file's ID.
 *
 * @return null|object
 *  Returns the file object or NULL if no result was found.
 */
function getFileById($id) {
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');

  $sql = sqlSetup();
  $query = "SELECT * FROM FILES WHERE ID=$id";
  $result = mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));
  $obj = mysqli_fetch_object($result) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));
  return $obj;
}

/**
 * Fetches a file by its name.
 *
 * @param int $name
 *  The file's name.
 *
 * @return null|object
 *  Returns the file object or NULL if no result was found.
 */
function getFileByName($name) {
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');

  $sql = sqlSetup();
  $query = "SELECT * FROM FILES WHERE NAME='$name'";
  $result = mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));
  $obj = mysqli_fetch_object($result);
  return $obj;
}

/**
 * Fetches all of a user's files.
 *
 * @param int $userId
 *  The user's ID.
 *
 * @return null|object
 *  Returns the user's files or NULL if no result was found.
 *
 * @TODO Add limit and offset.
 */
function getFilesByUserId($userId) {
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');

  $sql = sqlSetup();
  $query = "SELECT * FROM FILES WHERE UID=$userId";
  $result = mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));

  $files = array();
  while ($obj = mysqli_fetch_object($result) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql))) {
    $files[] = $obj;
  }
  return $files;
}

/**
 * Associate a file with a database entry.
 *
 * @param string $name
 *  The name of the file
 * @param string $filetype
 *  The type of file.
 * @param $userId
 *  The ID of the user who owns the file.
 *
 * @return int
 *  The ID of the file that was created.
 */
function storeFile($name, $filetype, $userId) {
  $time = time();
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');

  $sql = sqlSetup();
  $query = "INSERT INTO FILES (NAME, UID, UPLOADED, ACCESSED, FILETYPE)
            VALUES
            ('$name', $userId, $time, $time, '$filetype')";
  mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));
  $query = "SELECT LAST_INSERT_ID()";
  $result = mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));
  $row = mysqli_fetch_row($result);
  $id = $row[0];
  return $id;
}

/**
 * Update a file's access time.
 *
 * @param int $id
 *  The file's ID.
 */
function accessFile($id) {
  $time = time();
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');

  $sql = sqlSetup();
  $query = "UPDATE FILES
            SET ACCESSED=$time
            WHERE ID=$id";
  mysqli_query($sql, $query);
}
