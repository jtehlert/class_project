<?php

/**
 * Fetches all comments for the specified clipping.
 *
 * @param int $cid
 *  The clipping's id.
 *
 * @return array
 *  All comments for the specified clipping.
 */
function getCommentsByClippingId($cid) {
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');
  $sql = sqlSetup();
  $query = "SELECT * FROM COMMENTS WHERE CID=$cid";
  $result = mysqli_query($sql, $query);

  $comments = array();
  while ($obj = mysqli_fetch_object($result)) {
    $comments[] = $obj;
  }

  return $comments;
}


function createComment($cid, $uid, $content) {
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');
  $sql = sqlSetup();
  $query = "INSERT INTO COMMENTS (CID, UID, CONTENT)
            VALUES
            ($cid, $uid, \"$content\")";
  mysqli_query($sql, $query) or die("A MySQL error has occurred.<br />Error: (" . mysqli_errno($sql) . ") " . mysqli_error($sql));
}
