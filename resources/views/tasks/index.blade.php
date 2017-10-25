<!DOCTYPE html>
    <head>
    </head>
    <body>
	<ul>
	@foreach ($list as $i)
	<li><a href="/task/{{$i->id}}">{{$i->body}}</a></li>
	@endforeach
	</ul>
    </body>
</html>
