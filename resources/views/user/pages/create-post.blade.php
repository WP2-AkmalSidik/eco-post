@extends('layouts.user')
@section('title', 'Creating Post')

@section('content')
    <!-- Header Banner -->
    <div class="bg-indigo-700 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-2xl font-bold">Create New Blog Post</h1>
                <p class="mt-2">Share your thoughts with the world</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 py-6">
        <!-- Menampilkan pesan kesalahan validasi jika ada -->
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form Blog -->
        <form id="blog-form" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-sm p-6">
            @csrf
            <!-- Featured Image -->
            <div class="mb-6">
                <div id="image-preview" class="w-full h-110 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center cursor-pointer hover:bg-gray-50">
                    <div id="upload-prompt" class="text-center">
                        <i class="fas fa-image text-3xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">Click to add featured image</p>
                    </div>
                    <img id="selected-image" class="hidden w-full h-full object-cover rounded-lg" alt="Featured image">
                </div>
                <input id="featured-image" name="featured_image" type="file" accept="image/*" class="hidden">
            </div>

            <!-- Title and Category -->
            <div class="mb-6 flex flex-col sm:flex-row gap-4">
                <div class="flex-grow">
                    <input type="text" id="post-title" name="title" placeholder="Post Title" required value="{{ old('title') }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="sm:w-1/4">
                    <select id="post-category" name="category" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" disabled selected>Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Simple Editor Toolbar -->
            <div id="editor-toolbar" class="flex flex-wrap items-center gap-1 p-2 bg-gray-50 border border-gray-300 rounded-t-lg">
                <!-- Headings -->
                <div class="relative mr-2">
                    <select id="format-select" data-command="formatBlock" class="editor-select py-2 pl-3 pr-8 bg-white border border-gray-300 rounded text-sm appearance-none cursor-pointer hover:bg-gray-50">
                        <option value="p">Paragraph</option>
                        <option value="h1">Heading 1</option>
                        <option value="h2">Heading 2</option>
                        <option value="h3">Heading 3</option>
                        <option value="h4">Heading 4</option>
                        <option value="blockquote">Quote</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>

                <div class="mx-1 h-6 border-r border-gray-300"></div>

                <!-- Basic Text Formatting -->
                <button type="button" data-command="bold" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Bold">
                    <i class="fas fa-bold"></i>
                </button>
                <button type="button" data-command="italic" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Italic">
                    <i class="fas fa-italic"></i>
                </button>
                <button type="button" data-command="underline" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Underline">
                    <i class="fas fa-underline"></i>
                </button>

                <div class="mx-1 h-6 border-r border-gray-300"></div>

                <!-- Lists -->
                <button type="button" data-command="insertOrderedList" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Numbered List">
                    <i class="fas fa-list-ol"></i>
                </button>
                <button type="button" data-command="insertUnorderedList" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Bullet List">
                    <i class="fas fa-list-ul"></i>
                </button>
                <button type="button" data-command="indent" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Indent">
                    <i class="fas fa-indent"></i>
                </button>
                <button type="button" data-command="outdent" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Outdent">
                    <i class="fas fa-outdent"></i>
                </button>

                <div class="mx-1 h-6 border-r border-gray-300"></div>

                <!-- Alignment -->
                <button type="button" data-command="justifyLeft" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Align Left">
                    <i class="fas fa-align-left"></i>
                </button>
                <button type="button" data-command="justifyCenter" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Align Center">
                    <i class="fas fa-align-center"></i>
                </button>
                <button type="button" data-command="justifyRight" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Align Right">
                    <i class="fas fa-align-right"></i>
                </button>

                <div class="mx-1 h-6 border-r border-gray-300"></div>

                <!-- Insert Elements -->
                <button type="button" data-command="insertImage" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Insert Image">
                    <i class="fas fa-image"></i>
                </button>
                <button type="button" data-command="createLink" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Insert Link">
                    <i class="fas fa-link"></i>
                </button>
            </div>

            <!-- Editor Content Area -->
            <div id="editor-content" contenteditable="true"
                class="w-full min-h-[300px] p-4 border border-gray-300 border-t-0 rounded-b-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 prose max-w-none">
                <p>Start writing your blog post here...</p>
            </div>
            <textarea id="hidden-content" name="content" class="hidden">{{ old('content') }}</textarea>

            <!-- CSS for Editor Content Styling -->
            <style>
                #editor-content h1 {
                    font-size: 2em;
                    font-weight: bold;
                    margin-top: 0.67em;
                    margin-bottom: 0.67em;
                }
                #editor-content h2 {
                    font-size: 1.5em;
                    font-weight: bold;
                    margin-top: 0.83em;
                    margin-bottom: 0.83em;
                }
                #editor-content h3 {
                    font-size: 1.17em;
                    font-weight: bold;
                    margin-top: 1em;
                    margin-bottom: 1em;
                }
                #editor-content h4 {
                    font-size: 1em;
                    font-weight: bold;
                    margin-top: 1.33em;
                    margin-bottom: 1.33em;
                }
                #editor-content blockquote {
                    border-left: 4px solid #e5e7eb;
                    padding-left: 1rem;
                    font-style: italic;
                    color: #6b7280;
                    margin: 1rem 0;
                }
                #editor-content ol {
                    list-style-type: decimal;
                    padding-left: 2.5rem;
                    margin: 1rem 0;
                }
                #editor-content ul {
                    list-style-type: disc;
                    padding-left: 2.5rem;
                    margin: 1rem 0;
                }
                #editor-content ol li, #editor-content ul li {
                    margin-bottom: 0.5rem;
                }
                #editor-content ol ol {
                    list-style-type: lower-alpha;
                }
                #editor-content ol ol ol {
                    list-style-type: lower-roman;
                }
                #editor-content ul ul {
                    list-style-type: circle;
                }
                #editor-content ul ul ul {
                    list-style-type: square;
                }
            </style>

            <!-- Publishing Options -->
            <div class="mt-6 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="flex items-center">
                        <input id="publish" name="status" type="radio" value="publish" checked
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                        <label for="publish" class="ml-2 text-sm text-gray-700">Publish Now</label>
                    </div>
                    <div class="flex items-center">
                        <input id="draft" name="status" type="radio" value="draft"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                        <label for="draft" class="ml-2 text-sm text-gray-700">Save as Draft</label>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button type="button" id="preview-button"
                        class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Preview
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 rounded-lg text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Publish Post
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Preview Modal -->
    <div id="preview-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-900">Post Preview</h3>
                <button id="close-preview" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="preview-content" class="p-6">
                <h1 id="preview-title" class="text-2xl font-bold mb-4"></h1>
                <div id="preview-body" class="prose max-w-none"></div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Image Preview Functionality
            const imagePreview = document.getElementById('image-preview');
            const uploadPrompt = document.getElementById('upload-prompt');
            const selectedImage = document.getElementById('selected-image');
            const fileInput = document.getElementById('featured-image');

            imagePreview.addEventListener('click', function() {
                fileInput.click();
            });

            fileInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        selectedImage.src = e.target.result;
                        selectedImage.classList.remove('hidden');
                        uploadPrompt.classList.add('hidden');
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Enhanced Editor Functionality
            const editorContent = document.getElementById('editor-content');
            const hiddenContent = document.getElementById('hidden-content');
            const editorButtons = document.querySelectorAll('.editor-btn');
            const editorSelects = document.querySelectorAll('.editor-select');
            const formatSelect = document.getElementById('format-select');
            const blogForm = document.getElementById('blog-form');

            // Initialize with old content if it exists
            if (hiddenContent.value && hiddenContent.value !== '') {
                editorContent.innerHTML = hiddenContent.value;
            }

            // Update hidden textarea with editor content before form submission
            blogForm.addEventListener('submit', function(e) {
                hiddenContent.value = editorContent.innerHTML;
            });

            // Clear initial placeholder text when editor is focused first time
            editorContent.addEventListener('focus', function() {
                if (this.innerText === 'Start writing your blog post here...') {
                    this.innerHTML = '';
                }
            }, { once: true });

            // Active state for buttons
            editorContent.addEventListener('mouseup', updateToolbarState);
            editorContent.addEventListener('keyup', updateToolbarState);

            function updateToolbarState() {
                // Update format selector based on current selection
                const currentBlockFormat = document.queryCommandValue('formatBlock').toLowerCase();
                if (currentBlockFormat) {
                    // Remove "Format" if present
                    let format = currentBlockFormat.replace('format', '');

                    // Handle all possible format returns
                    if (format === 'p' || format === 'paragraph' || format === '') {
                        formatSelect.value = 'p';
                    } else if (format.startsWith('h')) {
                        formatSelect.value = format;
                    } else if (format.includes('quote')) {
                        formatSelect.value = 'blockquote';
                    }
                }

                // Highlight active buttons
                editorButtons.forEach(button => {
                    const command = button.dataset.command;
                    if (document.queryCommandState(command)) {
                        button.classList.add('bg-gray-200');
                    } else {
                        button.classList.remove('bg-gray-200');
                    }
                });
            }

            // Button commands
            editorButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const command = this.dataset.command;

                    if (command === 'createLink') {
                        const selection = window.getSelection();
                        const selectedText = selection.toString();
                        const url = prompt('Enter the link URL:', 'https://');

                        if (url && url !== 'https://') {
                            // If no text is selected, insert link with URL as text
                            if (!selectedText) {
                                document.execCommand('insertHTML', false, `<a href="${url}" target="_blank">${url}</a>`);
                            } else {
                                document.execCommand('createLink', false, url);
                                // Set target attribute for all new links
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

            // Select commands
            editorSelects.forEach(select => {
                select.addEventListener('change', function() {
                    const command = this.dataset.command;
                    const value = this.value;

                    if (command === 'formatBlock') {
                        // Modern browsers need the format to include HTML tags
                        document.execCommand(command, false, `<${value}>`);
                    } else {
                        document.execCommand(command, false, value);
                    }

                    editorContent.focus();
                    updateToolbarState();
                });
            });

            // Initialize editor
            updateToolbarState();

            // Handle paste to strip formatting
            editorContent.addEventListener('paste', function(e) {
                e.preventDefault();

                // Get text from clipboard
                const text = (e.originalEvent || e).clipboardData.getData('text/plain');

                // Insert text at cursor position
                document.execCommand('insertText', false, text);
            });

            // Preview functionality
            const previewButton = document.getElementById('preview-button');
            const previewModal = document.getElementById('preview-modal');
            const closePreview = document.getElementById('close-preview');
            const previewTitle = document.getElementById('preview-title');
            const previewBody = document.getElementById('preview-body');

            previewButton.addEventListener('click', function() {
                const title = document.getElementById('post-title').value || 'Untitled Post';
                const content = editorContent.innerHTML;

                previewTitle.textContent = title;
                previewBody.innerHTML = content;
                previewModal.classList.remove('hidden');
            });

            closePreview.addEventListener('click', function() {
                previewModal.classList.add('hidden');
            });

            // Close modal when clicking outside
            previewModal.addEventListener('click', function(e) {
                if (e.target === previewModal) {
                    previewModal.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
