<div class="form-group row">
    <label for="rate" class="col-md-4 col-form-label text-md-right">{{ __('Note') }}</label>

    <div class="col-md-6">
        <input id="rate" type="number" class="form-control @error('rate') is-invalid @enderror" name="rate" value="{{ old('rate') }}" required autocomplete="rate" autofocus>

        @error('rate')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Commentaire') }}</label>

    <div class="col-md-6">
        <textarea class="form-control" id="comment" rows="2" name="comment" required placeholder="Il était une fois..."></textarea>

        @error('comment')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>