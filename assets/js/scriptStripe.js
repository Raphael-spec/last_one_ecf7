$(function(){
    
    const stripe = Stripe("pk_test_51IdC0SEYTj0p2Az71UGhMihkoa7omy7zEhe6dSWpufYw5DdLSfFdIEidBSBsFLYUNTi0PO2fV0txacreIMFXJwah00bRcaIwXd");
    
    const checkoutButton = $("#checkout-button");
    checkoutButton.on('click',function(e){
        e.preventDefault();
        console.log($('#email').val())

       $.ajax({
           url:'index.php?action=pay',
           method:'post',
           data:{
               id:$('#id').val(),
               auteur:$('#auteur').val(),
               description:$('#description').val(),
               titre:$('#titre').val(),
               prix:$('#prix').val(),
               quantite:$('#quantite').val(),
               email:$('#email').val(),
            
           },
           datatype:'json',
           success:function(session){
               console.log(session);
               return stripe.redirectToCheckout({sessionId:session.id})
           },
           error:function(){
               console.log('fail to send!');
           }
       })
    });

    
})




//console.log(2000000)