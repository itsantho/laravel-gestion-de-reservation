<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Property;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class BookingManager extends Component
{
    public $properties;
    public $propertyId;
    public $startDate;
    public $endDate;

    protected $rules = [
        'propertyId' => 'required|exists:properties,id',
        'startDate' => 'required|date|after_or_equal:today',
        'endDate' => 'required|date|after:startDate',
    ];

    public function mount()
    {
        $this->properties = Property::all();
    }

    public function bookProperty()
    {
        if (!Auth::check()) {
            session()->flash('error', 'Vous devez être connecté pour réserver.');
            return;
        }

        $this->validate();

        // Vérifier si la propriété est déjà réservée
        $existingBooking = Booking::where('property_id', $this->propertyId)
            ->where(function ($query) {
                $query->whereBetween('start_date', [$this->startDate, $this->endDate])
                    ->orWhereBetween('end_date', [$this->startDate, $this->endDate])
                    ->orWhere(function ($q) {
                        $q->where('start_date', '<=', $this->startDate)
                            ->where('end_date', '>=', $this->endDate);
                    });
            })
            ->exists();

        if ($existingBooking) {
            session()->flash('error', 'Cette propriété est déjà réservée pour ces dates.');
            return;
        }

        // Enregistrer la réservation avec l'utilisateur connecté
        Booking::create([
            'user_id' => Auth::id(),
            'property_id' => $this->propertyId,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ]);

        session()->flash('success', 'Réservation effectuée avec succès !');

        $this->reset(['propertyId', 'startDate', 'endDate']);
    }

    public function render()
    {
        return view('livewire.booking-manager');
    }
}
