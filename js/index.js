function check(value,num){
  if(value.length > 0){
   	$("#span" + num).css("transition-duration", "0.5s");
    $("#span" + num).css("top", "-16px");
    $("#span" + num).css("font-size", "12px");
  }else{
    $("#span" + num).css("transition-duration", "0.5s");
    $("#span" + num).css("top", "0");
    $("#span" + num).css("font-size", "14px"); 
  }
  if(value.length === 0){
   	$("#span" + num).css("transition-duration", "0.5s");
    $("#span" + num).css("top", "0");
    $("#span" + num).css("font-size", "14px"); 
  }
  if(value.length > 0){
  	$("#span" + num).css("transition-duration", "0.5s");
    $("#span" + num).css("top", "-16px");
    $("#span" + num).css("font-size", "12px");
  }
  if(value.length == 0){
  	$("#span"+num).append('<div class="error"></div>');
  }else{
  	$(".error").empty();
  }
 }




(function($){

// var value1 = document.getElementById('item1').value;
// var value2 = document.getElementById('item2').value;
// var value3 = document.getElementById('item3').value;
// var value4 = document.getElementById('item4').value;
// var value5 = document.getElementById('item5').value;
// var value6 = document.getElementById('item6').value;
// var value7 = document.getElementById('item7').value;
// var value8 = document.getElementById('item8').value;

// 	$("#item1").focus(function(){
// 		$("#span1").css("transition-duration", "0.5s");
// 		$("#span1").css("top", "-16px");
// 		$("#span1").css("font-size", "12px");
// 	})

// 	if(value1.length < "1"){
// 		$("#span1").css("transition-duration", "0.5s");
//     	$("#span1").css("top", "0");
//     	$("#span1").css("font-size", "14px");
// 	}



// 	$("#item2").focus(function(){
// 		$("#span2").css("transition-duration", "0.5s");
// 		$("#span2").css("top", "-16px");
// 		$("#span2").css("font-size", "12px");
// 	})

// 	$("#item2").focusout(function(){
// 		$("#span2").css("transition-duration", "0.5s");
// 		$("#span2").css("top", "0");
// 		$("#span2").css("font-size", "14px");
// 	})



// 	$("#item3").focus(function(){
// 		$("#span3").css("transition-duration", "0.5s");
// 		$("#span3").css("top", "-16px");
// 		$("#span3").css("font-size", "12px");
// 	})

// 	$("#item3").focusout(function(){
// 		$("#span3").css("transition-duration", "0.5s");
// 		$("#span3").css("top", "0");
// 		$("#span3").css("font-size", "14px");
// 	})



// 	$("#item4").focus(function(){
// 		$("#span4").css("transition-duration", "0.5s");
// 		$("#span4").css("top", "-16px");
// 		$("#span4").css("font-size", "12px");
// 	})

// 	$("#item4").focusout(function(){
// 		$("#span4").css("transition-duration", "0.5s");
// 		$("#span4").css("top", "0");
// 		$("#span4").css("font-size", "14px");
// 	})



// 	$("#item5").focus(function(){
// 		$("#span5").css("transition-duration", "0.5s");
// 		$("#span5").css("top", "-16px");
// 		$("#span5").css("font-size", "12px");
// 	})

// 	$("#item5").focusout(function(){
// 		$("#span5").css("transition-duration", "0.5s");
// 		$("#span5").css("top", "0");
// 		$("#span5").css("font-size", "14px");
// 	})



// 	$("#item6").focus(function(){
// 		$("#span6").css("transition-duration", "0.5s");
// 		$("#span6").css("top", "-16px");
// 		$("#span6").css("font-size", "12px");
// 	})

// 	$("#item6").focusout(function(){
// 		$("#span6").css("transition-duration", "0.5s");
// 		$("#span6").css("top", "0");
// 		$("#span6").css("font-size", "14px");
// 	})



// 	$("#item7").focus(function(){
// 		$("#span7").css("transition-duration", "0.5s");
// 		$("#span7").css("top", "-16px");
// 		$("#span7").css("font-size", "12px");
// 	})

// 	$("#item7").focusout(function(){
// 		$("#span7").css("transition-duration", "0.5s");
// 		$("#span7").css("top", "0");
// 		$("#span7").css("font-size", "14px");
// 	})



// 	$("#item8").focus(function(){
// 		$("#span8").css("transition-duration", "0.5s");
// 		$("#span8").css("top", "-16px");
// 		$("#span8").css("font-size", "12px");
// 	})

// 	$("#item8").focusout(function(){
// 		$("#span8").css("transition-duration", "0.5s");
// 		$("#span8").css("top", "0");
// 		$("#span8").css("font-size", "14px");
// 	})


// 	$("#item9").focus(function(){
// 		$("#span9").css("transition-duration", "0.5s");
// 		$("#span9").css("top", "-26px");
// 		$("#span9").css("font-size", "12px");
// 	})

// 	$("#item9").focusout(function(){
// 		$("#span9").css("transition-duration", "0.5s");
// 		$("#span9").css("top", "-10px");
// 		$("#span9").css("font-size", "14px");
// 	})


// 	$("#item10").focus(function(){
// 		$("#span10").css("transition-duration", "0.5s");
// 		$("#span10").css("top", "-26px");
// 		$("#span10").css("font-size", "12px");
// 	})

// 	$("#item10").focusout(function(){
// 		$("#span10").css("transition-duration", "0.5s");
// 		$("#span10").css("top", "-10px");
// 		$("#span10").css("font-size", "14px");
// 	})



// 	$("#signinlink").on('click', function(){
// 		$("#signupmodal").modal('hide');
// 		$("#signinmodal").modal('show');
// 	})

// 	$("#signuplink").on('click', function(){
// 		$("#signinmodal").modal('hide');
// 		$("#signupmodal").modal('show');
// 	})
	
	//$('select').select2()
})(jQuery);

$(document).ready(function () {
      function formatResult (result){
          //console.log('%o', result);
          if (result.loading) return result.label;
          var html = '<div id="result" class="option">'+
          		'<input type="hidden" value="'+result.id+'" id="result">'+
                '<img src="' + result.image + '" class="optionimg">' +
                '<p class="optionlabel">'+result.label+'</p>'+
          '</div>';
          return html;
         
      };
      function formatResultTemplate (result){
      	 
          //console.log('%o', result);
          if (result.loading) return result.label;
          var html = '<div id="result" class="option">'+
          		'<input type="hidden" value="'+result.id+'" id="result">'+
                '<a href="test.php?id='+result.id+'"><p class="optionlabel">'+result.label+'</p>'+
                '</a></div>';
          return html;
         
      };
 
      $('#searchbarform').select2({
          //placeholder: "Search...",
          ajax: {
              url: '../search.php',
              dataType: 'json',
            data: function (params) {
            return {
                q: params.term // search term
            };
        },
              processResults: function (data) {
            // parse the results into the format expected by Select2.
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data
            return {
                results: data
            };
        },
              cache: true
          },
          templateResult : formatResult,
          templateSelection : formatResultTemplate,
          escapeMarkup: function(m) {
              // Do not escape HTML in the select options text
              return m;
           },
          minimumInputLength: 1
      });

});
