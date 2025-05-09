<form id="blog-form" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data"
    class="bg-white rounded-lg shadow-sm p-6">
    @csrf
    <!-- Featured Image -->
    <div class="mb-6">
        <div id="image-preview"
            class="w-full h-110 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center cursor-pointer hover:bg-gray-50">
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
    <div id="editor-toolbar"
        class="flex flex-wrap items-center gap-1 p-2 bg-gray-50 border border-gray-300 rounded-t-lg">
        <!-- Headings -->
        <div class="relative mr-2">
            <select id="format-select" data-command="formatBlock"
                class="editor-select py-2 pl-3 pr-8 bg-white border border-gray-300 rounded text-sm appearance-none cursor-pointer hover:bg-gray-50">
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
        <button type="button" data-command="underline" class="editor-btn p-2 hover:bg-gray-200 rounded"
            title="Underline">
            <i class="fas fa-underline"></i>
        </button>

        <div class="mx-1 h-6 border-r border-gray-300"></div>

        <!-- Lists -->
        <button type="button" data-command="insertOrderedList" class="editor-btn p-2 hover:bg-gray-200 rounded"
            title="Numbered List">
            <i class="fas fa-list-ol"></i>
        </button>
        <button type="button" data-command="insertUnorderedList" class="editor-btn p-2 hover:bg-gray-200 rounded"
            title="Bullet List">
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
        <button type="button" data-command="justifyLeft" class="editor-btn p-2 hover:bg-gray-200 rounded"
            title="Align Left">
            <i class="fas fa-align-left"></i>
        </button>
        <button type="button" data-command="justifyCenter" class="editor-btn p-2 hover:bg-gray-200 rounded"
            title="Align Center">
            <i class="fas fa-align-center"></i>
        </button>
        <button type="button" data-command="justifyRight" class="editor-btn p-2 hover:bg-gray-200 rounded"
            title="Align Right">
            <i class="fas fa-align-right"></i>
        </button>

        <div class="mx-1 h-6 border-r border-gray-300"></div>

        <!-- Insert Elements -->
        <button type="button" data-command="insertImage" class="editor-btn p-2 hover:bg-gray-200 rounded"
            title="Insert Image">
            <i class="fas fa-image"></i>
        </button>
        <button type="button" data-command="createLink" class="editor-btn p-2 hover:bg-gray-200 rounded"
            title="Insert Link">
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

        #editor-content ol li,
        #editor-content ul li {
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
