@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @if (sizeof($rooms) > 0)
                @foreach($rooms as $room)
                    <div
                        class="card col-sm-2 col-md-3 m-2 card__hotel {{ $room['status'] == 0 ? 'available' : 'not-available' }}">
                        <h5 class="card-header">{{ $room['title'] }}</h5>
                        <div class="card-body">
                            <h5 class="card-title">{{ $room['title'] }}</h5>
                            <p class="card-text">{{ $room['description'] }}</p>
                            <a href="#"
                               class="btn btn-outline-primary btn__check_in {{ $room['status'] == 0 ? 'show' : 'hide' }}"
                               data-room-id="{{ $room['id'] }}"
                               data-toggle="modal" data-target="#searchGuest">Check In</a>
                            <a href="#"
                               class="btn btn-outline-danger btn__check_out {{ $room['status'] == 0 ? 'hide' : 'show' }}"
                               data-checkout-url="{{ route("checkout", $room['id']) }}"
                               data-toggle="modal" data-target="#checkOutModal">Check Out</a>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="no__data">No room found</p>
            @endif
        </div>
    </div>

    <div class="modal fade" id="searchGuest" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Guest Check In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="email" id="guestEmail" class="form-control" placeholder="Enter guest email" required/>
                    </div>
                    <span class="invalid-feedback" role="alert" id="emailError">
                        <strong>Check guest in by email</strong>
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnSearchGuest">Check In</button>
                    <button type="button" class="btn btn-primary" id="btnNewGuest">New Guest</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="checkOutModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Check out guest?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to check out guest?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnDoCheckout">Check out</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
