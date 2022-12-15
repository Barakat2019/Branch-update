<?php
 namespace App\PaymentGetway;

 class PaymentFacade
 {
    protected static function getFacadeAccessor()
    {
        return 'Payment';
    }
 }
?>
