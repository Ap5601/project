<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodalLabel">SignUP here for Idiscuss Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- form starts here......... -->
            <form action="/forum/partials/_handleSignup.php" method="POST">
                <div class="modal-body">
                <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            aria-describedby="emailHelp" placeholder="F-name L-name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Home Town</label>
                        <input type="text" class="form-control" id="htown" name="htown"
                            aria-describedby="emailHelp" placeholder="city, state">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">AGE</label>
                        <input type="text" class="form-control" id="age" name="age"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="signupemail" name="signupemail"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                    </div>
                    <button type="submit" class="btn btn-primary">SignUP</button>
                </div>
            </form>
             <!-- form ends here.............  -->
        </div>
    </div>
</div>