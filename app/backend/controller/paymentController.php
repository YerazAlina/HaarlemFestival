<?php

require_once __DIR__ . ('../../service/jazzService.php');
require_once __DIR__ . ('../../service/activityService.php');
require_once __DIR__ . ('../../service/foodService.php');

class paymentController{


    private foodService $foodservice;
    private jazzService $jazzservice;
    private activityService $activityservice;

    public function InitializeMollie(){


        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");

        //$totalPrice = number_format()

        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "10.00"
            ],
            "description" => "My first API payment",
            "redirectUrl" => "https://webshop.example.org/order/12345/",
            "webhookUrl"  => "https://webshop.example.org/mollie-webhook/",
        ]);

        header("Location: " . $payment->getCheckoutUrl(), true, 303);

        $payment = $mollie->payments->get($payment->id);

        if ($payment->isPaid())
        {
            echo "Payment received.";
        }


    }

}