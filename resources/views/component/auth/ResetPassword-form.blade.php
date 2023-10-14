<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90 p-4">
                 <div class="card-body">
                     <h4> Reset Password </h4> 
                     <br/>
                             <form id="resetForm">
                               <input id="newPassword" placeholder="Enter New Password" class="form-control" type="password"/>
                               <br/>
                               <input id="confirmNewPassword" placeholder="Confirm New Password" class="form-control" type="password"/>
                               <br/>
                             </form> 
                             <button type="button" onclick="ResetPass()" class="btn w-100 btn-primary">Confirm</button>
                     <hr/>
                 </div>

            </div>
        </div>
    </div>
</div>

<script>
    async  function ResetPass() {
        let password= document.getElementById('newPassword').value;
        let Cnpassword= document.getElementById('confirmNewPassword').value;

        if(password.length===0 && password.length!==6){
          alert ("New Password must have been six digit");
        }
        else if(Cnpassword.length===0 && Cnpassword.length!==6){
            alert ("Entire New Password accurately! ");
        }
        else if (password !== Cnpassword){
            alert("New Password Not matching!!!");
        }
        else{
            try{
                showLoader();
                let res= await axios.post('/ResetPassword',{
                password: password
            });
            if (res.Status===200){
                alert(res.data['Message']);
                await new Promise(resolve => setTimeout(resolve));
                
                }
            else{
                alert (res.data['Message'])
            }
            }
            catch{
                alert("Something Wrong! Try Again")
            }
            finally{
                document.getElementById('resetForm').reset();
                window.location.href='/Login';
                hideLoader();
            }
            
        }
        
    }
</script>