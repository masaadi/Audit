function limitTextLength($id){
    $.ajax({
      url: URL+"applicant/registration/get_note_by_id",
      type: 'POST',
      data: {id:$id},
      beforeSend: function () {
        $('.preloader').show();
      },
      success: function (response) {
        $('#CommonHead').html("Note");
        $('#CommonData').html(response);
        $('.preloader').fadeOut("slow");
      }
    });
  }