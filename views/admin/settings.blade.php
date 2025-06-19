@extends('layouts.admin')
@section('content')
<div class="airewriter-admin-settings">
    <h3>{{ __('ai-rewriter::ai-rewriter.settings_title') }}</h3>
    <form method="POST" action="{{ route('admin.airewriter.settings.save') }}">
        @csrf
        <div class="form-group">
            <label>{{ __('ai-rewriter::ai-rewriter.active_provider') }}</label>
            <select name="active_provider" class="form-control">
                @foreach(config('ai-rewriter.supported_providers', []) as $provider)
                    <option value="{{ $provider }}">{{ ucfirst($provider) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>{{ __('ai-rewriter::ai-rewriter.api_keys') }}</label>
            <textarea name="api_keys" class="form-control" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('ai-rewriter::ai-rewriter.save_settings') }}</button>
    </form>
    <hr>
    <h4>{{ __('ai-rewriter::ai-rewriter.provider_test') }}</h4>
    <form id="provider-test-form">
        <div class="form-group">
            <label>{{ __('ai-rewriter::ai-rewriter.test_prompt') }}</label>
            <textarea name="prompt" class="form-control" rows="3"></textarea>
        </div>
        <button type="button" class="btn btn-info" id="test-provider-btn">{{ __('ai-rewriter::ai-rewriter.test_provider') }}</button>
    </form>
    <div id="provider-test-result" class="mt-3"></div>
    <hr>
    <h4>{{ __('ai-rewriter::ai-rewriter.notification_preferences') }}</h4>
    <form method="POST" action="{{ route('admin.airewriter.settings.save') }}">
        @csrf
        <div class="form-group">
            <label>{{ __('ai-rewriter::ai-rewriter.notify_on') }}</label>
            <select name="notification_channel" class="form-control">
                <option value="in-app">In-App Only</option>
                <option value="email">Email</option>
                <option value="none">None</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('ai-rewriter::ai-rewriter.save_notification_settings') }}</button>
    </form>
    <hr>
    <a href="https://docs.cmslooks.com/plugins/ai-rewriter" target="_blank" class="btn btn-link">{{ __('ai-rewriter::ai-rewriter.help_docs') }}</a>
    <a href="{{ route('admin.airewriter.logs') }}" class="btn btn-secondary">{{ __('ai-rewriter::ai-rewriter.view_history') }}</a>
</div>
<script src="/plugins/ai-rewriter/public/js/settings.js"></script>
@endsection
