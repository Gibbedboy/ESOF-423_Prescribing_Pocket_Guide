<?php

$page = basename($_SERVER['SCRIPT_NAME']);

if ($page == 'index.php') { print 'Login'; }

if ($page == 'main.php') { print 'Welcome'; }

if ($page == 'patients.php') { print 'My Patients'; }

if ($page == 'PHQ9Diag.php') { print 'PHQ9'; }

if ($page == 'thanks.php') { print 'Contact Us'; }
?>