@extends('layouts.app')

@section('title', 'Hourly Revenue - ' . $campaign->name)

@section('content')
    <h1>Hourly Revenue for {{ $campaign->name }}</h1>
    <table class="table table-striped table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Hour</th>
                <th>Revenue</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hourlyRevenue as $data)
                <tr>
                    <td>{{ $data->hour }}:00</td>
                    <td>${{ number_format($data->total_revenue, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination Links -->
    <div class="mt-3">
        {{ $hourlyRevenue->links('pagination::bootstrap-5') }}
    </div>
@endsection
