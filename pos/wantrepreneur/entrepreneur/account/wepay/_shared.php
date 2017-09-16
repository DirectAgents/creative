<?php
require 'wepay.php';
Wepay::useStaging('131244', '5a612c797c');
header('Content-Type: text/html; charset=utf-8');
session_start();
