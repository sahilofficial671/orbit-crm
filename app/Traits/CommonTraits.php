<?php

namespace App\Traits;

trait CommonTraits
{
    public function encode($data)
    {
        return \base64_encode($data);
    }

    public function decode($data)
    {
        return \base64_decode($data);
    }
}
