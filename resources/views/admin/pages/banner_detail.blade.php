@extends('admin.layout.layout',['useAssets'=>['sweetAlert']])
@section('title','Categories')
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
                    <div class="card">
                        <div class="card-body">
                            <div class="row gx-lg-5">
                                <div class="col-xl-8 col-md-8 mx-auto">
                                    <div class="product-img-slider sticky-side-div">
                                        <img src="{{asset('assets/images/main-slider-banner/2.jpg')}}" alt="" class="img-fluid d-block" />
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-xl-4">
                                    <div class="mt-xl-0 mt-5">
                                        <div>
                                            <div class="d-flex justify-content-end mb-3">
                                                <a href="apps-ecommerce-add-product.html" class="btn btn-light me-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                                <a href="apps-ecommerce-add-product.html" class="btn btn-soft-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-delete-bin-5-line align-bottom"></i></a>
                                            </div>
                                            <div class="hstack gap-3 flex-wrap">
                                                <div><a href="#" class="text-primary d-block">Tommy Hilfiger</a></div>
                                                <div class="vr"></div>
                                                <div class="text-muted">Seller : <span class="text-body fw-medium">Zoetic Fashion</span></div>
                                                <div class="vr"></div>
                                                <div class="text-muted">Published : <span class="text-body fw-medium">26 Mar, 2021</span></div>
                                            </div>
                                            <div class="mt-4 text-muted">
                                                <h5 class="fs-14">Title :</h5>
                                                <p>Tommy Hilfiger men striped pink sweatshirt. featuring preppy with a twist designs.</p>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="mt-4 text-muted">
                                            <h5 class="fs-14">Description :</h5>
                                            <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs.</p>
                                        </div>
                                        <div class="mt-4">
                                            <span class="fs-14">Status :</span>
                                            <div class="badge rounded-pill bg-success mb-0">
                                                Active
                                            </div>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="row gx-lg-5">
                                <div class="col-xl-8 col-md-8 mx-auto">
                                    <div class="product-img-slider sticky-side-div">
                                        <img src="{{asset('assets/images/main-slider-banner/2.jpg')}}" alt="" class="img-fluid d-block" />
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-xl-4">
                                    <div class="mt-xl-0 mt-5">
                                        <div>
                                            <div class="d-flex justify-content-end mb-3">
                                                <a href="apps-ecommerce-add-product.html" class="btn btn-light me-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                                <a href="apps-ecommerce-add-product.html" class="btn btn-soft-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-delete-bin-5-line align-bottom"></i></a>
                                            </div>
                                            <div class="hstack gap-3 flex-wrap">
                                                <div><a href="#" class="text-primary d-block">Tommy Hilfiger</a></div>
                                                <div class="vr"></div>
                                                <div class="text-muted">Seller : <span class="text-body fw-medium">Zoetic Fashion</span></div>
                                                <div class="vr"></div>
                                                <div class="text-muted">Published : <span class="text-body fw-medium">26 Mar, 2021</span></div>
                                            </div>
                                            <div class="mt-4 text-muted">
                                                <h5 class="fs-14">Title :</h5>
                                                <p>Tommy Hilfiger men striped pink sweatshirt. featuring preppy with a twist designs.</p>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="mt-4 text-muted">
                                            <h5 class="fs-14">Description :</h5>
                                            <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs.</p>
                                        </div>
                                        <div class="mt-4">
                                            <span class="fs-14">Status :</span>
                                            <div class="badge rounded-pill bg-success mb-0">
                                                Active
                                            </div>
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
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <div class="modal fade" id="addBanner" tabindex="-1" aria-labelledby="addBannerModal" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light py-2">
                    <h5 class="modal-title" id="addBannerModal">Add Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" data-simplebar data-simplebar-auto-hide="false" style="max-height: 600px">
                    <form action="javascript:void(0);">
                        <div class="row g-3">
                            <div class="col-12">
                                <div>
                                    <label for="firstName" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter banner title">
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <label for="genderInput" class="form-label">Status</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="active" value="1" checked>
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="in-active" value="0">
                                        <label class="form-check-label" for="in-active">In-Active</label>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image">
                                </div>
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
                    </form>
                </div>
                <div class="modal-footer bg-light py-2">
                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
