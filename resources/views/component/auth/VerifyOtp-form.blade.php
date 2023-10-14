<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90 p-4">
                <div class="card-body">
                    <h4> Verify OTP </h4>
                    <br />
                    <form id="verifyotpForm">
                        <input id="verifYOtp" placeholder="Enter Your Four Digit OTP" class="form-control" type="text" />
                        <br />
                    </form>
                    <button type="button" onclick="verifyOtp()" class="btn w-100 btn-primary">Next</button>
                    <hr />
                    <div class="float-end mt-3">
                        <span>
                            <a class="text-center ms-3 h6" href="{{ url('/sendOtp') }}">Send OTP Again</a>
                        </span>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    async function verifyOtp(){
        let otp= document.getElementById('verifYOtp').value;
        if(otp.length !==4){
            alert('Wrong OTP!');
        }
       else{
        try{ let URL='/VerifyOtp';
              let data={otp:otp, email:sessionStorage.getItem('email')};
              showLoader();
              let res= await axios.post(URL,data);
              if(res.status===200 && res.data['Status']==='Success'){
                await new Promise(resolve => setTimeout(resolve));
                alert(res.data['Message']);
                window.location.href='/Resetpassword';
                sessionStorage.clear();
               } 
             else{
                 alert(res.data['Message']);
               }
            }
            catch{
                alert("Something Worng! Try Again");
            }
            finally{
                hideLoader();
                document.getElementById('verifyotpForm').reset();
            }
          }
             
            
    }

</script>