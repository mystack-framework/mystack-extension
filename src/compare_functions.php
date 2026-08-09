<?php
$old = file('old_functions_list.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$new = file('new_functions_list.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$missing = array_diff($old, $new);
$added = array_diff($new, $old);

echo "Missing in new:\n";
print_r($missing);

echo "\nAdded in new:\n";
print_r($added);
