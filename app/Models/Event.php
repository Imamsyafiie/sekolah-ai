<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Guava\Calendar\Contracts\Eventable;
// use Guava\Calendar\ValueObjects\Event as CalendarEvent;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'starts_at', 'ends_at'];

    // public function toCalendarEvent(): array
    // {
    //     return [
    //         'id' => $this->id,
    //         'title' => $this->title,
    //         'start' => $this->start,
    //         'end' => $this->end,
    //     ];
    // }
    // public function toEvent(): Event|array
    // {
    //     return Event::make($this)
    //         ->title($this->name)
    //         ->start($this->starts_at)
    //         ->end($this->ends_at);
    // }
    // public function toEvent(): CalendarEvent|array
    // {
    //     return CalendarEvent::make($this) // Menggunakan CalendarEvent
    //         ->title($this->name)
    //         ->start($this->starts_at)
    //         ->end($this->ends_at); // Mengambil waktu akhir dari model
    // }
}
