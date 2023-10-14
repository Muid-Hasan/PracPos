<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90 p-4">
                <div class="card-body">
                    <form id="registrationForm">
                        <h4> Registration </h4>
                        <br />
                        <input id="firstName" placeholder="Type Your First Name" class="form-control" type="text" />
                        <br />
                        <input id="lastName" placeholder="Type Your Last Name" class="form-control" type="text" />
                        <br />
                        <input id="mobile" placeholder="Type Your Mobile Number" class="form-control"
                            type="text" />
                        <br />
                        <input id="email" placeholder="User Email" class="form-control" type="email" />
                        <br />
                        <input id="password" placeholder="User Password" class="form-control" type="password" />
                        <br />
                    </form>
                    <button type="button" onclick="SubmitRegistrationForm()"
                        class="btn w-100 btn-primary">Complete</button>
                    <hr />

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    async function SubmitRegistrationForm() {

        let firstName = document.getElementById('firstName').value;
        let lastName = document.getElementById('lastName').value;
        let mobile = document.getElementById('mobile').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (firstName.length === 0) {
            alert('First Name required!');
        } else if (lastName.length === 0) {
            alert('Last Name required!');
        } else if (mobile.length === 0) {
            alert('Mobile Number required!');
        } else if (email.length === 0) {
            alert('Email required!');
        } else if (password.length === 0) {
            alert('Password required!');
        } else {
            try {
                let URL = '/UserRegistration';
                let data = {
                    firstName: firstName,
                    lastName: lastName,
                    mobile: mobile,
                    email: email,
                    password: password
                }
                showLoader();
                let res = await axios.post(URL, data);

                if (res.status === 200 && res.data['Status'] === 'Success') {

                    await new Promise(resolve => setTimeout(resolve, 3000));
                    alert(res.data['Message']);

                    window.location.href = '/Login'




                } else {
                    alert(res.data['Message']);
                }
            } catch {
                alert("Something Went wrong!!!")
            } finally {
                hideLoader();
                document.getElementById('registrationForm').reset();
            }
        }

    }
</script>
