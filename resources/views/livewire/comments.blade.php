<div class="col-6">
    <div class="row  mt-5">
        <div class="">
            <div class="card">
                <div class="card-header">
                    Comments
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="my-3 alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif

                    <section>
                        @if ($image)
                        <img src="{{ $image }}" width="200" alt="NoImage">
                        @endif
                        <div class="form-group my-2">
                            <input type="file" class="form-control" id="image" wire:change="$emit('fileChoosen')">
                        </div>
                    </section>

                    <form wire:submit.prevent="addComment">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control
                            @error('newComment')
                            is-invalid
                            @enderror" placeholder="What's in your mind" wire:model.debounce.250ms="newComment">

                            @error('newComment')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Add</button>
                    </form>

                    @foreach ($comments as $comment)
                    <div class="mt-3 rounded border shadow p-3 my-2">
                        <i class="bi bi-x-lg d-flex justify-content-end link-danger"
                            wire:click="remove({{ $comment->id }})"></i>

                        <div class="justify-between my-2">
                            <div class="d-flex">
                                <p class="font-bold text-lg"><span class="text-bold">{{ $comment->creator->name
                                        }}</span>
                                    |
                                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                                </p>
                            </div>
                            @if ($comment->image)
                            <img src="{{ $comment->imagePath }}" width="200" alt="No Image">
                            @endif
                        </div>
                        <p class="text-grey-800">
                        <p>{{ $comment->body }}</p>
                        </p>
                    </div>
                    @endforeach

                    {{ $comments->links('pagination-links') }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.livewire.on('fileChoosen', () => {
        let inputField = document.getElementById('image')
        file = inputField.files[0]
        let reader = new FileReader();
            reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result)
        }
        reader.readAsDataURL(file);
    })
</script>
