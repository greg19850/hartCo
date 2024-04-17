<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDescriptionRequest;
use App\Http\Requests\UpdateMottoRequest;
use App\Models\FamilyDescription;
use App\Models\Motto;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function showCmsHome()
    {
        $motto = Motto::first();
        $description = FamilyDescription::first();

        return view('cms.cmsHome', ['motto' => $motto, 'description' => $description]);
    }

    public function updateMotto(UpdateMottoRequest $request)
    {
        if ($motto = Motto::first()) {
            $motto->motto = $request->input('motto');

            $motto->save();
        } else {
            Motto::create([
                'motto' => $request->input('motto')
            ]);
        }

        return redirect()->route("cms.showCmsHome")->with('success', 'Motto Updated');
    }

    public function updateDescription(UpdateDescriptionRequest $request)
    {
        if ($description = FamilyDescription::first()) {
            $description->description = $request->input('family_description');

            $description->save();
        } else {
            FamilyDescription::create([
                'description' => $request->input('family_description')
            ]);
        }

        return redirect()->route("cms.showCmsHome")->with('success', 'Description Updated');
    }
}
