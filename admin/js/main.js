/* DIALOG POPUP - 이강산 */

var popup = $(".popup");
var popup_closeBtn = popup.find("#close");
var popup_input = popup.find("#daycheck");

popup.find('.figma').click(function() {
  window.open('figma', '_blank');
});

popup.find('.git').click(function() {
  window.open('https://github.com', '_blank');
});

//쿠키 있는지 확인해서 popup 보일지 결정
function cookieCheck(name) {
  var cookieArr = document.cookie.split(';');
  var visited = false;

  for (var i = 0; i < cookieArr.length; i++) {
    if (cookieArr[i].indexOf(name) > -1) {
      visited = true;
      break;
    }
  }

  if (!visited) {
    popup.attr('open', '');
  }
}

cookieCheck('keepcoding');

popup_closeBtn.click(function() {
  popup.removeAttr('open');

  if (popup_input.prop('checked')) {
    setCookie('keepcoding', 'popup', 1);
  } else {
    setCookie('keepcoding', 'popup', -1);
  }
});

//쿠키 만들기
function setCookie(name, value, day) {
  var date = new Date();
  date.setDate(date.getDate() + day);

  document.cookie = name + '=' + value + ';expires=' + date.toUTCString();
}
/* DIALOG POPUP - 이강산 */