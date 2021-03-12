<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;


class Posts extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $isModalOpen = false;
    public $isDeleteModalOpen = false;
    public $postId;
    public $title;
    public $image;
    public $image_path;
    public $image_alt_text;
    

    protected $rules = [
        'title' => 'required|max:255',
        'image' => 'required|image|max:10240',
        'image_alt_text' => 'required|max:255'
    ];

    public function showCreateModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->isModalOpen = true;
    }

    public function showEditModal($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->postId = $id;
        $this->isModalOpen = true;
        $this->getPostData();
    }

    public function showDeleteModal($id)
    {
        $this->postId = $id;
        $this->isDeleteModalOpen = true;
    }

    public function getPostData()
    {
        $post = Post::findOrFail($this->postId);
        $this->title = $post->title;
        $this->image_path = $post->image_path;
        $this->image_alt_text = $post->image_alt_text;
    }

    public function create()
    {
        $this->validate();
        $image_path = $this->saveImage();
        $post = new Post();
        $post->user_id = $this->getCurrentUserId();
        $post->title = $this->title;
        $post->image_path = $image_path;
        $post->image_alt_text = $this->image_alt_text;
        $post->save();
        $this->isModalOpen = false;
        $this->reset();
        session()->flash('flash.banner', 'Post successfully created.');
    }

    public function read()
    {
        return Post::orderBy('created_at', 'DESC')->paginate(3);
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|max:255',
            'image' => 'image|max:10240|nullable',
            'image_alt_text' => 'required|max:255'
        ]);

        $post = Post::find($this->postId);
        $post->title = $this->title;
        if ($this->image) {
            Storage::delete($this->image_path);
            $image_path = $this->saveImage();
            $post->image_path = $image_path;
        }
        $post->image_alt_text = $this->image_alt_text;
        $post->save();
        $this->isModalOpen = false;
        $this->reset();
        session()->flash('flash.banner', 'Post successfully updated.');
    }

    public function delete()
    {
        $post = Post::find($this->postId);
        Storage::delete($post->image_path);
        $post->delete();
        $this->isDeleteModalOpen = false;
        $this->resetPage();
        session()->flash('flash.banner', 'Post successfully deleted.');
    }

    public function getCurrentUserId()
    {
        return auth()->user()->id;
    }

    public function saveImage()
    {
        $imagePath = $this->image->store('post-images', 'public');
        return $imagePath;
    }

    public function render()
    {
        $posts = $this->read();
        return view('livewire.posts', compact('posts'));
    }
}
