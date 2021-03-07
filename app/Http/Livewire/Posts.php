<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;


class Posts extends Component
{

    use WithFileUploads;

    public $title;
    public $image;
    public $image_alt_text;
    public $isModalOpen = false;

    protected $rules = [
        'title' => 'required|max:255',
        'image' => 'required|image|max:10240',
        'image_alt_text' => 'required|max:255'
    ];

    public function showCreateModal()
    {
        $this->isModalOpen = true;
    }

    public function create()
    {
        $this->validate();
        $image_path = $this->generateImagePath($this->image);
        $this->saveImage($image_path);
        $post = new Post();
        $post->user_id = $this->getCurrentUserId();
        $post->title = $this->title;
        $post->image_path = $image_path;
        $post->image_alt_text = $this->image_alt_text;
        $post->save();
        $this->reset();
    }

    public function generateImagePath($image)
    {
        $originalName = $image->getClientOriginalName();
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $imagePath= 'user_' . $this->getCurrentUserId() . '/' . 'image' . '--' . time() . $extension;
        return $imagePath;
    }

    public function getCurrentUserId()
    {
        return auth()->user()->id;
    }

    public function saveImage($image_path)
    {
        $this->image->storeAs('public/images/posts/', $image_path);
    }

    public function render()
    {
        $posts = Post::all();
        return view('livewire.posts', compact('posts'));
    }
}
