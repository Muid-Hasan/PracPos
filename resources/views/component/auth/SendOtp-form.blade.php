<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90 p-4">
                 <div class="card-body">
                     <h4> Send OTP </h4> 
                     <br/>
                     <form id="otpform">
                          <input id="email" placeholder="User Email" class="form-control" type="email"/>
                          <br/>
                     </form>
                     
                     <button type="button" onclick="SubmitOtp()" class="btn w-100 btn-primary">Next</button>
                     <hr/>
                 </div>

            </div>
        </div>
    </div>
</div>
<script>
   async function SubmitOtp(){
    let email= document.getElementById('email').value;
    if(email.length===0){
        
        alert ("Email Required!!");
    }
     else{
        try{
             let URL="/sendOtp";
             let data={
             email:email
            }
            showLoader();
             let res= await axios.post(URL,data);
             if(res.status===200 && res.data['email']===email){
           
                 
                  sessionStorage.setItem('email',email);
                  alert (res.data['Message']);
                  await new Promise(resolve => setTimeout(resolve));
                  window.location.href='/verifyOtp';
                  
                  }
              else{
                  
               
                 
                  alert (res.data['message']);
                  
                  
                  }

           
            }
            catch{
                alert ("Something Went Wrong");
                window.location.href='/Login';
            }
            finally{
                hideLoader();
                document.getElementById('otpform').reset();
            }
         }
   }




</script>