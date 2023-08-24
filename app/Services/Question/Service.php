<?php

namespace App\Services\Question;

use App\Models\Question;

class Service
{
    public function store($data) {
        Question::firstOrCreate($data);
    }

    public function update($question, $data) {
        $question->update([
            "title" => $data["title"],
            "answer" => $data["answer"],
        ]);
    }
}