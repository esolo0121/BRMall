


//
//	var ifraSrc1 = $("#ifra").attr("src");
//
//if(ifraSrc1==""){
//	$("#ifra").attr("src","../overview/overview.html"); 
//}
//
//
//
//
//
//window.onload=function(){
// var ifraSrc2 = $("#ifra").attr("src");
//	console.log(ifraSrc2);
//}
//
//var hash = location.hash;
//  if(!hash){
//  var ifraSrc2 = $("#ifra").attr("src");
//	console.log(ifraSrc2);
//  }

 

$(".logo-img").click(function(){
	
	$("#ifra").attr("src","../overview/overview.html"); 
})


var sysA = $(".system-box").find("a");
sysA.eq(0).click(function(){
	
	$("#ifra").attr("src","../mallsetting/mall-message.html"); 
})

sysA.eq(1).click(function(){	
	
})

//左边第二个边框
var fiveBox = $(".five-box");

fiveBox.eq(0).find(".word-a").click(function(){
	
	$("#ifra").attr("src","../overview/overview.html"); 
})

//第二个盒子
var firsthBox = fiveBox.eq(1).find(".second-list").eq(0).find(".word-a");

firsthBox.eq(0).click(function(){
	
	$("#ifra").attr("src","../mallsetting/mall-message.html"); 
})

firsthBox.eq(1).click(function(){
	
	$("#ifra").attr("src","../setting/area-set.html"); 
})
firsthBox.eq(2).click(function(){
	
	$("#ifra").attr("src","../setting/msm-template.html"); 
})

firsthBox.eq(3).click(function(){
	
	$("#ifra").attr("src","../setting/nav-list.html"); 
})

firsthBox.eq(4).click(function(){
	
	$("#ifra").attr("src","../setting/friendly-link.html"); 
})

firsthBox.eq(5).click(function(){
	
	$("#ifra").attr("src","../public/skip.html"); 
})

//第四个个盒子
var fourthBox = fiveBox.eq(1).find(".second-list").eq(4).find(".word-a");
fourthBox.eq(0).click(function(){
	
	$("#ifra").attr("src","../permission/admin-list.html"); 
})

fourthBox.eq(1).click(function(){
	
	$("#ifra").attr("src","../permission/role-manage.html"); 
})

fourthBox.eq(2).click(function(){
	
	$("#ifra").attr("src","../permission/resource-list.html"); 
})
fourthBox.eq(3).click(function(){
	
	$("#ifra").attr("src","../permission/admin-log.html"); 
})

fourthBox.eq(4).click(function(){
	
	$("#ifra").attr("src","../permission/supplier-list.html"); 
})
//左边第一个边框
//概览
var standList = $(".stand-list");

standList.eq(0).find(".stand-a").click(function(){
	
	$("#ifra").attr("src","../overview/overview.html"); 
})

//第一个

var firstStand = standList.eq(1).find(".stand-a");

firstStand.eq(0).click(function(){
	
	$("#ifra").attr("src","../mallsetting/mall-message.html"); 
})

firstStand.eq(1).click(function(){
	
	$("#ifra").attr("src","../member/member-mange.html"); 
})


firstStand.eq(4).click(function(){
	
	$("#ifra").attr("src","../permission/admin-list.html"); 
})



//隐藏边框

var HList = $(".hide-list");
HList.eq(0).find(".hide-name").eq(1).click(function(){

	$("#ifra").attr("src","../overview/overview.html"); 
})

var firstHList =HList.eq(1).find(".hide-icon").eq(0).find(".hide-name");

firstHList.eq(1).click(function(){

	$("#ifra").attr("src","../mallsetting/mall-message.html"); 
})

firstHList.eq(2).click(function(){

	$("#ifra").attr("src","../setting/area-set.html"); 
})
firstHList.eq(3).click(function(){

	$("#ifra").attr("src","../setting/msm-template.html"); 
})
firstHList.eq(4).click(function(){

	$("#ifra").attr("src","../setting/nav-list.html"); 
})
firstHList.eq(5).click(function(){

	$("#ifra").attr("src","../setting/friendly-link.html"); 
})
firstHList.eq(6).click(function(){

	$("#ifra").attr("src","../public/skip.html"); 
})


var fourHList =HList.eq(1).find(".hide-icon").eq(4).find(".hide-name");

fourHList.eq(1).click(function(){

	$("#ifra").attr("src","../permission/admin-list.html"); 
})

fourHList.eq(2).click(function(){

	$("#ifra").attr("src","../permission/role-manage.html"); 
})
fourHList.eq(3).click(function(){

	$("#ifra").attr("src","../permission/resource-list.html"); 
})
fourHList.eq(4).click(function(){

	$("#ifra").attr("src","../permission/admin-log.html"); 
})

fourHList.eq(5).click(function(){

	$("#ifra").attr("src","../permission/supplier-list.html"); 
})


