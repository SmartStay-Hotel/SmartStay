@extends('admin.layout')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('snackdrink.index') }}">Snacks and Drinks</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show Order</li>
@endsection

@section('css')
    <style>
        fieldset {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }

        legend {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
        }
    </style>
@endsection

@section('content')

    <div class="card"
         style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
        <table class="table table-sm table-hover text-center" id="serviceTable">
            <thead id="serviceTableHeader">
            <tr><h2 id="serviceTitle"><i class="fas fa-utensils fa-xs" style="padding: 5px;"></i>Snacks and Drinks<a
                            href="{{ route('snackdrink.index') }}"><i
                                id="addGuest" class="fas fa-user-plus fa-xs"
                                style="padding-left: 70%; color: white; z-index: 1;"></i></a></h2>
            </tr>
            <tr>
                <fieldset>
                    <legend>Show</legend>
                    <strong>Room: </strong> {{ $guest->rooms[0]->number }}<br/>
                    <strong>Guest Name: </strong> {{ $guest->firstname. " ".$guest->lastname }}<br/>
                    <strong>Guest Phone: </strong> {{ $guest->telephone }}<br/>
                    @if($snackdrink->productType->type_id == 1)
                        <strong>Snack: </strong> {{ $snackdrink->productType->name }}<br/>
                    @elseif($snackdrink->productType->type_id == 2)
                        <strong>Drink: </strong> {{ $snackdrink->productType->name }}<br/>
                    @endif
                    <strong>Date hour: </strong> {{ $snackdrink->created_at }}<br/>
                    <strong>Quantity: </strong> {{ $snackdrink->quantity }} u.<br/>
                    <strong>Price total: </strong> {{ $snackdrink->price }} €<br/>
                    <hr/>
                    <p>Order List</p>
                    @foreach($list as $key => $item)
                        <strong>{{ $item->quantity }}: </strong>{{ $item->productType->name }}<br/>
                    @endforeach
                </fieldset>
            </tr>
        </table>
    </div>
@endsection

@section('scripts')
@endsection