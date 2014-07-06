<?php

/**
 * zipCodeRanges
 *
 * Simple function to check if your zip code is in the proper range for your state.   
 *
 * @package    zipCodeRanges.php
 * @link       /includes/zipCodeRanges.php
 * @author     Dan Ward <dpw989@gmail.com>
 * @copyright  2014
 * @version    1.0
 * @since      1.0
 * @license http://opensource.org/licenses/gpl-3.0.html GNU General Public License v3
 */

/**
 * Array that holds the state with upper and lower ranges.
*	Some states have zipcodes that do not fall in to the ranges
*	so those are held in the ext element as a comma delimited string.
*/
$zipRange = array(
    "AK" => array("lower" => 995, "upper" => 999),
    "AL" => array("lower" => 350, "upper" => 369),
    "AR" => array("lower" => 716, "upper" => 729, "ext" => "755"),
    "AZ" => array("lower" => 850, "upper" => 865),
    "CA" => array("lower" => 900, "upper" => 966),
    "CO" => array("lower" => 800, "upper" => 816),
    "CT" => array("lower" => 068, "upper" => 069),
    "DC" => array("lower" => 200, "upper" => 205),
    "DE" => array("lower" => 197, "upper" => 199),
    "FL" => array("lower" => 320, "upper" => 349),
    "GA" => array("lower" => 300, "upper" => 319),
    "GA" => array("lower" => 398, "upper" => 399),
    "HI" => array("lower" => 967, "upper" => 968),
    "ID" => array("lower" => 832, "upper" => 838),
    "IL" => array("lower" => 600, "upper" => 629),
    "IN" => array("lower" => 460, "upper" => 479),
    "IA" => array("lower" => 500, "upper" => 528),
    "KS" => array("lower" => 660, "upper" => 679),
    "KY" => array("lower" => 400, "upper" => 427),
    "LA" => array("lower" => 700, "upper" => 714),
    "ME" => array("lower" => 039, "upper" => 049),
    "MD" => array("lower" => 206, "upper" => 219),
    "MA" => array("lower" => 010, "upper" => 027, "ext" => "055"),
    "MI" => array("lower" => 480, "upper" => 499),
    "MN" => array("lower" => 550, "upper" => 567),
    "MS" => array("lower" => 386, "upper" => 397),
    "MO" => array("lower" => 630, "upper" => 658),
    "MT" => array("lower" => 590, "upper" => 599),
    "NE" => array("lower" => 680, "upper" => 693),
    "NV" => array("lower" => 889, "upper" => 898),
    "NH" => array("lower" => 030, "upper" => 039),
    "NJ" => array("lower" => 070, "upper" => 089),
    "NM" => array("lower" => 870, "upper" => 884),
    "NY" => array("lower" => 090, "upper" => 149, "ext" => "005,063"),
    "NC" => array("lower" => 269, "upper" => 289),
    "ND" => array("lower" => 580, "upper" => 588),
    "OH" => array("lower" => 430, "upper" => 459),
    "OK" => array("lower" => 730, "upper" => 749),
    "OR" => array("lower" => 970, "upper" => 979),
    "PA" => array("lower" => 150, "upper" => 196),
    "RI" => array("lower" => 028, "upper" => 029),
    "SC" => array("lower" => 290, "upper" => 299),
    "SD" => array("lower" => 570, "upper" => 577),
    "TN" => array("lower" => 370, "upper" => 385),
    "TX" => array("lower" => 750, "upper" => 799, "ext" => "885"),
    "UT" => array("lower" => 840, "upper" => 847),
    "VT" => array("lower" => 050, "upper" => 059),
    "VA" => array("lower" => 220, "upper" => 246, "ext" => "201"),
    "WA" => array("lower" => 980, "upper" => 994),
    "WI" => array("lower" => 530, "upper" => 549),
    "WY" => array("lower" => 820, "upper" => 831)
);

/**
 * Check is state and zipcode are within range. 
 * 
 * @global array $zipRange Array of states => zipcodes
 * @param String $thisState Your state
 * @param int $thisZip Your zipcode
 * @return boolean If state and zipcode are in range. 
 */
function checkStateZip($thisState, $thisZip) {
    global $zipRange;
    if (strlen($thisZip) < 5) {
        return false;
    }
    foreach ($zipRange as $state => $range) {
        if ($state === $thisState) {
            $shortZip = substr($thisZip, 0, 3); //get the first 3 numbers of the zipcode.
            if (isset($range["ext"])) {//if ext is used check that first.
                $rangeExt = explode(",", $range["ext"]); //explode ext.
                foreach ($rangeExt as $rvalue) {//check if ext value matches zipcode.
                    if ($shortZip === $rvalue) {
                        return true; //if there is a match return true.
                    }
                }
            }
            if (($shortZip >= $range["lower"]) && ($shortZip <= $range["upper"])) {
                return true; //if zipcode is between upper and lower range return true.
            }
        }
    }
    return false; //if state or zipcode is not in range return false. 
}

/**
 * Find The state for a zipcode.
 * 
 * @global array $zipRange
 * @param int $zip The US zipcode
 * @return String Two letter State.
 */
function findState($zip) {
    global $zipRange;
    if (strlen($zip) < 5) {
        return "";
    }
    $shortZip = $shortZip = substr($zip, 0, 3);
    foreach ($zipRange as $state => $range) {
        if (isset($range["ext"])) {//if ext is used check that first.
            $rangeExt = explode(",", $range["ext"]); //explode ext.
            foreach ($rangeExt as $rvalue) {//check if ext value matches zipcode.
                if ($shortZip === $rvalue) {
                    return $state; //if there is a match return the state.
                }
            }
        }
        if (($shortZip >= $range["lower"]) && ($shortZip <= $range["upper"])) {
            return $state; //if zipcode is between upper and lower range return the state.
        }
    }
    return "";
}