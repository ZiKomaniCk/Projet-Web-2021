<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom du JUL') }}</label>
    
    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ?? '' }}" required autocomplete="name" autofocus>
        
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
    
    <div class="col-md-6">
        <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ $user->lastName ?? '' }}" required autocomplete="lastName" autofocus>
        
        @error('lastName')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>