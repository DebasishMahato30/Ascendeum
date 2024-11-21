@extends('layouts.app')

@section('title', 'Campaign List')

@section('content')
    <h1 class="mb-4">Campaign List</h1>
    <!-- <form method="GET" action="{{ route('home') }}" class="row g-3 mb-3">
        <div class="col-md-4">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
        </div>
        <div class="col-md-4">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>
        <div class="col-md-4 align-self-end">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
    </form> -->

    <table class="table table-striped table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Name</th>
                <th>UTM Campaign</th>
                <th>Total Revenue</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campaigns as $campaign)
                <tr>
                    <?php // Unicode string
                        $unicodeText = "\\u03B5\\u03AF\\u03BD\\u03B1\\u03B9\\u03C4\\u03BF\\u03B4\\u03AD\\u03C1\\u03BC\\u03B1050623PinGR";

                        // Decode Unicode
                        $decodedText = json_decode('"' . $campaign->utm_campaign . '"');
                    ?>
                    <td>{{ $campaign->name }}</td>
                    <td>{{ $decodedText }}</td>
                    <td>${{ number_format($campaign->total_revenue, 2) }}</td>
                    <td>
                        <a class="btn btn-info m-1" href="{{ route('campaign', ['campaign' => $campaign->id]) }}">View Campaign Details</a>
                        <a class="btn btn-info m-1" href="{{ route('publishers', ['campaign' => $campaign->id]) }}">View Publishers</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-3">
        {{ $campaigns->links('pagination::bootstrap-5') }}
    </div>
@endsection
