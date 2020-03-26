
<script>
  
    
    $("#login").show();
    $("#signup").show();
    $("#showpassword").click(function(){
            if($('input[type="checkbox"]').is(':checked')== true){
                $('#inputPassword').attr('type', 'text') 
                $('#inputPassword2').attr('type', 'text') 
            }else{
                $('#inputPassword').attr('type', 'password') 
                $('#inputPassword2').attr('type', 'password') 
            }
        });
   
</script>
</body>


</html>