<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class CmsFaqController extends Controller
{
    public function showFaqPanel()
    {
        $faq = Faq::all();

        return view('cms.cmsFaq', ['faqList' => $faq]);
    }

    public function addQuestion(FaqRequest $request)
    {
        Faq::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer')
        ]);

        return redirect()->back()->withSuccess('FAQ Added Successfully');
    }

    public function editQuestion(FaqRequest $request, int $questionId)
    {
        if (!$faqToUpdate = Faq::where('id', $questionId)->first()) {
            return redirect()->back()->withError('Sorry, question not found');
        }

        $faqToUpdate->question = $request->input('question');
        $faqToUpdate->answer = $request->input('answer');
        $faqToUpdate->save();

        return redirect()->back()->withSuccess('Question updated Successfully');
    }

    public function deleteQuestion(int $questionId)
    {
        if (!$faqToDelete = Faq::where('id', $questionId)->first()) {
            return redirect()->back()->withError('Sorry, question not found');
        }

        $faqToDelete->delete();

        return redirect()->back()->withSuccess('Question removed');
    }
}
