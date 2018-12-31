<header class="bg-black text-grey-dark h-20 flex flex-col items-center">
    <div class="container flex flex-1 items-center">
        @include('lapress::content.logo')
        <nav class="flex items-center mx-8 xs:flex-col">
            @foreach(menu('primary')->items as $item)
                 {{ $item->anchor }}
            @endforeach
        </nav>
    </div>
</header>
<portal-target name="header:after"></portal-target>
