const qnaList = [
    {
      q: '전시회를 보는 것을 즐긴다',
      a: [
        { answer: 'YES', type:  ['publishing']},
        { answer: 'NO', type:  ['back','front','PM']}
      ]
    },
    {
      q: '1mm의 오차에도 민감한 편이다',
      a: [
        { answer: 'YES', type:  ['publishing','front']},
        { answer: 'NO', type:  ['back','PM']}
      ]
    },
    {
      q: '사람의 감정과 상황을 잘 이해한다',
      a: [
        { answer: 'YES', type:  ['PM','front']},
        { answer: 'NO', type:  ['back','publishing']}
      ]
    },
    {
      q: '경제적 여유만 된다면 항상 새로운 것을 배우며 살고싶다',
      a: [
        { answer: 'YES', type:  ['back','front']},
        { answer: 'NO', type:  ['publishing','PM']}
      ]
    },
    {
      q: '어릴 때 뭔가 만들어내는 공작시간을 좋아했다',
      a: [
        { answer: 'YES', type: ['back','front']},
        { answer: 'NO', type:  ['publishing','PM']}
      ]
    },
    {
      q: '하나를 끝까지 물고 늘어지는 끈기가 대단하다는 말을 들어봤다',
      a: [
        { answer: 'YES', type: ['back','front']},
        { answer: 'NO', type:  ['publishing','PM']}
      ]
    },
    {
      q: '일이 잘못될 때를 대비해 여러 대비책을 세우는 편이다',
      a: [
        { answer: 'YES', type: ['PM']},
        { answer: 'NO', type:  ['publishing','PM','front']}
      ]
    },
    {
      q: '사람들과 일하는 것보단 혼자 일하고싶다',
      a: [
        { answer: 'YES', type: ['back']},
        { answer: 'NO', type:  ['publishing','PM','front']}
      ]
    },
    {
      q: '단체활동에 참여하는 일을 즐긴다',
      a: [
        { answer: 'YES', type: ['PM']},
        { answer: 'NO', type:  ['publishing','PM','front']}
      ]
    },
    {
      q: '기계나 공장설비 등의 동작원리가 궁금하다',
      a: [
        { answer: 'YES', type: ['back','front']},
        { answer: 'NO', type:  ['publishing','PM']}
      ]
    },
    {
      q: '평생 창작과 복제중 하나만 해야한다면 복제를 택하겠다',
      a: [
        { answer: 'YES', type: ['publishing']},
        { answer: 'NO', type:  ['back','PM','front']}
      ]
    },
    {
      q: '기왕 만들거라면 눈에 보이지 않는 것보단 보이는 것을 만들고 싶다',
      a: [
        { answer: 'YES', type: ['publishing','front']},
        { answer: 'NO', type:  ['back','PM']}
      ]
    },
    {
      q: '단체에서 지도자 역할을 맡는 일은 가능한 피하고 싶다',
      a: [
        { answer: 'YES', type: ['publishing','front','back']},
        { answer: 'NO', type:  ['PM']}
      ]
    },
    {
      q: '왠지 모르게 항상 사람들을 중재하고 있다',
      a: [
        { answer: 'YES', type: ['front','PM']},
        { answer: 'NO', type:  ['back','publishing']}
      ]
    },
    {
      q: '효율적이지 못한 업무방식을 보면 답답하다',
      a: [
        { answer: 'YES', type: ['front','back']},
        { answer: 'NO', type:  ['PM','publishing']}
      ]
    },
    {
      q: '변화보다 안정을 추구한다',
      a: [
        { answer: 'YES', type: ['publishing']},
        { answer: 'NO', type:  ['PM','front','back']}
      ]
    },
    {
      q: '머리가 힘들 바에야 감정이나 몸이 힘든게 낫다',
      a: [
        { answer: 'YES', type: ['publishing','PM']},
        { answer: 'NO', type:  ['PM','back']}
      ]
    },
    {
      q: '혹시 실수가 있을까 이중, 삼중으로 체크하는 편이다',
      a: [
        { answer: 'YES', type: ['front','back']},
        { answer: 'NO', type:  ['PM','publishing']}
      ]
    },
    {
      q: '나는 성과 지향적이며 책임감이 강하다',
      a: [
        { answer: 'YES', type: ['front','back','PM']},
        { answer: 'NO', type:  ['PM']}
      ]
    },
    {
      q: '수학의 매력은 명확한 답이 있다는 것이다',
      a: [
        { answer: 'YES', type: ['back']},
        { answer: 'NO', type:  ['PM','front','publishing']}
      ]
    },
    {
      q: '언제나 물건이 딱딱 제자리에 있는 것이 좋다',
      a: [
        { answer: 'YES', type: ['publishing']},
        { answer: 'NO', type:  ['PM','back','front']}
      ]
    },
    {
      q: '관찰력이 좋다는 말을 많이 들어봤다',
      a: [
        { answer: 'YES', type: ['publishing']},
        { answer: 'NO', type:  ['PM','back','front']}
      ]
    },
    {
      q: '나는 일처리가 빠른 편이다',
      a: [
        { answer: 'YES', type: ['publishing']},
        { answer: 'NO', type:  ['PM','back','front']}
      ]
    },
    {
      q: '의견을 조율하고 타인에게 맞추는 것에 거리낌없다',
      a: [
        { answer: 'YES', type: ['publishing','PM']},
        { answer: 'NO', type:  ['front','back']}
      ]
    }
  ]
  
  const infoList = [
    {
      title: '퍼블리셔',
      img: './img/publ.png',
      type: 'publishing',
      name: '디자인과 구현을 이어주는 다리',
      desc: '꼼꼼한 눈에 디자인적 감각까지 갖춘 당신! 어쩌면 퍼블리셔가 천직일지도?',
      work: ['텍스트, 이미지 및 다른 콘텐츠를 문서나 웹 페이지에 레이아웃화하고 조직합니다.','디자인 원칙을 적용하여 시각적으로 매력적인 콘텐츠를 제작하고 수정합니다.',' 문서나 웹 페이지의 형식과 디자인을 유지하며 정확성과 일관성을 유지합니다.','클라이언트와 협업하여 디자인 요구사항을 이해하고 구현합니다.','여러 프로젝트의 레이아웃 및 디자인을 효율적으로 관리하며 고객이나 독자들에게 시각적으로 높은 품질의 콘텐츠를 제공합니다.']
    },
    {
      title: '프론트엔드 개발자',
      img: './img/front.png',
      type: 'front',
      name: '사용자가 보는 모든것을 책임진다',
      desc: '디자인 이해도는 물론 개발자의 자질까지 갖춘 당신! 어쩌면 프론트엔드 개발자가 천직일지도?',
      work: ['웹 애플리케이션의 사용자 인터페이스를 개발하고 디자인합니다.','HTML, CSS, JavaScript를 사용하여 웹 페이지의 시각적 요소와 상호작용을 구현합니다.','웹 브라우저 호환성을 고려하며 다양한 디바이스와 브라우저에서 일관된 사용자 경험을 제공합니다.','디자이너와 협업하여 디자인 요구사항을 이해하고 구현합니다.','사용자 피드백을 받아 UI/UX를 개선하고 웹 애플리케이션의 성능을 향상시킵니다.']
    },
    {
      title: '백엔드 개발자',
      img: './img/back.png',
      type: 'back',
      name: '데이터는 내게 맡겨',
      desc: '수학적 머리는 물론 끈기까지 갖춘 당신! 어쩌면 백엔드 개발자가 천직일지도?',
      work: ['서버 측 애플리케이션을 개발하고 유지보수합니다.','데이터베이스와의 상호작용을 통해 웹 애플리케이션의 백엔드 로직을 구축합니다.','시스템 아키텍처를 설계하고 성능을 최적화하여 안정적으로 동작하도록 합니다.','보안 취약점을 식별하고 예방하며 사용자 데이터를 안전하게 관리합니다.','팀과 협업하여 웹 애플리케이션의 기능과 성능을 지속적으로 개선합니다.']
    },
    {
      title: 'PM',
      img: './img/pm.png',
      type: 'PM',
      name: '모두를 조율하는 지휘자',
      desc: '남을 이해하는 자세와 마음을 갖춘 당신! 어쩌면 PM이 천직일지도?',
      work: ['프로젝트 목표와 요구사항을 정의하고 문서화합니다.','팀 구성원 간의 의사 소통을 중개하고 프로젝트 일정을 관리합니다.','프로젝트 범위와 예산을 설정하고 추적합니다.','비즈니스 목표를 이해하고 기술적 솔루션을 제안하여 프로젝트의 전략을 개발합니다.','변화에 대비하고 프로젝트 일정 및 목표를 조정하며 프로젝트가 성공적으로 완료되도록 관리합니다.']
    }
  ]