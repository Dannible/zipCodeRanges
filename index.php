<?php
/**
 * 
 * Example usage of zipCodeRanges.zip
 * 
 * Demonstrates how to find state by zipcode using findState(), and also shows how to validate 
 * zipcode/state using checkStateZip().
 * 
 * @author     Dan Ward <dpw989@gmail.com>
 * @copyright  2014
 * @version    1.0
 * @since      1.0
 * @license http://opensource.org/licenses/gpl-3.0.html GNU General Public License v3
 */

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include_once "zipCodeRanges.php";

$StateFound = "";
$StateSelected = "AL";
$StateRangeCheck = "";

//POST find state by zipcode. 
if (isset($_POST["findstate"])) {
    $StateFound = findState($_POST["findstate_zipcode"]);
}

//POST check state vs zipcode. 
if (isset($_POST["checkrange"])) {
    $StateSelected = $_POST["checkrange_state"];
    if (checkStateZip($StateSelected, $_POST["checkrange_zipcode"])) {
        $StateRangeCheck = "State and Zipcode match!";
    } else {
        $StateRangeCheck = "State and Zipcode do not match!";
    }
}
?>
<html>
    <head>
        <title>Zipcode Range Checker</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="content">
            <h2>Zipcode Range Checker</h2>
            <hr>
            <div class="inputblock">
                <h4>Find State by Zipcode</h4>
                <form action="#" method="POST">
                    <input type="hidden" id="findstate" name="findstate">
                    <input class="txtinput" maxlength="5" type="text" id="findstate_zipcode" name="findstate_zipcode" value="<?php echo (isset($_POST["findstate_zipcode"])) ? $_POST["findstate_zipcode"] : "" ?>"/> 
                    <input class="btn" type="submit" value="Find State">
                    <label><?php echo $StateFound; ?></label>
                </form>
            </div>
            <div class="inputblock">
                <h4>Validate State and Zipcode</h4>
                <form action="#" method="POST">
                    <input type="hidden" id="checkrange" name="checkrange">
                    <select class="btn" id="state" name="checkrange_state">
                        <option <?php echo (($StateSelected === "AL") ? "selected" : "") ?> value="AL">Alabama</option>
                        <option <?php echo (($StateSelected === "AK") ? "selected" : "") ?> value="AK">Alaska</option>
                        <option <?php echo (($StateSelected === "AZ") ? "selected" : "") ?> value="AZ">Arizona</option>
                        <option <?php echo (($StateSelected === "AR") ? "selected" : "") ?> value="AR">Arkansas</option>
                        <option <?php echo (($StateSelected === "CA") ? "selected" : "") ?> value="CA">California</option>
                        <option <?php echo (($StateSelected === "CO") ? "selected" : "") ?> value="CO">Colorado</option>
                        <option <?php echo (($StateSelected === "CT") ? "selected" : "") ?> value="CT">Connecticut</option>
                        <option <?php echo (($StateSelected === "DE") ? "selected" : "") ?> value="DE">Delaware</option>
                        <option <?php echo (($StateSelected === "DC") ? "selected" : "") ?> value="DC">District Of Columbia</option>
                        <option <?php echo (($StateSelected === "FL") ? "selected" : "") ?> value="FL">Florida</option>
                        <option <?php echo (($StateSelected === "GA") ? "selected" : "") ?> value="GA">Georgia</option>
                        <option <?php echo (($StateSelected === "HI") ? "selected" : "") ?> value="HI">Hawaii</option>
                        <option <?php echo (($StateSelected === "ID") ? "selected" : "") ?> value="ID">Idaho</option>
                        <option <?php echo (($StateSelected === "IL") ? "selected" : "") ?> value="IL">Illinois</option>
                        <option <?php echo (($StateSelected === "IN") ? "selected" : "") ?> value="IN">Indiana</option>
                        <option <?php echo (($StateSelected === "IA") ? "selected" : "") ?> value="IA">Iowa</option>
                        <option <?php echo (($StateSelected === "KS") ? "selected" : "") ?> value="KS">Kansas</option>
                        <option <?php echo (($StateSelected === "KY") ? "selected" : "") ?> value="KY">Kentucky</option>
                        <option <?php echo (($StateSelected === "LA") ? "selected" : "") ?> value="LA">Louisiana</option>
                        <option <?php echo (($StateSelected === "ME") ? "selected" : "") ?> value="ME">Maine</option>
                        <option <?php echo (($StateSelected === "MD") ? "selected" : "") ?> value="MD">Maryland</option>
                        <option <?php echo (($StateSelected === "MA") ? "selected" : "") ?> value="MA">Massachusetts</option>
                        <option <?php echo (($StateSelected === "MI") ? "selected" : "") ?> value="MI">Michigan</option>
                        <option <?php echo (($StateSelected === "MN") ? "selected" : "") ?> value="MN">Minnesota</option>
                        <option <?php echo (($StateSelected === "MS") ? "selected" : "") ?> value="MS">Mississippi</option>
                        <option <?php echo (($StateSelected === "MO") ? "selected" : "") ?> value="MO">Missouri</option>
                        <option <?php echo (($StateSelected === "MT") ? "selected" : "") ?> value="MT">Montana</option>
                        <option <?php echo (($StateSelected === "NE") ? "selected" : "") ?> value="NE">Nebraska</option>
                        <option <?php echo (($StateSelected === "NV") ? "selected" : "") ?> value="NV">Nevada</option>
                        <option <?php echo (($StateSelected === "NH") ? "selected" : "") ?> value="NH">New Hampshire</option>
                        <option <?php echo (($StateSelected === "NJ") ? "selected" : "") ?> value="NJ">New Jersey</option>
                        <option <?php echo (($StateSelected === "NM") ? "selected" : "") ?> value="NM">New Mexico</option>
                        <option <?php echo (($StateSelected === "NY") ? "selected" : "") ?> value="NY">New York</option>
                        <option <?php echo (($StateSelected === "NC") ? "selected" : "") ?> value="NC">North Carolina</option>
                        <option <?php echo (($StateSelected === "ND") ? "selected" : "") ?> value="ND">North Dakota</option>
                        <option <?php echo (($StateSelected === "OH") ? "selected" : "") ?> value="OH">Ohio</option>
                        <option <?php echo (($StateSelected === "OK") ? "selected" : "") ?> value="OK">Oklahoma</option>
                        <option <?php echo (($StateSelected === "OR") ? "selected" : "") ?> value="OR">Oregon</option>
                        <option <?php echo (($StateSelected === "PA") ? "selected" : "") ?> value="PA">Pennsylvania</option>
                        <option <?php echo (($StateSelected === "RI") ? "selected" : "") ?> value="RI">Rhode Island</option>
                        <option <?php echo (($StateSelected === "SC") ? "selected" : "") ?> value="SC">South Carolina</option>
                        <option <?php echo (($StateSelected === "SD") ? "selected" : "") ?> value="SD">South Dakota</option>
                        <option <?php echo (($StateSelected === "TN") ? "selected" : "") ?> value="TN">Tennessee</option>
                        <option <?php echo (($StateSelected === "TX") ? "selected" : "") ?> value="TX">Texas</option>
                        <option <?php echo (($StateSelected === "UT") ? "selected" : "") ?> value="UT">Utah</option>
                        <option <?php echo (($StateSelected === "VT") ? "selected" : "") ?> value="VT">Vermont</option>
                        <option <?php echo (($StateSelected === "VA") ? "selected" : "") ?> value="VA">Virginia</option>
                        <option <?php echo (($StateSelected === "WA") ? "selected" : "") ?> value="WA">Washington</option>
                        <option <?php echo (($StateSelected === "WV") ? "selected" : "") ?> value="WV">West Virginia</option>
                        <option <?php echo (($StateSelected === "WI") ? "selected" : "") ?> value="WI">Wisconsin</option>
                        <option <?php echo (($StateSelected === "WY") ? "selected" : "") ?> value="WY">Wyoming</option>
                    </select>
                    <input class="txtinput" maxlength="5" type="text" id="checkrange_zipcode" name="checkrange_zipcode" value="<?php echo (isset($_POST["checkrange_zipcode"])) ? $_POST["checkrange_zipcode"] : "" ?>"/> 
                    <input class="btn" type="submit" value="Check Range">
                    <label><?php echo $StateRangeCheck ?></label>
                </form>
            </div>
        </div>
    </body>
</html>