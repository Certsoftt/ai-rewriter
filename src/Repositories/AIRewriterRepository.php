<?php
namespace AIRewriter\Repositories;

use AIRewriter\Models\Rewrite;
use AIRewriter\Models\AIProvider;
use AIRewriter\Models\RewriteLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use WebCrawler\Models\Opportunity;

class AIRewriterRepository
{
    public function getDrafts()
    {
        // Receive drafts from the webcrawler plugin (status = draft)
        return Opportunity::where('status', 'draft')->get();
    }

    public function rewrite(Request $request) { /* ... */ }
    public function batchRewrite(Request $request)
    {
        $contents = $request->input('contents', []); // array of [id => content]
        $provider = $request->input('provider');
        $mode = $request->input('mode');
        $language = $request->input('language', 'en');
        \AIRewriter\Jobs\BatchRewriteJob::dispatch($contents, $provider, $mode, $language);
        return response()->json(['status' => 'queued', 'message' => 'Batch rewrite has been queued.']);
    }
    public function comparePage($id) { /* ... */ }
    public function approve($id)
    {
        $rewrite = Rewrite::findOrFail($id);
        $userId = auth()->id();
        // Custom review/approval logic: auto-approve if originality/clarity above threshold
        $thresholdOriginality = config('ai-rewriter.originality_threshold', 95);
        $thresholdClarity = config('ai-rewriter.clarity_threshold', 90);
        if ($rewrite->originality >= $thresholdOriginality && $rewrite->clarity >= $thresholdClarity) {
            $rewrite->status = 'approved';
        } else {
            $rewrite->status = 'pending_review';
        }
        $rewrite->save();
        // Log approval with user and action
        $this->logUserAction($userId, 'approve', $rewrite->id, [
            'provider' => $rewrite->provider,
            'mode' => $rewrite->mode,
            'originality' => $rewrite->originality,
            'clarity' => $rewrite->clarity,
        ]);
        Log::info('Rewrite approved', ['id' => $rewrite->id, 'status' => $rewrite->status]);
        return redirect()->route('admin.airewriter.drafts')->with('success', 'Rewrite approved!');
    }
    public function edit(Request $request, $id)
    {
        $rewrite = Rewrite::findOrFail($id);
        $userId = auth()->id();
        $oldContent = $rewrite->content;
        $rewrite->content = $request->input('content');
        $rewrite->save();
        // Log edit action
        $this->logUserAction($userId, 'edit', $rewrite->id, [
            'provider' => $rewrite->provider,
            'mode' => $rewrite->mode,
            'originality' => $rewrite->originality,
            'clarity' => $rewrite->clarity,
            'old_content' => $oldContent,
            'new_content' => $rewrite->content,
        ]);
        return response()->json(['status' => 'success', 'message' => 'Rewrite updated.']);
    }
    public function delete($id)
    {
        $rewrite = Rewrite::findOrFail($id);
        $userId = auth()->id();
        $rewrite->delete();
        // Log delete action
        $this->logUserAction($userId, 'delete', $id, [
            'provider' => $rewrite->provider,
            'mode' => $rewrite->mode,
            'originality' => $rewrite->originality,
            'clarity' => $rewrite->clarity,
        ]);
        return response()->json(['status' => 'success', 'message' => 'Rewrite deleted.']);
    }
    public function getLogs() { return []; }
    public function getProviders() { return AIProvider::all(); }
    public function testProvider(Request $request) { /* ... */ }
    public function saveSettings(Request $request)
    {
        // Save provider, API keys, and notification preferences
        $settings = [
            'active_provider' => $request->input('active_provider'),
            'api_keys' => $request->input('api_keys'),
            'notification_channel' => $request->input('notification_channel', 'in-app'),
        ];
        // Save to config, database, or settings table as appropriate
        // Example: \DB::table('settings')->updateOrInsert(['key' => 'ai-rewriter'], ['value' => json_encode($settings)]);
        return redirect()->back()->with('success', 'Settings saved!');
    }
    public function getReport()
    {
        // Simple reporting: count rewrites by status and provider
        return [
            'total' => Rewrite::count(),
            'approved' => Rewrite::where('status', 'approved')->count(),
            'pending' => Rewrite::where('status', 'pending')->count(),
            'by_provider' => Rewrite::select('provider', \DB::raw('count(*) as count'))->groupBy('provider')->get(),
        ];
    }
    public function getRewriteStatus($id)
    {
        $rewrite = \AIRewriter\Models\Rewrite::find($id);
        if (!$rewrite) {
            return ['status' => 'not_found'];
        }
        return [
            'status' => $rewrite->status,
            'provider' => $rewrite->provider,
            'originality' => $rewrite->originality,
            'clarity' => $rewrite->clarity,
            'updated_at' => $rewrite->updated_at,
        ];
    }
    public function logUserAction($userId, $action, $rewriteId = null, $details = null)
    {
        \AIRewriter\Models\RewriteLog::create([
            'rewrite_id' => $rewriteId,
            'user_id' => $userId,
            'action' => $action,
            'provider' => $details['provider'] ?? null,
            'mode' => $details['mode'] ?? null,
            'duration' => $details['duration'] ?? null,
            'originality' => $details['originality'] ?? null,
            'clarity' => $details['clarity'] ?? null,
            'created_at' => now(),
        ]);
    }
}
