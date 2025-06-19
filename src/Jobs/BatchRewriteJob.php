<?php
namespace AIRewriter\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use AIRewriter\Services\AIRewriteService;

class BatchRewriteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $contents;
    protected $provider;
    protected $mode;
    protected $language;

    public function __construct(array $contents, $provider = null, $mode = null, $language = 'en')
    {
        $this->contents = $contents;
        $this->provider = $provider;
        $this->mode = $mode;
        $this->language = $language;
    }

    public function handle(AIRewriteService $rewriter)
    {
        foreach ($this->contents as $contentId => $content) {
            try {
                $rewritten = $rewriter->rewrite($content, $this->provider, $this->mode, $this->language);
                // TODO: Save rewritten content to database (e.g., Rewrite model)
            } catch (\Exception $e) {
                \Log::error('Batch rewrite failed for content ID ' . $contentId . ': ' . $e->getMessage());
            }
        }
    }
}
