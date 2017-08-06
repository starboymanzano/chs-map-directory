 var maxlength = 80;

  $('p.truncate').text(function (_, text) {
    return $.trim(text).substring(0, maxlength) + '...';
  });

  $('#default_datetimepicker').datetimepicker({
    minDate: 0,
    formatTime: 'h:i A',
    formatDate: 'Y M-d',
    timepickerScrollbar:false
    //onChangeDateTime: function(dp,$input){
                               //startDate = $("#default_datetimepicker").val();
                                                          // }
  });

  $('#default_datetimepickers').datetimepicker({
    minDate: 0,
    formatTime: 'h:i A',
    formatDate: 'Y M-d',
    timepickerScrollbar:false
     //onClose: function(current_time, $input){
                            //var endDate = $("#default_datetimepickers").val();
                            //if(startDate > endDate){
                              //alert("Please select correct date");
                                             //   }

             

           //}

  });