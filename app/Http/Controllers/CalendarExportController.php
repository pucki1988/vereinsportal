<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Event;

class CalendarExportController extends Controller
{
    public function ics()
    {

        $query = Event::query()
        ->with('club')
        ->where('is_visible', true)
        ->orderBy('start');

        $query->where('start', '>=', now()->startOfDay());

        $events = $query->get();

        $ics = "BEGIN:VCALENDAR\r\n";
        $ics .= "VERSION:2.0\r\n";
        $ics .= "PRODID:-//Vereinsportal//Pro Schönbrunn//DE\r\n";
        $ics .= "X-WR-CALNAME:Pro Schönbrunn – Termine\r\n";


        foreach ($events as $event) {
            $ics .= "BEGIN:VEVENT\r\n";
            $ics .= "UID:event-{$event->id}@deine-domain.de\r\n";
            $ics .= "DTSTAMP:" . now()->format('Ymd\THis\Z') . "\r\n";
            $ics .= "DTSTART:" . $event->start->format('Ymd\THis\Z') . "\r\n";
            $ics .= "DTEND:" . $event->end->format('Ymd\THis\Z') . "\r\n";
            $ics .= "SUMMARY:" . $this->escape($event->title) . "-" .$this->escape($event->club->name). "\r\n";
            $ics .= "DESCRIPTION:" . $this->escape($event->description) . "\r\n";
            $ics .= "LOCATION:" . $this->escape($event->location) . "\r\n";
            $ics .= "END:VEVENT\r\n";
        }

        $ics .= "END:VCALENDAR\r\n";

        return Response::make($ics, 200, [
            'Content-Type' => 'text/calendar; charset=utf-8',
            'Content-Disposition' => 'inline; filename="events.ics"',
        ]);
    }

    private function escape($text)
    {
        return str_replace(["\\", ",", ";", "\n"], ["\\\\", "\,", "\;", "\\n"], $text);
    }
}
