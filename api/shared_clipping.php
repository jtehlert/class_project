<?php

/**
 * Puts an entry in the SHARED_CLIPPINGS DB representing a clipping that is
 * shared with a user.
 *
 * @param int $cid
 *  The clipping ID.
 * @param int $uid
 *  The user ID.
 *
 * @return int
 *  The ID of the relationship.
 */
function shareClipping($cid, $origCid, $uid) {
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');

  // Save that the clipping is shared.
  $sql = sqlSetup();
  $query = "INSERT INTO SHARED_CLIPPINGS (CID, ORIGCID, UID)
            VALUES
            ($cid, $origCid, $uid)";
  mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));

  // Get the id of the share.
  $query = "SELECT LAST_INSERT_ID()";
  $result = mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));
  $id = mysqli_fetch_row($result);
  $id = $id[0];
  return $id;
}

/**
 * Checks if a clipping is shared with a user.
 *
 * @param int $cid
 *  The clipping ID.
 * @param int $uid
 *  The user ID.
 *
 * @return bool
 *  TRUE if the clipping is shared with the user, otherwise FALSE.
 */
function isClippingSharedWithUser($cid, $uid) {
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');

  // Check if there is a share with this cid and uid.
  $sql = sqlSetup();
  $query = "SELECT * FROM SHARED_CLIPPINGS WHERE CID=$cid AND UID=$uid";
  $result = mysqli_query($sql, $query);
  if ($row = mysqli_fetch_object($result)) {
    return TRUE;
  }
  return FALSE;
}
