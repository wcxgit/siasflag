$(function() {
	$("#slider").easySlider( {
		slideSpeed: 500,
		paginationSpacing: "15px",
		paginationDiameter: "12px",
		paginationPositionFromBottom: "20px",
		slidesClass: ".slides",
		controlsClass: ".controls",
		paginationClass: ".pagination"					
	});
});
function msg(){
	alert('暂未开放此功能！');
}
function log(){
	alert('请先登录！');
}