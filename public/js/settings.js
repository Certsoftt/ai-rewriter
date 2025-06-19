// Advanced provider testing via AJAX
$('#test-provider-btn').on('click', function() {
    var prompt = $('textarea[name=prompt]').val();
    var provider = $('select[name=active_provider]').val();
    $.post('/api/ai-rewriter/test-provider', { prompt: prompt, provider: provider }, function(resp) {
        $('#provider-test-result').html('<pre>'+resp.result+'</pre>');
    });
});
