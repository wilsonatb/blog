<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class LikeButton extends Component {

    // If the parent component is updated, this property will be updated as well
    #[Reactive]
    public Post $post;

   /**
    * Toggle the like status of the post for the authenticated user.
    *
    * @return void
    */
    public function toggleLike() {
        
        if (auth()->guest()) {
            return $this->redirect(route('login'), false);
        }

        // Check if the post is already liked by the user
        $user = auth()->user();

        if ($user->hasLiked($this->post)) {
            // If already liked, unlike the post
            $user->likes()->detach($this->post);
        } else {
            // If not liked, like the post
            $user->likes()->attach($this->post);
        }

        // Refresh the post to update likes count
        $this->post->refresh();
    }

    public function render() {
        return view('livewire.like-button');
    }
}
