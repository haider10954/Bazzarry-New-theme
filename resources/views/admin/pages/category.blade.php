@extends('admin.layout.layout',['useAssets'=>['sweetAlert']])
@section('title','Categories')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Categories</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Categories</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div>
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <div>
                                            <h5 class="card-title mb-0">Category List</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="d-flex flex-wrap align-items-start gap-2">
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                               class="btn btn-success" id="addproduct-btn"><i
                                                    class="ri-add-line align-bottom me-1"></i> Add
                                                Category</a>
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control" id="myInput"
                                                       onkeyup="Search_Category()"
                                                       placeholder="Search Categories...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active fw-semibold" data-bs-toggle="tab"
                                                   href="#productnav-all" role="tab">
                                                    All <span
                                                        class="badge badge-soft-danger align-middle rounded-pill ms-1">{{$category->count()}}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                                   href="#productnav-published" role="tab">
                                                    Published <span
                                                        class="badge badge-soft-danger align-middle rounded-pill ms-1">{{$category->where('status','published')->count()}}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                                   href="#productnav-draft" role="tab">
                                                    Draft <span
                                                        class="badge badge-soft-danger align-middle rounded-pill ms-1">{{$category->where('status','draft')->count()}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <div id="selection-element">
                                            <div class="my-n1 d-flex align-items-center text-muted">
                                                Select
                                                <div id="select-content" class="text-body fw-semibold px-1"></div>
                                                Result
                                                <button type="button" class="btn btn-link link-danger p-0 ms-3"
                                                        data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card header -->
                            <div class="card-body">

                                <div class="tab-content text-muted">
                                    <div class="tab-pane active" id="productnav-all" role="tabpanel">


                                        <div class="table-responsive">
                                            <table class="table align-middle mb-0" id="table_category">
                                                <thead class="table-light">
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Sub Category No.</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($category as $item)
                                                        <tr>
                                                            <td>{{$loop->index+1}}</td>
                                                            <td>{{ chieldCategory($category,$item->id)->count() }}</td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}
                                                            </td>
                                                            <td>
                                                                {{$item->name}}
                                                            </td>
                                                            @if($item->status=='published')
                                                            <td>
                                                                <span class="badge badge-soft-success">{{$item->status}}</span>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <span class="badge badge-soft-warning">{{$item->status}}</span>
                                                            </td>
                                                            @endif
                                                            <td>
                                                                <span>
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-soft-secondary btn-sm dropdown"
                                                                                type="button" data-bs-toggle="dropdown"
                                                                                aria-expanded="false"><i
                                                                                class="ri-more-fill"></i></button>
                                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                                            <li><a class="dropdown-item edit-list"
                                                                                href="javascript:void(0);"
                                                                                onclick="edit_record('{{$item->id}} ','{{ $item->name }}')"
                                                                                ><i
                                                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                                            <li class="dropdown-divider"></li><li><a
                                                                                    class="dropdown-item remove-list deleteRecord"
                                                                                    href="javascript:void(0);"
                                                                                    data-id="{{ $item->id }}"><i
                                                                                        class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="4">
                                                            No Record Found..
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-between align-items-center pt-3">
                                                <div>Showing <b>1</b> to <b>10</b> of <b>12</b> results</div>
                                                <div>
                                                    <div class="">
                                                        <button tabindex="0" role="button" disabled="" title="Previous"
                                                                aria-label="Previous" class="btn btn-sm ">Previous
                                                        </button>
                                                        <button tabindex="0" role="button"
                                                                class="btn btn-sm btn-primary" title="Page 1"
                                                                aria-label="Page 1">1
                                                        </button>
                                                        <button tabindex="0" role="button" class="btn btn-sm"
                                                                title="Page 2" aria-label="Page 2">2
                                                        </button>
                                                        <button tabindex="0" role="button" title="Next"
                                                                aria-label="Next" class="btn btn-sm">Next
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end table -->
                                        </div>
                                        <!-- end table responsive -->


                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane" id="productnav-published" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table align-middle mb-0">
                                                <thead class="table-light">
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Added By</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($category->where('status','published') as $item)
                                                        <tr>
                                                            <td>{{$loop->index+1}}</td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}
                                                            </td>
                                                            <td>{{$item->name}}</td>
                                                            <td>admin</td>
                                                            <td>
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-placement="top"
                                                                           data-bs-original-title="Switch to Draft"
                                                                           {{ $item->status == 'published' ? 'checked' : '' }} switch="none"
                                                                           onchange="toogle_status({{ $item->id }})"
                                                                           role="switch" id="flexSwitchCheckDefault">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="4">
                                                            No Record Found..
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-between align-items-center pt-3">
                                                <div>Showing <b>1</b> to <b>10</b> of <b>12</b> results</div>
                                                <div>
                                                    <div class="">
                                                        <button tabindex="0" role="button" disabled="" title="Previous"
                                                                aria-label="Previous" class="btn btn-sm ">Previous
                                                        </button>
                                                        <button tabindex="0" role="button"
                                                                class="btn btn-sm btn-primary" title="Page 1"
                                                                aria-label="Page 1">1
                                                        </button>
                                                        <button tabindex="0" role="button" class="btn btn-sm"
                                                                title="Page 2" aria-label="Page 2">2
                                                        </button>
                                                        <button tabindex="0" role="button" title="Next"
                                                                aria-label="Next" class="btn btn-sm">Next
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end table -->
                                        </div>
                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table align-middle mb-0">
                                                <thead class="table-light">
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Added By</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($category->where('status','draft') as $item)
                                                        <tr>
                                                            <td>{{$loop->index+1}}</td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}
                                                            </td>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->status}}</td>
                                                            <td>
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-placement="top"
                                                                           data-bs-original-title="Switch to Publish"
                                                                           {{ $item->status == 'draft' ? '' : 'checked' }} switch="none"
                                                                           onchange="toogle_status_draft({{ $item->id }})"
                                                                           role="switch" id="flexSwitchCheckDefault1">

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="5">
                                                            <div class="no-record-section mx-auto text-center">
                                                                <img src="{{asset('admin_assets/images/error.svg')}}"
                                                                     alt="">
                                                                <span class="fw-bold fs-4 text-black-50">No Record Found..</span>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-between align-items-center pt-3">
                                                <div>Showing <b>1</b> to <b>10</b> of <b>12</b> results</div>
                                                <div>
                                                    <div class="">
                                                        <button tabindex="0" role="button" disabled="" title="Previous"
                                                                aria-label="Previous" class="btn btn-sm ">Previous
                                                        </button>
                                                        <button tabindex="0" role="button"
                                                                class="btn btn-sm btn-primary" title="Page 1"
                                                                aria-label="Page 1">1
                                                        </button>
                                                        <button tabindex="0" role="button" class="btn btn-sm"
                                                                title="Page 2" aria-label="Page 2">2
                                                        </button>
                                                        <button tabindex="0" role="button" title="Next"
                                                                aria-label="Next" class="btn btn-sm">Next
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end table -->
                                        </div>
                                    </div>
                                    <!-- end tab pane -->
                                </div>
                                <!-- end tab content -->

                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
@endsection
@section('modals')
    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
         aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('add_category')}}" id="add_category" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="cate_sel">
                                    <label class="form-label">Select Category</label>
                                    <select name="category" onchange="getChieldCategory($(this));" class="form-control mb-4">
                                        <option value="">Select Category</option>
                                        @foreach ($category->whereNull('parent_id') as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="firstName" class="form-label">Add Category</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter category name">
                                    @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="editCategoryModal" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModal">Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('edit_category')}}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <div>
                                    <label for="firstName" class="form-label">Edit Category</label>

                                    <input type="hidden" name="id" id="id" value="">
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Enter category name" id="category_name" value="">
                                    @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-script')
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script>

        $("#add_category").submit(function(){
            $("#add_category").append(`<input name="selected_cate" value="${selectedVal}" type="hidden">`);
        });

        var editModal = new bootstrap.Modal(document.getElementById("editCategory"), {});

        function edit_record(id, value) {
            $('#id').val(id);
            $('#category_name').val(value);
            editModal.show();
        }

        var notyf = new Notyf({
            duration: 3000,
            position: {
                x: 'right',
                y: 'top',
            },
        });

        //Change Status
        function toogle_status(id) {
            $.ajax({
                type: "POST",
                url: "{{route('change_status')}}",
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

        function toogle_status_draft(id) {
            $.ajax({
                type: "POST",
                url: "{{route('change_status_draft')}}",
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

        //End Change Status

        //Delete
        $(document).on('click', '.deleteRecord', function () {
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
                        url: "{{ route('delete_category') }}",
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

        //End Delete
        function Search_Category() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("table_category");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
