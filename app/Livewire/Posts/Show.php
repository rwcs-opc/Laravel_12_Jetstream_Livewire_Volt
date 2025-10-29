<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class Show extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.posts.show')
            ->layout('components.layouts.app', ['title' => 'View Post']);
    }
}
