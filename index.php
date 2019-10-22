<?PHP
require_once("./_includes/membersite_config.php");
 
if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Church Offering</title>
    <link href="_css/gumby.css" rel="stylesheet">
    <link rel="stylesheet" href="_css/app.css">
    <link href="_css/jquery-ui.css" rel="stylesheet">
    <script src="_js/modernizr-2.6.2.min.js"></script>
    <script src="_js/jquery.min.js"></script>
    <script gumby-touch="_js/libs" src="_js/gumby.min.js"></script>
    <script src="_js/plugins.js"></script>
    <script src="_js/jquery-ui.js"></script>
    <script src="_js/app.js"></script>
    <script src="_js/functions.js"></script> 
</head>
<body>
    <h1>Church Offering</h1>
    <p>OMDC Offering Software is only to be used by the Leadership of Ozark Mountain Deaf Church.</p>
    <p>Welcome back <?= $fgmembersite->UserFullName(); ?>!  <div id="logoutbtn" class="pretty small primary btn"><a href="logout.php">Logout</a></div><div id="logoutbtn" class="pretty small primary btn"><a href="change-pwd.php">Change Password</a></div></p>

    <section class="tabs">
        <ul class="tab-nav">
            <li class="active"><a href="#">Offering</a></li>
            <li><a href="#">Members</a></li>
            <li><a href="#">Funds</a></li>
            <li><a href="#">Pay Types</a></li>
        </ul>

        
        <div class="tab-content active">
            <form action="" id="Offering">
                <div class="field">
                    <label for="date">Date:</label>
                    <input class="input" type="text" name="date" id="dateinput" class="form-control">
                </div>
                <div class="field">
                    <label for="name">Name:</label>
                    <select class="input" name="name" id="memberName" class="form-control"></select>
                </div>
                <div class="field">
                    <label for="amount">Amount:</label>
                    <input class="input" type="text" name="amount" id="amount" class="form-control">
                </div>
                <div class="field">
                    <label for="fund">Fund:</label>
                    <select class="input" name="fund" id="fundSelect" class="form-control"></select>
                </div>
                <div class="field">
                    <label for="paytype">PayType:</label>
                    <select class="input" name="paytype" id="paytypeSelect" class="form-control"></select>
                </div>
                <div class="field">
                    <label for="paytype">CheckNumber:</label>
                    <input class="input" name="checkNumber" id="checkNumber" class="form-control"></select>
                </div>
                <input class="input hidden-input" name="offeringid" id="offeringid">

                <div id="offeringnewbtn" class="pretty medium primary btn"><a href="#">Add</a></div>
                <div id="offeringupdatebtn" class="pretty medium primary btn"><a href="#">Edit</a></div>
                <div id="offeringbtn" class="pretty medium primary btn"><a href="#">Show Table of Offering</a></div>
            </form>
            <table id="offeringtable" class="striped rounded">
                <thead>   
                    <tr>
                        <th><!--EDIT--></th>
                        <th><!--DELETE--></th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Fund</th>
                        <th>PayType</th>
                        <th>CheckNumber</th>
                        <th class="hide">offering_id</th>
                        <th class="hide">member_id</th>
                        <th class="hide">fundID</th>
                        <th class="hide">paytypeID</th>
                    </tr>
                </thead>    
                <tbody></tbody>
            </table>
        </div>
        <div class="tab-content">
            <form action="" id="Members">
                <div class="field">
                    <label for="Firstmembername">First Name:</label>
                    <input class="input" type="text" name="Firstmembername" id="Firstmembername" class="form-control">
                </div>
                <div class="field">
                    <label for="Lastmembername">Last Name:</label>
                    <input class="input" name="Lastmembername" id="Lastmembername" class="form-control"></input>
                </div>
                <div class="field">
                    <label for="spouse">Spouse:</label>
                    <input class="input" name="spouse" id="spouse" class="form-control"></input>
                </div>
                <div class="field">
                    <label for="address">Address:</label>
                    <input class="input" name="address" id="address" class="form-control">
                </div>
                <div class="field">
                    <label for="city">City:</label>
                    <input class="input" name="city" id="city" class="form-control">
                </div>
                <div class="field">
                    <label for="st">St:</label>
                    <select class="input" name="st" id="st" class="form-control">
                        <option value="MO">Missouri</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>
                </div>
                <div class="field">
                    <label for="zip">Zip:</label>
                    <input class="input" name="zip" id="zip" class="form-control"></input>
                </div>
                <input class="input hidden-input" name="memberid" id="memberid">
                <!--<div id="hasFamily" class="pretty medium primary btn"><a href="#">Show Family</a></div><br><br>-->
                <div id="membernewbtn" class="pretty medium primary btn"><a href="#">Add</a></div>
                <div id="memberupdatebtn" class="pretty medium primary btn"><a href="#">Edit</a></div>
                <div id="memberbtn" class="pretty medium primary btn"><a href="#">Show All Members</a></div>
            </form>
            <table id="membertable" class="striped rounded">
                <thead>   
                    <tr>
                        <th><!--EDIT--></th>
                        <th><!--DELETE--></th>
                        <th>Name</th>
                        <th>Spouse</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>St</th>
                        <th>Zip</th>
                        <th>Children</th>
                        <th class="hide">member_id</th>
                    </tr>
                </thead>    
                <tbody></tbody>
            </table>
        </div>
        <div class="tab-content">

            <form action="" id="Fund">
                <div class="field">
                    <label for="fundinput">Fund:</label>
                    <input class="input" type="text" name="fundnewinput" id="fundnewinput" class="form-control">
                </div>
                <input class="input hidden-input" name="fundID" id="fundID">
                <div id="fundnewbtn" class="pretty medium primary btn"><a href="#">Add</a></div>
                <div id="fundupdatebtn" class="pretty medium primary btn"><a href="#">Edit</a></div>
            </form>
            <table id="fundtable" class="striped rounded">
                <thead>   
                    <tr>
                        <th><!--EDIT--></th>
                        <th><!--DELETE--></th>
                        <th>Fund</th>
                        <th class="hide">Fund ID</th>
                    </tr>
                </thead>    
                <tbody></tbody>
            </table>
        </div>
        <div class="tab-content">
            <form action="" id="Paytype">
                <div class="field">
                    <label for="paytypenewinput">Paytype:</label>
                    <input class="input" type="text" name="paytypenewinput" id="paytypenewinput" class="form-control">
                </div>
                <input class="input hidden-input" name="paytypeID" id="paytypeID">
                <div id="paytypenewbtn" class="pretty medium primary btn"><a href="#">Add</a></div>
                <div id="paytypeupdatebtn" class="pretty medium primary btn"><a href="#">Edit</a></div>
            </form>
            <table id="paytypetable" class="striped rounded">
                <thead>   
                    <tr>
                        <th><!--EDIT--></th>
                        <th><!--DELETE--></th>
                        <th>PayType</th>
                        <th class="hide">PayType ID</th>
                    </tr>
                </thead>    
                <tbody></tbody>
            </table>
        </div>
        
    </section>
   
</body>

</html>