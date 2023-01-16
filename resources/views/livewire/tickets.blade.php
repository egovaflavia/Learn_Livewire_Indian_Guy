<div class="col-6">
    <div class="row mt-5">
        <div>
            <div class="card">
                <div class="card-header">
                    Ticket
                </div>
                <div class="card-body">
                    @foreach ($tickets as $ticket)
                    <div class="mt-3 rounded border shadow p-3 my-2 {{ $active == $ticket->id ? 'bg-primary' : ''  }}"
                        wire:click="$emit('ticketSelected', {{ $ticket->id }})">
                        <p wire:click="$emit('ticketSelected', {{ $ticket->id }})">{{ $ticket->questions }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
