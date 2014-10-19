(function() {

    // Upload the file.
    var form = document.getElementById('file-form');
    var fileSelect = document.getElementById('file-select');
    var uploadButton = document.getElementById('upload-button');

    form.onsubmit = function(event) {

        // Cancel the form submit from going through.
        event.preventDefault();

        // Update button text.
        uploadButton.innerHTML = 'Uploading...';

        // Get the selected files from the input.
        var files = fileSelect.files;
        var file = files[0];

        // Create a new FormData object.
        var formData = new FormData();

        // Add the file to the request.
        formData.append('file[]', file, file.name);

        // Set up the request.
        var xhr = new XMLHttpRequest();

        // Open the connection.
        xhr.open('POST', window.location.origin + "/helpers/file_upload.php?XDEBUG_SESSION_START=storm", false);

        // Set up a handler for when the request finishes.
        xhr.onload = function () {
            if (xhr.status === 200) {
                // File(s) uploaded.
                uploadButton.innerHTML = 'Upload';
            } else {
                alert('An error occurred!');
            }
        };

        // Send the Data.
        xhr.send(formData);

        var foo = xhr.responseText;
    }
})();