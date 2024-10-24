<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CmsEventController extends Controller
{
    public function showEventsPanel()
    {
        $events = Event::orderBy(DB::raw("STR_TO_DATE(date, '%d-%m-%Y')"))->get();

        return view('cms.cmsEvents', ['events' => $events]);
    }

    public function addEvent(AddEventRequest $request)
    {
        $hasFile = $request->hasFile('image');

        if ($hasFile) {
            $imgFile = $request->file('image');

            $link = Storage::putFile('public', $imgFile);

            $imgUrl = Storage::url($link);
        }

        Event::create([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'link' => $request->input('link'),
            'description' => $request->input('description'),
            'image' => $imgUrl,
        ]);

        return redirect()->back()->with('success', 'Event created');
    }
    public function deleteEvent($eventId)
    {
        if (!$eventToDelete = Event::where('id', $eventId)->first()) {
            return redirect()->back()->withError("Sorry, event not found");
        }

        $eventToDelete->delete();

        return redirect()->back()->with('success', 'Event removed');
    }

}
