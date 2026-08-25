<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Livestock | Stock Connect</title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    >

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --green: #35d84a;
            --green-dark: #269c38;
            --green-soft: #eaf9ed;
            --text: #17201a;
            --muted: #7c867f;
            --border: #e4e9e5;
            --background: #f7f9f7;
            --white: #ffffff;
            --danger: #d95353;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        textarea,
        select {
            font-family: inherit;
        }

        .page {
            min-height: 100vh;
            padding: 32px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        /* =========================
           HEADER
        ========================= */

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .back-button {
            width: 39px;
            height: 39px;
            border: 1px solid var(--border);
            background: white;
            color: #555e58;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .2s ease;
        }

        .back-button:hover {
            background: var(--green-soft);
            color: var(--green-dark);
            border-color: #c9e8cf;
        }

        .header-text h1 {
            font-size: 25px;
            margin-bottom: 5px;
        }

        .header-text p {
            font-size: 12px;
            color: var(--muted);
        }

        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
        }

        .form-section {
            padding: 25px;
            border-bottom: 1px solid var(--border);
        }

        .form-section:last-child {
            border-bottom: none;
        }

        .section-heading {
            margin-bottom: 20px;
        }

        .section-heading h2 {
            font-size: 15px;
            margin-bottom: 4px;
        }

        .section-heading p {
            font-size: 11px;
            color: var(--muted);
        }

        /* =========================
           FORM GRID
        ========================= */

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .required {
            color: var(--danger);
        }

        .form-control {
            width: 100%;
            height: 42px;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0 13px;
            outline: none;
            background: #fcfdfc;
            color: var(--text);
            font-size: 12px;
            transition: .2s ease;
        }

        textarea.form-control {
            height: 115px;
            padding: 12px 13px;
            resize: vertical;
        }

        .form-control:focus {
            background: white;
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(53, 216, 74, .08);
        }

        .field-help {
            margin-top: 5px;
            font-size: 10px;
            color: var(--muted);
        }

        /* =========================
           IMAGE UPLOAD
        ========================= */

        .image-upload {
            border: 1.5px dashed #cdd6cf;
            border-radius: 10px;
            padding: 28px;
            text-align: center;
            background: #fbfdfb;
            transition: .2s ease;
            cursor: pointer;
        }

        .image-upload:hover {
            border-color: var(--green);
            background: var(--green-soft);
        }

        .upload-icon {
            width: 45px;
            height: 45px;
            margin: 0 auto 10px;
            border-radius: 10px;
            background: var(--green-soft);
            color: var(--green-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .image-upload strong {
            display: block;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .image-upload span {
            font-size: 10px;
            color: var(--muted);
        }

        .image-upload input {
            display: none;
        }

        .image-preview {
            display: none;
            margin-top: 15px;
        }

        .image-preview img {
            width: 120px;
            height: 90px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid var(--border);
        }

        /* =========================
           ERROR
        ========================= */

        .error-box {
            margin-bottom: 20px;
            padding: 13px 15px;
            background: #fff0f0;
            border: 1px solid #f1cccc;
            color: var(--danger);
            border-radius: 9px;
            font-size: 11px;
        }

        .error-box ul {
            margin-left: 18px;
            margin-top: 5px;
        }

        .input-error {
            color: var(--danger);
            font-size: 10px;
            margin-top: 5px;
        }

        /* =========================
           FOOTER
        ========================= */

        .form-footer {
            padding: 20px 25px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            background: #fcfdfc;
        }

        .cancel-button,
        .save-button {
            height: 40px;
            padding: 0 17px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
        }

        .cancel-button {
            border: 1px solid var(--border);
            background: white;
            color: #555e58;
        }

        .cancel-button:hover {
            background: #f5f7f5;
        }

        .save-button {
            border: none;
            background: var(--green);
            color: white;
        }

        .save-button:hover {
            background: var(--green-dark);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 700px) {

            .page {
                padding: 18px;
            }

            .page-header {
                align-items: flex-start;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-section {
                padding: 20px;
            }

            .form-footer {
                padding: 18px 20px;
            }

        }
    </style>
</head>

<body>

<div class="page">

    <div class="container">

        {{-- HEADER --}}

        <div class="page-header">

            <div class="header-left">

                <a
                    href="{{ route('livestock.index') }}"
                    class="back-button"
                    title="Back to livestock"
                >

                    <i class="fa-solid fa-arrow-left"></i>

                </a>

                <div class="header-text">

                    <h1>
                        Add New Livestock
                    </h1>

                    <p>
                        Add a new animal to your Stock Connect marketplace inventory.
                    </p>

                </div>

            </div>

        </div>


        {{-- VALIDATION ERRORS --}}

        @if($errors->any())

            <div class="error-box">

                <strong>
                    Please correct the following:
                </strong>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- FORM --}}

        <form
            action="{{ route('livestock.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="form-card">


                {{-- BASIC INFORMATION --}}

                <div class="form-section">

                    <div class="section-heading">

                        <h2>
                            Basic Information
                        </h2>

                        <p>
                            Provide the basic details of the livestock.
                        </p>

                    </div>


                    <div class="form-grid">


                        <div class="form-group">

                            <label>
                                Livestock Name
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="e.g. Boer Goat"
                                value="{{ old('name') }}"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label>
                                Category
                                <span class="required">*</span>
                            </label>

                            <select
                                name="category"
                                class="form-control"
                                required
                            >

                                <option value="">
                                    Select category
                                </option>

                                <option value="Cattle" {{ old('category') == 'Cattle' ? 'selected' : '' }}>
                                    Cattle
                                </option>

                                <option value="Goats" {{ old('category') == 'Goats' ? 'selected' : '' }}>
                                    Goats
                                </option>

                                <option value="Sheep" {{ old('category') == 'Sheep' ? 'selected' : '' }}>
                                    Sheep
                                </option>

                                <option value="Pigs" {{ old('category') == 'Pigs' ? 'selected' : '' }}>
                                    Pigs
                                </option>

                                <option value="Poultry" {{ old('category') == 'Poultry' ? 'selected' : '' }}>
                                    Poultry
                                </option>

                                <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>
                                    Other
                                </option>

                            </select>

                        </div>


                        <div class="form-group">

                            <label>
                                Breed
                            </label>

                            <input
                                type="text"
                                name="breed"
                                class="form-control"
                                placeholder="e.g. White Fulani"
                                value="{{ old('breed') }}"
                            >

                        </div>


                        <div class="form-group">

                            <label>
                                Age
                            </label>

                            <input
                                type="text"
                                name="age"
                                class="form-control"
                                placeholder="e.g. 2 years"
                                value="{{ old('age') }}"
                            >

                        </div>


                        <div class="form-group full">

                            <label>
                                Description
                            </label>

                            <textarea
                                name="description"
                                class="form-control"
                                placeholder="Describe the livestock, condition, characteristics and any other useful information..."
                            >{{ old('description') }}</textarea>

                        </div>

                    </div>

                </div>


                {{-- PRICING AND INVENTORY --}}

                <div class="form-section">

                    <div class="section-heading">

                        <h2>
                            Pricing & Inventory
                        </h2>

                        <p>
                            Set the selling price and current inventory information.
                        </p>

                    </div>


                    <div class="form-grid">


                        <div class="form-group">

                            <label>
                                Price
                                <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                name="price"
                                class="form-control"
                                placeholder="e.g. 250000"
                                min="0"
                                step="0.01"
                                value="{{ old('price') }}"
                                required
                            >

                            <span class="field-help">
                                Enter the price in Nigerian Naira (₦).
                            </span>

                        </div>


                        <div class="form-group">

                            <label>
                                Quantity
                                <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                name="quantity"
                                class="form-control"
                                placeholder="e.g. 10"
                                min="0"
                                value="{{ old('quantity', 1) }}"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label>
                                Weight
                            </label>

                            <input
                                type="number"
                                name="weight"
                                class="form-control"
                                placeholder="e.g. 85"
                                min="0"
                                step="0.01"
                                value="{{ old('weight') }}"
                            >

                            <span class="field-help">
                                Weight in kilograms.
                            </span>

                        </div>


                        <div class="form-group">

                            <label>
                                Status
                                <span class="required">*</span>
                            </label>

                            <select
                                name="status"
                                class="form-control"
                                required
                            >

                                <option value="available"
                                    {{ old('status', 'available') == 'available' ? 'selected' : '' }}>
                                    Available
                                </option>

                                <option value="sold_out"
                                    {{ old('status') == 'sold_out' ? 'selected' : '' }}>
                                    Sold Out
                                </option>

                            </select>

                        </div>

                    </div>

                </div>


                {{-- IMAGE --}}

                <div class="form-section">

                    <div class="section-heading">

                        <h2>
                            Livestock Image
                        </h2>

                        <p>
                            Upload a clear image of the livestock.
                        </p>

                    </div>


                    <label class="image-upload" for="livestockImage">

                        <div class="upload-icon">

                            <i class="fa-solid fa-cloud-arrow-up"></i>

                        </div>

                        <strong>
                            Click to upload an image
                        </strong>

                        <span>
                            JPG, JPEG, PNG or WEBP • Maximum 2MB
                        </span>

                        <input
                            type="file"
                            name="image"
                            id="livestockImage"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <div class="image-preview" id="imagePreview">

                            <img
                                id="previewImage"
                                src=""
                                alt="Livestock preview"
                            >

                        </div>

                    </label>

                </div>


                {{-- FOOTER --}}

                <div class="form-footer">

                    <a
                        href="{{ route('livestock.index') }}"
                        class="cancel-button"
                    >

                        Cancel

                    </a>


                    <button
                        type="submit"
                        class="save-button"
                    >

                        <i class="fa-solid fa-plus"></i>

                        Add Livestock

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


<script>

    const imageInput =
        document.getElementById('livestockImage');

    const imagePreview =
        document.getElementById('imagePreview');

    const previewImage =
        document.getElementById('previewImage');


    imageInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {

            imagePreview.style.display = 'none';

            return;

        }

        const reader = new FileReader();

        reader.onload = function (event) {

            previewImage.src = event.target.result;

            imagePreview.style.display = 'block';

        };

        reader.readAsDataURL(file);

    });

</script>

</body>

</html>