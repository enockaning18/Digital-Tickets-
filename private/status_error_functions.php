<?php
function display_error($errors = array())
{
    $output = '';
    if (!empty($errors)) {
        $output .= "<div class=\"color:red \">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach ($errors as $error) {
            $output .= "<li>" . $error . "</li>";
        }
        $output .= "<ul>";
        $output .= "</div>";
    }
    return $output;
}
?>
