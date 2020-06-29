<?php $active = (isset($active)) ? $active : 'home' ?>
<?php $subActive = (isset($subActive)) ? $subActive : '' ?>
<?php $title = (isset($title)) ? $title : 'الرئيسية' ?>

@include('layout.Header')

@include('layout.SideBar')

<!-- Start Content -->

<section class="content">

    @include('layout.NavBar')

    <section class="contain">
        @include('layout.Messages')

        @yield('content')
    </section>

</section>

<!-- End Content -->

@include('layout.Footer')
