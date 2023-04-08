@extends('admin.layout.layout',['useAssets'=>['sweetAlert']])
@section('title','Sellers | Bazaarry')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Sellers</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bazaarry</a></li>
                            <li class="breadcrumb-item active">Sellers</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">Seller List</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 justify-content-between my-3">
                        <div class="col-xl-4">
                            <div class="search-box">
                                <input type="text" class="form-control" id="myInput" onkeyup="Search_Seller()" placeholder="Search seller...">
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
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover" id="table_seller">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($seller->count() > 0)
                            @foreach ($seller as $item)
                            <tr>
                                <td><a href="#" class="fw-semibold">{{ $loop->index+1 }}</a></td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>{{ $item->email }}</td>
                                <td>0{{ $item->phone_number }}</td>
                                @if ($item->status == 1)
                                <td><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                @else
                                <td><span class="badge bg-danger">Block</span></td>
                                @endif
                                <td>{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}</td>
                                <td>
                                    <span>
                                        <a href="javascript:void(0);" class="link-danger deleteRecord fs-15" data-id="{{ $item->id }}"><i class="ri-delete-bin-line"></i></a>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5">
                                    <div class="no-record-section mx-auto text-center">
                                        <img src="{{asset('admin_assets/images/error.svg')}}" alt="">
                                        <span class="fw-bold fs-4 text-black-50">No Record Found..</span>
                                    </div>

                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                    <!-- end table -->
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- Modal -->
<div class="modal fade zoomIn" id="addSeller" tabindex="-1" aria-labelledby="addSellerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSellerLabel">Add Seller</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-content border-0 mt-3">
                <ul class="nav nav-tabs nav-tabs-custom nav-success p-2 pb-0 bg-light" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="true">
                            Personal Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#businessDetails" role="tab" aria-selected="false">
                            Business Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#bankDetails" role="tab" aria-selected="false">
                            Bank Details
                        </a>
                    </li>
                </ul>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="firstnameInput" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastnameInput" placeholder="Enter your lastname">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="contactnumberInput" class="form-label">Contact Number</label>
                                        <input type="number" class="form-control" id="contactnumberInput" placeholder="Enter your number">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="phonenumberInput" class="form-label">Phone Number</label>
                                        <input type="number" class="form-control" id="phonenumberInput" placeholder="Enter your number">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="emailidInput" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="emailidInput" placeholder="Enter your email">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="birthdayidInput" class="form-label">Date of Birth</label>
                                        <input type="text" id="birthdayidInput" class="form-control" data-provider="flatpickr" placeholder="Enter your date of birth">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="cityidInput" class="form-label">City</label>
                                        <input type="text" class="form-control" id="cityidInput" placeholder="Enter your city">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="countryidInput" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="countryidInput" placeholder="Enter your country">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="zipcodeidInput" class="form-label">Zip Code</label>
                                        <input type="text" class="form-control" id="zipcodeidInput" placeholder="Enter your zipcode">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter description"></textarea>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button class="btn btn-link link-success text-decoration-none fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                        <button type="submit" class="btn btn-primary"><i class="ri-save-3-line align-bottom me-1"></i> Save</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <div class="tab-pane" id="businessDetails" role="tabpanel">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="companynameInput" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="companynameInput" placeholder="Enter your company name">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label">Company Type</label>
                                        <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                            <option value="">Select type</option>
                                            <option value="All" selected>All</option>
                                            <option value="Merchandising">Merchandising</option>
                                            <option value="Manufacturing">Manufacturing</option>
                                            <option value="Partnership">Partnership</option>
                                            <option value="Corporation">Corporation</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="pancardInput" class="form-label">Pan Card Number</label>
                                        <input type="text" class="form-control" id="pancardInput" placeholder="Enter your pan-card number">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="websiteInput" class="form-label">Website</label>
                                        <input type="url" class="form-control" id="websiteInput" placeholder="Enter your URL">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="faxInput" class="form-label">Fax</label>
                                        <input type="text" class="form-control" id="faxInput" placeholder="Enter your fax">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="companyemailInput" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="companyemailInput" placeholder="Enter your email">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="worknumberInput" class="form-label">Number</label>
                                        <input type="number" class="form-control" id="worknumberInput" placeholder="Enter your number">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="companylogoInput" class="form-label">Company Logo</label>
                                        <input type="file" class="form-control" id="companylogoInput">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button class="btn btn-link link-success text-decoration-none fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                        <button type="submit" class="btn btn-primary"><i class="ri-save-3-line align-bottom me-1"></i> Save</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <div class="tab-pane" id="bankDetails" role="tabpanel">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="banknameInput" class="form-label">Bank Name</label>
                                        <input type="text" class="form-control" id="banknameInput" placeholder="Enter your bank name">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="branchInput" class="form-label">Branch</label>
                                        <input type="text" class="form-control" id="branchInput" placeholder="Branch">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="accountnameInput" class="form-label">Account Holder Name</label>
                                        <input type="text" class="form-control" id="accountnameInput" placeholder="Enter account holder name">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="accountnumberInput" class="form-label">Account Number</label>
                                        <input type="number" class="form-control" id="accountnumberInput" placeholder="Enter account number">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ifscInput" class="form-label">IFSC</label>
                                        <input type="number" class="form-control" id="ifscInput" placeholder="IFSC">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button class="btn btn-link link-success text-decoration-none fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                        <button type="submit" class="btn btn-primary"><i class="ri-save-3-line align-bottom me-1"></i> Save</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal-->
@endsection

@section('custom-script')
<script>
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
                    url: "{{ route('delete_seller') }}",
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

    function Search_Seller() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("table_seller");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
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
