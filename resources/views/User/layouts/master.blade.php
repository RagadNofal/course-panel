<!DOCTYPE html>
<html lang="en">

    @include('User.layouts.head')  



    @include('User.layouts.go-top')

    @include('User.layouts.main-header')

    <main>
        @yield('content')
    </main>

    @include('User.layouts.footer')

    @include('User.layouts.modal-login')

    @include('User.layouts.register')

    @include('User.layouts.scripts')


</html>
