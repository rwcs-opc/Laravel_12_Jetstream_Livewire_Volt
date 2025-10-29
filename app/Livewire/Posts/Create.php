<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $title = '';
    public $content = '';

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'nullable|string',
    ];

    public function save()
    {
        $this->validate();

        Post::create([
            'user_id' => Auth::id(),
            'title'   => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('success', 'Post created successfully.');

        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.create')
            ->layout('components.layouts.app', ['title' => 'Create New Post']);
    }
}
