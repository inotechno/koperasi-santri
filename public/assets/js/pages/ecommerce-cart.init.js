var taxRate = 0,
    shippingRate = 0,
    discountRate = 0,
    currencySign = "Rp ";

function recalculateCart() {
    var t = 0;
    Array.from(document.getElementsByClassName("product")).forEach(function (
        e
    ) {
        // Array.from(e.getElementsByClassName("product-line-price")).forEach(
        //     function (e) {
        //         t += parseFloat(e.innerHTML);
        //     }
        // );
    });
    var e = t * taxRate,
        n = t * discountRate,
        r = 0 < t ? shippingRate : 0,
        c = t + e + r - n;
    // document.getElementById("cart-subtotal").innerHTML = currencySign + t.toFixed(2),
    //     document.getElementById("cart-tax").innerHTML = currencySign + e.toFixed(2),
    //     document.getElementById("cart-shipping").innerHTML = currencySign + r.toFixed(2),
    document.getElementById("cart-total").innerHTML =
        currencySign + c.toFixed(0);
    // document.getElementById("cart-discount").innerHTML = "-" + currencySign + n.toFixed(2)
}

function updateQuantity(e) {
    var t,
        n,
        r = e.closest(".product");
    (r || r.getElementsByClassName("product-price")) &&
        Array.from(r.getElementsByClassName("product-price")).forEach(function (
            e
        ) {
            t = parseFloat(e.innerHTML);
        }),
        e.previousElementSibling &&
        e.previousElementSibling.classList.contains("product-quantity")
            ? (n = e.previousElementSibling.value)
            : e.nextElementSibling &&
              e.nextElementSibling.classList.contains("product-quantity") &&
              (n = e.nextElementSibling.value);
    var c = t * n;
    Array.from(r.getElementsByClassName("product-line-price")).forEach(
        function (e) {
            (e.innerHTML = c.toFixed(0)), recalculateCart();
        }
    );
}
var removeProduct = document.getElementById("removeItemModal");
removeProduct &&
    removeProduct.addEventListener("show.bs.modal", function (t) {
        document
            .getElementById("remove-product")
            .addEventListener("click", function (e) {
                t.relatedTarget.closest(".product").remove(),
                    document.getElementById("close-modal").click(),
                    recalculateCart();
            });
    });
