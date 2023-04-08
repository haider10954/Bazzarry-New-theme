@extends('admin.layout.layout',['useAssets'=>['sweetAlert']])
@section('title','Banner')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Banners</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bazaarry</a></li>
                            <li class="breadcrumb-item active">Banners</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-end mb-3">
                    <a href="javascript:void(0);" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addBanner"><i class="ri-add-line align-bottom me-1"></i>Add banner</a>
                </div>

                @if ($banner->count() > 0)
                @foreach ($banner as $item)
                <div class="card">
                    <div class="card-body">
                        <div class="row gx-lg-5">

                            <div class="col-xl-8 col-md-8 mx-auto">
                                <div class="h-100">
                                    <img src="{{asset($item->image)}}" alt="" class="img-fluid d-block h-100 object-fit-cover" />
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-xl-4">
                                <div class="mt-xl-0 mt-5">
                                    <div>
                                        <div class="d-flex justify-content-end mb-3">
                                            <a class="btn btn-light me-2" onclick="bannerInfo($(this))" data-id="{{ $item->id }}" data-title="{{ $item->title }}" data-description="{{ $item->description }}" data-status="{{ $item->status }}" data-image="{{ $item->image }}" data-bs-toggle="modal" data-bs-target="#editBanner" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                            <a class="btn btn-soft-danger deleteRecord" data-bs-toggle="tooltip" data-bs-placement="top" title="delete" data-id="{{ $item->id }}"><i class="ri-delete-bin-5-line align-bottom"></i></a>
                                        </div>
                                        <div class="text-muted">
                                            <h5 class="fs-14">Title :</h5>
                                            <p class="text-justify">{{ $item->title }}.</p>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <div class="mt-4 text-muted">
                                        <h5 class="fs-14">Description :</h5>
                                        <p class="text-justify">{{ $item->description }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <span class="fs-14">Status :</span>
                                        @if($item->status == 1)
                                        <div class="badge rounded-pill bg-success mb-0 " >
                                            Active
                                        </div>
                                        @else
                                        <div class="badge rounded-pill bg-danger mb-0 ">
                                            In-Active
                                        </div>
                                        @endif
                                    </div>
                                    <div class="mt-4">
                                        <div class="text-muted">Published : <span class="text-body fw-medium">{{\Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</span></div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                            </div>

                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                @endforeach
                @else
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center">
                                    <div class="no-record-section mx-auto text-center">
                                        <img src="{{asset('admin_assets/images/error.svg')}}" alt="">
                                        <span class="fw-bold fs-4 text-black-50">No Record Found..</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
@endsection

@section('modals')
<div class="modal fade" id="addBanner" tabindex="-1" aria-labelledby="addBannerModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light py-2">
                <h5 class="modal-title" id="addBannerModal">Add Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addBannerForm">
                @csrf
                <div class="modal-body" data-simplebar data-simplebar-auto-hide="false" style="max-height: 600px">

                    <div class="row g-3">
                        <div class="col-12">
                            <div>
                                <label for="firstName" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter banner title">
                            </div>
                            <div class="error-title"></div>
                        </div><!--end col-->
                        <div class="col-12">
                            <div>
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="error-description"></div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <label for="genderInput" class="form-label">Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="active" value="1">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="in-active" value="0">
                                    <label class="form-check-label" for="in-active">In-Active</label>
                                </div>
                            </div>
                            <div class="error-status"></div>
                        </div><!--end col-->
                        <div class="col-12">
                            <div>
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            <div class="error-image"></div>
                        </div><!--end col-->
                        <div class="col-12">
                            <div>
                                <label class="form-label">Preview</label>
                                <div class="image-preview">
                                    <p>Image Preview</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->

                </div>
                <div class="modal-footer bg-light py-2">
                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submitForm" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Banner -->
<div class="modal fade" id="editBanner" tabindex="-1" aria-labelledby="editBannerModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light py-2">
                <h5 class="modal-title" id="editBannerModal">Edit Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="EditBannerForm">
                @csrf
                <input type="hidden" name="id" value="" id="banner_id" />
                <div class="modal-body" data-simplebar data-simplebar-auto-hide="false" style="max-height: 600px">

                    <div class="row g-3">
                        <div class="col-12">
                            <div>
                                <label for="firstName" class="form-label">Title</label>
                                <input type="text" class="form-control" id="banner_title" name="title" placeholder="Enter banner title" value="">
                            </div>
                            <div class="error-title"></div>
                        </div><!--end col-->
                        <div class="col-12">
                            <div>
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="banner_description" name="description" rows="3"></textarea>
                            </div>
                            <div class="error-description"></div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <label for="genderInput" class="form-label">Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="banner_status_active" value="1">
                                    <label class="form-check-label" for="banner_status_active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="banner_status_Inactive" value="0">
                                    <label class="form-check-label" for="banner_status_Inactive">In-Active</label>
                                </div>
                            </div>
                            <div class="error-status"></div>
                        </div><!--end col-->
                        <div class="col-12">
                            <div>
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="editBannerImage">
                            </div>
                            <div class="error-image"></div>
                        </div><!--end col-->
                        <div class="col-12">
                            <div>
                                <label class="form-label">Preview</label>
                                <div class="image-preview">
                                    <img id="bannerImage" style="object-fit: contain;" src="" class="img-fluid w-100 h-100">
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->

                </div>
                <div class="modal-footer bg-light py-2">
                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submitEditForm" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('custom-script')

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>
    function bannerInfo(value) {
        $('#banner_id').val(value.attr('data-id'));
        $('#banner_title').val(value.attr('data-title'));
        $('#banner_description').val(value.attr('data-description'));
        if (value.attr('data-status') == 1) {
            $('#banner_status_active').prop('checked', true);
        } else {
            $('#banner_status_Inactive').prop('checked', true);
        }
        var image = value.attr('data-image');
        $('#bannerImage').attr("src", "{{ asset('') }}" + image);
    };

    //Edit Image Preview
    $("#editBannerImage").on("change", function(e) {

        f = Array.prototype.slice.call(e.target.files)[0]
        let reader = new FileReader();
        reader.onload = function(e) {

            $(".image-preview").html(
                `<img style="object-fit: contain;"  src="${e.target.result}" class="img-fluid w-100 h-100">`
            );
        }
        reader.readAsDataURL(f);
    });

    // Banner image preview
    $("#image").on("change", function(e) {

        f = Array.prototype.slice.call(e.target.files)[0]
        let reader = new FileReader();
        reader.onload = function(e) {

            $(".image-preview").html(
                `<img style="height: 100%; object-fit: contain;"  id="main_image_preview"  src="${e.target.result}" class="img-fluid w-100">`
            );
        }
        reader.readAsDataURL(f);
    });

    var notyf = new Notyf({
        duration: 3000,
        position: {
            x: 'right',
            y: 'top',
        },
    });

    //Add Banner
    $("#addBannerForm").on('submit', function(e) {
        e.preventDefault();
        var form = $('#addBannerForm')[0];
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            url: "{{ route('add-banners') }}",
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            mimeType: "multipart/form-data",
            beforeSend: function() {
                $("#submitForm").prop('disabled', true);
                $("#submitForm").html('Processing');
                $('.error-message').hide();
            },
            success: function(res) {
                $("#submitForm").attr('class', 'btn btn-success');
                $("#submitForm").html('Banner Added</>');
                if (res.success === true) {
                    notyf.success({
                        message: res.message,
                        duration: 3000
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 3200);
                } else {
                    notyf.error({
                        message: res.message,
                        duration: 3000
                    })
                }
            },
            error: function(e) {
                $("#submitForm").prop('disabled', false);
                $("#submitForm").html('Submit');

                if (e.responseJSON.errors['title']) {
                    $('.error-title').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['title'][0] + '</small>');
                }
                if (e.responseJSON.errors['description']) {
                    $('.error-description').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['description'][0] + '</small>');
                }

                if (e.responseJSON.errors['status']) {
                    $('.error-status').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['status'][0] + '</small>');
                }
                if (e.responseJSON.errors['image']) {
                    $('.error-image').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['image'][0] + '</small>');
                }

            }
        });
    });


    //Edit Banner
    $("#EditBannerForm").on('submit', function(e) {
        e.preventDefault();
        var form = $('#EditBannerForm')[0];
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            url: "{{ route('edit-banners') }}",
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            mimeType: "multipart/form-data",
            beforeSend: function() {
                $("#submitEditForm").prop('disabled', true);
                $("#submitEditForm").html('Processing');
                $('.error-message').hide();
            },
            success: function(res) {
                $("#submitEditForm").attr('class', 'btn btn-success');
                $("#submitEditForm").html('Banner Updated');
                if (res.success === true) {
                    notyf.success({
                        message: res.message,
                        duration: 3000
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 3200);
                } else {
                    $("#submitEditForm").prop('disabled', false);
                    $("#submitEditForm").html('Submit');
                    notyf.error({
                        message: res.message,
                        duration: 3000
                    })
                }
            },
            error: function(e) {
                $("#submitEditForm").prop('disabled', false);
                $("#submitEditForm").html('Submit');

                if (e.responseJSON.errors['title']) {
                    $('.error-title').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['title'][0] + '</small>');
                }
                if (e.responseJSON.errors['description']) {
                    $('.error-description').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['description'][0] + '</small>');
                }

                if (e.responseJSON.errors['status']) {
                    $('.error-status').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['status'][0] + '</small>');
                }
                if (e.responseJSON.errors['image']) {
                    $('.error-image').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['image'][0] + '</small>');
                }

            }
        });
    });

    //Delete Banner
    $(document).on('click', '.deleteRecord', function() {
        var id = $(this).attr('data-id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('delete_banner') }}",
                    dataType: 'json',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}',
                    },

                    beforeSend: function() {},
                    success: function(res) {
                        if (res.success == true) {
                            setTimeout(function() {
                                Swal.fire('Success!', res.Message, 'success');
                            }, 1500);
                            setTimeout(function() {
                                window.location.reload();
                            }, 3000);
                        } else {}
                    },
                    error: function(e) {}
                });
            }
        })
    });
</script>
@endsection