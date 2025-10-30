<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class Edit extends Component
{
    public $post;
    public $title;
    public $content;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $this->post->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('success', 'Post updated successfully!');
    }

    public function render()
    {

        return view('livewire.posts.edit')
            ->layout('components.layouts.app', ['title' => 'Edit Post']);
    }
}
