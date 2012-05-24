<?php

/** start sessions **/
@session_start();

/** include captcha config **/
include($_SERVER['DOCUMENT_ROOT'] . '/includes/configs/captcha_config.php');

/** get random values **/
$rand = mt_rand(0,(sizeof($values)-1));

/** shuffle values **/
shuffle($values);

/** output question **/
$Captcha = '<label for="captcha">To verify that you are a human, please choose <strong>'.$values[$rand]."</strong></label>\n";

/** output all answers **/
for($i=0;$i<sizeof($values);$i++) 
{
   $value2[$i] = mt_rand();
   $Captcha .= '<div><span>'.$values[$i].' <input type="radio" name="Captcha" value="'.$value2[$i].'"></span><div style="background: url('.$imagePath.$values[$i].'.'.$imageExt.') bottom left no-repeat; width:'.$imageW.'px; height:'.$imageH.'px;cursor:pointer;display:none;" class="img" /></div></div>'."\n";
}

/** set captcha session **/
$_SESSION['Captcha'] = $value2[$rand];

/** display **/
echo $Captcha;

?>