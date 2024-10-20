<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Team Member</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_admin/img/favicon.jpg') }}">

    <style>
        /* Basic styles for alerts */
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px; /* Consistent button font size */
        }
        .btn-submit {
            background-color: #007bff;
            color: #fff;
        }
        .btn-cancel {
            background-color: #ccc;
            color: #333;
            text-decoration: none;
        }
        #dropArea {
            position: relative;
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            margin-top: 10px;
            border-radius: 4px;
        }
        /* Form styles */
        input[type="text"], input[type="email"], input[type="number"], select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px; /* Space above input elements */
        }
        h4, h6 {
            margin: 0; /* Reset margins for headings */
        }
        /* Flex container for form layout */
        .form-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px; /* Space between form elements */
        }
        .form-item {
            flex: 1 1 25%; /* Adjust width */
            padding: 10px;
        }
    </style>
</head>
<body>

<!-- navbar -->
@include('backend.common.navbar')
<!-- end navbar -->

<!-- sidebar -->
@include('backend.common.sidebar')
<!-- end sidebar -->

<div style="display: flex; flex-direction: column; height: 100vh; margin-top: 50px;">
    <div style="flex: 1; display: flex;">
        <div style="flex: 0 0 auto; width: 250px;">
            <!-- Sidebar content goes here -->
        </div>
        <div style="flex: 1; padding: 20px; overflow-y: auto;">

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" onclick="this.parentElement.style.display='none';" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" onclick="this.parentElement.style.display='none';" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div style="background-color: #fff; border-radius: 8px; padding: 20px;">
                <div style="margin-bottom: 20px;">
                    <h4>Edit Team Member</h4>
                    <h6>Update Existing Team Member Details</h6>
                </div>

                <form action="{{ route('team.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div style="margin-top: 20px;">
                        <div class="form-container">
                            <div class="form-item">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $teamMember->name }}" required>
                            </div>


                            <div class="form-item">
                                <label>Position</label>
                                <input type="text" name="position" value="{{ $teamMember->position }}" required>
                            </div>

                            
                          <!-- images -->
                            <div class="form-item" style="flex: 1 1 100%;">
                                <label>Current Profile Image</label>
                                <div style="margin-bottom: 10px;">
                                    @if($teamMember->image && file_exists(public_path($teamMember->image)))
                                        <img src="{{ asset($teamMember->image) }}" alt="Current Image" style="max-width: 150px; border: 1px solid #ccc; border-radius: 4px;">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </div>
                                <label>Upload New Image (optional)</label>
                                <div id="dropArea">
                                    <input type="file" id="fileInput" name="image" style="display: none;" onchange="updateFileName()">
                                    <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="Upload" style="max-width: 50px; margin-bottom: 10px;">
                                    <h4 style="margin: 0;">Drag and drop a file to upload</h4>
                                    <div id="fileName" style="margin-top: 10px; font-weight: bold;">No file chosen.</div>
                                </div>
                            </div>
                          <!-- images end -->


                            <div class="form-item" style="flex: 1 1 100%;">
                                <button type="submit" class="btn btn-submit">Update</button>
                                <a href="{{ route('team.index') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const fileNameDisplay = document.getElementById('fileName');

    // Prevent default behavior for drag and drop events
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    // Highlight drop area on drag events
    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, () => {
            dropArea.style.borderColor = '#000';
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, () => {
            dropArea.style.borderColor = '#ccc';
        }, false);
    });

    dropArea.addEventListener('drop', handleDrop, false);
    dropArea.addEventListener('click', () => fileInput.click());
    fileInput.addEventListener('change', handleFiles, false);

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles(files);
    }

    function handleFiles(files) {
        if (files.length > 0) {
            const file = files[0];
            fileNameDisplay.textContent = `File: ${file.name}`;
            fileInput.files = files; 
        } else {
            fileNameDisplay.textContent = 'No file chosen.';
        }
    }

    function updateFileName() {
        const files = fileInput.files;
        if (files.length > 0) {
            fileNameDisplay.textContent = `File: ${files[0].name}`;
        } else {
            fileNameDisplay.textContent = 'No file chosen.';
        }
    }
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
