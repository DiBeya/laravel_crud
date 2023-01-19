<?php

namespace App\Http\Livewire;

use App\Models\post;
use Livewire\Component;
use Livewire\WithFileUploads;


class PostIndex extends Component
{
    use WithFileUploads;

    public $showingPostModel = false;

    public $title;
    public $image;
    public $body;
    

    public function ShowPostModal(){

        $this->showingPostModel = true;
    }

    public function storePost(){
        $image = $this->newImage->store('public/posts');
        post::create([
            'title'=>$this->title,
            'image'=>$image,
            'body'=> $this->body,

        ]);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.post-index');
    }
}
