function redirect(url){ window.location.href = url; }
function openBlank(url){ window.open(url, '_blank'); }

function clearUserLog() {
	var del=confirm("Clear cannot be undone!\nAre you sure you want to clear log history?");
	if (del==true){
		$.ajax({
			url: 'user_log_clear.php',
			type: 'post',
			dataType: 'json',
			data: { user_id: encodeURIComponent(1)},
			beforeSend: function(x) {
                var triger_msg = '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> Please wait...</strong></div>';
				$('#notification-msg').html(triger_msg);
			},
			success: function(json) {
				if(json['resp']==1){
					var triger_msg = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> You have successfully cleared Log history!</div>';
	                    $('#notification-msg').html(triger_msg);
					setTimeout(function(){
						window.location.href = 'user_log.php';
					}, 2000);
				}else{
                    var triger_msg = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Failed while clearing Log history!</div>';
					$('#notification-msg').html(triger_msg);
				}
			}
		});	
	}
}

function clearErrorLog() {  
	var del=confirm("Clear cannot be undo!\nAre you sure you want to clear log history?");
	if (del==true){
	    $.ajax({
	        url: 'error_log_clear.php',
	        type: 'post',
	        dataType: 'json',
	        data: { user_id: encodeURIComponent(1) },
	        beforeSend: function (x) {
	            var triger_msg = '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Please Wait...</strong></div>';
	                    $('#notification-msg').html(triger_msg);
	        },
	        success: function (json) {
	            if (json['is_logged'] == 1) {
	                if (json['resp'] == 1) {
                        var triger_msg = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> You have successfully cleared Error history!</div>';
	                    $('#notification-msg').html(triger_msg);
	                    setTimeout(function () {
	                        window.location.href = 'error_log.php';
	                    }, 2000);
	                } else {
                        var triger_msg = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Failed while clearing Error history!</div>';
	                    $('#notification-msg').html(triger_msg);
	                }
	            }else{
	                redirect('index.php');  //redirect for login when user logged out
	            }
	        }
	    });
	}
}



/*Start SET TOTAL MARKS*/



/*End SET TOTAL MARKS*/

/* apply exam */

$(document).ready(function () {
	var disableCoueses=[];
	function makeCounter() {
        var count = 1;
        return function() {
            count++;
            return count;
        };
	};
	var counter = makeCounter();
	
    $("#add_course").click(function () {
		var n = counter();
		var retrievedObject = localStorage.getItem('course_list');
		var tr = document.createElement("tr");
		tr.id = n+'tr';
		$('#courses_table').append(tr);

		var td = document.createElement("td");
		td.id = n+'td';
		$('#'+n+'tr').append(td);

		var course_select = document.createElement("select");
		course_select.id = n+',0';
		course_select.name = n;
		$('#'+n+'td').append(course_select);
		$( "#"+n+'\\,0' ).addClass("form-control apply-course s-course");
		var course_option = document.createElement("option");
		course_option.value = '';
		course_option.innerText = "-- select option --";
		$('#'+n+'\\,0').append(course_option);

		$('#'+n+'td').append('&nbsp;&nbsp;&nbsp;');
		var radio_button1 = document.createElement("input");
		radio_button1.name=n+',1';
		$(radio_button1).attr('type','radio');
		$('#'+n+'td').append(radio_button1);
		//alert("[name="+n+",1]");
		$("input[name="+n+"\\,1]").addClass("exam-type");
		$('#'+n+'td').append(' Repeat &nbsp;');
		radio_button1.value='1';

		var radio_button2 = document.createElement("input");
		$('#'+n+'td').append(radio_button2);
		radio_button2.name=n+',1';
		$(radio_button2).attr('type','radio');
		$("input[name="+n+"\\,1]").addClass("exam-type");
		$('#'+n+'td').append(' Reregistration &nbsp;');
		radio_button2.value='2';
		
		var items = JSON.parse(retrievedObject);
		$.each(items, function(i, item) {
			var course_option = document.createElement("option");
			course_option.value = item.course_id;
			course_option.innerText = item.course_code+'|'+item.course_name+'|'+item.semester;
			$('#'+n+'\\,0').append(course_option);
		})
    });

    $(".current_semester").change(function () {
		var current_semester = $("#current_semester").val();
		var program_id = $("#program_id").val();
		if(current_semester > '0')
			getSubjectsUptoCurrentSemseter(current_semester,program_id);
    });

	function getSubjectsUptoCurrentSemseter(current_semester,program_id) {$.ajax({
		url: 'get_subject_upto_current_semester_ajax.php',
		type: 'post',
		dataType: 'json',
		data: { current_semester: current_semester, program_id:program_id },
		beforeSend: function (x) {
	        var triger_msg = '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Please wait...</strong></div>';
	        $('#notification-msg').html(triger_msg);
	    },
		success: function(data) {
			if (data['is_logged'] == 1) {
				if(data['resp']== 1){
					if(data['details']){
						$('#courses_table').empty();
						$("#add_course").css( "display", "block" );
						
						localStorage.setItem("course_list", JSON.stringify(data['details'])); 
						//start
						var tr = document.createElement("tr");
						tr.id = '1tr';
						$('#courses_table').append(tr);
						
						var td = document.createElement("td");
						td.id = '1td';
						$('#1tr').append(td);

						var course_select = document.createElement("select");
						course_select.id = '1,0';
						course_select.name = '1';
						$('#1td').append(course_select);
						$('#1td').append('&nbsp;&nbsp;&nbsp;');
						$("#1\\,0").addClass("form-control apply-course s-course");

						var radio_button1 = document.createElement("input");
						$(radio_button1).attr('type','radio');
						$('#1td').append(radio_button1);
						radio_button1.name='1,1';
						radio_button1.value='1';//for repeate

						$("#1\\,1").addClass("exam-type");
						$("input[name=1\\,1]").addClass("exam-type");
						$('#1td').append(' Repeat &nbsp;');


						var radio_button2 = document.createElement("input");
						$('#1td').append(radio_button2);
						$(radio_button2).attr('type','radio');
						radio_button2.name='1,1';
						$("input[name=1\\,1]").addClass("exam-type");
						$('#1td').append(' Reregistration &nbsp;');
						radio_button2.value='2';	//for reregistration

						var course_option = document.createElement("option");
						course_option.value = '';
						course_option.innerText = "-- select option --";
						$('#1\\,0').append(course_option);
						
						$.each(data['details'], function(i, item) {
							$('#1\\,0').append('<option class="" value="'+item.course_id+'">'+item.course_code+'|'+item.course_name+'|'+item.semester+'</option>');
						});
						$("#notification-msg").empty();
					}
					$("#notification-msg").empty();
					$('#notification-msg').html(data['details']);
				}else{
					$("#notification-msg").empty();
					var triger_msg = '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>'+data['details	']+'</strong></div>';
	        		$('#notification-msg').html(triger_msg);
					
				}
			}else{
				var triger_msg = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error! </strong>You are not authorised to access this page.</div>';
				$('#notification-msg').html(triger_msg);
				/* setTimeout(function () {
					redirect('index.php');//redirect for login when user logged out
				}, 5000); */
			}
		},
		error: function (xhr, ajaxOptions, thrownError){
			var triger_msg = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error! </strong>' + thrownError + '</div>';
			$('#notification-msg').html(triger_msg);
		}
	});}

	// Attach a delegated event handler
	$('#courses_table').on( "change", '.exam-type', function(event){
		var a = $(this).attr('name');
		var splitted = new Array();
		splitted = a.split(',');
		selectedCourseId=splitted[0];		
		//selectedCourse =  $('#'+selectedCourse+'option:selected').find(":selected").text;
		//selectedCourse = $('#'+selectedCourseId+'\\,0').find(":selected").text();
		var selectedCourseValue = $('#'+selectedCourseId+'\\,0').val();
		tdId = $(this).parent().attr('id');
		getCourseStructureById(selectedCourseValue, tdId, selectedCourseId);
	});

	function getCourseStructureById(selectedCourseValue, tdId, baseId) {		
		$.ajax({
				url: 'get_course_structure_ajax.php',
				type: 'post',
				dataType: 'json',
				data: { course_id: selectedCourseValue},
				beforeSend: function (x) {
					var triger_msg = '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Please wait...</strong></div>';
					$('#notification-msg').html(triger_msg);
				},
				success: function(data) {
					if (data['is_logged'] == 1) {
						if(data['resp']== 1){
							if(data['result']){
								result=data['result'];
								
								$('#'+tdId+'Div').remove();
								var checkboxDiv = document.createElement("div");
								checkboxDiv.id = tdId+'Div';
								$('#'+tdId).append(checkboxDiv);
								$('#'+tdId+'Div').addClass("inline");
								
								var checkwritten = document.createElement("input");
								$('#'+tdId+'Div').append(checkwritten);
								$(checkwritten).attr('type','radio');
								checkwritten.name=selectedCourseId+',2';
								checkwritten.id=selectedCourseId+',2';
								checkwritten.value = "3";
								$('#'+tdId+'Div').append(' written &nbsp;');
								$("#"+selectedCourseId+"\\,2").addClass("form-control top-10 width inline");
								
								var checkpractical = document.createElement("input");
								$('#'+tdId+'Div').append(checkpractical);
								$(checkpractical).attr('type','radio');
								checkpractical.name=selectedCourseId+',2';
								checkpractical.id=selectedCourseId+',3';
								checkpractical.value = '4';
								$('#'+tdId+'Div').append(' practical &nbsp;');
								$("#"+selectedCourseId+"\\,3").addClass("form-control top-10 width inline");

								//prject checkbox
								var checkproject = document.createElement("input");
								$('#'+tdId+'Div').append(checkproject);
								$(checkproject).attr('type','radio');
								checkproject.name=selectedCourseId+',2';
								checkproject.id=selectedCourseId+',4';
								checkproject.value='5';
								$('#'+tdId+'Div').append(' project &nbsp;');
								$('#'+tdId+'Div').append(' &nbsp; <b>Credit:</b> '+result.total_credit);
								$("#"+selectedCourseId+"\\,4").addClass("form-control top-10 width inline");

								//fee of exam selected course
								var exam_fee = document.createElement("input");
								$('#'+tdId+'Div').append(exam_fee);
								$(exam_fee).attr('type','hidden');
								exam_fee.name=selectedCourseId+',5';
								exam_fee.id=selectedCourseId+',5';
								var exam_type = $('input[name="'+baseId+'\\,1"]:checked').val();
								
								if(exam_type == '1'){
									$('#'+tdId+'Div').append(' &nbsp; <b>fee:</b> 300');
									exam_fee.value='300';
									if(result.lecture > '0'){
										$('#'+selectedCourseId+'\\,2').attr('disabled',false);
									}else{
										$('#'+selectedCourseId+'\\,2').attr('disabled',true);
									}
									
									if((result.practical>'0') || (result.tutorial>'0')){
										$('#'+selectedCourseId+'\\,3').attr('disabled',false);
									}else{
										$('#'+selectedCourseId+'\\,3').attr('disabled',true);
									}

									if(result.project > '0'){
										$('#'+selectedCourseId+'\\,4').attr('disabled',false);
									}else{
										$('#'+selectedCourseId+'\\,4').attr('disabled',true);
									}
								}else if(exam_type == '2'){
									$('#'+selectedCourseId+'\\,2').remove();
									$('#'+selectedCourseId+'\\,3').remove();
									$('#'+selectedCourseId+'\\,4').remove();

									var tempInput = document.createElement("input");
									$('#'+tdId+'Div').append(tempInput);
									$(tempInput).attr('type','hidden');
									tempInput.name=+selectedCourseId+',2';
									tempInput.value="on";
									$('#'+tdId+'Div').append(' &nbsp; <b>fee:</b> '+Math.round(result.re_registration_fee));
									exam_fee.value=Math.round(result.re_registration_fee);
								}
								$("#notification-msg").empty();
							}else{
								$("#notification-msg").empty();
								var triger_msg = '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>'+data['html']+'</strong></div>';								
								$('#notification-msg').html(triger_msg);
							}
						}else{
							
							$("#notification-msg").empty();
								var triger_msg = '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>'+data['html']+'</strong></div>';
								
								$('#notification-msg').html(triger_msg);
						}
					}else{
						
						var triger_msg = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error! </strong>You are not authorised to access this page.</div>';
						$('#notification-msg').html(triger_msg);
						/* setTimeout(function () {
							redirect('index.php');//redirect for login when user logged out
						}, 5000); */
					}
				},
				error: function (xhr, ajaxOptions, thrownError){
					var triger_msg = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error! </strong>' + thrownError + '</div>';
					$('#notification-msg').html(triger_msg);
				}
			});	 
		}

		$('#courses_table').on( "change", '.s-course', function(event){
			select_id = $(this).attr('id');
			var splitted = new Array();
			baseId = select_id.split(',');
			$('#'+baseId[0]+'tdDiv').remove();
		});
});



$(".release_date").change(function () {
	//input[name="'+baseId+'\\,1"]
	var radioValue = $('.release_date:checked').val();
	if(radioValue==1){
		$('input[name="TextBoxDate"]').attr('disabled',true);
	}else if(radioValue==2){
		$('input[name="TextBoxDate"]').attr('disabled',false);
	}
	var current_semester = $("#current_semester").val();
	var program_id = $("#program_id").val();
	if(current_semester > '0')
		getSubjectsUptoCurrentSemseter(current_semester,program_id);
});

