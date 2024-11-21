@extends('layouts.app')

@section('title', 'Publishers Revenue - ' . $campaign->name)

@section('content')
    <h1>Revenue by Publishers for {{ $campaign->name }}</h1>
    <table class="table table-striped table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Publisher</th>
                <th>Total Revenue</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($publishers as $publisher)
                <tr>
                    <td>{{ $publisher->utm_term ?? 'Unknown' }}</td>
                    <td>${{ number_format($publisher->total_revenue, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination Links -->
    <div class="mt-3">
        {{ $publishers->links('pagination::bootstrap-5') }}
    </div>
@endsection
