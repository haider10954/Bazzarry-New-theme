@extends('admin.layout.layout',['useAssets'=>['sweetAlert']])
@section('title','Admin-Dashboard')
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
                    <div class="card" id="customerList">
                        <div class="card-header border-bottom-dashed">

                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-title mb-0">Orders List</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-bottom-dashed border-bottom">
                            <form>
                                <div class="row g-3 justify-content-between">
                                    <div class="col-xl-4">
                                        <div class="search-box">
                                            <input type="text" class="form-control search" placeholder="Search Order...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                    <!--end col-->
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
                                    <th scope="col">Status</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Payment method</th>
                                    <th scope="col">Shipping method</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($orders->count() >0)
                                    @foreach($orders as $item)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>@if($item->status===0)
                                                <span
                                                    class="badge badge-soft-warning">Hold</span>
                                            @else
                                                <span
                                                    class="badge badge-soft-success">Sent</span>
                                            @endif
                                        </td>
                                        <td>Rs. {{$item->total}}</td>
                                        <td>{{$item->payment_method}}</td>
                                        <td>{{$item->shipping_method}}</td>
                                        <td>{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}</td>
                                        <td><span><div class="dropdown">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                                    <li><a class="dropdown-item" href="{{route('order-detail',$item->id)}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                                    <li class="dropdown-divider"></li><li><a class="dropdown-item deleteRecord" href="javascript:void(0);" data-id="{{ $item->id }}"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="6">Record Not Found...</td></tr>
                                @endif
                                </tbody>
                            </table>
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
                        url: "{{ route('delete-order') }}",
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
    </script>
@endsection
