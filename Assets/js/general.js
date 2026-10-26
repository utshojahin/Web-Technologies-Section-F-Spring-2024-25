$(document).ready(function(){
	var urlPath = window.location.pathname,
		urlPathArray = urlPath.split('.'),
		tabId = urlPathArray[0].split('/').pop();

	// Sub-pages that belong to a parent nav tab
	var tabMap = { questions: 'exam', enroll: 'exam', process_exam: 'view_exam', view_result: 'view_exam' };
	if (tabMap[tabId]) { tabId = tabMap[tabId]; }

	$('#exam, #question, #user, #enroll_exam, #view_exam, #process_exam').removeClass('active');
	$('#' + tabId).addClass('active');

	$('div[id^="expand"]').click(function(){
		$(this).next().show();
	});
});
