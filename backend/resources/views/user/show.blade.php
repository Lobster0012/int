@extends('layouts.app')
@section('content')
<<<<<<< HEAD
<div class="show">
    <div class="user">
    <h1> {{$query->tg_id}} тг юзернейм</h1>
    <span>{{$query->balance}} коинов</span> 
    </div>
    <div class="myEvents">
=======
<div class="bodyUser">
<div class="show">
<div class="userHeader">
    <div class="user">
        <div class="avatar"></div>
    <h1> {{$query->tg_id}} тг юзернейм</h1>
    <span>{{$query->balance}} коинов</span> 
    </div>
    <div class="myHistory">
        <h1 class="PC" id="PC">История покупок</h1>
       

        <div class="modalMenu" id="modalMenu">
          <div class="flexClose">
          <div class="closeModalMenu" id="closeModalMenu">X</div>
<br>
          <div class="mainModalMenu">
            <p class="titleModalMenu">История покупок</p>
                @foreach ($myHistory as $item)
                <div class="itemHistory">
                    <div class="left">
      <div class="titleHistory">  {{ $item->product->title }} </div>
      </div>
      <div class="right">
          <div class="priceHistory">{{ $item->product->price }}</div>
       <div class="dateHistory">{{preg_replace('/-/','.', preg_replace('/\s.*/',' ', $item->created_at))}}</div>
        </div>
        </div>
        @endforeach
          </div>
          </div>
        </div>
    </div>
</div>

    <!-- перенести на отдельную страницу -->
    <!-- <div class="myEvents">
>>>>>>> 6814b3d603f080bbd1f12b75d762da234cd501cc
        <h1>Ближайше события</h1>
        @foreach ($myEvents as $item)
        <div class="item">
            <h1>{{$item->events->name}}</h1>
            <p>{{$item->events->desc}}</p>    
            <p>{{$item->events->type}}</p>
               <p>{{$item->events->salary}} коинов</p>
            @if($item->events->type == 'Offline')  
               <p>{{$item->events->subject}}</p>
            <p>{{$item->events->data}} {{$item->time}}</p>
            <p>{{$item->events->count}} макс. участников</p>
        </div>
        @endif    
    @endforeach
    @foreach ($myOrganizatedEvents as $item)
    ваши события
    <div class="item">
        <h1>{{$item->name}}</h1>
        <p>{{$item->data}} {{$item->time}}</p>
        <p>{{count($item->members)}} из {{$item->count}} участников</p>
        участники: <br>
        @foreach ($item->members as $member)
            {{$member->user->tg_id}}
            @if(!isset($item->checkevents))
            <form action="{{route('checkEvent.statusOff',$item)}}" method="post">
                @csrf
                <button type="submit">присутствовал</button>
            </form>
            <form action="{{route('checkEvent.statusOffNot',$item)}}" method="post">
                @csrf
                <button type="submit">отсутствовал</button>
            </form>
            @endif
        @endforeach
    </div>  
@endforeach
    </div>
    @foreach ($myBuyRequest as $items)
    <div>
    id заказа:<h1>{{$items->id}}</h1>
    статус:<h1>{{$items->status}}</h1>
    адрес<h1>{{$items->address}}</h1>
</div>
<<<<<<< HEAD
    @endforeach
=======
    @endforeach -->
</div>
>>>>>>> 6814b3d603f080bbd1f12b75d762da234cd501cc
</div>
@endsection