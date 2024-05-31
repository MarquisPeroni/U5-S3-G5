@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Activities</h1>
            <div class="list-group">
                @foreach ($activities as $activity)
                    <a href="{{ route('activities.show', $activity) }}" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">{{ $activity->name }}</h5>
                        <p class="mb-1">{{ $activity->description }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
