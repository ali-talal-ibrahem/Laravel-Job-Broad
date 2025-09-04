
<div>
@foreach ( $jobs as $job )
<h2>{{ $job['title'] }}</h2>
<p>{{ 'Salary is : ' . $job['salary'] }}</p>
@endforeach
</div>
