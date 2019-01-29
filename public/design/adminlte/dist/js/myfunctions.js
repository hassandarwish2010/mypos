function check_all(){
    $('input[class="item_checkbox"]:checkbox').each(function(){
       if($('input[class="check_all"]:checkbox:checked').length==0){
         $(this).prop('checked',flase);
       }else{
        $(this).prop('checked',true);
       }
    });
  
  }

  function delete_all(){
    $(document).on('click','.del_all',function(){
        $('#form-data').submit();
    });

      $(document).on('click','.delBtn',function(){
          var checked_item= $('input[class="item_checkbox"]:checkbox').filter(':checked').length;
          if(checked_item > 0){
              $('.not-empty-record').removeClass('hidden');
              $('.recored_count').text(checked_item);
              $('.empty-record').addClass('hidden');
          }else{
            $('.not-empty-record').addClass('hidden');
            $('.empty-record').removeClass('hidden');
            $('.recored_count').text('');
          }

          $('#multibalDelete').modal('show');
      });
  }