<?php

namespace App\Services;

class StarCounter
{
    public function getStarsArray(int $stars)
    {
        $starArray = [];

        for ($i = 1; $i <= $stars; $i++) {
            $starArray[] = $i;
        }
        return $starArray;
    }
}
