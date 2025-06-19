<?php
namespace AIRewriter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use AIRewriter\Repositories\AIRewriterRepository;
use Illuminate\Support\Facades\Gate;

class AIRewriterController extends Controller
{
    protected $rewriter;
    public function __construct(AIRewriterRepository $rewriter)
    {
        $this->rewriter = $rewriter;
    }
    public function settingsPage() { return view('ai-rewriter::admin.settings'); }
    public function saveSettings(Request $request) { return $this->rewriter->saveSettings($request); }
    public function draftsPage() { return view('ai-rewriter::admin.drafts'); }
    public function drafts() { return response()->json($this->rewriter->getDrafts()); }
    public function rewrite(Request $request) { return $this->rewriter->rewrite($request); }
    public function batchRewrite(Request $request) {
        if (!Gate::allows('airewriter.batch_rewrite')) {
            abort(403, 'Unauthorized');
        }
        return $this->rewriter->batchRewrite($request);
    }
    public function comparePage($id) { return $this->rewriter->comparePage($id); }
    public function approve($id) {
        if (!Gate::allows('airewriter.approve')) {
            abort(403, 'Unauthorized');
        }
        return $this->rewriter->approve($id);
    }
    public function edit(Request $request, $id) {
        if (!Gate::allows('airewriter.edit')) {
            abort(403, 'Unauthorized');
        }
        return $this->rewriter->edit($request, $id);
    }
    public function logs() { return response()->json($this->rewriter->getLogs()); }
    public function providers() { return response()->json($this->rewriter->getProviders()); }
    public function testProvider(Request $request) { return $this->rewriter->testProvider($request); }
    public function reportPage() {
        $report = $this->rewriter->getReport();
        return view('ai-rewriter::admin.report', compact('report'));
    }
    public function logsPage() {
        $logs = $this->rewriter->getLogs();
        return view('ai-rewriter::admin.logs', compact('logs'));
    }
    public function externalRewrite(Request $request) {
        // Validate API key or token (implement as needed)
        // $this->validateApiKey($request);
        return $this->rewriter->rewrite($request);
    }
    public function rewriteStatus($id) {
        return response()->json($this->rewriter->getRewriteStatus($id));
    }
    public function delete($id) {
        if (!\Gate::allows('airewriter.delete')) {
            abort(403, 'Unauthorized');
        }
        return $this->rewriter->delete($id);
    }
}
