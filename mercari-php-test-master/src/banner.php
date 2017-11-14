<?php 

//A banner should be displayed during its display period
//Even before the display period, a banner should be displayed if the user’s device has a specific IP address (allowed IP)
// --The allowed IPs will be 10.0.0.1 and 10.0.0.2 
//In all other instances, no banner should be displayed
//
// A banner’s display period should be passed in the form of Start Date/Time and End Date/Time, as ISO 8601 character strings
//  -- Ex: Start Date/Time = 2014-08-10T12:00:00+0900, End Date/Time = 2014-08-10T12:00:00+0900

class banner {
    public $start = 0;
    public $end = 0;
    public $before=false;
    public $periodValid=false;
    
  
    function __construct ($ip, $startStr, $endStr)   {
        $this->allowedIP($ip);
        $this->start = $this->convertTime($startStr);
        $this->end = $this->convertTime($endStr);
        $this->validDisplayPeriod();
    }
   

    function bannerTest($info) {
        return "test case: ".$info;
    }
    
    function allowedIP($ip) {
        if ( strcmp($ip, "10.0.0.1")==0 || strcmp($ip, "10.0.0.2")==0 ) {
            $this->before = true;
        } else {
            $this->before = false;
        }
    }
    
 
    public function convertTime($timeStr) {
        $getTime = explode("=", $timeStr);
        return (strtotime(str_replace("T"," ",$getTime[1]))); 
    }
    
    public function validDisplayPeriod() {
        if (($this->start < $this->end) && ($this->end >= time())) {
            $this->periodValid = true;
        } else {
            $this->periodValid = false;
        }    
    }
    
    public function displayBanner() {
        if ($this->periodValid) {
            if ( ($this->before) || (time() > $this->start) ){
                return true;
            } 
        }
        return false;
    }
}

?>