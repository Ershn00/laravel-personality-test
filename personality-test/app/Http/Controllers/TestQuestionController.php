<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestQuestionRequest;
use App\Models\TestQuestion;
use App\Models\TestQuestionChoice;
use Illuminate\Http\Request;

class TestQuestionController extends Controller
{
    public function index()
    {
        $data = TestQuestion::all();
        return view('test_question/index', compact('data'));
    }

    public function create()
    {
        return view('test_question/create');
    }

    public function store(TestQuestionRequest $request)
    {
        $questionStore = TestQuestion::create([
            'question' => $request->question
        ]);

        // Store choices for the created question
        for($i=0; $i<4; $i++) {
            $choice = "choice_".$i+1;
            TestQuestionChoice::create([
                'test_question_id' => $questionStore->id,
                'choice_title' => $request->$choice,
                'score' => $i+1
            ]);
        }

        return redirect('questions')->with('completed', 'Successfully created.');
    }

    public function edit($id)
    {
        $question_title = TestQuestion::findOrFail($id)->question;
        $question = TestQuestionChoice::where('test_question_id', $id)->get();

        foreach ($question as $q) {
            if ($q->score == 1) {
                $choice_1 = $q->choice_title;
            } elseif ($q->score == 2) {
                $choice_2 = $q->choice_title;
            } elseif ($q->score == 3) {
                $choice_3 = $q->choice_title;
            } elseif ($q->score == 4) {
                $choice_4 = $q->choice_title;
            }
        }

        return view('test_question/edit',
            compact('question', 'id', 'question_title', 'choice_1', 'choice_2', 'choice_3', 'choice_4'));
    }

    public function update(TestQuestionRequest $request, $id)
    {
        $data = TestQuestion::whereId($id)->update(['question' => $request->question]);

        // Update choices for the created question
        for($i=0; $i<4; $i++) {
            $choice = "choice_".$i+1;
            TestQuestionChoice::where('score', $i+1)->where('test_question_id', $id)->update([
                'choice_title' => $request->$choice
            ]);
        }

        return redirect('questions')->with('completed', 'Successfully updated.');
    }

    public function destroy($id)
    {
        $data = TestQuestion::findOrFail($id)->delete();
        return redirect('questions')->with('completed', 'Successfully deleted.');
    }
}
