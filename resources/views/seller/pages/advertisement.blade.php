@extends('seller.layout.layout')
@section('title','Advertisement')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Advertisement</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bazzaary</a></li>
                            <li class="breadcrumb-item active">Advertisement</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="orderList">
                    <div class="card-header  border-0">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">My AD's</h5>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i>Create AD's</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#all" role="tab" aria-selected="true">
                                        All AD's <span class="badge bg-success ms-2">{{ $all_ADs->count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3 Delivered" data-bs-toggle="tab" id="Delivered" href="#active" role="tab" aria-selected="false">
                                        Active <span class="badge bg-warning ms-2">{{ $ADs_active->count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3 Pickups" data-bs-toggle="tab" id="Pickups" href="#in_active" role="tab" aria-selected="false">
                                        In-Active <span class="badge bg-danger ms-2">{{ $ADs_inactive->count() }}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="all" role="tabpanel">

                                    <!-- Striped Rows -->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Product Title</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($all_ADs->count() > 0)
                                            @foreach($all_ADs as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->index+1 }}</th>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->getProduct->title }}</td>
                                                @if ($item->status == 0)
                                                <td><span class="badge bg-danger">In Active</span></td>
                                                @else
                                                <td><span class="badge bg-success">Active</span></td>
                                                @endif

                                                <td><span class="text-danger">Delete</span></td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="5">
                                                    <div class="text-center mt-3 mb-3">No record Found</div>
                                                </td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="active" role="tabpanel">
                                    <!-- Striped Rows -->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Product Title</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($ADs_active->count() > 0)
                                            @foreach($ADs_active as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->index+1 }}</th>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->getProduct->title }}</td>
                                                @if ($item->status == 0)
                                                <td><span class="badge bg-danger">In Active</span></td>
                                                @else
                                                <td><span class="badge bg-success">Active</span></td>
                                                @endif

                                                <td><span class="text-danger">Delete</span></td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="5">
                                                    <div class="text-center mt-3 mb-3">No record Found</div>
                                                </td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="in_active" role="tabpanel">
                                    <!-- Striped Rows -->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Product Title</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($ADs_inactive->count() > 0)
                                            @foreach($ADs_inactive as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->index+1 }}</th>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->getProduct->title }}</td>
                                                @if ($item->status == 0)
                                                <td><span class="badge bg-danger">In Active</span></td>
                                                @else
                                                <td><span class="badge bg-success">Active</span></td>
                                                @endif

                                                <td><span class="text-danger">Delete</span></td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="5">
                                                    <div class="text-center mt-3 mb-3">No record Found</div>
                                                </td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel">Create AD's</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                    </div>
                                    <form id="addAdvertisement">
                                        @csrf
                                        <div class="modal-body" style="max-height: 550px" data-simplebar>
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter AD title" />
                                                <div class="error-title"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <input type="text" id="description" name="description" class="form-control" placeholder="Enter short description" />
                                                <div class="error-description"></div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="productname-field" class="form-label">Select Product</label>
                                                <select class="form-control" data-trigger name="product" id="productname-field">
                                                    <option value="" selected>Select Product</option>
                                                    @foreach ($product as $item)
                                                    <option value="{{ $item->id }}">{{ $item->title}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="error-product"></div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="date-field" class="form-label">Banner Image</label>
                                                <input type="file" id="date-field" name="banner_image" class="form-control" />
                                                <div class="error-image"></div>
                                            </div>
                                            <div class="col-12">
                                                <div>
                                                    <label class="form-label">Preview</label>
                                                    <div class="image-preview">
                                                        <p>Image Preview</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" id="submitEditForm" class="btn btn-success" id="edit-btn">Add AD's</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body p-5 text-center">
                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                                        <div class="mt-4 text-center">
                                            <h4>You are about to delete a order ?</h4>
                                            <p class="text-muted fs-15 mb-4">Deleting your order will remove all of your information from our database.</p>
                                            <div class="hstack gap-2 justify-content-center remove">
                                                <button class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                                <button class="btn btn-danger" id="delete-record">Yes, Delete It</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end modal -->
                    </div>
                </div>

            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
    <!-- container-fluid -->
</div>
@endsection


@section('custom-script')
<script>
    var notyf = new Notyf({
        duration: 3000,
        position: {
            x: 'right',
            y: 'top',
        },
    });
    $("#addAdvertisement").on('submit', function(e) {
        e.preventDefault();
        var form = $('#addAdvertisement')[0];
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            url: "{{ route('add-advertisement') }}",
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
                $("#submitEditForm").html('Added Successfully');
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

                if (e.responseJSON.errors['description']) {
                    $('.error-description').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['description'][0] + '</small>');
                }

                if (e.responseJSON.errors['title']) {
                    $('.error-title').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['title'][0] + '</small>');
                }


                if (e.responseJSON.errors['product']) {
                    $('.error-product').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['product'][0] + '</small>');
                }


                if (e.responseJSON.errors['banner_image']) {
                    $('.error-image').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['banner_image'][0] + '</small>');
                }
            }
        });
    });
</script>
@endsection