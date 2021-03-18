<?php


namespace App\Http\Controllers;

/*
 * Questions provides api related to query questions from database
 *
 */

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController
{
    /*
     * List all the questions
     */
    public function index()
    {
        // May be give user to sort the questions based on replies count?
        // or perhaps based on number of views?
        // Todo(shirshak55) hide primary key and use slugs
        $questions = Question::select(["id", "title", "summary"])->latest()->paginate(10);

        // Todo(shirshak55) Cache the result so we don't have to hit database ??
        $questions_count = Question::count();
        $answers_count = Answer::count();


        return view('questions.index', [
            "questions" => $questions,
            "questions_count" => $questions_count,
            "answers_count" => $answers_count,
        ]);
    }

    /*
    * Show to create question form
    */
    public function create(Request $request)
    {
        return view("questions.create",
            ["title" => $request->get('title'), "content" => $request->get("content")]);
    }

    /*
    * store question to datastore
    */
    public function store(Request $request)
    {
        // Don't use form validation as this method is not fat
        // Also we don't want to context switch as much as possible
        $request->validate(["title" => "required|string|max:200|min:5|ends_with:?"]);

        // we only require two field to update it in database
        $data = $request->only(["title", "content"]);

        // I assume I have maintained invariants so I think its safe
        // to forceFill and laravel fillable is kinda dumb even rails
        // doesn't use it any more
        $isSuccessful = (new Question())->forceFill($data)->save();

        // Redirect back to
        if ($isSuccessful) {
            return back()->with('success', 'Question created successfully.');
        } else {
            // kinda strange that it failed? May be spurious ?
            // Anyway should be logged into logger app like sentry
            // or data dog
            // for now we just inform user their questions were
            // not posted
            return back()->with('err', 'Unable to create question.');
        }
    }

    /*
     * Show a single question
     */
    public function show(Question $question)
    {
        // May be query only recent 10 replies so that we don't
        // overload the database?
        // Todo(@shirshak55) Paginate the answers

        $answers = $question->answers()->latest()->paginate(10);

        return view("questions.show", ["question" => $question, "answers" => $answers]);
    }
}
