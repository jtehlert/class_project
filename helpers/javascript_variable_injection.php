<?php
// Save the user's UID.
$uid = $_SESSION['current_user'];
?>
<script>
  var JSIuid = <?php print($uid) ?>;
  var JSI_IWP_DIR = <?php print('"' . ($_IWP_DIR_ ? $_IWP_DIR_ : 0) . '"') ?>;
  if (JSI_IWP_DIR == 0) {
    JSI_IWP_DIR = "";
  }
</script>