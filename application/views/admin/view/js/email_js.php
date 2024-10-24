<!-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> -->
<script>
document.getElementById('emailForm').addEventListener('submit', function() {
    const editorContent = document.querySelector('#editor1').innerHTML; // Get the content from your editor
    document.getElementById('composeMessage').value = editorContent; // Assign to hidden input
});
</script>