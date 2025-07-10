<?php

namespace App\Services;

class MyLogger
{
    public function log($message)
    {
        // Log the message to a file
        return "[Log details: ]" . $message . "\n";
    }
}
