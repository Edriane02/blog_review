document.addEventListener('DOMContentLoaded', () => {
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('fileInput');
    const previewImage = document.getElementById('previewImage');
    const browseText = document.getElementById('browseText');
    const browseEditText = document.getElementById('browseEditText');

    // Handle drag and drop
    uploadArea.addEventListener('dragover', (event) => {
        event.preventDefault();
        uploadArea.style.borderColor = '#007bff';
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.style.borderColor = '#ccc';
    });

    uploadArea.addEventListener('drop', (event) => {
        event.preventDefault();
        uploadArea.style.borderColor = '#ccc';
        const files = event.dataTransfer.files;
        if (files.length > 0) {
            handleFileUpload(files[0]);
        }
    });

    // Handle file browse
    browseText.addEventListener('click', () => {
        fileInput.click();
    });

    browseEditText.addEventListener('click', () => {
        fileInput.click();
    });

    fileInput.addEventListener('change', () => {
        if (fileInput.files.length > 0) {
            handleFileUpload(fileInput.files[0]);
        }
    });

    function handleFileUpload(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            previewImage.src = e.target.result;
            previewImage.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }
});