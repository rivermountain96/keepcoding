function kakaoShare(){
	Kakao.Share.sendDefault({
		objectType: 'text',
		text:
			'킵코딩에서 1분만에 나에게 맞는 IT 직군을 찾아보세요!',
		link: {
			mobileWebUrl: 'http://keepcoding.dothome.co.kr/keepcoding/main/index.php',
			webUrl: 'http://keepcoding.dothome.co.kr/keepcoding/main/index.php',
		}
	});
}