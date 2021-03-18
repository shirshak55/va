<?php


namespace App\Http\Controllers;

/*
 * Questions provides api related to query questions from database
 *
 */

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswersController
{
    /*
    * store question to datastore
    */
    public function store(Request $request, Question $question)
    {
        // Don't use form validation as this method is not fat
        // Also we don't want to context switch as much as possible
        $request->validate(["content" => "required|string|max:500|min:3"]);

        // we only require one field to add it in database
        $data = [
            "content" => $request->get("content"),
            "question_id" => $question->id,
        ];

        // I assume I have maintained invariants so I think its safe
        // to forceFill and laravel fillible is kinda dumb even rails
        // doesn't use it any more
        $isSuccessful = (new Answer())->forceFill($data)->save();

        // Redirect back to
        if ($isSuccessful) {
            return back()->with('success', 'Answer upload successfully.');
        } else {
            // kinda strange that it failed? May be spurious ?
            // Anyway should be logged into logger app like sentry
            // or data dog
            // for now we just inform user their questions were
            // not posted
            return back()->with('err', 'Unable to create question.');
        }
    }
}

