<?php

namespace Tests\Feature;

use App\Models\TestQuestion;
use App\Models\TestQuestionChoice;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestQuestionTest extends TestCase
{
    use RefreshDatabase;

    public function createTestQuestion($args = [])
    {
        return TestQuestion::factory()->create($args);
    }

    public function createTestQuestionChoice($args = [])
    {
        return TestQuestionChoice::factory()->create($args);
    }

    public function test_can_create_and_fetch_questions()
    {
        $question = $this->createTestQuestion();
        $choice = $this->createTestQuestionChoice(['test_question_id' => $question->id]);

        $this->assertInstanceOf(Collection::class, $question->test_question_choices);
        $this->assertInstanceOf(TestQuestionChoice::class, $question->test_question_choices->first());
    }

    public function test_can_update_question_and_choice()
    {
        $question = $this->createTestQuestion();
        $choice = $this->createTestQuestionChoice(['test_question_id' => $question->id]);

        $question->update(['question' => 'New entry']);
        $choice->update([
            'choice_title' => 'New title',
            'score' => 3
        ]);

        $this->assertDatabaseHas('test_questions',['question' => $question->question]);
        $this->assertDatabaseHas('test_question_choices',['choice_title' => $choice->choice_title, 'score' => $choice->score]);
    }

    public function test_if_question_id_deleted_then_all_its_choices_would_be_deleted()
    {
        $question = $this->createTestQuestion();
        $choice = $this->createTestQuestionChoice(['test_question_id' => $question->id]);
        $choice2 = $this->createTestQuestionChoice();

        // Delete Question
        $question->delete();

        $this->assertDatabaseMissing('test_questions',['id' => $question->id]);
        $this->assertDatabaseMissing('test_question_choices',['id' => $choice->id]);
        $this->assertDatabaseHas('test_question_choices',['id' => $choice2->id]);
    }
}
