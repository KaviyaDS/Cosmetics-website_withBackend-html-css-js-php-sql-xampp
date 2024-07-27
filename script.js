// document.addEventListener('DOMContentLoaded', function () {
//     const cartButtons = document.querySelectorAll('button');

//     cartButtons.forEach(button => {
//         button.addEventListener('click', function () {
//             alert('This feature is under development.');
//         });
//     });
// });


// document.addEventListener('DOMContentLoaded', function () {
//     const buyNowButtons = document.querySelectorAll('.buy-now');

//     buyNowButtons.forEach(button => {
//         button.addEventListener('click', function () {
//             const productName = this.getAttribute('data-product');
//             const price = this.getAttribute('data-price');
//             window.location.href = `buy.html?product=${encodeURIComponent(productName)}&price=${encodeURIComponent(price)}`;
//         });
//     });

//     // Populate product details in the buy.html form
//     const urlParams = new URLSearchParams(window.location.search);
//     const productName = urlParams.get('product');
//     const price = urlParams.get('price');

//     if (productName && price) {
//         document.getElementById('product_name').value = productName;
//         document.getElementById('price').value = price;
//     }
// });

document.addEventListener('DOMContentLoaded', function () {
    const buyNowButtons = document.querySelectorAll('.buy-now');

    buyNowButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productName = this.getAttribute('data-product');
            const price = this.getAttribute('data-price');
            window.location.href = `buy.html?product=${encodeURIComponent(productName)}&price=${encodeURIComponent(price)}`;
        });
    });

    const urlParams = new URLSearchParams(window.location.search);
    const productName = urlParams.get('product');
    const price = urlParams.get('price');

    if (productName && price) {
        document.getElementById('product_name').value = productName;
        document.getElementById('price').value = price;
    }
});
