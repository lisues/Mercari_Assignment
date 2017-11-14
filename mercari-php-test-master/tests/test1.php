<?php
require_once('../src/banner.php');

function bannerTestResult($banner, $result) {
   
    if ($result) {
         echo "<br> ".$banner." display: Yes";
    } else {
         echo "<br> ".$banner." display: No";   
    }
}

$banner1 = new banner("1.2.3.4", "Start Date/Time = 2014-08-10T12:00:00+0900", "End Date/Time = 2015-08-10T12:00:00+0900");
bannerTestResult("bannner1", $banner1->displayBanner());  //no

$banner2 = new banner("1.2.3.4", "Start Date/Time = 2017-08-10T12:00:00+0900", "End Date/Time = 2018-08-10T12:00:00+0900");
bannerTestResult("bannner2", $banner2->displayBanner());  //yes


$banner3 = new banner("10.0.0.2", "Start Date/Time = 2017-12-10T12:00:00+0900", "End Date/Time = 2018-08-10T12:00:00+0900");
bannerTestResult("bannner3", $banner3->displayBanner()); //yes


$banner4 = new banner("1.2.3.4", "Start Date/Time = 2018-08-10T12:00:00+0900", "End Date/Time = 2015-08-10T12:00:00+0900");
bannerTestResult("bannner4", $banner4->displayBanner());  //no

$banner5 = new banner("12.0.0.2", "Start Date/Time = 2017-12-10T12:00:00+0900", "End Date/Time = 2018-08-10T12:00:00+0900");
bannerTestResult("bannner3", $banner3->displayBanner()); //no
?>