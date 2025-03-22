<?php

namespace App\Http\Controllers;

class BookingController
{
    public function index()
    {
        $properties = Booking::all(); // Récupère toutes les propriétés

        return view('properties.index', compact('properties'));
    }
}
