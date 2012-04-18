<?php
//used to reset the session for testing
session_start();
session_destroy();
echo "reset";
?>