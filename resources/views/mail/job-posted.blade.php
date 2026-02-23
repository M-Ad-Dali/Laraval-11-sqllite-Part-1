<h2>
  {{ $job->title }}
</h2>

<p>
  Congrats on your new job posting!
</p>

<p>
  <a href="{{ url('/jobs/' . $job->id) }}">View Job Your Job Listing</a>
</p>