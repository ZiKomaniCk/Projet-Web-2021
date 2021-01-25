
    <div class="form-group row">
        <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
        
        <div class="col-md-6">
            <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ $user->lastName ?? '' }}" required autocomplete="lastName" autofocus>
            
            @error('lastName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

<div class="form-group row fs-6">
    <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>
    
    <div class="col-md-6">
        <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ $user->firstName ?? '' }}" required autocomplete="firstName" autofocus>
        
        @error('firstName')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row fs-6">
    <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('Pseudo') }}</label>
    
    <div class="col-md-6">
        <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ $user->nickname ?? '' }}" required autocomplete="nickname" autofocus>
        
        @error('nickname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row fs-6">
    <label for="credit" class="col-md-4 col-form-label text-md-right">{{ __('Solde') }}</label>
    
    <div class="col-md-6">
        <input id="credit" type="number" class="form-control @error('credit') is-invalid @enderror" name="credit" value="{{ $user->credit ?? '' }}" autocomplete="credit" autofocus>
        
        @error('credit')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row fs-6">
    <label for="birthDate" class="col-md-4 col-form-label text-md-right">{{ __("Date d'anniversaire") }}</label>
    
    <div class="col-md-6">
        <input id="birthDate" type="date" class="form-control @error('birthDate') is-invalid @enderror" name="birthDate" value="{{ $user->birthDate ?? '' }}" required autocomplete="birthDate">
        
        @error('birthDate')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row fs-6">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Addresse E-Mail ') }}</label>
    
    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? '' }}" required autocomplete="email">
        
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@if ($routeName == 'register')
<div class="form-group row fs-6">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>
    
    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row fs-6">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>
    
    <div class="col-md-6 fs-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn text-white btn-primary">
            {{ __("S'enregistrer") }}
        </button>
    </div>
</div>
@endif




