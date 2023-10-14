<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90 p-4">
                <div class="card-body">
                    <h4> Login Page </h4>
                    <br />
                    <form id="loginForm">
                        <input id="email" placeholder="User Email" class="form-control" type="email" />
                        <br />
                        <input id="password" placeholder="User Password" class="form-control" type="Password" />
                        <br />
                    </form>
                    <button type="button" onclick="SubmitLogin()" class="btn w-100 btn-primary">SignIn</button>
                    <hr />
                    <div class="float-end mt-3">
                        <span>
                            <a class="text-center ms-3 h6" href="{{ url('/Registration') }}">Sign Up</a>
                            <span class="ms-1">|</span>
                            <a class="text-center ms-3 h6" href="{{ url('/sendOtp') }}">Forget Password</a>
                        </span>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
<script>
    async function SubmitLogin() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        if (email.length === 0) {
            alert('Email is required');
        } else if (password.length === 0) {
            alert('Password is required');
        } else {
            try {
                let URL = "/UserLogin";
                let data = {
                    email: email
                    , password: password
                };

                showLoader();

                let res = await axios.post(URL, data);
                if (res.status === 200 && res.data['Status'] === 'Success') {
                    await new Promise(resolve => setTimeout(resolve, 3000));
                    window.location.href = "/Dashboard";
                    


                } else {
                    
                    alert(res.data['Message']);
                }
            } catch {
                alert("Something wrong during Login");
            } finally {
                hideLoader();
                document.getElementById('loginForm').reset();
            }
        }

    }

</script>
