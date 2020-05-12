@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Rate booking') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('rating.add') }}">
                            @csrf

                            @if ($errors->has('room_id') || $errors->has('guest_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>An unknown error occurred</strong>
                                </span>
                            @endif

                            <input name="room_id" type="hidden" value="{{ Session::get('roomId') ?? old('room_id') }}">
                            <input name="guest_id" type="hidden" value="{{ Session::get('guestId') ?? old('guest_id') }}">

                            <div class="form-group">
                                <label class="control-label" for="message">Your rating</label>
                                <input id="input-21e" name="rating" value="1" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" required>

                                @if ($errors->has('rating'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rating') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <textarea maxlength="225" name="comment" rows="5" placeholder="Please enter your comment here" required>{{ old('comment') }}</textarea>

                                @if ($errors->has('comment'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
