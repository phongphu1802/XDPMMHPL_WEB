
    @foreach($arPermission as $arraycolumn => $arrayrow)
        <li>
            <a href="http://localhost:8080/XDPMMHPL_WEB/admin/{{$arrayrow[0]}}">
                <i class="{{$arrayrow[2]}}"></i>
                <span>{{$arrayrow[1]}}</span>
            </a>
        </li>
    @endforeach
