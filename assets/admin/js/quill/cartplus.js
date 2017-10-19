$(function () {
    $('.quilljs').each(function(index, item) {
        var el = $(this);
        var value = el.val();
        el.wrap('<div class="quill-container-'+ index +'"></div>');
        el.before('<div class="quill-editor-'+ index +'" style="height: 250px">'+ value +'</div>');
        el.hide();
        
        if (el.attr('data-toobar')) {
            // console.log('base');
            var toolbarOptions = [
                // [{ 'font': [] }],
                // [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                // [{ 'align': [] }],
                // [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                // ['link', 'image'],
                // ['blockquote'],

                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

                ['clean']                                         // remove formatting button
            ];
        } else {
            var toolbarOptions = [
                // [{ 'font': [] }],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                [{ 'align': [] }],
                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                ['link', 'image'],
                ['blockquote'],

                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

                ['clean']                                         // remove formatting button
            ];
        }
        
        var quill = new Quill('.quill-container-'+index+' .quill-editor-'+ index, {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        var toolbar = quill.getModule('toolbar');
        toolbar.addHandler('image', function () {
            $('#modal-image').remove();            
                $.ajax({
                    url: 'index.php?route=common/filemanager&token=' + getURLVar('token'),
                    dataType: 'html',
                    beforeSend: function() {
                        $('#button-image i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
                        $('#button-image').prop('disabled', true);
                    },
                    complete: function() {
                        $('#button-image i').replaceWith('<i class="fa fa-upload"></i>');
                        $('#button-image').prop('disabled', false);
                    },
                    success: function(html) {
                        $('body').append('<div id="modal-image" class="modal">' + html + '</div>');
                        
                        $('#modal-image').modal('show');
                        
                        $('#modal-image').delegate('a.thumbnail', 'click', function(e) {
                            e.preventDefault();
                            quill.clipboard.dangerouslyPasteHTML(quill.getLength(), '<img src="' + $(this).attr('href') + '" class="quill-image" />');
                            $('#modal-image').modal('hide');
                        });
                    }
                });                     
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            $('.quill-container-'+ index +' .quilljs').val(quill.root.innerHTML);
        });
    });
});