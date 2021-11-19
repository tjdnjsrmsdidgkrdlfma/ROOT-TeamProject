//---------------------슬라이드---------------------
//변수선언
const slides=document.querySelector('.slides');//전체 슬라이드 컨네이너
const slidImg=document.querySelectorAll('.slides');//모든 슬라이드들
let currentIdx=0;//현재 슬라이드 index
const slideCount=slideImg.length;//슬라이드 개수
const prev=document.querySelector('.left');//이전 버튼(왼쪽 화살표)
const prev=document.querySelector('.right');//다음 버튼(오른쪽 화살표)