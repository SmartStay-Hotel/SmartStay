@extends('admin.layout')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('housekeeping.index') }}">Housekeeping</a></li>
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
        .details{
            margin-left: 60px;
        }
    </style>
@endsection

@section('content')

    <div class="card"
         style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
        <table class="table table-sm table-hover text-center" id="serviceTable">
            <thead id="serviceTableHeader">
            <tr><h2 id="serviceTitle"><i class="fas fa-broom" style="padding: 5px;"></i>Housekeeping<a
                            href="{{ route('housekeeping.index') }}"><i
                                id="addGuest" class="fas fa-user-plus fa-xs"
                                style="padding-left: 70%; color: white; z-index: 1;"></i></a></h2>
            </tr>
            <tr>
                <fieldset>
                    <legend>Show</legend>
                    <strong>Order Date: </strong> {{ $housekeeping->order_date }}<br>
                    <strong>Guest Name: </strong> {{ $guest->firstname. " ".$guest->lastname }}<br>
                    <strong>Guest Phone: </strong> {{ $guest->telephone }}<br/>
                    <strong>More Details: </strong>
                    <ul>
                        @if(!empty($housekeeping->bed_sheets))
                            <li class="orders"><strong>Bed Sheets</strong></li>
                        @endif

                        @if(!empty($housekeeping->cleaning))
                                <li class="orders"><strong>Cleaning</strong></li>
                        @endif

                        @if(!empty($housekeeping->minibar))
                                <li class="orders"><strong>Minibar</strong></li>
                        @endif

                        @if(!empty($housekeeping->blanket))
                                <li class="orders"><strong>Blanket</strong></li>
                        @endif

                        @if(!empty($housekeeping->toiletries))
                                <li class="orders"><strong>Toiletries</strong></li>
                        @endif

                        @if(!empty($housekeeping->pillow))
                                <li class="orders"><strong>Pillow</strong></li>
                        @endif
                    </ul>
                </fieldset>
            </tr>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementsByClassName("itemDropdown")[2].style.color="white";
    </script>
@endsection