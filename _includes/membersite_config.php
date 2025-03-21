<?PHP
require_once("./_includes/fg_membersite.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName('offering.omdcag.org');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('jewells1980@gmail.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(/*hostname*/'localhost',
                      /*username*/'omdcweb_giving',
                      /*password*/'!+)+80+0CknT',
                      /*database name*/'omdcweb_churchgiving',
                      /*table name*/'users');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('qSRcVS6DrTzrPvr');

?>