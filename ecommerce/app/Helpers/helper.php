<?php
namespace App\Helpers;
class helper
{
    public static function cardArray()
    {
        $cartCollection=\Cart::getContent();
        return $cartCollection->toArray();
    }
}

    

?>