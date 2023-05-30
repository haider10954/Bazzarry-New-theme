@extends('admin.layout.layout')
@section('title','Product Variants')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Product Variants</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Product Variants</li>
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
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Product Variants List</h5>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-success waves-effect waves-light">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Hoverable Rows -->
                        <table class="table table-hover table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Variant Name</th>
                                    <th scope="col">Variant Values</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($variants->count() > 0)
                                @foreach ($variants as $value)
                                <tr>

                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $value->getCategory->name }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ implode(', ',$value->values->pluck('value')->toArray()) }}</td>

                                    <td>{{\Carbon\Carbon::parse($value->created_at)->format('d M, Y')}}</td>
                                    <td>
                                        <span class="btn btn-sm">
                                            <a href="javascript:void(0);" class="link-danger deleteRecord fs-15"><i class="ri-delete-bin-line"></i></a>
                                        </span>
                                        <span class="btn btn-sm">
                                            <a onclick="editVariant({{ $loop->index }},{{ $value->id }});" href="javascript:void(0);" class="link-success  fs-15"><i class="ri-pencil-fill"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5">
                                        <div class="mb-3 mt-4">
                                            No Record Found
                                        </div>
                                    </td>
                                </tr>
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


<!-- Default Modals -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add Variant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form action="{{ route('add-variant') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category">
                            Category
                        </label>
                        <select class="form-select mb-3" id="category" name="category" aria-label="Default select example">
                            <option value="">Select Category</option>
                            @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="variant-name">
                            Variant Name
                        </label>
                        <!-- Basic Input -->
                        <input type="text" class="form-control" id="variant-name" name="variant_name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Save Changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div id="updateVariant" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Variant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form action="{{ route('add-variant') }}" method="POST">
                @csrf
                <input type="hidden" name="type">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="variant-name">Variant Values</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="addInput();" class="btn btn-primary ">Add More</button>
                    <button type="submit" class="btn btn-primary ">Save Changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

@section('custom-script')
<script>

    function addInput()
    {
        $("#updateVariant .modal-body div:last").after(`<div class="d-flex mb-4">
                        <input type="text" class="form-control" id="variant-name" name="variant_value[]">
                        <button type="button" class="btn btn-danger" onclick="$(this).parent().remove();">Remove</button>
                    </div>`);
    }

    let variants = @json($variants);
    function editVariant(index,id)
    {
        $("#updateVariant input[name=type]").val(id);
        $("#updateVariant").modal("show");
        $.each(variants[index].values,function(index,item){
            $("#updateVariant .modal-body div:last").after(`<div class="d-flex mb-4">
                        <input type="text" class="form-control" id="variant-name" value="${item.value}" name="variant_value[]">
                        <button type="button" class="btn btn-danger" onclick="$(this).parent().remove();">Remove</button>
                    </div>`);
        });
    }
</script>
@endsection