
<?php
$arPermission = Session::get('arPermission');
?>
@foreach($arPermission as $arraycolumn => $arrayrow)
    <li>
        <?php $string= "admin/$arrayrow[0]";?>
        <a href="{{URL::to($string)}}">
            <i class="{{$arrayrow[2]}}"></i>
            <span>{{$arrayrow[1]}}</span>
        </a>
    </li>
@endforeach
