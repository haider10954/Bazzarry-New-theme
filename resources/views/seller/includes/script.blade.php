<!-- JAVASCRIPT -->
<script src="{{asset('seller_assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('seller_assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('seller_assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('seller_assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('seller_assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('seller_assets/js/plugins.js')}}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@if(in_array('dropzone',$useAssets))
    <!-- dropzone -->
    <script  type="text/javascript"  src="{{asset('seller_assets/js/multi-image-picker.js')}}"></script>
@endif
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@if(in_array('nouislider',$useAssets))
<!-- apexcharts -->
<script src="{{asset('seller_assets/libs/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('seller_assets/libs/wnumb/wNumb.min.js')}}"></script>
@endif

@if(in_array('gridjs',$useAssets))
<script src="{{asset('seller_assets/libs/gridjs/gridjs.umd.js')}}"></script>
<script src="https://unpkg.com/gridjs/plugins/selection/dist/selection.umd.js"></script>
@endif

@if(in_array('product_list',$useAssets))
    <script src="{{asset('seller_assets/js/pages/ecommerce-product-list.init.js')}}"></script>
@endif

@if(in_array('apexcharts',$useAssets))
<!-- apexcharts -->
<script src="{{asset('seller_assets/libs/apexcharts/apexcharts.min.js')}}"></script>
@endif

@if(in_array('formWizard',$useAssets))
<!-- apexcharts -->
<script src="{{asset('seller_assets/js/pages/form-wizard.init.js')}}"></script>
@endif

@if(in_array('jsvectormap',$useAssets))
<!-- Vector map-->
<script src="{{asset('seller_assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
<script src="{{asset('seller_assets/libs/jsvectormap/maps/world-merc.js')}}"></script>
@endif

@if(in_array('swiper',$useAssets))
<!--Swiper slider js-->
<script src="{{asset('seller_assets/libs/swiper/swiper-bundle.min.js')}}"></script>
@endif
@if(in_array('choices',$useAssets))
<!--Swiper slider js-->
<script src="{{asset('seller_assets/js/choices.min.js')}}"></script>
@endif
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

@if(in_array('dashboard',$useAssets))
<!-- Dashboard init -->
<script src="{{asset('seller_assets/js/pages/dashboard-ecommerce.init.js')}}"></script>
@endif

@if(in_array('product_details',$useAssets))
<!-- Product Details init -->
<script src="{{asset('seller_assets/js/pages/ecommerce-product-details.init.js')}}"></script>
@endif

@if(in_array('sweetAlert',$useAssets))
    <script src="{{asset('seller_assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
@endif

@if(in_array('ckeditor',$useAssets))
    <script src="{{asset('seller_assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
@endif
@if(in_array('datatable',$useAssets))
    <script src="{{asset('seller_assets/js/datatables.min.js')}}"></script>
@endif
<!-- App js -->
<script src="{{asset('seller_assets/js/app.js')}}"></script>
<script src="{{asset('seller_assets/js/custom.js')}}"></script>

<script>
    @if(request()->segment(2) == 'edit_product' || request()->segment(2) == 'add-product')
    let selectedVal = "";
    const categories = @json($category ?? []);
    let chain = [];
    @if($product->category_id ?? 0 > 0)
    chain.push({{ $product->category_id }});
    @endif
    let findChain = true;
    let idToFind = '{{ $product->category_id ?? 0 }}';
    while(findChain)
    {
        idToFind == 0 ? findChain = false : getChain();
    }
    function getChain()
    {
        $.each(categories,function(index,item){
            if(item.id == idToFind)
            {
                if(item.parent_id == null)
                {
                    findChain = false;
                }else{
                    findChain = true;
                    idToFind = item.parent_id;
                    chain.push(item.parent_id);
                }
            }
        });
    }

    for (let i = chain.length - 1; i >= 0; i--) {
        $(document).find("select[name=product_category]:last").val(chain[i]);
        $(document).find("select[name=product_category]:last").change();
    }

    for (const chainItem of chain) {
        console.log("The current element is: " + chainItem);
    }
    function getChieldCategory(selector,id = null)
    {
        let index = selector.parent().index();
        $(".center").each(function(){
            if($(this).index() > index)
            {
                $(this).remove();
            }
        });
        if(selector.val() == "")
        {
            return false;
        }
        selectedVal = selector.val();
        let options = ``;
        $.each(categories,function(index,item){
            if(item.parent_id == selector.val())
            {
                options += `<option value="${item.id}">${item.name}</option>`;
            }
        });
        if(options != "")
        {
            let html = `<div class="center">
            <select name="product_category" onchange="getChieldCategory($(this));" class="form-control mb-2" placeholder="Select Category">
                            <option value="">Select Category</option>
                            ${options}
                        </select>
                    </div>`;
            selector.parent().after(html);
        }
        $(document).find(".center").find("select").attr("name","");
        $(document).find(".center:last").find("select").attr("name","product_category");
    }
    @endif
</script>