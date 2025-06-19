@extends('layouts.admin')
@section('content')
<div class="airewriter-report">
    <h3>{{ __('ai-rewriter::ai-rewriter.report_title') }}</h3>
    <ul>
        <li>{{ __('ai-rewriter::ai-rewriter.total_rewrites') }}: {{ $report['total'] }}</li>
        <li>{{ __('ai-rewriter::ai-rewriter.approved_rewrites') }}: {{ $report['approved'] }}</li>
        <li>{{ __('ai-rewriter::ai-rewriter.pending_rewrites') }}: {{ $report['pending'] }}</li>
    </ul>
    <h4>{{ __('ai-rewriter::ai-rewriter.rewrites_by_provider') }}</h4>
    <ul>
        @foreach($report['by_provider'] as $row)
            <li>{{ ucfirst($row->provider) }}: {{ $row->count }}</li>
        @endforeach
    </ul>
</div>
@endsection
