@include('template.header')
@include('template.navbar')

<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form_login">
            <div class="container">
                <h3>User Profile</h3>
                <hr>
                <form action="{{ route('updateProfile') }}" method="post">
                    <div class="form-group">
                        <label for="lbl_username">Username</label>
                        <input readonly="readonly" type="text" class="form-control" name="username" id="username"
                            value="{{ old('username', $user->username) }}">
                    </div>
                    <div class="form-group">
                        <label for="lbl_password">New Password</label>
                        <input type="password" class="form-control" name="n_password" id="n_password" value="">
                    </div>
                    <div class="form-group">
                        <label for="lbl_password2">Confirm Password</label>
                        <input type="password" class="form-control" name="c_password" id="c_password" value="">
                    </div>
                    <div class="form-group">
                        <label for="lbl_email">Email Address</label>
                        <input type="text" class="form-control" name="email" id="email"
                            value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="form-group">
                        <label for="lbl_name">Name</label>
                        <input type="text" class="form-control" name="n_penuh" id="n_penuh"
                            value="{{ old('n_penuh', $user->n_penuh) }}">
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button id="submitbtn" type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@include('template.footer')
