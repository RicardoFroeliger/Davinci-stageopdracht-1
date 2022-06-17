@extends('layouts.app')

@section('content')
    <button onclick="javascript:history.back()" class="btn btn-secondary ms-4">
        <h4 class="m-0">Back</h4>
    </button>
    <button onclick="window.location ='/'" class="btn btn-secondary ms-4">
        <h4 class="m-0">Home</h4>
    </button>

    <table class="w-100">
        <colgroup>
            <col class="w-50">
            <col class="w-50">
        </colgroup>
        <tbody class="text-center">
            <tr>
                <td colspan="2">
                    <h1 class="text-center">{{ $song->name }}</h1>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3>Duration: {{ gmdate('i:s', $song->duration) }}</h3>
                    <h3>Song by: {{ $song->artist }}</h3>
                </td>
            </tr>
            <tr>
                <td>
                    @if (in_array($song->id, $queue))
                        <form action="/queue/remove" method="POST">
                            @csrf
                            <button type="submit" name="songId" value="{{ $song->id }}"
                                class="btn btn-danger mb-2 d-block" style="float: right;"
                                onclick='return confirm(`Are you sure you want to remove "{{ $song->name }}" from your queue?`)'>Remove
                                from queue</button>
                        </form>
                    @else
                        <form action="/queue/store" method="POST">
                            @csrf
                            <button type="submit" name="songId" value="{{ $song->id }}"
                                class="btn btn-secondary mb-2 d-block" style="float: right;">Add to queue</button>
                        </form>
                    @endif
                </td>
                <td>
                    <button class="btn btn-primary mb-2 d-block">Manage playlists</button>
                </td>
            </tr>
        </tbody>
    @endsection
