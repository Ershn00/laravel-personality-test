<?php

namespace App\Http\Controllers;

use App\Models\TestQuestion;
use Illuminate\Http\Request;

class PersonalityTestController extends Controller
{
    public function index()
    {
        $questions = TestQuestion::with('test_question_choices')->get();
        return view('index', compact('questions'));
    }

    public function endTest(Request $request)
    {
        for ($i=0; $i<$request->question_count; $i++) {
            $answer = "answer_".$i;
            $result[$i] = $request->$answer;
        }
        $score = array_sum($result);

        $personality = ($score > $request->question_count * 2) ? 'extrovert' : 'introvert';

        return view('result', compact('score', 'personality'));
    }
}
