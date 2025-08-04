<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class PostComments extends Component
{
    use WithPagination;

    public Post $post;

    public string $comment;

    public function postComment(): void {

        if (!auth()->check()) {
            session()->flash('error', 'You must be logged in to comment.');
            return;
        }

        $this->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $this->post->comments()->create([
            'comment' => $this->comment,
            'user_id' => auth()->id(),
        ]);

        $this->reset('comment');
    }

    #[Computed()]
    public function comments() {
        return $this?->post->comments()->latest()->paginate(5);
    }

    public function render() {
        return view('livewire.post-comments');
    }
}
