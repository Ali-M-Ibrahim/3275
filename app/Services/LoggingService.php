<?php

namespace App\Services;


Class LoggingService{

    function doLog($content){
        logger("An error has been raised in the application and the error is: " . $content);
    }


}
