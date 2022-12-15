<div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    <h1>This is header component</h1>
    <h3>My name is {{$name}}</h3>
    <h3>Fruites are:</h3>
    <ul>
        @foreach ($fruites as $fruit)
        <li>{{$fruit}}</li>
        @endforeach
    </ul>

</div>
