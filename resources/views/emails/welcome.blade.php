<h1> hello {{$user->name}}</h1>

<div>
    <h1>You Created {{$post->title}} </h1>
    <p>{{$post->body}}</p>
    <img width="300" src="{{$message->embed('storage/'.$post->image)}}" alt="">
</div>
