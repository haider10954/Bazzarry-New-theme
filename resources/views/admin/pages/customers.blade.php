@extends('admin.layout.layout')
@section('title','Admin-Customers')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Customers</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Customers</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="customerList">
                        <div class="card-header border-bottom-dashed">

                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-title mb-0">Customer List</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-bottom-dashed border-bottom">
                            <form>
                                <div class="row g-3 justify-content-between">
                                    <div class="col-xl-4">
                                        <div class="search-box">
                                            <input type="text" class="form-control search"
                                                   placeholder="Search customer name...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6">
                                        <div class="row g-3 justify-content-end">
                                            <div class="col-sm-4">
                                                <div>
                                                    <div class="center">
                                                        <select name="sources" id="sources"
                                                                class="custom-select sources"
                                                                placeholder="Status">
                                                            <option value="all">All</option>
                                                            <option value="active">Active</option>
                                                            <option value="active">Block</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <div class="card-body">
                            <!-- Hoverable Rows -->
                            <table class="table table-hover table-nowrap mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Orders</th>
                                    <th scope="col">Join date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>#541254265</td>
                                    <td>Amezon</td>
                                    <td>Cleo Carson</td>
                                    <td>$4,521</td>
                                    <td>$4,521</td>
                                    <td><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                    <td>
                                        <span>
                                            <a href="javascript:void(0);" class="link-danger deleteRecord fs-15"><i class="ri-delete-bin-line"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#744145235</td>
                                    <td>Shoppers</td>
                                    <td>Juston Eichmann</td>
                                    <td>$7,546</td>
                                    <td>$7,546</td>
                                    <td><span class="badge badge-soft-danger text-uppercase">Block</span></td>
                                    <td>
                                        <span>
                                            <a href="javascript:void(0);" class="link-danger deleteRecord fs-15"><i class="ri-delete-bin-line"></i></a>
                                        </span>
                                    </td>
                                <tr>
                                    <td>#9855126598</td>
                                    <td>Flipkart</td>
                                    <td>Bettie Johson</td>
                                    <td>$1,350</td>
                                    <td>$1,350</td>
                                    <td><span class="badge badge-soft-danger text-uppercase">Block</span></td>
                                    <td>
                                        <span>
                                            <a href="javascript:void(0);" class="link-danger deleteRecord fs-15"><i class="ri-delete-bin-line"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#847512653</td>
                                    <td>Shoppers</td>
                                    <td>Maritza Blanda</td>
                                    <td>$4,521</td>
                                    <td>$4,521</td>
                                    <td><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                    <td>
                                    <span>
                                        <a href="javascript:void(0);" class="link-danger deleteRecord fs-15"><i class="ri-delete-bin-line"></i></a>
                                    </span>
                                    </td>
                                </tbody>
                            </table>
                            <div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-light p-3">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close" id="close-modal"></button>
                                        </div>
                                        <form class="tablelist-form" autocomplete="off">
                                            <div class="modal-body">
                                                <input type="hidden" id="id-field">

                                                <div class="mb-3" id="modal-id" style="display: none;">
                                                    <label for="id-field1" class="form-label">ID</label>
                                                    <input type="text" id="id-field1" class="form-control"
                                                           placeholder="ID" readonly="">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="customername-field" class="form-label">Customer
                                                        Name</label>
                                                    <input type="text" id="customername-field" class="form-control"
                                                           placeholder="Enter name" required="">
                                                    <div class="invalid-feedback">Please enter a customer name.</div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email-field" class="form-label">Email</label>
                                                    <input type="email" id="email-field" class="form-control"
                                                           placeholder="Enter email" required="">
                                                    <div class="invalid-feedback">Please enter an email.</div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="phone-field" class="form-label">Phone</label>
                                                    <input type="text" id="phone-field" class="form-control"
                                                           placeholder="Enter phone no." required="">
                                                    <div class="invalid-feedback">Please enter a phone.</div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="date-field" class="form-label">Joining Date</label>
                                                    <input type="text" id="date-field"
                                                           class="form-control flatpickr-input"
                                                           data-provider="flatpickr" data-date-format="d M, Y"
                                                           required="" placeholder="Select date" readonly="readonly">
                                                    <div class="invalid-feedback">Please select a date.</div>
                                                </div>

                                                <div>
                                                    <label for="status-field" class="form-label">Status</label>
                                                    <select name="sources" id="sources"
                                                            class="custom-select sources"
                                                            placeholder="Status">
                                                        <option value="active">Active</option>
                                                        <option value="active">Block</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-success" id="add-btn">Add
                                                        Customer
                                                    </button>
                                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" id="deleteRecord-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mt-2 text-center">
                                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                           colors="primary:#f7b84b,secondary:#f06548"
                                                           style="width:100px;height:100px"></lord-icon>
                                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                    <h4>Are you sure ?</h4>
                                                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this
                                                        record ?</p>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn w-sm btn-danger" id="delete-record">Yes, Delete It!</button>
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

