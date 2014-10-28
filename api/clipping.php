<?php

/**
 * Fetches a clipping by its ID.
 *
 * @param int $id
 *  The clipping's ID.
 *
 * @return null|object
 *  Returns the file object or NULL if no result was found.
 */
function getClippingById($id) {
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');

  $sql = sqlSetup();
  $query = "SELECT * FROM CLIPPINGS WHERE ID=$id";
  $result = mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));
  $obj = mysqli_fetch_object($result) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));
  return $obj;
}

/**
 * Fetches all of a user's clippings.
 *
 * @param int $userId
 *  The user's ID.
 *
 * @return null|object
 *  Returns the user's clippings or NULL if no result was found.
 *
 * @TODO Add limit and offset.
 */
function getClippingsByUserId($userId) {
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');

  $sql = sqlSetup();
  $query = "SELECT * FROM CLIPPINGS WHERE UID=$userId";
  $result = mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));

  $clippings = array();
  while ($obj = mysqli_fetch_object($result)) {
    $clippings[] = $obj;
  }
  return $clippings;
}
/**
 * Save a clipping.
 *
 * @param string $name
 *  The name of the clipping.
 * @param int $userId
 *  The id of the user who owns this clipping.
 * @param int $origFileId
 *  The file this clipping was created from.
 * @param string $coordinates
 *  Coordinates of the rendered image clipping.
 *
 * @return int
 *  The ID of the file that was created.
 */
function saveClipping($userId, $file, $content, $name, $subtitle) {
  $time = time();
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');

  $sql = sqlSetup();
  $query = "INSERT INTO CLIPPINGS (CREATED, ACCESSED, UID, ORIGFILE, CONTENT, NAME, SUBTITLE)
            VALUES
            ($time, $time, $userId, $file, '$content', '$name', '$subtitle')";
  mysqli_query($sql, $query);
  $query = "SELECT LAST_INSERT_ID()";
  $result = mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));
  $id = mysqli_fetch_row($result);
  $id = $id[0];
  return $id;
}

/**
 * Update a clipping's access time.
 *
 * @param int $id
 *  The file's ID.
 */
function accessClipping($id) {
  $time = time();
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');

  $sql = sqlSetup();
  $query = "UPDATE CLIPPINGS
            SET ACCESS=$time
            WHERE ID=$id";
  mysqli_query($sql, $query);
}

function getClippingContent($id) {
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');

  $sql = sqlSetup();
  $query = "SELECT CONTENT FROM CLIPPINGS WHERE ID=$id";
  $result = mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));
  $content = mysqli_fetch_row($result);
  $content = $content[0];
  return $content;
}


function getShareUsers($cid, $uid) {
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');

  $sql = sqlSetup();
  $query = "SELECT MIN(u.ID) as ID, u.EMAIL, u.PASSWORD, u.FNAME, u.LNAME, u.NOTIFICATION FROM USERS as u
            LEFT JOIN SHARED_CLIPPINGS as s ON u.ID=s.UID
            WHERE ((s.ID IS NULL) OR (NOT s.ORIGCID=$cid)) AND NOT u.ID=$uid";
  $result = mysqli_query($sql, $query);

  $users = array();
  while ($obj = mysqli_fetch_object($result)) {
    if (!($obj->ID == NULL)) {
      $users[] = $obj;
    }
  }
  if (!empty($users)) {
    return $users;
  }
  return NULL;
}
