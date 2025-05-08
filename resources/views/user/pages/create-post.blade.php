@extends('layouts.user')
@section('title', 'Creating Post')

@section('content')
    <div class="bg-indigo-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl">Create New Blog Post</h1>
                <p class="mt-3 text-lg">Share your thoughts, ideas, and stories with the world.</p>
            </div>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">Home</a>
                </li>
                <li class="flex items-center">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="ml-2 text-gray-500 hover:text-indigo-600">Dashboard</a>
                </li>
                <li class="flex items-center">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2 text-gray-700 font-medium">New Post</span>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 md:p-8">
            <form id="blog-form" class="space-y-8">
                <!-- Post Preview and Featured Image -->
                <div class="space-y-4">
                    <label class="block text-lg font-medium text-gray-700">Featured Image</label>
                    <div class="flex items-center justify-center">
                        <div id="image-preview" class="relative w-full h-72 md:h-96 bg-gray-100 rounded-xl border-2 border-dashed border-gray-300 flex flex-col items-center justify-center cursor-pointer overflow-hidden hover:bg-gray-50 transition-colors">
                            <div id="upload-prompt" class="flex flex-col items-center space-y-2">
                                <i class="fas fa-image text-4xl text-gray-400"></i>
                                <span class="text-gray-500">Click to upload an image</span>
                                <span class="text-xs text-gray-400">(Recommended: 1200×800px, Max 5MB)</span>
                            </div>
                            <img id="selected-image" class="hidden absolute inset-0 w-full h-full object-cover" alt="Selected image">
                            <button id="remove-image" type="button" class="hidden absolute top-4 right-4 p-2 bg-gray-900 bg-opacity-50 text-white rounded-full hover:bg-opacity-70 transition-all">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <input id="featured-image" type="file" accept="image/*" class="hidden">
                    </div>
                </div>

                <!-- Title and Category -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="md:col-span-3">
                        <label for="post-title" class="block text-lg font-medium text-gray-700">Title</label>
                        <input type="text" id="post-title" name="title" placeholder="Enter your post title here" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="post-category" class="block text-lg font-medium text-gray-700">Category</label>
                        <select id="post-category" name="category"
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="technology">Technology</option>
                            <option value="design">Design</option>
                            <option value="business">Business</option>
                            <option value="lifestyle">Lifestyle</option>
                            <option value="culture">Culture</option>
                        </select>
                    </div>
                </div>

                <!-- Editor Toolbar -->
                <div id="editor-toolbar" class="bg-gray-50 border border-gray-300 rounded-t-lg p-2 flex flex-wrap items-center gap-1">
                    <!-- Text Formatting -->
                    <div class="flex items-center space-x-1 border-r border-gray-300 pr-2 mr-2">
                        <button type="button" data-command="bold" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Bold">
                            <i class="fas fa-bold"></i>
                        </button>
                        <button type="button" data-command="italic" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Italic">
                            <i class="fas fa-italic"></i>
                        </button>
                        <button type="button" data-command="underline" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Underline">
                            <i class="fas fa-underline"></i>
                        </button>
                        <button type="button" data-command="strikeThrough" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Strike Through">
                            <i class="fas fa-strikethrough"></i>
                        </button>
                    </div>

                    <!-- Text Alignment -->
                    <div class="flex items-center space-x-1 border-r border-gray-300 pr-2 mr-2">
                        <button type="button" data-command="justifyLeft" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Align Left">
                            <i class="fas fa-align-left"></i>
                        </button>
                        <button type="button" data-command="justifyCenter" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Align Center">
                            <i class="fas fa-align-center"></i>
                        </button>
                        <button type="button" data-command="justifyRight" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Align Right">
                            <i class="fas fa-align-right"></i>
                        </button>
                        <button type="button" data-command="justifyFull" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Justify">
                            <i class="fas fa-align-justify"></i>
                        </button>
                    </div>

                    <!-- Lists -->
                    <div class="flex items-center space-x-1 border-r border-gray-300 pr-2 mr-2">
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
                    </div>

                    <!-- Headings and Font -->
                    <div class="flex items-center space-x-1 border-r border-gray-300 pr-2 mr-2">
                        <select data-command="formatBlock" class="editor-select p-2 bg-white border border-gray-300 rounded text-sm">
                            <option value="p">Paragraph</option>
                            <option value="h1">Heading 1</option>
                            <option value="h2">Heading 2</option>
                            <option value="h3">Heading 3</option>
                            <option value="h4">Heading 4</option>
                            <option value="blockquote">Quote</option>
                        </select>
                        <select data-command="fontName" class="editor-select p-2 bg-white border border-gray-300 rounded text-sm">
                            <option value="Arial">Arial</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Times New Roman">Times New Roman</option>
                            <option value="Courier New">Courier New</option>
                            <option value="Verdana">Verdana</option>
                        </select>
                        <select data-command="fontSize" class="editor-select p-2 bg-white border border-gray-300 rounded text-sm">
                            <option value="1">Small</option>
                            <option value="3" selected>Normal</option>
                            <option value="5">Large</option>
                            <option value="7">X-Large</option>
                        </select>
                    </div>

                    <!-- Colors -->
                    <div class="flex items-center space-x-1 border-r border-gray-300 pr-2 mr-2">
                        <div class="relative group">
                            <button type="button" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Text Color">
                                <i class="fas fa-tint"></i>
                            </button>
                            <div class="absolute z-10 left-0 mt-1 hidden group-hover:flex flex-wrap bg-white p-2 rounded shadow-lg border border-gray-200 w-36">
                                <div data-command="foreColor" data-value="#000000" class="color-option w-6 h-6 m-1 bg-black cursor-pointer rounded"></div>
                                <div data-command="foreColor" data-value="#4338ca" class="color-option w-6 h-6 m-1 bg-indigo-700 cursor-pointer rounded"></div>
                                <div data-command="foreColor" data-value="#1d4ed8" class="color-option w-6 h-6 m-1 bg-blue-700 cursor-pointer rounded"></div>
                                <div data-command="foreColor" data-value="#15803d" class="color-option w-6 h-6 m-1 bg-green-700 cursor-pointer rounded"></div>
                                <div data-command="foreColor" data-value="#b91c1c" class="color-option w-6 h-6 m-1 bg-red-700 cursor-pointer rounded"></div>
                                <div data-command="foreColor" data-value="#854d0e" class="color-option w-6 h-6 m-1 bg-amber-800 cursor-pointer rounded"></div>
                                <div data-command="foreColor" data-value="#7e22ce" class="color-option w-6 h-6 m-1 bg-purple-700 cursor-pointer rounded"></div>
                                <div data-command="foreColor" data-value="#6b7280" class="color-option w-6 h-6 m-1 bg-gray-500 cursor-pointer rounded"></div>
                            </div>
                        </div>
                        <div class="relative group">
                            <button type="button" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Background Color">
                                <i class="fas fa-fill-drip"></i>
                            </button>
                            <div class="absolute z-10 left-0 mt-1 hidden group-hover:flex flex-wrap bg-white p-2 rounded shadow-lg border border-gray-200 w-36">
                                <div data-command="hiliteColor" data-value="#f8fafc" class="color-option w-6 h-6 m-1 bg-slate-50 cursor-pointer rounded border border-gray-200"></div>
                                <div data-command="hiliteColor" data-value="#e0e7ff" class="color-option w-6 h-6 m-1 bg-indigo-100 cursor-pointer rounded"></div>
                                <div data-command="hiliteColor" data-value="#dbeafe" class="color-option w-6 h-6 m-1 bg-blue-100 cursor-pointer rounded"></div>
                                <div data-command="hiliteColor" data-value="#dcfce7" class="color-option w-6 h-6 m-1 bg-green-100 cursor-pointer rounded"></div>
                                <div data-command="hiliteColor" data-value="#fee2e2" class="color-option w-6 h-6 m-1 bg-red-100 cursor-pointer rounded"></div>
                                <div data-command="hiliteColor" data-value="#fef3c7" class="color-option w-6 h-6 m-1 bg-amber-100 cursor-pointer rounded"></div>
                                <div data-command="hiliteColor" data-value="#f3e8ff" class="color-option w-6 h-6 m-1 bg-purple-100 cursor-pointer rounded"></div>
                                <div data-command="hiliteColor" data-value="#f3f4f6" class="color-option w-6 h-6 m-1 bg-gray-100 cursor-pointer rounded"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Insert Elements -->
                    <div class="flex items-center space-x-1">
                        <button type="button" data-command="insertImage" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Insert Image">
                            <i class="fas fa-image"></i>
                        </button>
                        <button type="button" data-command="createLink" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Insert Link">
                            <i class="fas fa-link"></i>
                        </button>
                        <button type="button" data-command="insertHorizontalRule" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Insert Horizontal Line">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" data-command="insertTable" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Insert Table">
                            <i class="fas fa-table"></i>
                        </button>
                        <button type="button" data-command="code" class="editor-btn p-2 hover:bg-gray-200 rounded" title="Code Block">
                            <i class="fas fa-code"></i>
                        </button>
                    </div>
                </div>

                <!-- Editor Content Area -->
                <div id="editor-content" contenteditable="true"
                    class="w-full min-h-[400px] p-4 border border-gray-300 rounded-b-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 prose max-w-none">
                    <p>Start writing your blog post here...</p>
                </div>
                <textarea id="hidden-content" name="content" class="hidden"></textarea>

                <!-- Publishing Options -->
                <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                    <div class="flex items-center space-x-4">
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
                    <div class="flex space-x-3">
                        <button type="button"
                            class="px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Preview
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save Post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Image Preview Functionality
            const imagePreview = document.getElementById('image-preview');
            const uploadPrompt = document.getElementById('upload-prompt');
            const selectedImage = document.getElementById('selected-image');
            const removeImageBtn = document.getElementById('remove-image');
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
                        removeImageBtn.classList.remove('hidden');
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });

            removeImageBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                fileInput.value = '';
                selectedImage.src = '';
                selectedImage.classList.add('hidden');
                uploadPrompt.classList.remove('hidden');
                removeImageBtn.classList.add('hidden');
            });

            // WYSIWYG Editor Functionality
            const editorContent = document.getElementById('editor-content');
            const hiddenContent = document.getElementById('hidden-content');
            const editorButtons = document.querySelectorAll('.editor-btn');
            const editorSelects = document.querySelectorAll('.editor-select');
            const colorOptions = document.querySelectorAll('.color-option');

            // Update hidden textarea with editor content when form is submitted
            document.getElementById('blog-form').addEventListener('submit', function(e) {
                e.preventDefault();
                hiddenContent.value = editorContent.innerHTML;
                console.log('Form submitted', hiddenContent.value);
                // Here you would typically submit the form via AJAX or allow normal form submission
                alert('Post saved successfully!');
            });

            // Focus editor on click
            editorContent.addEventListener('click', function() {
                this.focus();
            });

            // Clear initial placeholder text when editor is focused first time
            editorContent.addEventListener('focus', function() {
                if (this.innerText === 'Start writing your blog post here...') {
                    this.innerHTML = '';
                }
            }, { once: true });

            // Button commands
            editorButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const command = this.dataset.command;

                    if (command === 'createLink') {
                        const url = prompt('Enter the link URL:');
                        if (url) document.execCommand(command, false, url);
                    } else if (command === 'insertImage') {
                        const url = prompt('Enter the image URL:');
                        if (url) document.execCommand(command, false, url);
                    } else if (command === 'insertTable') {
                        const rows = prompt('Enter number of rows:', '2');
                        const cols = prompt('Enter number of columns:', '2');
                        if (rows && cols) {
                            let tableHTML = '<table style="border-collapse: collapse; width: 100%;">';
                            for (let i = 0; i < parseInt(rows); i++) {
                                tableHTML += '<tr>';
                                for (let j = 0; j < parseInt(cols); j++) {
                                    tableHTML += '<td style="border: 1px solid #ddd; padding: 8px;">Cell</td>';
                                }
                                tableHTML += '</tr>';
                            }
                            tableHTML += '</table><p></p>';
                            document.execCommand('insertHTML', false, tableHTML);
                        }
                    } else if (command === 'code') {
                        document.execCommand('insertHTML', false, '<pre style="background-color: #f5f5f5; padding: 10px; border-radius: 4px; font-family: monospace;"><code>// Your code here</code></pre><p></p>');
                    } else {
                        document.execCommand(command, false, null);
                    }

                    editorContent.focus();
                });
            });

            // Select commands
            editorSelects.forEach(select => {
                select.addEventListener('change', function() {
                    const command = this.dataset.command;
                    const value = this.value;

                    document.execCommand(command, false, value);
                    editorContent.focus();
                    this.selectedIndex = 0; // Reset select to default option
                });
            });

            // Color options
            colorOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const command = this.dataset.command;
                    const value = this.dataset.value;

                    document.execCommand(command, false, value);
                    editorContent.focus();
                });
            });

            // Tags Functionality
            const tagsContainer = document.getElementById('tags-container');
            const tagsInput = document.getElementById('post-tags');
            const tags = new Set();

            tagsInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    addTag(this.value.trim());
                    this.value = '';
                }
            });

            tagsInput.addEventListener('blur', function() {
                if (this.value.trim()) {
                    addTag(this.value.trim());
                    this.value = '';
                }
            });

            function addTag(tagText) {
                if (!tagText || tags.has(tagText.toLowerCase())) return;

                if (tagText.startsWith('#')) {
                    tagText = tagText.substring(1);
                }

                if (tagText) {
                    tags.add(tagText.toLowerCase());

                    const tagElement = document.createElement('div');
                    tagElement.className = 'inline-flex items-center bg-indigo-100 text-indigo-800 rounded-full px-3 py-1 text-sm mr-2 mb-2';
                    tagElement.innerHTML = `
                        <span>${tagText}</span>
                        <button type="button" class="ml-1 text-indigo-600 hover:text-indigo-800 focus:outline-none">
                            <i class="fas fa-times-circle"></i>
                        </button>
                    `;

                    tagElement.querySelector('button').addEventListener('click', function() {
                        tags.delete(tagText.toLowerCase());
                        tagElement.remove();
                    });

                    tagsContainer.insertBefore(tagElement, tagsInput);
                }
            }
        });
    </script>
@endsection
