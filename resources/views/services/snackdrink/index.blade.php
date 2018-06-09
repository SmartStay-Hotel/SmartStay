@extends('admin.layout')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Snacks and Drinks</li>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Snacks and Drinks</li>
@endsection

@section('content')
    <div class="card"
         style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">

        <h2 id="serviceTitle"><i class="fas fa-glass-martini" style="padding: 5px;"></i>Snacks and Drinks<a
                    href="{{ route('snackdrink.create') }}"><i id="addGuest" class="fas fa-user-plus"></i></a></h2>

        <table class="table table-sm table-hover text-center" id="serviceTable">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <thead id="serviceTableHeader">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Guest Name</th>
                <th scope="col">Room Nº</th>
                <th scope="col">Order date</th>
                <th scope="col">Product type</th>
                <th scope="col">Completed?</th>
                <th scope="col" colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($snacks->sortByDesc('updated_at') as $indexKey => $snack)
                <tr>
                    <td>{{ ++$indexKey }}</td>
                    <td>{{ $snack->guest->firstname . ' ' . $snack->guest->lastname }}</td>
                    <td> {{ $snack->guest->rooms[0]->number }} </td>
                    <td>{{ $snack->order_date }}</td>
                    <td> {{ $snack->quantity }} </td>
                    <td class="text-center"><input type="checkbox" name="{{ $snack->id }}"
                                                   @if ($snack->status == '2') checked @endif></td>
                    <td>
                        <a href="{{ route('snackdrink.show', $snack->id) }}" class="show-modal btn btn-success">
                            <span class="far fa-eye"></span>
                        </a>
                        <a href="{{ route('snackdrink.edit', $snack->id) }}" class="edit-modal btn btn-info">
                            <span class="far fa-edit"></span>
                        </a>
                        {!! Form::open(['method' => 'DELETE','route' => ['snackdrink.destroy', $snack->id], 'style'=>'display:inline']) !!}
                        {!! Form::button('<span class="far fa-trash-alt"></span>', array('type' => 'submit', 'class' => 'btn-delete btn btn-danger')) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
@endsection