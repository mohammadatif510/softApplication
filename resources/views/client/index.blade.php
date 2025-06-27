@extends('layouts.app')

@section('content')
<div class="row">
    @foreach ($clients as $client)
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ asset('assets/images/users/user-8.jpg') }}" alt="user" class="rounded-circle thumb-xl">
                <h5 class="font-16 fw-bold">{{ $client->name }}</h5>
                <span class="text-muted me-3 fw-semibold"><i class="las la-map-marker me-1 text-secondary"></i>{{
                    $client->address }}</span>
                <span class="text-muted fw-semibold"><i class="las la-phone me-1 text-secondary"></i>{{ $client->phone
                    }}</span>
                <p class="text-muted mt-1"></p>
                <a href="{{ route('client.project',['id' => $client->id]) }}" class="btn btn-sm btn-primary">Project</a>
                <button type="button" class="btn btn-sm btn-de-primary">Message</button>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    @endforeach

</div>
<!--end row-->
@endsection