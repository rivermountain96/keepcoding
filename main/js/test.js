let start = document.querySelector('#start');
let progress = document.querySelector('#progress');
let startBtn = document.querySelector('#start_btn');
let result = document.querySelector('#result');
let q = document.querySelector('.question');
let qAmt = qnaList.length;
let select = [];
let resultArray = [];
let card = document.querySelector('.test_card');
let title = document.querySelector('.test_title');

startBtn.addEventListener('click',function(){
  begin();
})

function begin(){
  card.style.backgroundColor = 'var(--mc-gray2)';
  title.style.color = 'var(--mc-gray1)';
  title.innerHTML = '진행도';
  start.classList.remove('active');
  progress.classList.add('active');
  let qidx = 0;
  goNext(qidx);
}

function goNext(qidx){
  if(qidx === qAmt){
    goResult();
  }else{
    q.innerHTML = qnaList[qidx].q;
    for(let i in qnaList[qidx].a){
      addAnswer(qidx,qnaList[qidx].a[i], i);
    }
    let pBar = document.querySelector('.progress-bar');
    pBar.style.width = (100/qAmt) * (qidx) + '%';
  }
}

function addAnswer(qidx, answerText, idx){
  let an = document.querySelector('.answer');
  let answer = document.createElement('button');
  let next = qidx + 1;
  an.appendChild(answer);
  answer.innerHTML = answerText.answer;

  answer.classList.add('btn');
  answer.classList.add('btn-outline-primary');
  
  answer.setAttribute('data-type',answerText.type);

  answer.addEventListener('click',function(){
    an.innerHTML = '';
    let type = this.getAttribute('data-type');
    let ntype = type.split(',');
    select.push(ntype);
    resultArray = [].concat(...select);
    goNext(next);
  })
}

function sort(arr){
  let sort = {};

  arr.forEach(function(item){
    if(sort[item]){
      sort[item]++;
    }else{
      sort[item] = 1;
    }
  });

  let sortedArray = Object.keys(sort).sort(function(a,b){
    return sort[b] - sort[a];
  });

  return sortedArray;
}

function goResult(){
  let sortedResult = sort(resultArray);
  let final = sortedResult[0];
  let filteredData = infoList.filter(function(item){
    return item.type === final;
  })

  let resultImg = result.querySelector('.result_img');
  let resultName = result.querySelector('.name');
  let resultSub = result.querySelector('.sub');
  let resultDesc = result.querySelector('.desc');
  let resultWork = result.querySelectorAll('.work li');

  resultImg.setAttribute('src',filteredData[0].img);
  resultName.innerHTML = filteredData[0].title;
  resultSub.innerHTML = filteredData[0].name;
  resultDesc.innerHTML = filteredData[0].desc;
  resultWork.forEach((item, idx)=>{
    item.innerHTML = filteredData[0].work[idx];
  })
  card.style.backgroundColor = 'var(--primary-color)';
  progress.classList.remove('active');
  title.innerHTML = '당신의 결과는';
  result.classList.add('active');
}





