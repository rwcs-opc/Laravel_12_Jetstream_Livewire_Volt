@extends('layouts.app_admin2')
{{-- resources/views/layouts/app_admin2.blade.php --}}

@section('title','Sample View')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">Test Chart</h4>
                <p class="card-subtitle">This view tests the sales overview chart from the Flexy template.</p>
                <div id="sales-overview" style="min-height:300px;"></div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">Another Test Chart</h4>
                <p class="card-subtitle">This is another instance of the sales overview chart for testing.</p>
                <div id="sales-overview2" style="min-height:300px;"></div>
            </div>
        </div>
    </div>
</div>
@endsection