<div class="row justify-content-md-center ">
    <div class="col-8 border rounded shadow p-3">
        <h1>Login</h1>
        <form wire:submit.prevent="submit">
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
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <input type="submit" value="Login" class="btn btn-primary">
            {{-- <button type="submit" class="btn btn-primary">Login</button> --}}
        </form>
    </div>
</div>
