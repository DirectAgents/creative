<?php

session_start();
require_once '../../../class.startup.php';
include_once("../../../config.php");

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../../startup/login.php');
}


$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


/**
 * GentleSource Comment Script - comment_form.inc.php
 *
 * (C) Ralf Stadtaus http://www.gentlesource.com/
 */


$tabindex = 9000;



$c5t_form->addElement('text', 'name', $c5t['text']['txt_name'], array('style' => 'display:none','value' => $row['FirstName'], 'tabindex' => $tabindex++, 'id' => 'c5t_comment_form_name', 'onfocus' => 'this.value = ""'));

$c5t_form->addElement('text', 'email', $c5t['text']['txt_email_hidden'], array('tabindex' => $tabindex++, 'id' => 'c5t_comment_form_email'));

$c5t_form->addElement('text', 'homepage', $c5t['text']['txt_homepage'], array('tabindex' => $tabindex++, 'id' => 'c5t_comment_form_homepage'));
$c5t_form->addElement('text', 'title', $c5t['text']['txt_title'], array('tabindex' => $tabindex++, 'id' => 'c5t_comment_form_title'));
$c5t_form->addElement('textarea', $c5t['comment_field_name'], $c5t['text']['txt_comment'], array('rows' => 8, 'cols' => 30, 'tabindex' => $tabindex++, 'id' => 'c5t_comment_form_text'));
$c5t_form->addElement('hidden', 'page');
$c5t_form->addElement('submit', 'save', $c5t['text']['txt_submit'], array('tabindex' => ($tabindex++ +1), 'id' => 'c5t_comment_form_save'));

$c5t_form->addRule('email',     $c5t['text']['txt_valid_email'], 'email');
//$c5t_form->addRule('email',     $c5t['text']['txt_email_required'], 'required');
$c5t_form->addRule('name',      $c5t['text']['txt_enter_name'], 'required');
$c5t_form->addRule($c5t['comment_field_name'],   $c5t['text']['txt_enter_comment'], 'required');
$c5t_form->addRule($c5t['comment_field_name'],   sprintf($c5t['text']['txt_comment_maxlength'], $c5t['comment_maxlength']), 'maxlength', $c5t['comment_maxlength']);

$c5t_form->setDefaults(array('homepage' => 'http://'));

//var_dump($c5t_form->getRegisteredRules());
