<?php
// Helper to inject the AI Rewriter sidebar link if the plugin is enabled
if (function_exists('add_admin_sidebar_link')) {
    add_admin_sidebar_link(function () {
        if (config('ai-rewriter.enabled')) {
            echo view('ai-rewriter::includes.sidebar-link')->render();
        }
    });
}
