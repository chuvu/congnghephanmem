$(function() {
    $('textarea[data-toggle="markdown-editor"]').each(function (index, item) {
        var $this = $(item);
        var height = $this.attr('data-height') ? $this.attr('data-height') : '400px';
        $this.markdownEditor({
            preview: true,
            fullscreen: false,
            height: height,
            onPreview: function (content, callback) {
                callback( marked(content) );
            },
        });
    });
});