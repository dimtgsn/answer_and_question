<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\StoreRequest;
use App\Http\Requests\Question\UpdateRequest;
use App\Models\Question;
use App\Services\Question\Service;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function getAllQuestions(): \Illuminate\Database\Eloquent\Collection
    {
        return Question::all();
    }

    public function create(StoreRequest $request, Service $service)
    {
        $data = $request->validated();
        $service->store($data);
    }

    public function update(UpdateRequest $request, Question $question, Service $service)
    {
        $data = $request->validated();
        $service->update($question, $data);
    }


    public function destroy(Question $question)
    {
        $question->delete();
    }
}
