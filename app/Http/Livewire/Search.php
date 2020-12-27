<?php

namespace App\Http\Livewire;

use App\Models\Post as PostModel;
use Livewire\Component;

class Search extends Component
{
    public $input;
    public $posts;

    public function render()
    {
        if ($this->input)
        {
            $input = "$this->input%";
            $this->posts = PostModel::select('id', 'title')->where('tag', 'like', $input)->get();
        }
        else
            $this->posts = [];
        return view('livewire.search');
    }
}
