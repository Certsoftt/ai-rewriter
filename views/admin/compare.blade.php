@extends('layouts.admin')
@section('content')
<div class="airewriter-compare">
    <h3>{{ __('ai-rewriter::ai-rewriter.compare_title') }}</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">{{ __('ai-rewriter::ai-rewriter.original_content') }}</div>
                <div class="card-body">{!! nl2br(e($original)) !!}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">{{ __('ai-rewriter::ai-rewriter.rewritten_content') }}</div>
                <div class="card-body">{!! nl2br(e($rewritten)) !!}</div>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('admin.airewriter.approve', $id) }}">
        @csrf
        <button type="submit" class="btn btn-success">{{ __('ai-rewriter::ai-rewriter.approve') }}</button>
    </form>
    <form method="POST" action="{{ route('admin.airewriter.edit', $id) }}" class="mt-2">
        @csrf
        <textarea name="rewritten_content" class="form-control" rows="6">{{ $rewritten }}</textarea>
        <button type="submit" class="btn btn-primary mt-2">{{ __('ai-rewriter::ai-rewriter.save_edit') }}</button>
    </form>
</div>
@endsection
