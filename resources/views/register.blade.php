@include('template.header')
<section class="content container">
    <br><br><br><br><br>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4 ">

                        </div>
                        <div class="col-md-12">
                            <center><img src="/prismkhas.png" width="350px" height="100px"></center>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body col-md-10 align-self-center">
                    <form action="{{ route('daftar') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- <label for="username"> Username: </label> --><br>
                                    <input type="text" id="username" name="username" class="form-control"
                                        placeholder="Username" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- <label for="username"> Username: </label> -->
                                    <input type="text" id="fullname" name="fullname" class="form-control"
                                        placeholder="Full Name" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- <label for="password"> Password: </label> -->
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- <label for="password"> Password: </label> -->
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{ route('login') }}" type="button" class="btn btn-block btn-primary"
                                        title="Register">Back</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-success"
                                        title="Login">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
