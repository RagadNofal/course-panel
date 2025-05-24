<!-- popup login -->
<div class="modal modal-account fade" id="modalLogin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="flat-account">
                <div class="banner-account">
                    <img src="{{ asset('assets/images/banner/banner-account1.jpg') }}" alt="banner">
                </div>
                <form class="form-account" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="title-box">
                        <h4>Login</h4>
                        <span class="close-modal icon-close2" data-bs-dismiss="modal"></span>
                    </div>
                    <div class="box">
                        <fieldset class="box-fieldset">
                            <label>Email</label>
                            <div class="ip-field">
                                <svg class="icon" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <!-- SVG content -->
                                </svg>
                                <input type="email" name="email" class="form-control" placeholder="Your email" required>
                            </div>
                        </fieldset>

                        <fieldset class="box-fieldset">
                            <label>Password</label>
                            <div class="ip-field">
                                <svg class="icon" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <!-- SVG content -->
                                </svg>
                                <input type="password" name="password" class="form-control" placeholder="Your password" required>
                            </div>
                            <div class="text-forgot text-end">
                                <a href="{{ route('password.request') }}">Forgot password?</a>
                            </div>
                        </fieldset>
                    </div>

                    <div class="box box-btn">
                        <button type="submit" class="tf-btn primary w-100">Login</button>
                        <div class="text text-center">
                            Don’t have an account?
                            <a href="#modalRegister" data-bs-toggle="modal" class="text-primary">Register</a>
                        </div>
                    </div>

                    <p class="box text-center caption-2">or login with</p>
                    <div class="group-btn">
                        <a href="{{ url('/auth/google') }}" class="btn-social">
                            <img src="{{ asset('assets/images/logo/google.jpg') }}" alt="Google">
                            Google
                        </a>
                        <a href="{{ url('/auth/facebook') }}" class="btn-social">
                            <img src="{{ asset('assets/images/logo/fb.jpg') }}" alt="Facebook">
                            Facebook
                        </a>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>
