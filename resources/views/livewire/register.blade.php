<div class="row justify-content-md-center ">
    <div class="col-8 border rounded shadow p-3">
        <h1>Register</h1>
        <form wire:submit.prevent="submit">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input wire:model="form.name" type="text" class="form-control @error('form.name') is-invalid @enderror"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('form.name')
                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input wire:model="form.email" type="email"
                    class="form-control @error('form.email') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('form.email')
                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input wire:model="form.password" type="password"
                    class="form-control @error('form.password') is-invalid @enderror" id="exampleInputPassword1">
                @error('form.password')
                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input wire:model="form.password_confirmation" type="password" class="form-control"
                    id="exampleInputPassword1">
            </div>

            <input type="submit" value="Register" class="btn btn-primary">
        </form>
    </div>
</div>
