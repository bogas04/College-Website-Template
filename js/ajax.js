$(document).ready(function() {
  var reName = /[a-zA-Z ']/g;
  var reRoll = /[0-9]*\/MP\/[0-9]*/;
  var reEmail = /[\S]*@[\S]*\.[\S]*/;
  
  $('form[action="php/search.php"]').submit(function(e) {
    $.ajax({
      url : 'php/search.php', type : 'get', dataType : 'json', data : {name:$('form[action="php/search.php"] input[name="name"]').val(),roll:$('form[action="php/search.php"] input[name="name"]').val()} ,
      success : function(d) {
        
        if(d.error == 'none') {
          $('#results').html('<h2>'+d.count+' record(s) found!</h2><hr>');
          $('html,body').animate({scrollTop: $('#results').position().top}, 500);
          console.log(d.records);
          for(i = 0;i < d.count;i++) {
            r = d.records[i];
            console.log(r);
            $('#results').append('<div class="record"><img src="'+r.image+'"><h4>'+r.name+'</h4><span>'+r.rollnumber+'</span><a href="mailto:"'+r.email+'">'+r.email+'</div>');
          }
        } else if(d.count == 0 || d.error == 'empty'){
          $('#results').html('<h2>No records found!</h2><hr>');
          $('html,body').animate({scrollTop: $('#results').position().top}, 500);
        }
      }, error : function () {
        console.log('error in searching');
      }
    });
    e.preventDefault();
    return false;
  });
  $('form[action="php/addstudents.php"]').submit(function(e) {
    if(!$('form[action="php/addstudents.php"] input[name="name"]').val().match(reName)) {
      $('form[action="php/addstudents.php"] input[name="name"]').parent().addClass('has-error');
      $('form[action="php/addstudents.php"] input[name="name"]').popover({content:'Please enter valid name'});
      $('form[action="php/addstudents.php"] input[name="name"]').popover('show');
      e.preventDefault();
      return false;
    }
    if(!$('form[action="php/addstudents.php"] input[name="roll"]').val().match(reRoll)) {
      $('form[action="php/addstudents.php"] input[name="roll"]').parent().addClass('has-error');
      $('form[action="php/addstudents.php"] input[name="roll"]').popover({content:'Please enter valid roll number'});
      $('form[action="php/addstudents.php"] input[name="roll"]').val('');
      $('form[action="php/addstudents.php"] input[name="roll"]').popover('show');
      e.preventDefault();
      return false;
    }
    if(!$('form[action="php/addstudents.php"] input[name="email"]').val().match(reEmail)) {
      $('form[action="php/addstudents.php"] input[name="email"]').parent().addClass('has-error');
      $('form[action="php/addstudents.php"] input[name="email"]').popover({content:'Please enter a valid email'});
      $('form[action="php/addstudents.php"] input[name="email"]').val('');
      $('form[action="php/addstudents.php"] input[name="email"]').popover('show');
      e.preventDefault();
      return false;
    }
    if(!$('form[action="php/addstudents.php"] input[name="image"]').val()) {
      $('form[action="php/addstudents.php"] input[name="image"]').parent().addClass('has-error');
      $('form[action="php/addstudents.php"] input[name="image"]').popover({content:'Please select an image'});
      $('form[action="php/addstudents.php"] input[name="image"]').val('');
      $('form[action="php/addstudents.php"] input[name="image"]').popover('show');
      e.preventDefault();
      return false;
    }
    $('form[action="php/addstudents.php"]').submit();
  });
});