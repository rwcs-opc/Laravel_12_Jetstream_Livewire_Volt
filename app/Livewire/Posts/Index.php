<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $title = 'All Posts';

    public $search = '';

    public $fromDate = null;

    public $toDate = null;

    public $invalidDateRange = false;

    public int $perPage = 10;

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedFromDate(): void
    {
        $this->datesAreValid();
        $this->resetPage();
    }

    public function updatedToDate(): void
    {
        $this->datesAreValid();
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'fromDate', 'toDate']);
        $this->invalidDateRange = false;
        $this->resetPage();
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        // Optional: make sure only the owner can delete
        if (auth()->id() !== $post->user_id) {
            session()->flash('error', 'You are not authorized to delete this post.');
            return;
        }

        $post->delete();

        session()->flash('success', 'Post deleted successfully!');
    }

    public function render()
    {
        $query = Post::with('user')->latest();

        if (!empty($this->search)) {
            $query->where(function ($subQuery) {
                $subQuery->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->datesAreValid()) {
            if (!empty($this->fromDate)) {
                $query->whereDate('created_at', '>=', $this->fromDate);
            }

            if (!empty($this->toDate)) {
                $query->whereDate('created_at', '<=', $this->toDate);
            }
        }

        return view('livewire.posts.index', [
            'posts' => $query->paginate($this->perPage),
        ])->layout('components.layouts.app', ['title' => $this->title]);
    }

    private function datesAreValid(): bool
    {
        if ($this->fromDate && $this->toDate && $this->fromDate > $this->toDate) {
            $this->invalidDateRange = true;

            return false;
        }

        $this->invalidDateRange = false;

        return true;
    }
}
