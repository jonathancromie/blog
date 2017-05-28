$(document).ready(function() {
    $('#btnSave').on('click', function() {
        var content = $('#content').val();
        $('#content').val(marked(content));
    });
});