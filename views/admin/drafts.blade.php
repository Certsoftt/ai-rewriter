@extends('layouts.admin')
@section('content')
<div class="airewriter-admin-drafts">
    <h3>{{ __('ai-rewriter::ai-rewriter.drafts_title') }}</h3>
    <div class="row mb-2">
        <div class="col-md-4">
            <input type="text" id="draft-search" class="form-control" placeholder="Search drafts...">
        </div>
        <div class="col-md-3">
            <select id="draft-status-filter" class="form-control">
                <option value="">All Statuses</option>
                <option value="draft">Draft</option>
                <option value="pending_review">Pending Review</option>
                <option value="approved">Approved</option>
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-danger" id="bulk-delete-btn">Delete Selected</button>
            <button class="btn btn-primary" id="bulk-approve-btn">Approve Selected</button>
        </div>
    </div>
    <table class="table" id="drafts-table">
        <thead>
            <tr>
                <th>{{ __('ai-rewriter::ai-rewriter.title') }}</th>
                <th>{{ __('ai-rewriter::ai-rewriter.type') }}</th>
                <th>{{ __('ai-rewriter::ai-rewriter.language') }}</th>
                <th>{{ __('ai-rewriter::ai-rewriter.status') }}</th>
                <th>{{ __('ai-rewriter::ai-rewriter.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop through drafts dynamically via JS --}}
        </tbody>
    </table>
    <button class="btn btn-success" id="batch-rewrite-btn">{{ __('ai-rewriter::ai-rewriter.batch_rewrite') }}</button>
</div>
<script src="/plugins/ai-rewriter/public/js/drafts.js"></script>
@endsection
