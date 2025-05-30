@extends('layouts.app')
@section('content')
<div class="error">
    {{isset($error) ? $error : ''}}
</div>
@foreach ($query as $item)
<div class="item">
    <h1>{{$item->name}}</h1>
    <p>{{$item->desc}}</p>    
    <p>{{$item->type}}</p>
    <p>{{$item->salary}} коинов</p>
    @if($item->type == 'Offline')   
     <p>{{$item->subject}}</p>
    <p>{{$item->data}} {{$item->time}}</p>
    <p>{{count($item->members)}} из {{$item->count}} участников</p>
    @endif
    @if (count($item->members) == $item->count)
        <p>максимально человек</p>        
    @else
    <form action="{{route('member.store',$item->id)}}" method="post">
        @csrf
        <button type="submit">
        @if($item->type == 'Online')
<<<<<<< HEAD
            <a href="{{$item->subject}}">Присоедениться</a>
        @else
            @if ($item->members->where('user_id', $user->id)->isNotEmpty())
                Вы уже участвуете   
            @else
                Присоединиться
            @endif
        @endif
=======
            <a href="{{$item->subject}}">присоедениться</a>
            @elseif ($item->members->where('user_id', $user->id)->isNotEmpty())
                 Вы уже участвуете
            @else
                присоединиться
            @endif
>>>>>>> 6814b3d603f080bbd1f12b75d762da234cd501cc
        </button>
    </form>
    @endif
   
</div>
@endforeach
@endsection