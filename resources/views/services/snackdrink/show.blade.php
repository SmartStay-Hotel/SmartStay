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

        .orders {
            margin-left: 40px;
        }
    </style>
@endsection

@section('content')

    <div class="card"
         style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
        <table class="table table-sm table-hover text-center" id="serviceTable">
            <thead id="serviceTableHeader">
            <tr><h2 id="serviceTitle"><i class="fas fa-utensils" style="padding: 5px;"></i>Snacks and Drinks<a
                            href="{{ route('snackdrink.index') }}"></a></h2>
            </tr>
            <tr>
                <fieldset>
                    <legend>Show</legend>
                    <strong>Room: </strong> {{ $guest->rooms[0]->number }}<br/>
                    <strong>Guest Name: </strong> {{ $guest->firstname. " ".$guest->lastname }}<br/>
                    <strong>Guest Phone: </strong> {{ $guest->telephone }}<br/>
                    <strong>More Details: </strong><br/>
                    <ul>
                    @if($snackdrink->productType->type_id == 1)
                        <li class="orders"><strong>Snack: </strong> {{ $snackdrink->productType->name }}</li>
                    @elseif($snackdrink->productType->type_id == 2)
                        <li class="orders"><strong>Drink: </strong> {{ $snackdrink->productType->name }}</li>
                    @endif

                        <li class="orders"> <strong>Date hour: </strong> {{ $snackdrink->created_at }}</li>
                        <li class="orders"><strong>Quantity: </strong> {{ $snackdrink->quantity }} u.</li>
                        <li class="orders"><strong>Price total: </strong> {{ $snackdrink->price }} €</li>
                    </ul>
                    <br/>
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

<script>
    document.getElementsByClassName("itemDropdown")[4].style.color="white";
</script>
@section('scripts')
@endsection