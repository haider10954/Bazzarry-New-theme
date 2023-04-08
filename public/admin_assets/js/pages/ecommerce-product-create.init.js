itemid = 13, ClassicEditor.create(document.querySelector("#ckeditor-classic")).then(function (e) {
    e.ui.view.editable.element.style.height = "200px"
}).catch(function (e) {
    console.error(e)
});
var dropzonePreviewNode = document.querySelector("#dropzone-preview-list");
dropzonePreviewNode.itemid = "";
var previewTemplate = dropzonePreviewNode.parentNode.innerHTML;
dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode);
var dropzone = new Dropzone(".dropzone", {
    url: "https://httpbin.org/post",
    method: "post",
    previewTemplate: previewTemplate,
    previewsContainer: "#dropzone-preview"
});
!function () {
    "use strict";
    var e = document.querySelectorAll(".needs-validation"), l = (new Date).toUTCString().slice(5, 16);

    function p() {
        var e = 12 <= (new Date).getHours() ? "PM" : "AM",
            t = 12 < (new Date).getHours() ? (new Date).getHours() % 12 : (new Date).getHours(),
            o = (new Date).getMinutes() < 10 ? "0" + (new Date).getMinutes() : (new Date).getMinutes();
        return t < 10 ? "0" + t + ":" + o + " " + e : t + ":" + o + " " + e
    }

    setInterval(p, 1e3), document.querySelector("#product-image-input").addEventListener("change", function () {
        var e = document.querySelector("#product-img"), t = document.querySelector("#product-image-input").files[0],
            o = new FileReader;
        o.addEventListener("load", function () {
            e.src = o.result
        }, !1), t && o.readAsDataURL(t)
    });
    var m = new Choices("#choices-category-input", {searchEnabled: !1}), g = sessionStorage.getItem("editInputValue");
    g && (g = JSON.parse(g), document.getElementById("formAction").value = "edit", document.getElementById("product-id-input").value = g.id, document.getElementById("product-img").src = g.product.img, document.getElementById("product-title-input").value = g.product.title, document.getElementById("stocks-input").value = g.stock, document.getElementById("product-price-input").value = g.price, document.getElementById("orders-input").value = g.orders, m.setChoiceByValue(g.product.category)), Array.prototype.slice.call(e).forEach(function (s) {
        s.addEventListener("submit", function (e) {
            if (s.checkValidity()) {
                e.preventDefault(), itemid++;
                var t, o = itemid, i = document.getElementById("product-title-input").value, r = m.getValue(!0),
                    n = document.getElementById("stocks-input").value,
                    u = document.getElementById("orders-input").value,
                    d = document.getElementById("product-price-input").value,
                    c = document.getElementById("product-img").src, a = document.getElementById("formAction").value;
                return "add" == a ? (o = null != sessionStorage.getItem("inputValue") ? (t = JSON.parse(sessionStorage.getItem("inputValue")), {
                    id: o + 1,
                    product: {img: c, title: i, category: r},
                    stock: n,
                    price: d,
                    orders: u,
                    rating: "--",
                    published: {publishDate: l, publishTime: p()}
                }) : (t = [], {
                    id: o,
                    product: {img: c, title: i, category: r},
                    stock: n,
                    price: d,
                    orders: u,
                    rating: "--",
                    published: {publishDate: l, publishTime: p()}
                }), t.push(o), sessionStorage.setItem("inputValue", JSON.stringify(t))) : "edit" == a ? (a = document.getElementById("product-id-input").value, sessionStorage.getItem("editInputValue") && (u = {
                    id: parseInt(a),
                    product: {img: c, title: i, category: r},
                    stock: n,
                    price: d,
                    orders: u,
                    rating: g.rating,
                    published: {publishDate: l, publishTime: p()}
                }, sessionStorage.setItem("editInputValue", JSON.stringify(u)))) : console.log("Form Action Not Found."), window.location.replace("apps-ecommerce-products.html"), !1
            }
            e.preventDefault(), e.stopPropagation(), s.classList.add("was-validated")
        }, !1)
    })
}();
