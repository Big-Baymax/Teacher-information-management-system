$(document).ready(function() {
	if(localStorage.a == 0) { //普通用户

		$.each($('tr'), function() {
			$(this).children("td:eq(-1),td:eq(-1),th:eq(-1),table th:eq(-2)").css('display', 'none');
		});
		$(".col-sm-3").hide();
	} 
	
	/*表格分页
	            ------------------------------------*/
	$(function() {
		$("div.holder").jPages({
			containerID: "itemContainer"
		});
	});

})