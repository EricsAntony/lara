$('body').on('click', '#buy_now', function(e){
    var totalAmount = Math.round($(this).attr("data-pno")*0.6);
    console.log(totalAmount);
    var doc_id =  $(this).attr("data-id");
    var email =  $(this).attr("data-email");
    var phone =  $(this).attr("data-phone");
    var name =  $(this).attr("data-name");
    var options = {
    "key": "rzp_test_FNMyiJmTkqVeYK",
    "amount": (totalAmount*100), // 2000 paise = INR 20
    "name": "Lara",
    "description": "Payment",
    "image": "https://uccollege.edu.in/wp-content/themes/uc-college/images/uc-college-aluva-logo.png",
    "prefill": {
              "name": name,
              "email": email,
              "contact": phone,
            },
            "readonly": { email: true, contact: true },
    "handler": function (response){
          $.ajax({
            url: '../../php/pp.php',
            type: 'post',
            data: {
                razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : doc_id,
            }, 
           
            success: function (msg) {
                $( "#here" ).load(window.location.href + " #here" );
               console.log("payment succcess");
               console.log(msg)
            }
        });
     
    },

    "theme": {
        "color": "#528FF0"
    }
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
  e.preventDefault();
  });
