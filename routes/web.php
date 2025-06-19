<?php
use Illuminate\Support\Facades\Route;
use AIRewriter\Http\Controllers\AIRewriterController;

Route::middleware(['web', 'auth', 'can:manage-ai-rewriter'])
    ->prefix('admin/ai-rewriter')
    ->group(function () {
        Route::get('/settings', [AIRewriterController::class, 'settingsPage'])->name('admin.airewriter.settings');
        Route::post('/settings/save', [AIRewriterController::class, 'saveSettings'])->name('admin.airewriter.settings.save');
        Route::get('/drafts', [AIRewriterController::class, 'draftsPage'])->name('admin.airewriter.drafts');
        Route::get('/compare/{id}', [AIRewriterController::class, 'comparePage'])->name('admin.airewriter.compare');
        Route::post('/approve/{id}', [AIRewriterController::class, 'approve'])->name('admin.airewriter.approve');
        Route::post('/edit/{id}', [AIRewriterController::class, 'edit'])->name('admin.airewriter.edit');
        Route::get('/report', [AIRewriterController::class, 'reportPage'])->name('admin.airewriter.report');
        Route::get('/logs', [AIRewriterController::class, 'logsPage'])->name('admin.airewriter.logs');
    });
