<?php

namespace Structural\DecoratorV2;

abstract  class BookingDecorator implements Booking
{
    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;

    }

}