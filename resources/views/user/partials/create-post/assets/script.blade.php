<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imagePreview = document.getElementById('image-preview');
        const uploadPrompt = document.getElementById('upload-prompt');
        const selectedImage = document.getElementById('selected-image');
        const fileInput = document.getElementById('featured-image');

        imagePreview.addEventListener('click', function () {
            fileInput.click();
        });

        fileInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    selectedImage.src = e.target.result;
                    selectedImage.classList.remove('hidden');
                    uploadPrompt.classList.add('hidden');
                }

                reader.readAsDataURL(this.files[0]);
            }
        });

        const editorContent = document.getElementById('editor-content');
        const hiddenContent = document.getElementById('hidden-content');
        const editorButtons = document.querySelectorAll('.editor-btn');
        const editorSelects = document.querySelectorAll('.editor-select');
        const formatSelect = document.getElementById('format-select');
        const blogForm = document.getElementById('blog-form');

        if (hiddenContent.value && hiddenContent.value !== '') {
            editorContent.innerHTML = hiddenContent.value;
        }

        blogForm.addEventListener('submit', function (e) {
            hiddenContent.value = editorContent.innerHTML;
        });

        editorContent.addEventListener('focus', function () {
            if (this.innerText === 'Start writing your blog post here...') {
                this.innerHTML = '';
            }
        }, { once: true });

        editorContent.addEventListener('mouseup', updateToolbarState);
        editorContent.addEventListener('keyup', updateToolbarState);

        function updateToolbarState() {
            const currentBlockFormat = document.queryCommandValue('formatBlock').toLowerCase();
            if (currentBlockFormat) {
                let format = currentBlockFormat.replace('format', '');
                if (format === 'p' || format === 'paragraph' || format === '') {
                    formatSelect.value = 'p';
                } else if (format.startsWith('h')) {
                    formatSelect.value = format;
                } else if (format.includes('quote')) {
                    formatSelect.value = 'blockquote';
                }
            }

            editorButtons.forEach(button => {
                const command = button.dataset.command;
                if (document.queryCommandState(command)) {
                    button.classList.add('bg-gray-200');
                } else {
                    button.classList.remove('bg-gray-200');
                }
            });
        }

        editorButtons.forEach(button => {
            button.addEventListener('click', function () {
                const command = this.dataset.command;

                if (command === 'createLink') {
                    const selection = window.getSelection();
                    const selectedText = selection.toString();
                    const url = prompt('Enter the link URL:', 'https://');

                    if (url && url !== 'https://') {
                        if (!selectedText) {
                            document.execCommand('insertHTML', false, `<a href="${url}" target="_blank">${url}</a>`);
                        } else {
                            document.execCommand('createLink', false, url);
                            const links = editorContent.querySelectorAll('a');
                            links.forEach(link => {
                                link.setAttribute('target', '_blank');
                            });
                        }
                    }
                } else if (command === 'insertImage') {
                    const url = prompt('Enter the image URL:', 'https://');
                    if (url && url !== 'https://') {
                        document.execCommand('insertHTML', false, `<img src="${url}" alt="Image" style="max-width: 100%; height: auto; margin: 10px 0;">`);
                    }
                } else {
                    document.execCommand(command, false, null);
                }

                editorContent.focus();
                updateToolbarState();
            });
        });

        editorSelects.forEach(select => {
            select.addEventListener('change', function () {
                const command = this.dataset.command;
                const value = this.value;

                if (command === 'formatBlock') {
                    document.execCommand(command, false, `<${value}>`);
                } else {
                    document.execCommand(command, false, value);
                }

                editorContent.focus();
                updateToolbarState();
            });
        });

        updateToolbarState();

        editorContent.addEventListener('paste', function (e) {
            e.preventDefault();
            const text = (e.originalEvent || e).clipboardData.getData('text/plain');
            document.execCommand('insertText', false, text);
        });

        const previewButton = document.getElementById('preview-button');
        const previewModal = document.getElementById('preview-modal');
        const closePreview = document.getElementById('close-preview');
        const previewTitle = document.getElementById('preview-title');
        const previewBody = document.getElementById('preview-body');

        previewButton.addEventListener('click', function () {
            const title = document.getElementById('post-title').value || 'Untitled Post';
            const content = editorContent.innerHTML;

            previewTitle.textContent = title;
            previewBody.innerHTML = content;
            previewModal.classList.remove('hidden');
        });

        closePreview.addEventListener('click', function () {
            previewModal.classList.add('hidden');
        });

        previewModal.addEventListener('click', function (e) {
            if (e.target === previewModal) {
                previewModal.classList.add('hidden');
            }
        });
    });
</script>
