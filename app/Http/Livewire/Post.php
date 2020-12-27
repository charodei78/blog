<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Post extends Component
{
    public $postId;
    public $title;
    public $content;
    public $image;
    public $tag;

    public function render()
    {
        return view('livewire.post');
    }
}
