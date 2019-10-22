<?PHP
require_once("./_includes/membersite_config.php");

$success = false;
if($fgmembersite->ResetPassword())
{
    $success=true;
}
include "_includes/headerlogin.php"
?>

<div id='fg_membersite_content'>
<?php
if($success){
?>
<h2>Password is Reset Successfully</h2>
Your new password is sent to your email address.
<?php
}else{
?>
<h2>Error</h2>
<span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span>
<?php
}
?>
</div>

</body>
</html>