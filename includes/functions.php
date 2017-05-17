<?php

function checkAllFields($required){

    // Loop over field names, make sure each one exists and is not empty
    $error = false;
    foreach($required as $field) {
      if (empty($_POST[$field])) {
        $error = true;
      }
    }

    if ($error) {
      return false;
    } else {
      return true;
    }
}


?>