<h2>New Contact Enquiry</h2>

<p><strong>Name:</strong> {{ $data['fname'] }} {{ $data['lname'] }}</p>

<p><strong>Email:</strong> {{ $data['email'] }}</p>

<p><strong>Phone:</strong> {{ $data['phone'] }}</p>

<p><strong>Message:</strong></p>

<p>{!! nl2br(e($data['message'])) !!}</p>
