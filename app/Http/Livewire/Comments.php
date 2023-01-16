<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $newComment;
    public $image;
    public $ticket_id;

    protected $listeners = [
        'fileUpload' => 'handleFileUpload',
        'ticketSelected',
    ];

    public function ticketSelected($ticketId)
    {
        $this->ticket_id = $ticketId;
    }

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    public function updated($field)
    {
        $this->validateOnly(
            $field,
            [
                'newComment' => 'required|min:2|max:255'
            ],
            [
                'required' => ':attribute harus di isi',
                'min'      => ':attribute minimal 2 karakter',
                'max'      => ':attribute maksimal 255 karakter',
            ],
            [
                'newComment' => 'Comment'
            ]
        );
    }


    public function remove($commentId)
    {
        $comment = Comment::find($commentId);
        Storage::disk('public')->delete($comment->image);
        $comment->delete();

        session()->flash('message', 'Comment deleted successfully');
    }

    public function addComment()
    {
        $this->validate(
            [
                'newComment' => 'required|min:2'
            ],
            [
                'required' => ':attribute harus di isi',
                'min' => ':attribute minimal 10 karakter',
            ],
            [
                'newComment' => 'Comment'
            ]
        );

        $image = $this->storeImage();

        if ($this->newComment == '') {
            return;
        }

        $createdComment = Comment::create([
            'body'    => $this->newComment,
            'image'    => $image,
            'user_id' => '1',
            'support_ticket_id' => $this->ticket_id
        ]);

        $this->newComment = '';
        $this->image      = '';

        session()->flash('message', 'Comment added successfully');
    }

    public function storeImage()
    {
        if (!$this->image) {
            return null;
        }

        $img  = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random() . '.jpg';

        Storage::disk('public')->put($name, $img);

        return $name;
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::where('support_ticket_id', $this->ticket_id)->latest()->paginate(2)
        ]);
    }
}
