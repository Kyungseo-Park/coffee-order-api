# Coffie order API
사내에서 사용하기 위한 커피 주문 앱 API 

## API TODO
 - `## 소셜로그인은 google 쓰는건 iam 발급때문에 무리가 있음. 그냥 초대 메일 + 이메일 인증`
 - 지역 (서울 오피스1, 서울 오피스2, 유럽1, 유럽2, 베트남).. 미국 법인 준비중으로 알고 있음
 - `## 지역 연관관계로 끼워야 함`
 - 카테고리 (한글이름, 영어이름, 노출여부-삭제)
 - 메뉴 (카테고리_id, 한글이름, 영어이름, 이미지, 노출여부-삭제, 카테고리)
 - 사용자 (이메일, 이름, 소셜id, 권한[사용자, 바리스타, 슈퍼관리자])
 - 주문 내역(날짜, 상태, 사용자id, 메뉴id, 푸시상태, 샷추가, 아이스or핫)

## Setting 
 - Frontend 는 submodule 을 통해 설치가 가능하다.
``` bash
git clone git@github.com:Kyungseo-Park/coffee-order-api.git
# git submodule add git@github.com:northfacegawd/coffee-order.git coffee-order
git submodule foreach git checkout master

## 작성중..
./run.sh
```

## 환경변수
 - .env.example 에 환경변수가 있다.
 - production 환경에서는 도커 이미지를 컨테이너로 생성할 때 덮어 씌우기 때문에 example 은 노출 되어도 된다.
