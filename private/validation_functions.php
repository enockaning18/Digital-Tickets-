<?php

// is_blank('abcd')
// * validate data presence
// * uses trim() so empty spaces don't count
// * uses === to avoid false positives
// * better than empty() which considers "0" to be empty
function is_blank($value)
{
  return !isset($value) || trim($value) === '';
}

function has_unique_username($organizer_email, $id = "0")
{
  $organizer = Organizer::find_by_organizer_email($organizer_email);
  if ($organizer === false || $organizer->id == $id) {
    // is unique
    return true;
  } else {
    // not unique
    return false;
  }
}
