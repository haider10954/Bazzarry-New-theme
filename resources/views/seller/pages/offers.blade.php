@extends('seller.layout.layout' , ['useAssets'=>['sweetAlert']])
@section('title','Offers')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Orders</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Orders</li>
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
                            <h5 class="card-title mb-0 flex-grow-1">Offers</h5>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i>Create Offers</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active All py-3" data-bs-toggle="tab" href="#All" role="tab" aria-selected="true">
                                        <i class="ri-store-2-fill me-1 align-bottom"></i> All Offers <span class="badge bg-success align-middle ms-1">{{ $offers->count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3 Delivered" data-bs-toggle="tab" href="#Delivered" role="tab" aria-selected="false">
                                        <i class="ri-checkbox-circle-line me-1 align-bottom"></i> Active <span class="badge bg-warning align-middle ms-1">{{ $offers_active->count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3 Pickups" data-bs-toggle="tab" href="#Pickups" role="tab" aria-selected="false">
                                        <i class="ri-truck-line me-1 align-bottom"></i> In-Active <span class="badge bg-danger align-middle ms-1">{{ $offers_pending->count() }}</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="All" role="tabpanel">
                                    <div class="table-responsive table-card mb-1">
                                        <table class="table table-nowrap align-middle" id="orderTable">
                                            <thead class="text-muted table-light">
                                                <tr class="text-uppercase">
                                                    <th class="sort" data-sort="id">#</th>
                                                    <th class="sort" data-sort="image">Image</th>
                                                    <th class="sort" data-sort="description">Descripton</th>
                                                    <th class="sort" data-sort="product_title">Product Title</th>
                                                    <th class="sort" data-sort="amount">Discount %</th>
                                                    <th class="sort" data-sort="date">End Date</th>
                                                    <th class="sort" data-sort="status">Status</th>
                                                    <th class="sort" data-sort="city">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @if ($offers->count() > 0)
                                                @foreach ($offers as $item)
                                                <tr>
                                                    <td class="id">
                                                        {{ $item->getProduct->sku }}
                                                    </td>
                                                    <td class="image">
                                                        <a href="{{route('order-details')}}" class="fw-medium link-primary">
                                                            <div><img style="width: 50px; height:50px;" src="{{ asset($item->banner_image) }}"></div>
                                                        </a>
                                                    </td>
                                                    <td class="description">{{ Str::limit($item->description, 20) }}</td>
                                                    <td class="product_title">{{ $item->getProduct->title }}</td>
                                                    <td class="amount">{{ $item->Discount }}%</td>
                                                    @php
                                                    $split = explode(' ',$item->EndDate);
                                                    @endphp
                                                    
                                                    <td class="date">{{ $split[0] }} <small class="text-muted">{{ $split[1] }}</small></td>

                                                    @if ($item->status == 0)
                                                    <td class="status"><span class="badge badge-soft-warning text-uppercase">In Active</span>
                                                    </td>
                                                    @else
                                                    <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span>
                                                    </td>
                                                    @endif

                                                    <td>
                                                        <ul class="list-inline hstack gap-2 mb-0">
                                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                                <a href="{{route('order-details')}}" class="text-primary d-inline-block">
                                                                    <i class="ri-eye-fill fs-16"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                                <a href="#showModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
                                                                    <i class="ri-pencil-fill fs-16"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                                <a class="text-danger d-inline-block remove-item-btn deleteRecord" data-id="{{ $item->id }}">
                                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="8">
                                                        <div class="mt-3 mb-3">
                                                            <div class="text-center">
                                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>
                                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                                <p class="text-muted">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif

                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                                <div class="tab-pane" id="Delivered" role="tabpanel">
                                    <div class="table-responsive table-card mb-1">
                                        <table class="table table-nowrap align-middle" id="orderTable">
                                            <thead class="text-muted table-light">
                                                <tr class="text-uppercase">
                                                    <th class="sort" data-sort="id">#</th>
                                                    <th class="sort" data-sort="image">Image</th>
                                                    <th class="sort" data-sort="description">Descripton</th>
                                                    <th class="sort" data-sort="product_title">Product Title</th>
                                                    <th class="sort" data-sort="amount">Discount %</th>
                                                    <th class="sort" data-sort="date">End Date</th>
                                                    <th class="sort" data-sort="status">Status</th>
                                                    <th class="sort" data-sort="city">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @if ($offers_active->count() > 0)
                                                @foreach ($offers_active as $item)
                                                <tr>
                                                    <td class="id">
                                                        {{ $item->getProduct->sku }}
                                                    </td>
                                                    <td class="image">
                                                        <a href="{{route('order-details')}}" class="fw-medium link-primary">
                                                            <div><img style="width: 50px; height:50px;" src="{{ asset($item->banner_image) }}"></div>
                                                        </a>
                                                    </td>
                                                    <td class="description">{{ Str::limit($item->description, 20) }}</td>
                                                    <td class="product_title">{{ $item->getProduct->title }}</td>
                                                    <td class="amount">{{ $item->Discount }}%</td>
                                                    @php
                                                    $split = explode(' ',$item->EndDate);
                                                    @endphp
                                                    <td class="date">{{ $split[0] }} <small class="text-muted">{{ $split[1] }}</small></td>

                                                    @if ($item->status == 0)
                                                    <td class="status"><span class="badge badge-soft-warning text-uppercase">In Active</span>
                                                    </td>
                                                    @else
                                                    <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span>
                                                    </td>
                                                    @endif

                                                    <td>
                                                        <ul class="list-inline hstack gap-2 mb-0">
                                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                                <a href="{{route('order-details')}}" class="text-primary d-inline-block">
                                                                    <i class="ri-eye-fill fs-16"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                                <a href="#showModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
                                                                    <i class="ri-pencil-fill fs-16"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                                <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteOrder">
                                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="8">
                                                        <div class="mt-3 mb-3">
                                                            <div class="text-center">
                                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>
                                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                                <p class="text-muted">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif

                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                                <div class="tab-pane" id="Pickups" role="tabpanel">
                                    <div class="table-responsive table-card mb-1">
                                        <table class="table table-nowrap align-middle" id="orderTable">
                                            <thead class="text-muted table-light">
                                                <tr class="text-uppercase">
                                                    <th class="sort" data-sort="id">#</th>
                                                    <th class="sort" data-sort="image">Image</th>
                                                    <th class="sort" data-sort="description">Descripton</th>
                                                    <th class="sort" data-sort="product_title">Product Title</th>
                                                    <th class="sort" data-sort="amount">Discount %</th>
                                                    <th class="sort" data-sort="date">End Date</th>
                                                    <th class="sort" data-sort="status">Status Toggle</th>
                                                    <th class="sort" data-sort="city">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @if ($offers_pending->count() > 0)
                                                @foreach ($offers_pending as $item)
                                                <tr>
                                                    <td class="id">
                                                        {{ $item->getProduct->sku }}
                                                    </td>
                                                    <td class="image">
                                                        <a href="{{route('order-details')}}" class="fw-medium link-primary">
                                                            <div><img style="width: 50px; height:50px;" src="{{ asset($item->banner_image) }}"></div>
                                                        </a>
                                                    </td>
                                                    <td class="description">{{ Str::limit($item->description, 20) }}</td>
                                                    <td class="product_title">{{ $item->getProduct->title }}</td>
                                                    <td class="amount">{{ $item->Discount }}%</td>
                                                    @php
                                                    $split = explode(' ',$item->EndDate);
                                                    @endphp
                                                
                                                    <td class="date">{{ $item->EndDate }} <small class="text-muted">{{ $split[1] }}</small></td>

                                                    @if ($item->status == 0)
                                                    <td class="status"><span class="badge badge-soft-warning text-uppercase">In Active</span>
                                                    </td>
                                                    @else
                                                    <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span>
                                                    </td>
                                                    @endif

                                                    <td>
                                                        <ul class="list-inline hstack gap-2 mb-0">
                                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                                <a href="{{route('order-details')}}" class="text-primary d-inline-block">
                                                                    <i class="ri-eye-fill fs-16"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                                <a href="#showModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
                                                                    <i class="ri-pencil-fill fs-16"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                                <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteOrder">
                                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="8">
                                                        <div class="mt-3 mb-3">
                                                            <div class="text-center">
                                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>
                                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                                <p class="text-muted">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                    </div>
                                    <form id="addOfferForm">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" id="id-field" />

                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <input type="text" id="description" name="description" class="form-control" placeholder="Enter description" />
                                                <div class="error-description"></div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="product" class="form-label">Product</label>
                                                <select class="form-control" data-trigger name="product" id="product" onchange="CheckCategory($(this))">
                                                    <option value="" selected>Select Product</option>
                                                    @foreach ($product as $item)
                                                    <option value="{{ $item->id }}" data-id="{{ $item->category_id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="error-product"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="category" class="form-label">Category</label>
                                                <select class="form-control" name="category" id="category">
                                                    <option value="">Select Category</option>

                                                </select>
                                                <div class="error-category"></div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="date-field" class="form-label">Banner Image</label>
                                                <input type="file" name="banner_image" id="date-field" class="form-control" />
                                                <div class="error-image"></div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="date-field" class="form-label">End Date</label>
                                                <input type="time" name="end_date" id="date-field" class="form-control" data-provider="flatpickr" data-date-format="Y-m-d" data-enable-time required placeholder="Select date" />
                                                <div class="error-date"></div>
                                            </div>

                                            <div class="row gy-4 mb-3">
                                                <div class="col-md-12">
                                                    <div>
                                                        <label for="Discount" class="form-label">Discount %</label>
                                                        <input type="number" id="discount" name="Discount" class="form-control" placeholder="Total discount" />
                                                        <div class="error-discount"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success" id="submitEditForm">Add Offer</button>
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


    function CheckCategory(value) {
        var ProtuctID = value.find(":selected").val();
        var CategoryID = value.find(":selected").attr('data-id');

        $.ajax({
            type: "POST",
            url: "{{  route('CheckCategory')  }}",
            dataType: 'json',
            data: {
                CategoryID: CategoryID,
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function() {},
            success: function(res) {

                var category = res.Category;
                if (res.success === true) {
                    if (category.length > 0) {
                        $('#category').html('');
                        $('#category').append(`<option value="">Select Category</option>`)
                        for (var i = 0; i < category.length; i++) {
                            $('#category').append(`<option selected value="` + category[i]['id'] + `">` + category[i]['name'] + `</option>`)
                        }
                    } else {
                        $('#category').html('');
                        $('#category').append(`<option value="">Select Category</option>`)
                    }
                }
            },
            error: function(e) {}
        });
    };

    $("#addOfferForm").on('submit', function(e) {
        e.preventDefault();
        var form = $('#addOfferForm')[0];
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            url: "{{ route('add-offer') }}",
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
                if (e.responseJSON.errors['product']) {
                    $('.error-product').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['product'][0] + '</small>');
                }

                if (e.responseJSON.errors['category']) {
                    $('.error-category').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['category'][0] + '</small>');
                }
                if (e.responseJSON.errors['banner_image']) {
                    $('.error-image').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['banner_image'][0] + '</small>');
                }
                if (e.responseJSON.errors['end_date']) {
                    $('.error-date').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['end_date'][0] + '</small>');
                }
                if (e.responseJSON.errors['Discount']) {
                    $('.error-discount').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['Discount'][0] + '</small>');
                }

            }
        });
    });

    //Delete
    $(document).on('click', '.deleteRecord', function() {
        var id = $(this).attr('data-id');
        console.log(id);
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
                    url: "{{ route('delete_offer') }}",
                    dataType: 'json',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}',
                    },

                    beforeSend: function() {},
                    success: function(res) {
                        if (res.success === true) {
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