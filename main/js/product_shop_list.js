let cardHTML = "";
let elements = [];
$.getJSON("../data/product_shop_list.json", function (data) {
  // console.log(data);
  $.each(data, function (i, item) {
    cardHTML = `<div class='card sec2 text-center p-0' data-bs-theme='dark'>
    <a href='${item.href}'>
    <div class="card-img-top-wrap">
      <img src='${item.image}'class='card-img-top' alt='example img'>
      </div>
    </a>
      <div class='card-body z-3'>
        <p class='card-title text-center fw-semibold'><a href='${item.href}'>${item.card_title}</a></p>
        <a href='${item.href02}' class='btn btn-primary fs-10 mt-2'>${item.btn_cate}</a>
        <a href='${item.href03}' class='btn btn-primary fs-10 mt-2'>${item.btn_price}</a>
    </div></div>`;
    elements.push(cardHTML);
  });
  $(".card_list").append(elements);
});