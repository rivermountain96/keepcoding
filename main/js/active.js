$('.number').number(true);

//main 호버하면 아이콘 이미지 변경
  // li 요소 호버 시 이미지 변경
  $('.main_middlec_icon li').each(function() {
    const img = $(this).find('img');
    $(this).mouseover(function() {
      const altText = img.attr('alt').toLowerCase();
      img.attr('src', `../main/img/main_${altText}_hover.png`);
      img.addClass('hover-image'); // 호버 클래스 추가
    });

    // li 요소 호버 해제 시 원래 이미지로 복원
    $(this).mouseout(function() {
      const altText = img.attr('alt').toLowerCase();
      img.attr('src', `../main/img/main_${altText}.png`);
      img.removeClass('hover-image'); // 호버 클래스 제거
    });
  });