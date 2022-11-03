<?php

namespace App\Repositories;

use App\Models\Notes;
use Illuminate\Support\Facades\DB;

class NotesRepository
{
    public function create($item)
    {
        $model = new Notes;
        $model->full_name = $item['full_name'];
        $model->company = $item['company'];
        $model->phone = $item['phone'];
        $model->email = $item['email'];
        $model->birthday = $item['birthday'];
        $model->photo = $item['photo'];

        $model->save();

        return $model;
    }

    public function update($item)
    {
        $model = new Notes;
        Notes::find($item['id']);
        $model->full_name = $item['full_name'];
        $model->company = $item['company'];
        $model->phone = $item['phone'];
        $model->email = $item['email'];
        $model->birthday = $item['birthday'];
        $model->photo = $item['photo'];

        $model->save();
    }

    public function delete($ids)
    {
       return DB::table('notes')->delete($ids);
    }
}
