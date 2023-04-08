@extends('admin.layout.layout')
@section('title','ADs || Bazaarry')
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
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#all"
                                           role="tab" aria-selected="true">
                                            All AD's <span class="badge bg-success ms-2">{{ $all_ADs->count() }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-3 Delivered" data-bs-toggle="tab" id="Delivered"
                                           href="#active" role="tab" aria-selected="false">
                                            Active <span class="badge bg-warning ms-2">{{ $ADs_active->count() }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-3 Pickups" data-bs-toggle="tab" id="Pickups"
                                           href="#in_active" role="tab" aria-selected="false">
                                            In-Active <span
                                                class="badge bg-danger ms-2">{{ $ADs_inactive->count() }}</span>
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
                                                        <td>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                                                       data-bs-original-title="Switch to InActive"
                                                                       {{ $item->status == 1 ? 'checked' : '' }} switch="none"
                                                                       onchange="toogle_status_inactive({{ $item->id }})"
                                                                       role="switch" id="flexSwitchCheckDefault">
                                                            </div>
                                                        </td>
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
                                        <div class="table-responsive table-card mb-1">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Description</th>
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
                                                            <td>{{ $item->description }}</td>
                                                            <td>
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                           data-bs-toggle="tooltip" data-bs-placement="top"
                                                                           data-bs-original-title="Switch to Active"
                                                                           onchange="toogle_status({{ $item->id }})"
                                                                           role="switch" id="flexSwitchCheckDefault">
                                                                </div>
                                                            </td>

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
                            </div>
                            <!-- Modal -->
                            <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body p-5 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                       colors="primary:#405189,secondary:#f06548"
                                                       style="width:90px;height:90px"></lord-icon>
                                            <div class="mt-4 text-center">
                                                <h4>You are about to delete a order ?</h4>
                                                <p class="text-muted fs-15 mb-4">Deleting your order will remove all of
                                                    your information from our database.</p>
                                                <div class="hstack gap-2 justify-content-center remove">
                                                    <button
                                                        class="btn btn-link link-success fw-medium text-decoration-none"
                                                        data-bs-dismiss="modal"><i
                                                            class="ri-close-line me-1 align-middle"></i> Close
                                                    </button>
                                                    <button class="btn btn-danger" id="delete-record">Yes, Delete It
                                                    </button>
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

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
@section('custom-script')
    <script>
        var notyf = new Notyf({
            duration: 3000,
            position: {
                x: 'right',
                y: 'top',
            },
        });

        //Delete
        $(document).on('click', '.deleteRecord', function () {
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

                        beforeSend: function () {
                        },
                        success: function (res) {
                            if (res.success === true) {
                                setTimeout(function () {
                                    Swal.fire('Success!', res.Message, 'success');
                                }, 1500);
                                setTimeout(function () {
                                    window.location.reload();
                                }, 3000);
                            } else {
                            }
                        },
                        error: function (e) {
                        }
                    });
                }
            })
        });


        function toogle_status(id) {
            $.ajax({
                type: "POST",
                url: "{{route('advertisement_status_in_active')}}",
                dataType: 'json',
                data: {
                    'id': id,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend: function () {
                },
                success: function (res) {
                    if (res.success === true) {
                        notyf.success({
                            message: res.message,
                            duration: 3000
                        });
                        setTimeout(function () {
                            window.location.reload();
                        }, 3200);
                    } else {
                        notyf.error({
                            message: res.message,
                            duration: 3000
                        })
                    }

                },
                error: function (e) {
                }
            });
        }

        function toogle_status_inactive(id) {
            console.log(id);
            $.ajax({
                type: "POST",
                url: "{{route('advertisement_status_active')}}",
                dataType: 'json',
                data: {
                    'id': id,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend: function () {
                },
                success: function (res) {
                    if (res.success === true) {
                        notyf.success({
                            message: res.message,
                            duration: 3000
                        });
                        setTimeout(function () {
                            window.location.reload();
                        }, 3200);
                    } else {
                        notyf.error({
                            message: res.message,
                            duration: 3000
                        })
                    }

                },
                error: function (e) {
                }
            });
        }
    </script>
@endsection
