# ![Logo](https://www.dnsevercorp.com/assets/images/dnsever-logo.svg)

# Coffee Order API

[프론트엔드 레포지토리](https://github.com/northfacegawd/coffee-order) 는 여기서..

바빠 죽겠는데 카와이한 프론트앤드 개발자 [@northfacegawd](https://www.github.com/northfacegawd) 가 API 를 만들어 달라 해서 시작한 프로젝트

## Tech Stack

**사용중인거 >>>** PHP >=8.0, Laravel 9, Redis, JWT, selenium, MySQL, SES, S3

## environment

- .env.example 를 .env 로 복사해서 그대로 사용한다.
- [mailtrap](https://mailtrap.io/inboxes/754954/messages) 에 대한 환경변수는 은 저기서... 확인해야 한다. 
- 라고 할뻔 했지만, SES 사용하는걸로 ==> Slack에 올림

## Installation

- Docker, Docker Composer 가 설치 되어 있어야 함.
- 8000(API), 8001(phpmyadmin) 포트가 열려 있어야 함.

```bash
  # 로그 따위는 보지 못하도록 Producton 환경으로 개발하는게 찐 개발자. 
  git clone git@github.com:Kyungseo-Park/coffee-order-api.git
  cd coffee-order-api
  
  # 라고 하 뻔 했지만, 로컬 도커 환경 만들어야 함 
  # 스크립트 어떻게 짤지 구상 중    
  # 로컬실행과 프러덕션 실행에 따른 docker-compose 파일 분리 
  ./run.sh 
```

## API documents

스웨거로 작성 하려는데 기달리삼

- [Swagger](https://coffee-order-api.kkyungvelyy.com) API 문서 보러가기 

## Commit Convention

```bash
type(keword): :emoji: message  
```

### Commit Type

- feat: 새로운 기능 추가
- fix: 버그 수정
- docs: 문서 수정
- style: 코드 포맷팅, 세미콜론 누락, 코드 변경이 없는 경우
- refactor: 코드 리팩토링
- test: 테스크 코드, 리팩토링 테스트 코드 추가
- chore: 빌드 업무 수정, 패키지 매니저 수정, config 파일 수정

## DataBase TODO

- [x] `## 소셜로그인은 google 쓰는건 iam 발급때문에 무리가 있음. 그냥 초대 메일 + 이메일 인증`
- [x] 지역 (서울 오피스1, 서울 오피스2, 유럽1, 유럽2, 베트남).. 미국 법인 준비중으로 알고 있음
- [x] `## 지역 연관관계로 끼워야 함`
- [x] 카테고리 (한글이름, 영어이름, 노출여부-삭제)
- [x] 메뉴 (카테고리_id, 한글이름, 영어이름, 이미지, 노출여부-삭제, 카테고리)
- [x] 사용자 (이메일, 이름, 소셜id, 권한[사용자, 바리스타, 슈퍼관리자])
- [x] 주문 내역(날짜, 상태, 사용자id, 메뉴id, 푸시상태, 샷추가, 아이스or핫)

## API TODO

- [ ] ...

## Lessons Learned

개발하면서 작성 예정

## Authors

- [@kyungseo-park](https://www.github.com/kyungseo-park)

