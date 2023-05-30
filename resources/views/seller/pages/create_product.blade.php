@extends('seller.layout.layout',['useAssets'=>['choices','dropzone','layoutJS','ckeditor']])
@section('title','Create Product | Bazaarry')

@section('style')
<style>
    .custom-options {
        z-index: 111;
    }
</style>
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Create Product</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bazaarry</a></li>
                            <li class="breadcrumb-item active">Create Product</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row d-none" id="responseDiv">
            <div class="col-lg-12">
                <div class=" page-title-box  d-flex justify-content-end" style="border: none !important">
                    <button class="btn btn-soft-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Generate Response</button>
                </div>
            </div>
        </div>
        <form id="createProductForm">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible alert-label-icon rounded-label fade show d-none" role="alert">
                                <i class="ri-error-warning-line label-icon"></i><strong>Message</strong> - Please fill all required fields
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Product Title <span class="text-danger">*</span></label>
                                <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                                <input type="text" class="form-control" id="product-title-input" name="title" placeholder="Enter product title">
                                <div class="error-title"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Product Cover Image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="thumbnail">
                                <div class="error-thumbnail"></div>
                            </div>
                            <div>
                                <label>Product Description <span class="text-danger">*</span></label>

                                <textarea id="editor" placeholder="Enter product description" name="description">

                                    </textarea>
                                <div class="error-description"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Product Gallery <span class="text-danger">*</span></h5>
                        </div>
                        <div class="card-body">
                            <div id="multi_image_picker" class="row"></div>
                            <div class="error-fileUpload"></div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                                        General Info
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-name-input">Manufacturer
                                                    Name</label>
                                                <input type="text" class="form-control" name="manufacturer_name" id="manufacturer-name-input" placeholder="Enter manufacturer name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-brand-input">Manufacturer
                                                    Brand</label>
                                                <input type="text" class="form-control" name="brand" id="manufacturer-brand-input" placeholder="Enter manufacturer brand">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="stocks-input">Quantity <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="stocks-input" placeholder="Quantity" name="quantity">
                                                <div class="error-quantity"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-price-input">Price <span class="text-danger">*</span></label>
                                                <div class="input-group has-validation mb-3">
                                                    <span class="input-group-text" id="product-price-addon">Rs</span>
                                                    <input type="text" class="form-control" id="product-price-input" placeholder="Enter price" aria-label="Price" name="price" aria-describedby="product-price-addon">
                                                    <div class="error-price"></div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-discount-input">Discount</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="product-discount-addon">%</span>
                                                    <input type="text" class="form-control" id="product-discount-input" name="discount" placeholder="Enter discount" aria-label="discount" aria-describedby="product-discount-addon">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-discount-input">SKU <span class="text-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control w-100" id="product-discount-input" placeholder="Enter Sku" aria-label="sku" name="sku" aria-describedby="sku">
                                                    <div class="error-sku"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end tab-pane -->
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <h5 class="mb-3">Variants</h5>
                    <div class="card">
                        <!-- end card header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="color" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="v-name">Variant Name</label>
                                                <select name="product_variant" id="variant" class="form-control" placeholder="Select Variant">
                                                    <option value="" selected disabled>Select Variant</option>
                                                    @foreach($variant as $variantItem)
                                                    <option data-value="{{ str()->slug($variantItem->name) }}" data-name="{{ $variantItem->name }}" value="{{$variantItem->id}}">{{$variantItem->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                @foreach($variant as $variantItem)
                                                <div class="variant_values form-check mb-3 d-none {{ str()->slug($variantItem->name) }}">
                                                    <div class="row">
                                                        @foreach($variantItem->values as $key => $value)
                                                        <div class="col-md-2">
                                                            <input class="form-check-input" type="checkbox" value="{{ $value->id }}" data-name="{{ $value->value }}" id="{{ $loop->index.'-'.str()->slug($value->value) }}">
                                                            <label class="form-check-label" for="{{ $loop->index.'-'.str()->slug($value->value) }}">
                                                                {{ $value->value }}
                                                            </label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button onclick="addVariant();" type="button" class="btn btn-soft-primary waves-effect waves-light d-flex align-items-center"><span class="me-2"><i class="las la-plus"></i></span> Add other variation</button>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <table class="table align-middle mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">Variant</th>
                                                        <th scope="col">Value</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="variant_table">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <table id="combination_table" class="table align-middle mb-0">
                                                <thead class="table-light">
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end mb-3">
                        <button type="submit" id="submitForm" class="btn btn-success w-sm">Submit</button>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Publish</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
                                <div class="select-box">
                                    <div class="select-box__current" tabindex="1">
                                        <div class="select-box__value">
                                            <input class="select-box__input" type="radio" id="public" value="1" name="visibility" checked="checked">
                                            <p class="select-box__input-text">Public</p>
                                        </div>
                                        <div class="select-box__value">
                                            <input class="select-box__input" type="radio" id="hidden" value="0" name="visibility">
                                            <p class="select-box__input-text">Hidden</p>
                                        </div>
                                        <img class="select-box__icon" src="{{asset('admin_assets/images/local-Assets/down-arrow.png')}}" alt="Arrow Icon" aria-hidden="true">
                                    </div>
                                    <ul class="select-box__list">
                                        <li>
                                            <label class="select-box__option" for="public" aria-hidden="aria-hidden">Public</label>
                                        </li>
                                        <li>
                                            <label class="select-box__option" for="hidden" aria-hidden="aria-hidden">Hidden</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Product Tags</h5>
                        </div>
                        <div class="card-body">
                            <div class="hstack gap-3 align-items-start">
                                <div class="flex-grow-1">
                                    <input class="form-control choices" data-choices data-choices-multiple-remove="true" placeholder="Enter tags" name="product_tags" spellcheck="true" type="text" />
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Product Categories</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-2">
                                <a href="javascript: void(0);" data-bs-toggle="modal" data-bs-target="#add-category" class="float-end text-decoration-underline">Add
                                    New</a>Select product category <span class="text-danger">*</span>
                            </p>
                            <div class="center">
                                <select name="product_category" onchange="getChieldCategory($(this));" id="sources" class="mb-2 form-control" placeholder="Select Category">
                                    <option value="" selected>Select Category</option>
                                    @foreach($category->whereNull('parent_id') as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="error-product_category"></div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="add-category" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-category">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <div>
                                <label for="firstName" class="form-label">Add Category</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name">
                                <div class="error-name">

                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">AI Response</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="sendResponse">
                @csrf
                <div class="modal-body">
                    <label class="form-label">Description</label>
                    <textarea rows="5" style="resize: none;" type="text" class="form-control" placeholder="Description" name="message"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="getResponse" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('custom-script')
<script>
    function pluckAll(arr, key) {
        return arr.map(obj => obj[key]).filter(val => val !== undefined);
    }

    $("#variant").change(function() {
        let value = $('option:selected', this).attr('data-value');
        $(".variant_values").addClass("d-none");
        $("." + value).removeClass("d-none");
    });

    function addVariant() {
        let id = $("#variant option:selected").val();
        let value = $("#variant option:selected").attr('data-value');
        let name = $("#variant option:selected").attr('data-name');
        if ($("." + value + " input:checked").length < 1) {
            alert("Please select variant value");
            return false;
        }
        let optionList = [];
        $("." + value + " input:checked").each(function() {
            optionList.push({
                id: $(this).val(),
                name: $(this).attr("data-name")
            });
        });
        if ($("#data-variant-" + value).length > 0) {
            $("#data-variant-" + value).attr("data-v-options", JSON.stringify(pluckAll(optionList, "name")));
            $("#data-variant-" + value).attr("data-v-options-id", JSON.stringify(pluckAll(optionList, "id")));
            $("#data-variant-" + value + " td:eq(0)").html(`${name} <input type="hidden" name="variant[]" value="${id}">`);
            $("#data-variant-" + value + " td:eq(1)").html(`${pluckAll(optionList,"name").join("<br>")} <input name="options[]" value='${JSON.stringify(pluckAll(optionList,"id"))}' type="hidden">`);
        } else {
            $("#variant_table").append(`
                    <tr id="data-variant-${value}" data-v-name="${name}" data-v-id="${id}" data-v-options='${JSON.stringify(pluckAll(optionList,"name"))}' data-v-options-id='${JSON.stringify(pluckAll(optionList,"id"))}'>
                        <td>${name} <input type="hidden" name="variant[]" value="${id}"></td>
                        <td>${pluckAll(optionList,"name").join("<br>")} <input name="options[]" value='${JSON.stringify(pluckAll(optionList,"id"))}' type="hidden"></td>
                        <td><button class="btn btn-danger" onclick="$(this).parent().parent().remove(); generateVariantCombinations();">Remove</button></td>
                    </tr>
                `);
        }
        $("#variant").val("");
        $("#variant").change();
        $(".variant_values input").prop("checked", false);
        generateVariantCombinations();
    }

    function generateVariantCombinations() {
        if ($("#variant_table tr").length < 1) {
            alert("Nothing to generate combination.");
            return false;
        }
        let variants = [];
        let variantsID = [];
        let names = [];
        $("#variant_table tr").each(function() {
            let k = $(this).attr("data-v-name");
            let kk = "" + $(this).attr("data-v-id");
            names.push(k);
            variants[k] = JSON.parse($(this).attr("data-v-options"));
            variantsID[kk] = JSON.parse($(this).attr("data-v-options-id"));
        });
        const combinationID = getVariantCombinations(variantsID);
        const variantCombinations = getVariantCombinations(variants);
        let thead = `<tr>`;
        $.each(names, function(index, value) {
            thead += `<th>${value}</th>`;
        });
        thead += `<th>Price</th>`;
        thead += `<th>Quantity</th>`;
        thead += `<th>SKU</th>`;
        thead += `</tr>`;
        $("#combination_table thead").html(thead);
        let tbody = ``;
        for (let i = 0; i < variantCombinations.length; i++) {
            tbody += `<tr>`;
            $.each(variantCombinations[i], function(index, value) {
                tbody += `<td>${value}</td>`;
            });
            let comb_key_json = JSON.stringify(combinationID[i]);
            let comb_val_json = JSON.stringify(variantCombinations[i]);
            tbody += `<th><input class="form-control" style="150px" type="number" step="0.1" min="0" value="0" name='v_price[]'></th>`;
            tbody += `<th><input class="form-control" style="150px" type="number" min="0" name='v_quantity[]' value="0"></th>`;
            tbody += `<th><input class="form-control" style="200px" type="text" name='v_sku[]' value="${randomString(10)}"></th>`;
            tbody += `<input type="hidden" name="combination_key_json[]" value='${comb_key_json}'></tr>`;
            tbody += `<input type="hidden" name="combination_val_json[]" value='${comb_val_json}'></tr>`;
        }
        $("#combination_table tbody").html(tbody);
    }

    const randomString = (length) => {
        let result = "";
        const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        const charactersLength = characters.length;
        for (let i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    };

    function getVariantCombinations(variants) {
        const variantKeys = Object.keys(variants);
        const variantValues = variantKeys.map(key => variants[key]);

        const combinations = [];

        function getCombinationsHelper(currentCombo, index) {
            if (index === variantValues.length) {
                combinations.push(currentCombo);
                return;
            }

            variantValues[index].forEach(value => {
                const newCombo = [...currentCombo, value];
                getCombinationsHelper(newCombo, index + 1);
            });
        }

        getCombinationsHelper([], 0);

        const variantCombinations = combinations.map(combo => {
            return combo.reduce((acc, value, index) => {
                const key = variantKeys[index];
                acc[key] = value;
                return acc;
            }, {});
        });

        return variantCombinations;
    }
</script>
<script type="text/javascript">
    $(function() {
        $("#multi_image_picker").spartanMultiImagePicker({
            fieldName: 'fileUpload[]',
            maxCount: 3,
            onExtensionErr: function(index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
        });
    });
</script>
<script>

    $('#product-title-input').on('keyup keypress', function(e) {
        var fieldValue = $(this).val(); // Retrieve the value of the input field
        var responseDiv = $('#responseDiv');

        if (fieldValue) {
            responseDiv.removeClass('d-none'); // Remove 'd-none' class if field has a value
        } else {
            responseDiv.addClass('d-none'); // Add 'd-none' class if field is empty
        }
    });

    let editorInstance; // Variable to store the CKEditor instance

    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            editorInstance = editor; // Store the CKEditor instance in the variable
        })
        .catch(error => {
            console.error(error);
        });

    var notyf = new Notyf({
        duration: 3000,
        position: {
            x: 'right',
            y: 'top',
        },
    });
    $('#add-category').on('submit', function(e) {
        e.preventDefault();
        var name = $('#name').val();
        console.log(name);
        $.ajax({
            type: "POST",
            url: "{{route('add_category-seller')}}",
            dataType: 'json',
            data: {
                'name': name,
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function() {
                $('.error-message').hide();
                $('#btn-submit').html('Processing').prop('disabled', true);
            },
            success: function(res) {

                if (res.success === true) {
                    notyf.success({
                        message: res.message,
                        duration: 3000
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 3200);
                    $('#btn-submit').prop('disabled', false);
                } else {
                    notyf.error({
                        message: res.message,
                        duration: 3000
                    })
                    $('#btn-submit').prop('disabled', false);
                    $('#btn-submit').html('Submit');
                }

            },
            error: function(e) {
                $('#btn-submit').prop('disabled', false);
                $('#btn-submit').html('Submit');
                if (e.responseJSON.errors['name']) {
                    $('.error-name').html('<small class="error-message text-danger">' + e.responseJSON.errors['name'][0] + '</small>');
                }
            }
        });
    });



    $("#createProductForm").on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData($("#createProductForm")[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('add_product') }}",
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,
            data: formData,
            beforeSend: function() {
                $("#submitForm").prop('disabled', true).html('<div class="spinner-border custom-spin-style" role="status"> <span class="visually-hidden">Loading...</span> </div> <span class="ms-1">Processing...</span>');
                $('.error-message').hide();
            },
            success: function(res) {
                if (res.success === true) {
                    $("#submitForm").prop('disabled', false).html('Submit');
                    notyf.success({
                        message: res.message,
                        duration: 3000
                    });
                    setTimeout(function() {
                        window.location.href = "{{ route('seller-products') }}";
                    }, 3200);
                    $('.error-email').html('');
                    $('.error-password').html('');

                } else {
                    $("#submitForm").prop('disabled', false).html('Submit');
                    notyf.error({
                        message: res.message,
                        duration: 3000
                    })

                }
            },
            error: function(e) {
                $("#submitForm").prop('disabled', false).html('Submit');
                $('.alert-dismissible').removeClass('d-none');
                window.scrollTo(0, 0);
                if (e.responseJSON.errors['title']) {
                    $('.error-title').html('<small class=" error-message text-danger">' + e.responseJSON.errors['title'][0] + '</small>');
                }
                if (e.responseJSON.errors['thumbnail']) {
                    $('.error-thumbnail').html('<small class=" error-message text-danger">' + e.responseJSON.errors['thumbnail'][0] + '</small>');
                }
                if (e.responseJSON.errors['description']) {
                    $('.error-description').html('<small class=" error-message text-danger">' + e.responseJSON.errors['description'][0] + '</small>');
                }
                if (e.responseJSON.errors['price']) {
                    $('.error-price').html('<small class=" error-message text-danger">' + e.responseJSON.errors['price'][0] + '</small>');
                }
                if (e.responseJSON.errors['quantity']) {
                    $('.error-quantity').html('<small class=" error-message text-danger">' + e.responseJSON.errors['quantity'][0] + '</small>');
                }
                if (e.responseJSON.errors['sku']) {
                    $('.error-sku').html('<small class=" error-message text-danger">' + e.responseJSON.errors['sku'][0] + '</small>');
                }
                if (e.responseJSON.errors['fileUpload']) {
                    $('.error-fileUpload').html('<small class=" error-message text-danger">' + e.responseJSON.errors['fileUpload'][0] + '</small>');
                }
                if (e.responseJSON.errors['product_category']) {
                    $('.error-product_category').html('<small class=" error-message text-danger">' + e.responseJSON.errors['product_category'][0] + '</small>');
                }
            }

        });
    });

    //AI RESPONSE

    $("#sendResponse").on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData($("#sendResponse")[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('chatbot.sendMessage') }}",
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,
            data: formData,
            beforeSend: function() {
                $('#getResponse').prop('disabled',true);
                $('#getResponse').html('Processing...');
            },
            success: function(res) {
                if (res.success === true) {
                    $('#getResponse').prop('disabled',false);
                    $('#getResponse').html('Save Changes');
                    console.log(res);
                    $('#exampleModal').modal('hide');
                    // Update the CKEditor field with the response
                    editorInstance.setData(res.message);

                } else {}
            },
            error: function(e) {}
        });
    });
</script>
@endsection