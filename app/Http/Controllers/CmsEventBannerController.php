<?php

namespace App\Http\Controllers;

use App\Models\EventBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CmsEventBannerController extends Controller
{
    public function index()
    {
        $eventBanners = EventBanner::orderBy('event_date', 'asc')->get();
        return view('cms.cmsEventBanners', compact('eventBanners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date|after_or_equal:today',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // Increased to 5MB for posters
            'link' => 'nullable|url'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = Storage::url(Storage::putFile('public', $request->file('image')));
        }

        EventBanner::create([
            'title' => $request->title,
            'event_date' => $request->event_date,
            'image' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->back()->with('success', 'Event banner created successfully');
    }

    public function toggleActive($id)
    {
        $eventBanner = EventBanner::findOrFail($id);
        $eventBanner->is_active = !$eventBanner->is_active;
        $eventBanner->save();

        $status = $eventBanner->is_active ? 'activated' : 'deactivated';
        return redirect()->back()->with('success', "Event banner {$status} successfully");
    }

    public function destroy($id)
    {
        $eventBanner = EventBanner::findOrFail($id);
        $eventBanner->delete();

        return redirect()->back()->with('success', 'Event banner deleted successfully');
    }
}
