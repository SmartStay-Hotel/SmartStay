@extends('admin.layout')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Check out</li>
@endsection
@section('content')
    <div class="card"
         style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
        <h2 id="checkOutTitle"><i class="fas fa-sign-out-alt" style="padding: 5px;"></i>Check out</h2>
        <table class="table table-sm table-hover text-center" id="checkOutTable">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <thead id="checkOutTableHeader">
            <tr>
                <th valign="middle">#</th>
                <th scope="col">Name</th>
                <th scope="col">Room Type</th>
                <th scope="col">Check-in Day</th>
                <th scope="col">Check-out Day</th>
                <th scope="col">Room Nº</th>
                <th scope="col">Price for Orders</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($guests as $indexKey => $guest)
                <tr class="table-@if($guest->balance > 0)warning @endif">
                    <td class="col1">{{ ++$indexKey }}</td>
                    <td>{{ $guest->firstname . ' ' . $guest->lastname }}</td>
                    <td>{{ $guest->roomType }}</td>
                    <td>{{ $guest->checkin_date }}</td>
                    <td>{{ $guest->checkout_date }}</td>
                    <td>{{ $guest->number }}</td>
                    <td scope="row">{{ $guest->balance }}</td>
                    <td class="text-right">
                        @if($guest->balance > 0)
                            <a href="{{ route('summary.pdf', $guest->rooms[0]->id) }}" target="_blank" class="edit-modal btn btn-info">
                                <span class="fas fa-file-pdf"></span>
                            </a>
                        @endif
                        {!! Form::open(['method' => 'DELETE','route' => ['guests.destroy', $guest->id], 'style'=>'display:inline']) !!}
                        {!! Form::button('Checkout', array('type' => 'submit', 'class' => 'btn-delete btn btn-danger', 'id' => 'exitBtn')) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <p>
        {{ $guests->render() }}
        <p>
            <span id="checkoutTotal">{{ $guests->total() }}</span> checkout | page {{ $guests->currentPage() }}
            of {{ $guests->lastPage() }}
        </p>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function (e) {
                var $this = this;
                e.preventDefault();
                toastr.options = {'closeButton': true, 'timeOut': false, 'closeOnHover': false};
                toastr.error('<button type="button" class="btn-yes btn">Yes</button>', 'You are about to checkout a guest!');
                $('.btn-yes').click(function () {
                    var row = $($this).parents('tr');
                    var form = $($this).parents('form');
                    var url = form.attr('action');

                    row.fadeOut();
                    $.post(url, form.serialize(), function (result) {
                        $('#checkoutTotal').html(result.total);
                        toastr.options = {
                            'closeButton': true,
                            'timeOut': 5000,
                            'closeOnHover': true,
                            'progressBar': true
                        };
                        toastr.success(result.message);
                    }).fail(function () {
                        row.fadeIn();
                        toastr.options = {
                            'closeButton': true,
                            'timeOut': 5000,
                            'closeOnHover': true,
                            'progressBar': true
                        };
                        toastr.warning('Something went wront', 'Alert!');
                    });

                });
            });
        })
    </script>
@endsection