@extends('layouts.admin')
@section('content')
<div class="airewriter-logs">
    <h3>{{ __('ai-rewriter::ai-rewriter.rewrite_history') }}</h3>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('ai-rewriter::ai-rewriter.draft_id') }}</th>
                <th>{{ __('ai-rewriter::ai-rewriter.provider') }}</th>
                <th>{{ __('ai-rewriter::ai-rewriter.mode') }}</th>
                <th>{{ __('ai-rewriter::ai-rewriter.duration') }}</th>
                <th>{{ __('ai-rewriter::ai-rewriter.originality') }}</th>
                <th>{{ __('ai-rewriter::ai-rewriter.clarity') }}</th>
                <th>{{ __('ai-rewriter::ai-rewriter.created_at') }}</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop through logs dynamically via backend --}}
        </tbody>
    </table>
</div>
@endsection
