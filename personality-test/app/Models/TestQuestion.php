<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['question'];

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($test_question) {
            $test_question->test_question_choices->each->delete();
        });
    }

    public function test_question_choices()
    {
        return $this->hasMany(TestQuestionChoice::class);
    }
}
