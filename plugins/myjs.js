function Insert_record()
{
   $(document).on('click','#btn_register',function()
   {
        var User = $('#UserName').val();
        var Email = $('#UserEmail').val();

        if(User == "" || Email=="")
        {
            $('#message').html('Please Fill in the Blanks ');
        }
        else
        {
            $.ajax(
                {
                    url : 'insert.php',
                    method: 'post',
                    data:{UName:User,UEmail:Email},
                    success: function(data)
                    {
                        $('#message').html(data);
                        $('#Registration').modal('show');
                        $('form').trigger('reset');
                        view_record();
                    }
                })
        }
        
   })

   $(document).on('click','#btn_close',function()
   {
       $('form').trigger('reset');
       $('#message').html('');
   })   
}