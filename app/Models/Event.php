<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Pack;
use App\Models\Expense;
use App\Models\Photo;
use App\Models\Payment;

class Event extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pack() {
        return $this->belongsTo(Pack::class);
    }

    public function expenses() {
        return $this->hasMany(Expense::class);
    }

    public function photos() {
        return $this->hasMany(Photo::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
