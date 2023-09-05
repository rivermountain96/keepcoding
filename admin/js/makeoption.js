
  $('#pcid1-1').on('change',function(){
    makeOption($(this),2, '중분류', $('#pcid3'));
  }); //Modal3 select change
  
  
  function makeOption(evt, step, category, target){
    let cate = evt.val();
    console.log(cate);
  
    let data = { 
      cate : cate,  //부모 분류의 cid
      step: step,
      category: category
    }

    $.ajax({
      async : false, //sucess의 결과 나오면 이후 작업 수행
      type: 'POST', //변수명cate1의 값을 전달할 방식 post      
      data: data, //data객체의 값을 data property 할당
      url: "printCate.php", 
      dataType: 'html', //success성공후 printOption.php가 반환하는 데이터의 형식  <option></option>
      error: function(error){
        console.log('Error:', error);
      },
      success: function(result){
        console.log(result);
        target.html(result);
      }
    });//ajax
  }