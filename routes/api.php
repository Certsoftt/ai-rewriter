<?php
use Illuminate\Support\Facades\Route;
use AIRewriter\Http\Controllers\AIRewriterController;

Route::middleware(['api', 'auth:api', 'can:manage-ai-rewriter'])
    ->prefix('ai-rewriter')
    ->group(function () {
        Route::get('/drafts', [AIRewriterController::class, 'drafts']);
        Route::post('/rewrite', [AIRewriterController::class, 'rewrite']);
        Route::post('/batch-rewrite', [AIRewriterController::class, 'batchRewrite']);
        Route::get('/logs', [AIRewriterController::class, 'logs']);
        Route::get('/providers', [AIRewriterController::class, 'providers']);
        Route::post('/test-provider', [AIRewriterController::class, 'testProvider']);
        // Secure endpoint for external systems to submit content for rewrite
        Route::post('/external-rewrite', [AIRewriterController::class, 'externalRewrite']);
        // Secure endpoint to fetch rewrite status by ID
        Route::get('/rewrite-status/{id}', [AIRewriterController::class, 'rewriteStatus']);
        // Delete a rewrite by ID with audit logging
        Route::delete('/delete/{id}', [AIRewriterController::class, 'delete']);
    });
