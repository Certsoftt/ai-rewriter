@if(config('ai-rewriter.enabled'))
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.airewriter.settings') }}">
        <i class="fa fa-magic"></i> AI Rewriter
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.airewriter.drafts') }}">
        <i class="fa fa-file-alt"></i> Drafts
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.airewriter.report') }}">
        <i class="fa fa-chart-bar"></i> Report
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.airewriter.logs') }}">
        <i class="fa fa-history"></i> Logs
    </a>
</li>
@endif
