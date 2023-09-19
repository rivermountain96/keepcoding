/* DIALOG POPUP - 이강산 */
var popup = $(".popup");
var popup_closeBtn = popup.find("#close");
var popup_input = popup.find("#daycheck");

popup.find('.figma').click(function() {
  window.open('https://www.figma.com/file/uNjm1oLLgycPRqu5iTJ6eV/%EC%A3%BC%ED%86%A0%ED%94%BC%EC%95%84?type=design&node-id=0%3A1&mode=design&t=Q5eBnCRyS4PfGxTa-1', '_blank');
});

popup.find('.git').click(function() {
  window.open('https://github.com', '_blank');
});

// 쿠키 있는지 확인해서 popup 보일지 결정
function cookieCheck(name) {
  var cookieArr = document.cookie.split(';');
  var visited = false;

  for (var i = 0; i < cookieArr.length; i++) {
    if (cookieArr[i].trim().indexOf(name) === 0) {
      visited = true;
      break;
    }
  }

  if (!visited) {
    popup.attr('open', '');

  } else{

  }
}

// 쿠키 생성 함수
// function setCookie(name, cookieName, value, days) {
//   var date = new Date();
//   date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); // 현재 날짜에 일 수를 더해 만료일 설정
//   var expires = "expires=" + date.toUTCString();
//   document.cookie = name + "=" + value + ";" + expires + ";path=/";
// }

// cookieCheck('keepcoding');

// popup_closeBtn.click(function() {
//   popup.removeAttr('open');

//   if (popup_input.prop('checked')) {
//     setCookie('keepcoding', 'visited', 1); // 1일 동안 쿠키 설정
//   }
// });

/* 정이원 ID저장 & 이강산 DIALOG POPUP 쿠키 생성 */
function setCookie(cookieName, value, exdays){
  let exdate = new Date();
  exdate.setDate(exdate.getDate() + exdays);
  let cookieValue = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toGMTString());
  document.cookie = cookieName + "=" + cookieValue;
}

// 쿠키체크
cookieCheck('keepcoding');
popup_closeBtn.click(function() {
popup.removeAttr('open');
if (popup_input.prop('checked')) {
  setCookie('keepcoding', 'visited', 1); // 1일 동안 쿠키 설정
}
});

// 쿠키삭제
function deleteCookie(cookieName){
let expireDate = new Date();
expireDate.setDate(expireDate.getDate() - 1);
document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
}

// 쿠키 가져오기
function getCookie(cookieName) {
cookieName = cookieName + '=';
let cookieData = document.cookie;
let start = cookieData.indexOf(cookieName);
let cookieValue = '';
if(start != -1){
  start += cookieName.length;
  let end = cookieData.indexOf(';', start);
  if(end == -1)end = cookieData.length;
  cookieValue = cookieData.substring(start, end);
}
return unescape(cookieValue);
}

/* DIALOG POPUP - 이강산 */