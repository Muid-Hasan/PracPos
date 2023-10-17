<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90 p-4">
                <div class="card-body">
                    <form id="profileUpdateForm">
                        <h4> User Profile </h4>
                        <br />
                        <label>First Name</label>
                        <br />
                        <input readonly id="firstName" class="form-control" type="text" />
                        <br />
                        <label>Last Name</label>
                        <br />
                        <input readonly id="lastName"  class="form-control" type="text" />
                        <br />
                        <label>Mobile Number</label>
                        <br />
                        <input readonly id="mobile"class="form-control" type="text" />
                        <br />
                        <label>Email</label>
                        <br />
                        <input readonly id="email"  class="form-control" type="email" />
                        <br />
                    </form>
                    <a href="{{ url('/UpdateUserProfilePage') }}" class="btn-link">Update</a>

                    

                    <hr />

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    UserProfile();
    async function UserProfile() {
       let res = await axios.get("/Userprofile");
        if (res.status === 200) {
            let data = res.data['data'];
            document.getElementById('firstName').value = data['firstName'];
            document.getElementById('lastName').value = data['lastName'];
            document.getElementById('mobile').value = data['mobile'];
            document.getElementById('email').value = data['email'];
        } else {
            alert(res.data['Message']);
        }
    }

</script>
