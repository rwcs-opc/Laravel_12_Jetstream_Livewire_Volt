@extends('layouts.app_admin2')
{{-- @extends('layouts.app_admin_flexy_bs5') --}}

@section('title','Test Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">Test Chart</h4>
                <p class="card-subtitle">This view tests the sales overview chart from the Flexy template.</p>
                <div id="sales-overview" style="min-height:300px;"></div>
            </div>
        </div>
    </div>
</div>
@endsection