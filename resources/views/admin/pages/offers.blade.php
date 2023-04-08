@extends('admin.layout.layout' , ['useAssets'=>['sweetAlert']])
@section('title','Offers')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Offers</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Offers</li>
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

                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Switch to InActive" {{ $item->status == 1 ? 'checked' : '' }} switch="none" onchange="toogle_status_inactive({{ $item->id }})" role="switch" id="flexSwitchCheckDefault">
                                                        </div>
                                                    </td>

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
                                                    <td class="date">{{ $split[0] }} <small class="text-muted">{{ $split[1] }}</small></td>

                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Switch to Active" {{ $item->status == 0 ? 'checked' : '' }} switch="none" onchange="toogle_status({{ $item->id }})" role="switch" id="flexSwitchCheckDefault">
                                                        </div>
                                                    </td>

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

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>
    var notyf = new Notyf({
        duration: 3000,
        position: {
            x: 'right',
            y: 'top',
        },
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
                    url: "{{ route('admin_delete_product_offer') }}",
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


    function toogle_status(id) {
        $.ajax({
            type: "POST",
            url: "{{route('change_offer_status_active')}}",
            dataType: 'json',
            data: {
                'id': id,
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function() {},
            success: function(res) {
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
            error: function(e) {}
        });
    }

    function toogle_status_inactive(id) {
        $.ajax({
            type: "POST",
            url: "{{route('change_offer_status')}}",
            dataType: 'json',
            data: {
                'id': id,
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function() {},
            success: function(res) {
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
            error: function(e) {}
        });
    }
</script>

@endsection